@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul>
                @foreach($languages as $language)
                    <a href="#">
                        <li>{{$language->name}}</li>
                    </a>
                @endforeach
            </ul>
        </div>

        <div class="col">
            @foreach ($snippets as $snippet)
                <div class="card mb-4">
                    <h3 class="card-header text-primary">
                        <a href="/snippets/{{$snippet->id}}">{{$snippet->title}}</a>
                    </h3>
                    <div class="card-body">
                        <!-- Has to be in this format or will break -->
                        <pre class="p-2"><code>{{$snippet->body}}</code></pre>
                        <a href="#" class="btn btn-primary">Call to Action</a>
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
        </div>
    </div>
@endsection
