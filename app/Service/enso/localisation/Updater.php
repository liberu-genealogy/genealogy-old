<?php

namespace App\Service\enso\Localisation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\enso\Localisation\Language;
use LaravelEnso\Localisation\Services\Traits\JsonFilePathResolver;
use LaravelEnso\Localisation\Services\Traits\LegacyFolderPathResolver;

class Updater
{
    use JsonFilePathResolver, LegacyFolderPathResolver;

    private Language $language;
    private array $request;
    private string $flagSufix;

    public function __construct(Language $language, array $request, string $flagSufix)
    {
        $this->language = $language;
        $this->request = $request;
        $this->flagSufix = $flagSufix;
    }

    public function run()
    {
        DB::transaction(function () {
            $oldName = $this->language->name;
            $this->language->updateWithFlagSufix($this->request, $this->flagSufix);
            $this->updateLangFiles($oldName, $this->request['name']);
        });
    }

    public function updateJson($oldName, $newName)
    {
        File::move(
            $this->jsonFileName($oldName),
            $this->jsonFileName($newName)
        );
    }

    public function updateAppJson($oldName, $newName)
    {
        File::move(
            $this->jsonFileName($oldName, 'app'),
            $this->jsonFileName($newName, 'app')
        );
    }

    public function updateEnsoJson($oldName, $newName)
    {
        File::move(
            $this->jsonFileName($oldName, 'enso'),
            $this->jsonFileName($newName, 'enso')
        );
    }

    private function updateLangFiles(string $oldName, string $newName)
    {
        if ($oldName === $newName) {
            return;
        }

        $this->updateJson($oldName, $newName);
        $this->updateAppJson($oldName, $newName);
        $this->updateEnsoJson($oldName, $newName);
        $this->updateLegacyFolder($oldName, $newName);
    }

    private function updateLegacyFolder($oldName, $newName)
    {
        File::move(
            $this->legacyFolderName($oldName),
            $this->legacyFolderName($newName)
        );
    }
}
