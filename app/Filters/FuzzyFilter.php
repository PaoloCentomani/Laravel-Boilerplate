<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\Filters\Filter;

class FuzzyFilter implements Filter
{
    /**
     * The fields to search.
     *
     * @var array
     */
    protected $fields;

    /**
     * Create a new controller instance.
     *
     * @param  mixed  $fields
     * @return void
     */
    public function __construct(...$fields)
    {
        $this->fields = $fields;
    }

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
        return $query->where(function (Builder $query) use ($value) {
            $value = str_replace(' ', '%', $value);

            foreach ($this->fields as $field) {
                $query->when(
                    Str::contains($field, '.'),

                    function (Builder $query) use ($field, $value) {
                        [$relationName, $relationAttribute] = explode('.', $field);

                        $query->orWhereHas(
                            $relationName,
                            fn ($query) => $query->where($relationAttribute, 'like', "%{$value}%")
                        );
                    },

                    fn (Builder $query) => $query->orWhere($field, 'like', "%{$value}%")
                );
            }
        });
    }
}
