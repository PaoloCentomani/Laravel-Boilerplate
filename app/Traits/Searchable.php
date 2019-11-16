<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * Scope a query to only include searched items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, $keyword)
    {
        if (! is_array($this->searchable)) {
            return $query;
        }

        return $query->where(function ($query) use ($keyword) {
            foreach ($this->searchable as $field) {
                $parts = explode('.', $field);

                if (count($parts) > 1) {
                    $query->orWhereHas($parts[0], function ($q) use ($parts, $keyword) {
                        $q->where("$parts[0].$parts[1]", 'like', "%$keyword%");
                    });
                } else {
                    $query->orWhere($parts[0], 'like', "%$keyword%");
                }
            }
        });
    }
}
