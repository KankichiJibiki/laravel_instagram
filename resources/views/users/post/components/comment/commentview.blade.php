<div class="d-flex justify-content-center">
    <div class="col-2 p-0">
        @if ($comment->user->avatar)
            <div class="float-start me-1">
                <img src="{{asset('/storage/images/' . $comment->user->avatar)}}" alt="" class="avatar_icon_sm rounded-circle">
            </div>
        @else
            <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
        @endif
    </div>
    <div class="col-9">
        @if ($comment->user->id == Auth::id())
            <div class="d-flex">
                <p class="me-1"><strong>{{$comment->user->username}}</strong></p>
                <p>{{$comment->content}}</p>
            </div>
            <div class="d-flex justify-content-between col-6 col-md-10">
                <p>{{$comment->created_at->diffForHumans()}}</p>
                <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-0 p-0 badge bg-light text-danger mb-2 btn-sm" onsubmit="return confirmPop();">
                        delete
                    </button>
                </form>
            </div>
        @else
            <div class="d-flex">
                <p class="me-1"><strong>{{$comment->user->username}}</strong></p>
                <p>{{$comment->content}}</p>
            </div>
            <div class="d-flex">
                <p>{{$comment->created_at->diffForHumans()}}</p>
            </div>
        @endif
    </div>
</div>