@if ($message = flash()->message)
    <v-flash level="{{ flash()->class }}">{{ flash()->message }}</v-flash>
@endif
