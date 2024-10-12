<?php

namespace Athphane\FilamentEditorjs\Forms\Concerns;

use Closure;
use Filament\Facades\Filament;

trait HasImageUploadEndpoints
{
    public Closure $getFileAttachmentUrlUsing;

    /**
     * Set the default image upload url for the editorjs field.
     * The route used is dynamically based on the current panel.
     * All panels will have the same upload route, just with a different panel id.
     * Check the routes/filament-editorjs.php file to see how this is done.
     *
     * This is called in the main component class.
     *
     * @return $this
     */
    public function setDefaultUploadUrl(): static
    {
        $this->getFileAttachmentUrlUsing = function ($record) {
            $current_panel = Filament::getCurrentPanel();

            return route("filament.{$current_panel->getId()}.editorjs.upload", [
                $record->getMorphClass(),
                $record->id,
            ]);
        };

        return $this;
    }

    /**
     * Set a custom closure to get the upload url for the image uploads.
     *
     * @return $this
     */
    public function getFileAttachmentUrlUsing(string|Closure|null $callback): static
    {
        $this->getFileAttachmentUrlUsing = $callback;

        return $this;
    }

    /**
     * Get the image upload url for the editorjs field.
     */
    public function getFileAttachmentUrl(): string
    {
        return $this->evaluate($this->getFileAttachmentUrlUsing);
    }
}
