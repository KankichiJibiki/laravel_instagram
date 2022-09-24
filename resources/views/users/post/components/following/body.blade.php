<form action="{{route('follower.store')}}" method="post">
    @csrf
    @php
        $followers_arr = [];
        foreach(Auth::user()->followers as $follower) {
            $followers_arr[] = $follower->following_id;
        }
    @endphp
    
    @if ($user->id != Auth::id() && !in_array($user->id, $followers_arr, true))
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
                    <input type="number" name="following_id" value="{{$user->id}}" hidden>
                </div>
            </div>
            {{-- btn --}}
            <div class="col-4 col-md-5 text-center">
                <button type="submit" class="btn btn-success btn-sm">&plus;</button>
                <p class="text-muted text-sm">Follow</p>
            </div>
        </div>
    @endif
</form>