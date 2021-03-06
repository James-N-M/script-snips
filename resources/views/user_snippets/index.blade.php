@extends('layouts.app')

@section('content')
    <h2>{{auth()->user()->name}} Snippets</h2>
    <a href="/">Back</a>
    @foreach ($snippets as $snippet)
        <div class="card mb-4">
            <h3 class="card-header text-primary">
                <a href="/snippets/{{$snippet->id}}">{{$snippet->title}}</a>
            </h3>
            <div class="card-body">
                <!-- Has to be in this format or will break -->
                <pre class="p-2"><code>{{$snippet->body}}</code></pre>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    @endforeach
@endsection
