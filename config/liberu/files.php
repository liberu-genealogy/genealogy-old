<?php

use LaravelLiberu\Avatars\Models\Avatar;
use LaravelLiberu\DataExport\Models\Export;
use LaravelLiberu\DataImport\Models\Import;
use LaravelLiberu\DataImport\Models\RejectedImport;
use LaravelLiberu\Documents\Models\Document;
use LaravelLiberu\Files\Models\Upload;
use LaravelLiberu\HowTo\Models\Poster;
use LaravelLiberu\HowTo\Models\Video;
use LaravelLiberu\Products\Models\Picture;
use LaravelLiberu\Webshop\Models\Brand;
use LaravelLiberu\Webshop\Models\CarouselSlide;

return [
    'linkExpiration' => (int) env('TEMPORARY_LINK_EXPIRATION', 60 * 60 * 24),
    'storageLimit' => 500000,
    'paginate' => (int) env('FILES_PAGINATION', 50),
    'testingFolder' => 'testing',
    'renameFolders' => [
        'dataImport' => 'import',
        'dataExport' => 'export',
        'webshopCarouselSlide' => 'carouselSlide',
    ],
    'nonStandardFolders' => [
        'files', 'imports', 'carousel', 'howToVideos', 'webshopCarouselSlide',
    ],
    'upgrade' => [
        'avatar' => Avatar::class,
        'dataExport' => Export::class,
        'upload' => Upload::class,
        'dataImport' => Import::class,
        'rejectedImport' => RejectedImport::class,
        'document' => Document::class,
        'productPicture' => Picture::class,
        'webshopBrand' => Brand::class,
        'webshopCarouselSlide' => CarouselSlide::class,
        'poster' => Poster::class,
        'video' => Video::class,
    ],
];
