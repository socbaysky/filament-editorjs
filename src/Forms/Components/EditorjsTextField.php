<?php

namespace Athphane\FilamentEditorjs\Forms\Components;

use Athphane\FilamentEditorjs\Forms\Concerns\HasHeight;
use Athphane\FilamentEditorjs\Forms\Concerns\HasImageUploadEndpoints;
use Athphane\FilamentEditorjs\Forms\Concerns\HasTools;
use Closure;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasPlaceholder;

class EditorjsTextField extends Field
{
    use HasPlaceholder;
    use HasHeight;
    use HasTools;
    use HasImageUploadEndpoints;

    protected string $view = 'filament-editorjs::components.editorjs-text-field';

    public static function make(string $name): static
    {
        $instance = parent::make($name);

        // Setup Default Tools from Config
        $instance = $instance->setDefaultTools();

        $instance = $instance->setDefaultUploadUrl();

        return $instance;
    }
}
