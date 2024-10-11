<?php

namespace Athphane\FilamentEditorjs\Forms\Concerns;

use Closure;

trait HasImageUploadEndpoints
{
    public Closure $getFileAttachmentUrlUsing;

    public function setDefaultUploadUrl(): static
    {
        $this->getFileAttachmentUrlUsing = function ($record) {
            return route('filament.editorjs.upload', [$record->getMorphClass(), $record->id]);
        };

        return $this;
    }

    public function getFileAttachmentUrlUsing(string|Closure|null $callback): static
    {
        $this->getFileAttachmentUrlUsing = $callback;

        return $this;
    }

    public function getFileAttachmentUrl(): string
    {
        return $this->evaluate($this->getFileAttachmentUrlUsing);
    }
}
