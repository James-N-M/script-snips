@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul>
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

        <div class="col-md-10">
            @if (isset($language))
                <h2>{{ $language->name }} Snippets</h2>
            @else
                <h2>Snippets</h2>
            @endif
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
                        <form action="/snippets/{{$snippet->id}}/like" method="post">
                            @csrf
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-thumbs-up"></i>
                                <span>{{$snippet->likesCount}}</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            {{ $snippets->links() }}
        </div>
    </div>
@endsection
