<?php

namespace App\Jobs;

use App\Models\ImportJob;
use App\Models\User;
use App\Tenant\Manager;
use FamilyTree365\LaravelGedcom\Utils\GedcomParser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ImportGedcom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 0;
    public int $tries = 1;

    protected string $filePath;
    protected ?string $slug;
    protected User $user;

    public function __construct(User $user, string $filePath, ?string $slug = null)
    {
        $this->filePath = $filePath;
        $this->queue = 'high';
        $this->user = $user;
        $this->slug = $slug;
    }

    public function handle(): int
    {
        throw_unless(File::isFile($this->filePath), \Exception::class, "{$this->filePath} does not exist.");

        $tenant = Manager::fromModel($this->user->company() ?? $this->user)->connect();

        if ($tenant->databaseExists()) {
            $tenant->dropDatabase();
        }
        $tenant->createDatabase();
        $tenant->migrateDatabase();

        $slug = $this->slug ?? Str::uuid();

        $job = ImportJob::on($tenant->connectionName())->create([
            'user_id' => $this->user->getKey(),
            'status'  => 'queue',
            'slug'    => $slug,
        ]);

        with(new GedcomParser())->parse($tenant->connectionName(), $this->filePath, $slug, true);

        File::delete($this->filePath);

        $job->update(['status' => 'complete']);

        $tenant->disconnect();

        return 0;
    }
}
