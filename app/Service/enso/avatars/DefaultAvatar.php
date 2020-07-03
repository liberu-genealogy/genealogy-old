<?php

namespace App\Service\enso\avatars;

use App\Models\enso\Avatars\Avatar;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravolt\Avatar\Facade as Service;

class DefaultAvatar
{
    private const Filename = 'avatar';
    private const Extension = 'jpg';
    private const FontSize = 128;

    private $user;
    private $avatar;
    private $filePath;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        DB::transaction(fn () => $this->findOrCreate()
            ->generate()
            ->attach());

        return $this->avatar;
    }

    private function findOrCreate(): self
    {
        $this->avatar = $this->user->avatar()
            ->firstOrCreate(['user_id' => $this->user->id]);

        return $this;
    }

    private function generate(): self
    {
        Service::create($this->user->person->name)
            ->setDimension(Avatar::Width, Avatar::Height)
            ->setFontSize(self::FontSize)
            ->setBackground($this->background())
            ->save($this->filePath());

        return $this;
    }

    private function attach(): void
    {
        $avatar = new File($this->filePath());

        $this->avatar->attach($avatar, $this->originalName(), $this->user);
    }

    private function originalName(): string
    {
        return self::Filename.$this->user->id.'.'.self::Extension;
    }

    private function hashName(): string
    {
        return Str::random(40).'.'.self::Extension;
    }

    private function filePath(): string
    {
        return $this->filePath ??= Storage::path(
            $this->avatar->folder().DIRECTORY_SEPARATOR.$this->hashName()
        );
    }

    private function background(): string
    {
        return (new Collection(
            config('laravolt.avatar.backgrounds')
        ))->random();
    }
}
