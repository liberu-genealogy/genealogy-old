<?php

namespace App\Http\Response\enso\files;

use App\Http\Resources\enso\files\File as Resource;
use App\Models\enso\files\File;
use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\Files\Http\Resources\Collection;

class Files implements Responsable
{
    public function toResponse($request)
    {
        return new Collection(
            Resource::collection(
                File::visible()
                    ->with(['createdBy.avatar', 'attachable'])
                    ->forUser($request->user())
                    ->between(json_decode($request->get('interval')))
                    ->filter($request->get('query'))
                    ->ordered()
                    ->skip($request->get('offset'))
                    ->take(config('enso.files.paginate'))
                    ->get()
            )
        );
    }
}
