<?php

namespace App\Contracts\enso\files;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\StreamedResponse;

interface Attachable
{
    public function file(): Relation;

    public function inline(): StreamedResponse;

    public function download(): StreamedResponse;

    public function temporaryLink(): string;

    public function upload(UploadedFile $file): void;

    public function attach(File $file, string $originalName, ?User $user): void;

    public function folder(): string;

    public function publicPath(): ?string;

    public function mimeTypes(): array;

    public function extensions(): array;

    public function resizeImages(): array;

    public function optimizeImages(): bool;
}
