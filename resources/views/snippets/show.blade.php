@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-primary" href="/snippets/{{$snippet->id}}/fork">Fork it</a>
    </div>

    @include('partials/snippet-card')

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

    <div class="mb-5 mt-5">
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
        @foreach ($snippet->comments as $comment)
            @include('partials/comment-card')
        @endforeach
    </div>
@endsection
