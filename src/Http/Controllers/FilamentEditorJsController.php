<?php

namespace Athphane\FilamentEditorjs\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FilamentEditorJsController
{
    public function uploadImage(Request $request, $model_class, $model_id)
    {
        $class = Relation::getMorphedModel($model_class);

        /** @var Model|InteractsWithMedia $record */
        $record = $class::find($model_id);

        if (! $record) {
            return response()->json([
                'success' => 0,
                'message' => 'Record not found',
            ]);
        }

        /** @var Media $image */
        $image = $record->editorJsSaveImageFromRequest($request);

        if (! $image) {
            return response()->json([
                'success' => 0,
                'message' => 'Image save failed.',
            ]);
        }

        return response()->json([
            'success' => 1,
            'file' => [
                'url' => $image->getUrl('preview'),
                'media_id' => $image->id,
            ],
        ]);
    }
}
