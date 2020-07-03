<?php

namespace App\Models\enso\Avatars;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Contracts\enso\files\Attachable;
use App\Traits\enso\files\HasFile;
use LaravelEnso\Helpers\App\Traits\CascadesMorphMap;

/**
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Avatar extends Model implements Attachable
{
    use CascadesMorphMap, HasFile;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'avatars';

    /**
     * @var array
     */

    public const Width = 250;
    public const Height = 250;

    protected $fillable = ['user_id', 'original_name', 'saved_name'];

    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    protected $casts = ['user_id' => 'int'];

    protected $optimizeImages = true;

    protected $resizeImages = [
        'width' => self::Width,
        'height' => self::Height,
    ];

    protected $mimeTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

    protected $folder = 'avatars';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store(UploadedFile $file)
    {
        return DB::transaction(function () use ($file) {
            $this->delete();
            $avatar = self::create(['user_id' => Auth::user()->id]);

            return tap($avatar)->upload($file);
        });
    }
}
