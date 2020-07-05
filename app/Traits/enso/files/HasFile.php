<?php

namespace App\Traits\enso\files;

use App\Models\User;
use App\Service\enso\files\Files;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\File as IlluminateFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Models\enso\files\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

trait HasFile
{
    public function file(): Relation
    {
        return $this->morphOne(File::class, 'attachable');
    }

    public function inline(): StreamedResponse
    {
        return (new Files($this))->inline();
    }

    public function download(): StreamedResponse
    {
        return (new Files($this))->download();
    }

    public function temporaryLink(): string
    {
        return $this->file->temporaryLink();
    }

    public function attach(IlluminateFile $file, string $originalName, ?User $user): void
    {
        (new Files($this))->attach($file, $originalName, $user);
    }

    public function upload(UploadedFile $file): void
    {
        (new Files($this))
            ->mimeTypes($this->mimeTypes())
            ->extensions($this->extensions())
            ->optimize($this->optimizeImages())
            ->resize($this->resizeImages())
            ->upload($file);
    }

    public function folder(): string
    {
        if (App::environment('testing')) {
            $directory = Config::get('enso.files.testingFolder');

            if (! Storage::has($directory)) {
                Storage::makeDirectory($directory);
            }

            return $directory;
        }

        return $this->folder;
    }

    public function publicPath(): ?string
    {
        return $this->file
            ? "{$this->folder()}/{$this->file->saved_name}"
            : null;
    }

    public function mimeTypes(): array
    {
        return property_exists($this, 'mimeTypes')
            ? $this->mimeTypes
            : [];
    }

    public function extensions(): array
    {
        return property_exists($this, 'extensions')
            ? $this->extensions
            : [];
    }

    public function resizeImages(): array
    {
        return property_exists($this, 'resizeImages')
            ? $this->resizeImages
            : [];
    }

    public function optimizeImages(): bool
    {
        return property_exists($this, 'optimizeImages')
            ? $this->optimizeImages
            : false;
    }

    protected static function bootHasFile()
    {
        self::deleting(fn ($model) => (new Files($model))->delete());
    }
}
