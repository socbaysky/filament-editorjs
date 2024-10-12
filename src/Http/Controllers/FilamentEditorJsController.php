<?php

namespace Athphane\FilamentEditorjs\Http\Controllers;

use Athphane\FilamentEditorjs\Traits\ModelHasEditorJsComponent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FilamentEditorJsController
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadImage(Request $request, $model_class, $model_id)
    {
        /** @var Model $class */
        $class = Relation::getMorphedModel($model_class);

        /** @var Model|ModelHasEditorJsComponent $record */
        $record = $class::query()->find($model_id);

        if (! $record) {
            return response()->json([
                'success' => 0,
                'message' => 'Record not found',
            ]);
        }

        /** @var Media $image */
        $image = $record->editorJsSaveImageFromRequest($request);

        return response()->json([
            'success' => 1,
            'file'    => [
                'url'      => $image->getUrl('preview'),
                'media_id' => $image->id,
            ],
        ]);
    }
}
