@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h1>{{ $snippet->title }}</h1>

        <a href="/snippets/{{$snippet->id}}/fork">Fork it</a>
    </div>

    <pre><code>{{ $snippet->body }}</code></pre>

    <p>
        <a href="/">Back</a>
    </p>

    @if ($snippet->isAFork())
        <hr>

        <h3>
            Forked From
            <a href="/snippets/{{ $snippet->originalSnippet->id }}">
                {{ $snippet->originalSnippet->title }}
            </a>
        </h3>
    @endif

    @if ($snippet->forks()->count())
        <hr>

        <h3>Forks</h3>
        <ul>
            @foreach($snippet->forks as $fork)
                <li>
                    <a href="/snippets/{{ $fork->id }}">
                        {{ $fork->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
