<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Il campo :attribute deve essere accettato.',
    'active_url' => 'Il campo :attribute non è un URL valido.',
    'after' => 'Il campo :attribute deve essere una data successiva al :date.',
    'after_or_equal' => 'Il campo :attribute deve essere una data pari o successiva al :date.',
    'alpha' => 'Il campo :attribute deve contenere solo lettere.',
    'alpha_dash' => 'Il campo :attribute deve contenere solo lettere, numeri, trattini e trattini bassi.',
    'alpha_num' => 'Il campo :attribute deve contenere solo lettere e numeri.',
    'array' => 'Il campo :attribute deve essere un array.',
    'before' => 'Il campo :attribute deve essere una data antecedente al :date.',
    'before_or_equal' => 'Il campo :attribute deve essere una data pari o antecedente al :date.',
    'between' => [
        'numeric' => 'Il campo :attribute deve essere compreso tra :min e :max.',
        'file' => 'Il campo :attribute deve avere dimensioni comprese tra :min e :max kB.',
        'string' => 'Il campo :attribute deve avere tra :min e :max caratteri.',
        'array' => 'Il campo :attribute deve contenere tra :min e :max elementi.',
    ],
    'boolean' => 'Il campo :attribute deve essere vero o falso.',
    'confirmed' => 'La conferma del campo :attribute non corrisponde.',
    'date' => 'Il campo :attribute non è una data valida.',
    'date_equals' => 'Il campo :attribute deve essere una data pari a :date.',
    'date_format' => 'Il campo :attribute deve essere nel formato :format.',
    'different' => 'Il campo :attribute e il campo :other devono essere differenti.',
    'digits' => 'Il campo :attribute deve avere :digits cifre.',
    'digits_between' => 'Il campo :attribute deve avere tra :min e :max cifre.',
    'dimensions' => "L'immagine del campo :attribute ha dimensioni non valide.",
    'distinct' => 'Il campo :attribute contiene un valore duplicato.',
    'email' => 'Il campo :attribute deve essere un indirizzo valido.',
    'ends_with' => 'Il campo :attribute deve terminare con uno dei seguenti valori: :values.',
    'exists' => 'Il campo :attribute ha un valore non valido.',
    'file' => 'Il campo :attribute deve essere un file.',
    'filled' => 'Il campo :attribute deve essere valorizzato.',
    'gt' => [
        'numeric' => 'Il campo :attribute deve essere maggiore di :value.',
        'file' => 'Il campo :attribute deve avere dimensioni superiori a :value kB.',
        'string' => 'Il campo :attribute deve avere più di :value caratteri.',
        'array' => 'Il campo :attribute deve contenere più di :value elementi.',
    ],
    'gte' => [
        'numeric' => 'Il campo :attribute deve essere maggiore o uguale a :value.',
        'file' => 'Il campo :attribute deve avere dimensioni pari o superiori a :value kB.',
        'string' => 'Il campo :attribute deve avere almeno :value caratteri.',
        'array' => 'Il campo :attribute deve contenere almeno :value elementi.',
    ],
    'image' => "Il campo :attribute deve essere un'immagine.",
    'in' => 'Il campo :attribute ha un valore non valido.',
    'in_array' => 'Il valore del campo :attribute non esiste in :other.',
    'integer' => 'Il campo :attribute deve essere un numero intero.',
    'ip' => 'Il campo :attribute deve essere un indirizzo IP valido.',
    'ipv4' => 'Il campo :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6' => 'Il campo :attribute deve essere un indirizzo IPv6 valido.',
    'json' => 'Il campo :attribute deve essere un JSON valido.',
    'lt' => [
        'numeric' => 'Il campo :attribute deve essere minore di :value.',
        'file' => 'Il campo :attribute deve avere dimensioni inferiori a :value kB.',
        'string' => 'Il campo :attribute deve avere meno di :value caratteri.',
        'array' => 'Il campo :attribute deve contenere meno di :value elementi.',
    ],
    'lte' => [
        'numeric' => 'Il campo :attribute deve essere minore o uguale a :value.',
        'file' => 'Il campo :attribute deve avere dimensioni pari o inferiori a :value kB.',
        'string' => 'Il campo :attribute deve avere non più di :value caratteri.',
        'array' => 'Il campo :attribute deve contenere non più di :value elementi.',
    ],
    'max' => [
        'numeric' => 'Il campo :attribute non deve essere superiore a :max.',
        'file' => 'Il campo :attribute non deve avere dimensioni superiori a :max kB.',
        'string' => 'Il campo :attribute non deve avere più di :max caratteri.',
        'array' => 'Il campo :attribute non deve contenere più di :max elementi.',
    ],
    'mimes' => 'Il campo :attribute deve essere un file di tipo: :values.',
    'mimetypes' => 'Il campo :attribute deve essere un file di tipo: :values.',
    'min' => [
        'numeric' => 'Il campo :attribute deve essere almeno pari a :min.',
        'file' => 'Il campo :attribute deve avere dimensioni almeno pari a :min kB.',
        'string' => 'Il campo :attribute deve avere almeno :min caratteri.',
        'array' => 'Il campo :attribute deve contenere almeno :min elementi.',
    ],
    'multiple_of' => 'Il campo :attribute deve essere un multiplo di :value.',
    'not_in' => 'Il campo :attribute ha un valore non valido.',
    'not_regex' => 'Il formato del campo :attribute non è valido.',
    'numeric' => 'Il campo :attribute deve essere un numero.',
    'password' => 'La password non è corretta.',
    'present' => 'Il campo :attribute deve essere presente.',
    'prohibited' => 'Il campo :attribute non è permesso.',
    'prohibited_if' => 'Il campo :attribute non è permesso se :other è :value.',
    'prohibited_unless' => 'Il campo :attribute non è permesso a meno che :other sia in :values.',
    'regex' => 'Il formato del campo :attribute non è valido.',
    'required' => 'Il campo :attribute è richiesto.',
    'required_if' => 'Il campo :attribute è richiesto quando il campo :other ha valore :value.',
    'required_unless' => 'Il campo :attribute è richiesto a meno che il campo :other sia compreso in :values.',
    'required_with' => 'Il campo :attribute è richiesto quando :values è presente.',
    'required_with_all' => 'Il campo :attribute è richiesto quando :values sono presenti.',
    'required_without' => 'Il campo :attribute è richiesto quando :values non è presente.',
    'required_without_all' => 'Il campo :attribute è richiesto quando :values non sono presenti.',
    'same' => 'I campi :attribute e :other devono coincidere.',
    'size' => [
        'numeric' => 'Il campo :attribute deve essere pari a :size.',
        'file' => 'Il campo :attribute deve avere dimensioni pari a :size kB.',
        'string' => 'Il campo :attribute deve avere :size caratteri.',
        'array' => 'Il campo :attribute deve contenere :size elementi.',
    ],
    'starts_with' => 'Il campo :attribute deve iniziare con uno dei seguenti valori: :values.',
    'string' => 'Il campo :attribute deve essere una stringa.',
    'timezone' => 'Il campo :attribute deve essere un fuso orario valido.',
    'unique' => 'Il campo :attribute è stato già utilizzato.',
    'uploaded' => 'Il caricamento del campo :attribute è fallito.',
    'url' => 'Il formato del campo :attribute non è valido.',
    'uuid' => 'Il campo :attribute deve essere un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'email' => [
            'unique' => 'Questo indirizzo e-mail risulta già registrato!',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'current_password' => 'password attuale',
        'date' => 'data',
        'email' => 'e-mail',
        'description' => 'descrizione',
        'first_name' => 'nome',
        'last_name' => 'cognome',
        'name' => 'nome',
        'photo' => 'foto',
        'role' => 'ruolo',
        'terms' => 'termini di servizio',
        'title' => 'titolo',
    ],

];
