<?php

namespace App\Models\enso\dataimport;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use LaravelEnso\DataImport\Enums\ImportTypes;
use LaravelEnso\DataImport\Enums\Statuses;
use LaravelEnso\DataImport\Exceptions\DataImport as DataImportException;
use LaravelEnso\DataImport\Jobs\Import as Job;
use LaravelEnso\DataImport\Services\Structure;
use LaravelEnso\DataImport\Services\Template;
use App\Contracts\enso\files\Attachable;
use App\Contracts\enso\files\AuthorizesFileAccess;
use App\Traits\enso\files\FilePolicies;
use App\Traits\enso\files\HasFile;
use LaravelEnso\Helpers\Services\Obj;
use LaravelEnso\Helpers\Traits\CascadesMorphMap;
use LaravelEnso\IO\Contracts\IOOperation;
use LaravelEnso\IO\Enums\IOTypes;
use LaravelEnso\IO\Traits\HasIOStatuses;
use LaravelEnso\Tables\Traits\TableCache;
use LaravelEnso\TrackWho\Traits\CreatedBy;
class DataImport extends Model implements Attachable, IOOperation, AuthorizesFileAccess
{
    use CascadesMorphMap, CreatedBy, HasIOStatuses, HasFile, FilePolicies, TableCache;
    // public function __construct(Array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $db = \Session::get('db');
    //     error_log('+++++++++++++++++++++++++++++++++++'.$db);
    //     if(empty($db)) {
    //         $db = env('DB_DATABASE', 'enso');
    //     }
    //     if($db === env('DB_DATABASE')) {
    //         $key = 'database.connections.mysql.database';
    //         config([$key => $db]);
    //     } else { 
    //         $key = 'database.connections.mysql.database';
    //         config([$key => $db]);
    //     }
    //     \DB::purge('mysql');
    //     \DB::reconnect('mysql');
    //     $this->setConnection('mysql');
    //     error_log('-----------------------------------'.$this->getConnection()->getDatabaseName());
    // }
    protected $extensions = ['xlsx'];

    protected $guarded = ['id'];

    protected $casts = ['status' => 'integer', 'file_parsed' => 'boolean'];

    protected $folder = 'imports';

    public function rejected()
    {
        return $this->hasOne(RejectedImport::class);
    }

    public function handle(UploadedFile $file, array $params = [])
    {
        $template = new Template($this);
        $structure = new Structure($template, $file);

        if ($structure->isValid()) {
            tap($this)->save()
                ->upload($file);

            Job::dispatch($this, $template, $structure->sheets(), new Obj($params));
        }

        return $structure->summary();
    }

    public function getEntriesAttribute()
    {
        return $this->entries();
    }

    public function entries()
    {
        return $this->successful + $this->failed;
    }

    public function rejectedFolder()
    {
        return $this->folder.DIRECTORY_SEPARATOR."rejected_{$this->id}";
    }

    public function delete()
    {
        if ($this->status !== Statuses::Finalized) {
            throw DataImportException::deleteRunningImport();
        }

        Storage::deleteDirectory($this->rejectedFolder());

        optional($this->rejected)->delete();

        parent::delete();
    }

    public function isFinalized()
    {
        return $this->file_parsed
            && $this->chunks === $this->processed_chunks;
    }

    public function name()
    {
        return ImportTypes::get($this->type);
    }

    public function type()
    {
        return IOTypes::Import;
    }
}
