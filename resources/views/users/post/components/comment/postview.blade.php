<div class="col-md-3 col-2 d-flex flex-row mb-3">
    <div class="float-start me-1">
        <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
    </div>
    <div class="float-start pt-2 text-start">{{$post->user->username}}</div>
</div>
<div class="col-12 text-center">
    <p>{{$post->description}}</p>
</div>
<div class="mb-3 col-5">
    <p class="text-muted">{{$post->created_at->diffForHumans()}}</p>
</div>