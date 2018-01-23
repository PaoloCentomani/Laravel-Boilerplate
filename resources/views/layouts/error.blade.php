<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <style>
        html,
        body {
          height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            background-color: #f6f6f6;
        }

        h1 {
            font-family: sans-serif;
            font-size: 36px;
            font-weight: normal;
            color: #ababab;
        }
    </style>
</head>
<body>
    <h1>
        @yield('message')
    </h1>
</body>
</html>
