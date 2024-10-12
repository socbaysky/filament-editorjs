<?php

use Athphane\FilamentEditorjs\Http\Controllers\FilamentEditorJsController;
use Filament\PanelRegistry;
use Illuminate\Support\Facades\Route;

/***
 * Register the routes to allow the editorjs uploads to work.
 * All panels will get the same upload route, just with the panel's id in the route name.
 *
 */
Route::name('filament.')
    ->group(function () {
        $panels = app(PanelRegistry::class)->all();

        foreach ($panels as $panel) {
            $domains = $panel->getDomains();

            Route::domain($domains[0] ?? null)
                // Apply the panel's middlewares
                ->middleware([
                    ...$panel->getMiddleware(),
                    ...$panel->getAuthMiddleware(),
                ])
                ->name("{$panel->getId()}.editorjs.")
                ->prefix($panel->getPath())
                ->group(function () {
                    Route::match(['POST', 'PATCH'], 'editorjs/upload/image/{model_class}/{model_id}', [
                        FilamentEditorJsController::class, 'uploadImage',
                    ])->name('upload');
                });
        }
    });
