<?php

namespace Athphane\FilamentEditorjs\Forms\Concerns;

use Closure;

trait HasImageUploadEndpoints
{
    public Closure $getFileAttachmentUrlUsing;

    /**
     * Set the deafult image upload url for the editorjs field.
     * This is called in the main component class.
     *
     * @return $this
     */
    public function setDefaultUploadUrl(): static
    {
        $this->getFileAttachmentUrlUsing = function ($record) {
            return route('filament.editorjs.upload', [$record->getMorphClass(), $record->id]);
        };

        return $this;
    }

    /**
     * Set a custom closure to get the upload url for the image uploads.
     *
     * @param  string|Closure|null  $callback
     * @return $this
     */
    public function getFileAttachmentUrlUsing(string|Closure|null $callback): static
    {
        $this->getFileAttachmentUrlUsing = $callback;

        return $this;
    }

    /**
     * Get the image upload url for the editorjs field.
     *
     * @return string
     */
    public function getFileAttachmentUrl(): string
    {
        return $this->evaluate($this->getFileAttachmentUrlUsing);
    }
}
