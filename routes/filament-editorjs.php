<?php

use Athphane\FilamentEditorjs\Http\Controllers\FilamentEditorJsController;
use Filament\PanelRegistry;
use Illuminate\Support\Facades\Route;

Route::name('filament.')
    ->group(function () {
        $editorjs_panels_config = config('filament-editorjs.panels');

        $panels = app(PanelRegistry::class)->all();

        // Find panels that are in the config
        $existing_panels = array_intersect($editorjs_panels_config, array_keys($panels));

        foreach ($existing_panels as $panel) {
            $panel = $panels[$panel];

            $domains = $panel->getDomains();

            Route::domain($domains[0] ?? null)
                ->middleware([
                    ...$panel->getMiddleware(),
                    ...$panel->getAuthMiddleware(),
                ])
                ->name('editorjs.')
                ->prefix($panel->getPath())
                ->group(function () {
                    Route::match(['POST', 'PATCH'], 'editorjs/upload/image/{model_class}/{model_id}', [
                        FilamentEditorJsController::class, 'uploadImage',
                    ])->name('upload');
                    // routes go here
                });
        }
    });
