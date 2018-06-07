<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCitations;
use LaravelEnso\CommentsManager\app\Traits\Commentable;

class Citation extends Model
{
    use HasCitations;
    use Commentable;

    protected $fillable = ['name', 'description', 'repository_id', 'volume_id', 'page_id',  'is_active', 'confidence'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function sources()
    {
        return $this->belongsToMany(Source::class);
    }


}
