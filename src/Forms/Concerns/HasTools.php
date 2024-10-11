<?php

namespace Athphane\FilamentEditorjs\Forms\Concerns;

trait HasTools
{
    protected array $tools = [];

    public function setDefaultTools(): static
    {
        return $this->tools(config('filament-editorjs.default_profile'));
    }

    public function defaultTools(): static
    {
        return $this->tools('default');
    }

    public function proTools(): static
    {
        return $this->tools('pro');
    }

    public function tools(string $tool_profile): static
    {
        $this->tools = config('filament-editorjs.profiles.' . $tool_profile);

        return $this;
    }

    public function getTools(): array
    {
        return $this->tools;
    }
}
