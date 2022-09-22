<div>
    {{-- post view --}}
    @include('users.post.components.comment.postview')
    <hr>
    {{-- input comment --}}
    @include('users.post.components.comment.input')
    <hr>
    {{-- view commment --}}
    @if ($post->comments->isEmpty())
        <p class="text-center text-muted">No comment on this post</p>
    @else
        <div class="overflow-y" style="height:200px;">
            @foreach ($post->comments as $comment)
                @include('users.post.components.comment.commentview')
            @endforeach
        </div>
    @endif
</div>