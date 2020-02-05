<?php

namespace App\Http\Queries\Admin;

use App\Filters\FiltersMultipleFields;
use App\User;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UsersQuery extends QueryBuilder
{
    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    protected $searchables = [
        'email', 'first_name', 'last_name',
    ];

    /**
     * Create a new query instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            User::with('roles')->withTrashed()
        );

        $this->defaultSort('-created_at')
            ->allowedSorts('created_at', 'id')
            ->allowedFilters([
                AllowedFilter::custom('s', new FiltersMultipleFields, implode(',', $this->searchables))
            ]);
    }
}
