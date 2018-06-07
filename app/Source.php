<?php

namespace App;

use App\Traits\HasCitations;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Commentable;

class Source extends Model
{
    use Commentable;
    use HasCitations;

    protected $fillable = ['name', 'description', 'repository_id', 'author_id', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function repositories()
    {
        return $this->belongsTo(Repository::class);
    }

    public function citations()
    {
        return $this->hasMany(Citations::class);
    }

    public function getCitationListAttribute()
    {
        return $this->citations()->pluck('citation.id');
    }
}
