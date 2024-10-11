<?php

namespace Athphane\FilamentEditorjs\Forms\Concerns;

use Closure;

trait HasHeight
{
    /**
     * 20 seems like a good default
     * @var int|Closure|null
     */
    protected int | Closure | null $minHeight = 20;

    /**
     * Set the min height for the editorjs field
     *
     * @param  int|Closure|null  $minHeight
     * @return $this
     */
    public function minHeight(int | Closure | null $minHeight): static
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    /**
     * Get the min height for the editorjs field
     *
     * @return int
     */
    public function getMinHeight(): int
    {
        return $this->evaluate($this->minHeight);
    }
}
