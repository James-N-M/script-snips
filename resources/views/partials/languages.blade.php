<div class="border col-md-2 py-4 px-4">

    <ul class="list-unstyled">
        <p>Following</p>
        @if (auth()->id())
            @foreach(auth()->user()->languages as $favorite)
                <a href="/snippets/languages/{{$favorite->name}}">
                    <li>{{ $favorite->name }}</li>
                </a>
            @endforeach
        @endif
    </ul>

    <hr>

    <ul class="list-unstyled">
        <a href="/snippets">
            <li>All</li>
        </a>
        @foreach($languages as $l)
            <a href="/snippets/languages/{{$l->name}}">
                <li>{{$l->name}}</li>
            </a>
        @endforeach
    </ul>
</div>