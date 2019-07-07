@if ($messages = session()->pull('flash_notification'))
    @foreach ($messages as $message)
        <div class="container mt-3">
            <div class="alert alert-{{ $message->level }}{{ $message->important ? ' alert-important' : '' }}" role="alert">
                @if ($message->title)
                    <h4 class="alert-heading">{!! $message->title !!}</h4>
                @endif

                {!! $message->message !!}
            </div>
        </div>
    @endforeach
@endif
