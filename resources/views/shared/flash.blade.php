@if ($message = flash()->message)
    <v-flash level="{{ flash()->class }}">{{ $message }}</v-flash>
@endif

@if ($message = session('status'))
    <v-flash>{{ $message }}</v-flash>
@endif
