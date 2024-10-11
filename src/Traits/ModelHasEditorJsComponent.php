<?php

namespace Athphane\FilamentEditorjs\Traits;

use App\Support\Media\AllowedMimeTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Image\Enums\Fit;

trait ModelHasEditorJsComponent
{
    public function editorJsSaveImageFromRequest($request)
    {
        return $this->addMediaFromRequest('image', $request)
            ->toMediaCollection($this->editorjs_media_collection_name);
    }

    public function editorjsMediaCollectionName(): Attribute
    {
        return Attribute::get(function () {
            return 'content_images';
        });
    }

    public function registerEditorJsMediaCollection(array|null $mime_types = null): void
    {
        if (!$mime_types) {
            $mime_types = config('filament-editorjs.image_mime_types');
        }

        $this->addMediaCollection($this->editorjs_media_collection_name)
            ->acceptsMimeTypes($mime_types)
            ->withResponsiveImages();
    }

    public function registerEditorJsMediaConversions(): void
    {
        $this->addMediaConversion('preview')
            ->performOnCollections($this->editorjs_media_collection_name)
            ->fit(Fit::Contain, 1024, 768)
            ->nonQueued();
    }
}
