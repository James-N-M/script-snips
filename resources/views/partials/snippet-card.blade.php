<div class="card mb-4">

    <div class="card-header d-flex justify-content-between">
        <div>
            <h3>
                <a href="/snippets/{{$snippet->id}}">{{$snippet->title}}</a>
            </h3>
        </div>
        <div class="d-flex align-items-center">
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

        <pre class="p-2"><code>/** Language {{ $snippet->language['name'] }} <br />    Author: {{ $snippet->creator->name }} */</code></pre>
        <pre class="p-2"><code>{{$snippet->body}}</code></pre>
    </div>

    <div class="card-footer text-muted d-flex align-items-center justify-content-between">
        <div>
            <form action="/snippets/{{$snippet->id}}/like" method="post">
                @csrf
                <button class="btn btn-primary" type="submit">
                    @if ($snippet->isLiked())
                        <i style="color: lightgreen;"class="fas fa-thumbs-up"></i>
                    @else
                        <i class="fas fa-thumbs-up"></i>
                    @endif

                    <span>{{$snippet->likesCount}}</span>
                </button>
            </form>
        </div>
        <div class="d-flex align-items-center">
            <div><a href="/users/{{$snippet->creator->id}}/profile">{{$snippet->creator->name}} &#183; {{ \Carbon\Carbon::parse($snippet->created_at)->format('M d Y')}} &#183 {{$snippet->created_at->diffForHumans()}}</a></div>
        </div>
    </div>
</div>