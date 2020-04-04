<?php

namespace App\Http\Queries\Admin;

use App\Filters\FuzzyFilter;
use App\User;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UsersQuery extends QueryBuilder
{
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

        $this->allowedSorts('created_at', 'id')
            ->defaultSort('-created_at')
            ->allowedFilters([
                AllowedFilter::custom('s', new FuzzyFilter(
                    'email',
                    'first_name',
                    'last_name',
                ))
            ]);
    }
}
