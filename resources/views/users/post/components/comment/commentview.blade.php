<div class="d-flex justify-content-center overflow-y">
    <div class="col-2 p-0">
        <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
    </div>
    <div class="col-9">
        <div class="d-flex">
            <p class="me-1"><strong>{{$comment->user->username}}</strong></p>
            <p>{{$comment->content}}</p>
        </div>
        <div class="d-flex">
            <p>{{$comment->created_at->diffForHumans()}}</p>
        </div>
    </div>
</div>