<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="view_comment_{{$post->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                <hr>
                {{-- input comment --}}
                <div class="mb-3 d-flex flex-row justify-content-between">
                    <form action="{{route('comments.store')}}" method="post">
                        @csrf
                        <div class="input-group col-md-7 col-12">
                            <input type="text" name="content" id="content" class="form-control" placeholder="Add a comment as {{Auth::user()->username}}">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-success input-group-item">Post</button>
                        </div>
                    </form>
                </div>
                <hr>
                {{-- view commment --}}
                @if ($post->comments->isEmpty())
                    <p class="text-center text-muted">No comment on this post</p>
                @else
                    @foreach ($post->comments as $comment)
                        <div class="d-flex justify-content-center">
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
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>