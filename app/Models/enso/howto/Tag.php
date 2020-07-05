<?php

namespace App\Models\enso\howto;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\HowTo\Exceptions\Tag as Exception;

class Tag extends Model
{
    protected $table = 'how_to_tags';

    protected $guarded = ['id'];

    public function videos()
    {
        return $this->belongsToMany(
            Video::class,
            'how_to_tag_how_to_video',
            'how_to_tag_id',
            'how_to_video_id'
        );
    }

    public function delete()
    {
        if ($this->videos()->exists()) {
            throw Exception::inUse();
        }

        parent::delete();
    }
}
