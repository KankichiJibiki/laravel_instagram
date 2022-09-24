@extends('layouts.app')
@section('title', 'Following')

@section('content')
    <div class="d-flex justify-content-center my-4">
        <div class="d-flex flex-column justify-content-center align-items-center bg-light col-9">
            {{-- header --}}
            <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                @include('users.post.components.following.header')
            </div>
            {{-- users  --}}
            <div class="col-11 col-md-9 d-flex flex-column justify-content-center">
                <h6 class="mb-2">Suggested for you</h6>
                @foreach ($users as $user)
                    @include('users.post.components.following.body')
                @endforeach
            </div>
        </div>
    </div>
@endsection
