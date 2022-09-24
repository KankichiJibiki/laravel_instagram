<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="following" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="following" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Following</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach (Auth::user()->followers as $follower)
                    @php
                        $following_id = $follower->following_id;
                        $user = $users->find($following_id);
                    @endphp
                    <div class="col-12 d-flex flex-row justify-content-between align-items-center">
                        <div class="col-5 col-md-7 d-flex flex-row justify-content-start">
                            {{-- image --}}
                            <div class="col-1 col-md-2 me-4 me-md-3">
                                @if ($user->avatar)
                                    <img src="{{asset('/storage/images/' . $user->avatar)}}" alt="" class="rounded-circle avatar_icon_sm">
                                @else
                                {{-- rounded-circle avatar_icon_sm --}}
                                    <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
                                @endif
                            </div>
                            {{-- name --}}
                            <div class="col-3 col-md-4 text-start">
                                <h6>{{$user->username}}</h6>
                                <p class="text-muted text-sm">{{$user->first_name . " " . $user->last_name}}</p>
                            </div>
                        </div>
                        {{-- btn --}}
                        <div class="col-4 col-md-5 text-center">
                            <form action="{{route('follower.destroy', $follower->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="border-0 p-0 badge bg-light text-danger mb-2 btn-sm">
                                    Unfollow
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>    
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>