<?php

namespace KodeKeep\NovaEloquentSortable;

use Laravel\Nova\Fields\Field;

class NovaEloquentSortable extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-eloquent-sortable';

    /**
     * @var bool
     */
    public $showOnDetail = false;

    /**
     * @var bool
     */
    public $showOnCreation = false;

    /**
     * @var bool
     */
    public $showOnUpdate = false;

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param mixed  $resource
     * @param string $attribute
     *
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $first = $resource->buildSortQuery()->ordered()->first();
        $last  = $resource->buildSortQuery()->ordered('desc')->first();

        $this->withMeta([
            'first' => null === $first ? null : $first->id,
            'last'  => null === $last ? null : $last->id,
        ]);

        return data_get($resource, $attribute);
    }
}
