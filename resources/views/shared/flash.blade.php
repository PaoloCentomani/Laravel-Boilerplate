@if ($message = flash()->message)
    <div class="container mx-auto mb-8">
        <div class="alert {{ flash()->class }}" role="alert">
            {!! $message !!}
        </div>
    </div>
@endif
