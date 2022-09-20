{{-- action column --}}
<div class="col-12 d-flex flex-row justify-content-between">
    <div class="col-5">
        <button type="submit" class="action_icon p-0 bg-light border-0">
            <i class="fa-regular fa-heart btn-opt"></i>
        </button>
        
        <!-- Modal trigger button -->
        <button type="button" class="action_icon p-0 bg-light border-0" data-bs-toggle="modal" data-bs-target="#view_comment_{{$post->id}}">
            <i class="fa-regular fa-comment btn-opt"></i>
        </button>
        @extends('users.post.components.modal.viewComment')
    </div>
    <div class="col text-end">
        <button type="submit" class="action_icon p-0 bg-light border-0">
            <i class="fa-regular fa-star btn-opt"></i>
        </button>
    </div>
</div>

{{-- post category --}}
@foreach($post->post_categories as $post_category)
    <div class="badge bg-secondary">
        {{$post_category->category->name}}
    </div>
@endforeach

{{-- post content --}}
<div class="col-12 ">
    <div><strong>{{$post->user->username}}</strong> {{$post->description}}</div>
</div>

{{-- view comment --}}
<div class="col-12 text-start">
    <form action="{{route('comments.store')}}" method="post">
        @csrf
        @if ($post->comments->isEmpty())
            <button type="button" class="bg-light border-0 p-0 text-muted muted_text" id="addComment_{{$post->id}}" onclick="displayCommentInput({{$post->id}});">Add a comment</button>
            <div class="d-none col-12 d-flex p-1 justify-content-around" id="commentInput_{{$post->id}}">
                <div class="col-1">
                    <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
                </div>
                <div class="col-9 col-lg-10">
                    <div class="input-group">
                        <input type="text" name="content" id="content" placeholder="Add a comment as {{Auth::user()->username}}" class="form-control border-radius-5">
                        {{-- //hidden post_id --}}
                        <input type="text" name="post_id" id="post_id" hidden value="{{$post->id}}">
                        <button type="submit" class="input-group-item btn btn-outline-primary">Post</button>
                    </div>
                </div>
            </div>
        @else
            <!-- Modal trigger button -->
            <button type="button" class="action_icon p-0 bg-light border-0 text-muted muted_text" data-bs-toggle="modal" data-bs-target="#view_comment_{{$post->id}}" id="viewComment_btn">
                View all {{count($post->comments)}} comments
            </button>
            @extends('users.post.components.modal.viewComment')
        @endif
    </form>
</div>


{{-- post created at --}}
<div class="col-12 text-start text-muted muted_text">
    <p>{{$post->created_at->diffForHumans()}}</p>
</div>