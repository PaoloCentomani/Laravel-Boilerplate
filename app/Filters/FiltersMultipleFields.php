<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\Filters\Filter;

class FiltersMultipleFields implements Filter
{
    /**
     * Implement the filter.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @param  string  $property
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function __invoke(Builder $query, $value, string $property): Builder
    {
        return $query->where(function (Builder $query) use ($property, $value) {
            $value = str_replace(' ', '%', $value);

            foreach (explode(',', $property) as $field) {
                $query->when(
                    Str::contains($field, '.'),

                    function (Builder $query) use ($field, $value) {
                        [$relationName, $relationAttribute] = explode('.', $field);

                        $query->orWhereHas($relationName, function ($query) use ($relationAttribute, $value) {
                            $query->where($relationAttribute, 'like', "%{$value}%");
                        });
                    },

                    function (Builder $query) use ($field, $value) {
                        $query->orWhere($field, 'like', "%{$value}%");
                    }
                );
            }
        });
    }
}
