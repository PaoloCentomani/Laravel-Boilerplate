<div>
    <h1>{{ $title }}</h1>

    <p class="mb-2">
        <code>@@widget('ExampleWidget')</code>
    </p>

    <ul>
        @foreach ($articles as $article)
        <li class="mb-2">{{ $article }}</li>
        @endforeach
    </ul>
</div>
