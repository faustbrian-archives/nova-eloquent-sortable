<?php

namespace KodeKeep\NovaEloquentSortable\Http;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\EloquentSortable\Sortable;

class EloquentSortableRequestHandler extends Controller
{
    /**
     * @param NovaRequest $request
     */
    public function __invoke(NovaRequest $request)
    {
        $resourceId = $request->get('resourceId');
        $model      = $request->findModelOrFail($resourceId);

        if (! $model instanceof Sortable) {
            abort(500, 'Model should implement '.Sortable::class.' interface');
        }

        $direction = $request->get('direction');

        if ('start' === $direction) {
            $model->moveToStart();
        } elseif ('up' === $direction) {
            $model->moveOrderUp();
        } elseif ('down' === $direction) {
            $model->moveOrderDown();
        } elseif ('end' === $direction) {
            $model->moveToEnd();
        }
    }
}
