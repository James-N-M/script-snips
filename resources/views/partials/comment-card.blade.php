<div class="card mb-4">
    <div class="card-body">
        {{$comment->body}}
    </div>
    <div class="card-footer text-muted d-flex align-items-center justify-content-between">
        <div>
            <form action="/comments/{{$comment->id}}/like" method="post">
                @csrf
                <button class="btn btn-primary" type="submit">
                    @if ($comment->isLiked())
                        <i style="color: lightgreen;"class="fas fa-thumbs-up"></i>
                    @else
                        <i class="fas fa-thumbs-up"></i>
                    @endif

                    <span>{{$comment->likesCount}}</span>
                </button>
            </form>
        </div>
        <div class="d-flex align-items-center">
            <div><a href="/users/{{$comment->creator->id}}/profile">{{$comment->creator->name}} &#183; {{ \Carbon\Carbon::parse($comment->created_at)->format('M d Y')}} &#183  {{$comment->created_at->diffForHumans()}}</a></div>
        </div>
    </div>
</div>