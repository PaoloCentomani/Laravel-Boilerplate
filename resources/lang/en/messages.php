<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CRUD Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default messages for
    | CRUD pages.
    |
    */

    'cruds' => [
        'actions' => [
            'create' => 'New',
            'show' => 'Show',
            'edit' => 'Edit',
            'destroy' => 'Delete',
            'restore' => 'Restore',
            'search' => 'Search…',
        ],

        'fields' => [
            'id' => 'ID',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'deleted_at' => 'Deleted at',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Roles & Permissions Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default messages for
    | roles and permissions.
    |
    */

    'roles' => [
        'singular' => 'role',
        'plural' => 'roles',

        'super administrator' => 'Super Administrator',
        'administrator' => 'Administrator',
        'user' => 'User',

        'fields' => [
            'name' => 'Name',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Models Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default messages for
    | application models.
    |
    */

    'users' => [
        'singular' => 'user',
        'plural' => 'users',

        'fields' => [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'full_name' => 'Name',
            'email' => 'E-Mail Address',
            'email_verified_at' => 'Verified at',
            'password' => 'Password',
        ],
    ],

];
