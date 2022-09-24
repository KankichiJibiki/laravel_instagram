<div class="d-flex justify-content-center flex-column bg-light p-4">
    {{-- header --}}
    <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
        @include('users.post.components.following.header')
    </div>
    <hr>
    {{-- users  --}}
    <div class="col-12 d-flex flex-column justify-content-center">
        <h6 class="mb-2">Suggested for you</h6>
        @foreach ($users->take(4) as $user)
            @include('users.post.components.following.body')
        @endforeach
    </div>
</div>