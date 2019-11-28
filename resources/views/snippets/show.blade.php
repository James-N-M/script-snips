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

    <div class="mb-5">
        <h3>Add a comment</h3>
        <form action="/snippets/{{$snippet->id}}/comments" method="post">
            <?php echo (csrf_field()); ?>
                <input type="hidden" name="snippet_id" value="{{$snippet->id}}">
            <div class="form-group">
                <label for="body">Body</label>
                <textarea rows="4" name="body" type="text" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add comment</button>
        </form>
    </div>

    <hr />

    <div class="col-md-10">
        @if ($snippet->comments)
        @foreach ($snippet->comments as $comment)
            <div class="card mb-4">
                <div class="card-body">
                    {{$comment->body}}
                    <br>
                    - {{$comment->creator->name}}
                </div>
                <div class="card-footer text-muted">
                    <form action="/comments/{{$comment->id}}/like" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        @endif
    </div>
@endsection
