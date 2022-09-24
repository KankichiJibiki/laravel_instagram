{{-- action column --}}
<div class="col-12 d-flex flex-row justify-content-between">
    <div class="col-5 d-flex flex-row ">
        @php
            $likes_arr = [];
            $hashMap = [];
            foreach(Auth::user()->likes as $like):
                $likes_arr[] = $like->post_id;
                $hashMap[$like->post_id] = $like->id;
            endforeach;
        @endphp
        {{-- {{Auth::user()->likes}} --}}
        @if (in_array($post->id, $likes_arr))
            {{-- unlike --}}
            <form action="{{route('likes.destroy', $hashMap[$post->id])}}" method="post">
                @csrf
                @method("DELETE")

                <input type="text" hidden value="{{$post->id}}" name="post_id">
                <input type="text" hidden value="{{Auth::id()}}" name="user_id">
                <button type="submit" class="action_icon p-0 bg-light border-0 me-1">
                    <i class="fa-solid fa-heart btn-opt"></i>
                </button>
            </form>
        @else
            {{-- like --}}
            <form action="{{route('likes.store')}}" method="post">
                @csrf
                <input type="text" hidden value="{{$post->id}}" name="post_id">
                <input type="text" hidden value="{{Auth::id()}}" name="user_id">
                <button type="submit" class="action_icon p-0 bg-light border-0 me-1">
                    <i class="like_icon fa-regular fa-heart btn-opt"></i>
                </button>
            </form>
        @endif
        
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

{{-- amountoflike --}}
<div>
    @if($post->likes->count() > 1)
        {{$post->likes->count()}} likes
    @else
        {{$post->likes->count()}} like
    @endif
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