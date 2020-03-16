@if ($message = flash()->message)
    <v-flash level="{{ flash()->class }}" v-cloak>{{ $message }}</v-flash>
@endif

@if ($message = session('status'))
    <v-flash v-cloak>{{ $message }}</v-flash>
@endif
