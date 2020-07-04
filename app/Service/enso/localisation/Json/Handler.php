<?php

namespace App\Service\enso\Localisation\Json;

use App\Models\enso\Localisation\Language;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use LaravelEnso\Helpers\Services\JsonReader;
use LaravelEnso\Localisation\Services\SanitizeAppKeys;
use LaravelEnso\Localisation\Services\Traits\JsonFilePathResolver;

abstract class Handler
{
    use JsonFilePathResolver;

    protected function newTranslations(array $array): Collection
    {
        return (new Collection($array))->keys()
            ->mapWithKeys(fn ($key) => [$key => null]);
    }

    protected function saveMerged(string $locale, array $langFile): void
    {
        $this->saveToDisk($locale, $langFile);
    }

    protected function savePartial(string $locale, array $langFile, string $subDir): void
    {
        $this->saveToDisk($locale, $langFile, $subDir);
    }

    protected function saveToDisk(string $locale, array $langFile, ?string $subDir = null): void
    {
        File::put(
            $this->jsonFileName($locale, $subDir),
            json_encode($langFile, JSON_FORCE_OBJECT | ($subDir ? JSON_PRETTY_PRINT : 0))
        );
    }

    protected function merge(?string $locale = null): void
    {
        $languages = Language::extra();

        if ($locale) {
            $languages->where('name', $locale);
        }

        $languages->pluck('name')
            ->each(fn ($locale) => $this->mergeLocale($locale));
    }

    private function mergeLocale(string $locale): void
    {
        $core = (new JsonReader($this->coreJsonFileName($locale)))->array();
        $app = (new JsonReader($this->appJsonFileName($locale)))->array();
        $sanitizedApp = (new SanitizeAppKeys($app, $core))->sanitize($locale);

        $this->saveMerged($locale, array_merge($core, $sanitizedApp));
    }
}
