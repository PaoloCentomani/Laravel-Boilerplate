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
            'create' => 'Nuovo',
            'show' => 'Visualizza',
            'edit' => 'Modifica',
            'destroy' => 'Elimina',
            'restore' => 'Ripristina',
            'search' => 'Cerca…',
        ],

        'fields' => [
            'id' => 'ID',
            'created_at' => 'Creato il',
            'updated_at' => 'Modificato il',
            'deleted_at' => 'Eliminato il',
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
        'singular' => 'ruolo',
        'plural' => 'ruoli',

        'super administrator' => 'Super Amministratore',
        'administrator' => 'Amministratore',
        'user' => 'Utente',

        'fields' => [
            'name' => 'Nome',
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
        'singular' => 'utente',
        'plural' => 'utenti',

        'fields' => [
            'first_name' => 'Nome',
            'last_name' => 'Cognome',
            'full_name' => 'Nome',
            'email' => 'Indirizzo e-mail',
            'email_verified_at' => 'Verificato il',
            'password' => 'Password',
        ],
    ],

];
