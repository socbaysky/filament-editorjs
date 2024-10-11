<?php

namespace Athphane\FilamentEditorjs\Forms\Concerns;

use Closure;

trait HasHeight
{
    protected int | Closure | null $minHeight = 20;

    public function minHeight(int | Closure | null $minHeight): static
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    public function getMinHeight(): int
    {
        return $this->evaluate($this->minHeight);
    }


}
