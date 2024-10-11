<?php

namespace Athphane\FilamentEditorjs\Traits;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait ModelHasEditorJsComponent
{
    public function editorJsSaveImageFromRequest($request): Media
    {
        return $this->addMediaFromRequest('image', $request)
            ->toMediaCollection($this->editorjsMediaCollectionName());
    }

    public function editorjsMediaCollectionName(): string
    {
        return 'content_images';
    }

    public function registerEditorJsMediaCollection(?array $mime_types = null): void
    {
        if (! $mime_types) {
            $mime_types = config('filament-editorjs.image_mime_types');
        }

        $this->addMediaCollection($this->editorjsMediaCollectionName())
            ->acceptsMimeTypes($mime_types)
            ->withResponsiveImages();
    }

    public function registerEditorJsMediaConversions(): void
    {
        $this->addMediaConversion('preview')
            ->performOnCollections($this->editorjsMediaCollectionName())
            ->fit(Fit::Contain, 1024, 768)
            ->nonQueued();
    }
}
