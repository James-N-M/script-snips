@extends('layouts.app')

@section('content')
    <div class="row">
        @include('partials/languages')

        <div class="col-md-10">
                <div class="text-center shadow mb-4 pt-1 pb-1">
                    @if (isset($language))
                        <div class="d-flex align-items-center justify-content-center">
                            <h2 class="mr-3" style="font-size: 52px;">{{$language->name}} snips</h2>
                            <form action="/languages/{{$language->name}}/favorites" method="post">
                                @csrf
                                <button class="btn btn-primary" type="submit">
                                    Follow
                                </button>
                            </form>
                        </div>
                    @else
                        <h2 style="font-size: 52px;">snips</h2>
                    @endif
                </div>


            @foreach ($snippets as $snippet)
                <div class="card mb-4">

                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h3>
                                <a href="/snippets/{{$snippet->id}}">{{$snippet->title}}</a>
                            </h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="font-size: 19px" class="mr-2">
                                <i class="fab fa-php font-weight-bold"></i>
                            </div>
                            <div class="mr-2">
                                <i class="fas fa-comments"></i>
                                <span>{{$snippet->comments()->count()}}</span>
                            </div>
                            <div class="mr-2">
                                <i class="fas fa-code-branch"></i>
                                <span>{{$snippet->forks()->count()}}</span>
                            </div>
                        </div>
                    </div>

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
