{{-- username&avatar --}}
<div class="col-12 d-flex flex-row justify-content-between mb-1">
    {{-- username&avatar --}}
    <div class="col-md-3 col-2 d-flex flex-row">
        @if ($post->user->avatar)
            <div class="float-start me-1">
                <img src="{{asset('/storage/images/' . $post->user->avatar)}}" alt="" class="avatar_icon_sm rounded-circle">
            </div>
        @else
            <div class="float-start me-1">
                <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
            </div>
        @endif
        <div class="float-start pt-2 text-start">{{$post->user->username}}</div>
    </div>
    {{-- more --}}
    <div class="col-3 text-end pt-1">
        <div class="dropdown">
            <a href="" class="text-decoration-none text-dark" role="button" data-bs-toggle="dropdown" id="dropdownMore">
                <i class="fa-solid fa-ellipsis m-0 p-0"></i>
            </a>

            {{-- edit&delete --}}
            <ul class="dropdown-menu" aria-labelledby="dropdownMore">
                    @if ($post->user->id == Auth::id())
                        <div class="dropdown-item">
                            <a href="{{route('post.edit', $post->id)}}" class="text-decoration-none text-dark">Edit</a>
                        </div>
                        <div class="dropdown-item">
                            <!-- Modal trigger button -->
                            <button type="button" class="p-0 border-0 bg-light text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{$post->id}}">
                                Delete
                            </button>
                            @extends('users.post.components.modal.delete')
                        </div>
                    @else
                        <div class="dropdown-item">
                            <form action="{{ route('follower.destroy', $hashMap[$post->user->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="text-danger border-0 p-0 bg-light">Unfollow</button>
                            </form>
                        </div>
                    @endif
                </ul>
        </div>
    </div>
</div>