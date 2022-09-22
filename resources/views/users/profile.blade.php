@extends('layouts.app')

@section('title', 'My profile')

@section('content')
    <div class="d-flex justify-content-center align-item-center">
        <div class="col-md-10 col-lg-9 col-12 bg-light my-4">
            {{-- icon&postetc --}}
            <div class="col-12 d-flex flex-row justify-content-around p-2">
                <div class="col-3 row">
                    @if (Auth::user()->avatar !== null)
                        <div class="col text-center">
                            <img src="{{asset('/storage/images/' . Auth::user()->avatar)}}" alt="{{Auth::user()->avatar}}" class="avatar_icon rounded-circle">
                            <div class="fw-bold">{{Auth::user()->username}}</div>
                        </div>
                    @else
                        <div class="col text-center">
                            <i class="profile_icon_default p-0 m-0 fa-solid fa-circle-user"></i>
                            <div class="fw-bold">{{Auth::user()->username}}</div>
                        </div>
                    @endif
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <h5>{{count($posts)}}</h5>
                        <p>Posts</p>
                    </div>
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <h5>385</h5>
                        <p>Followers</p>
                    </div>
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <h5>550</h5>
                        <p>Following</p>
                    </div>
                </div>
            </div>
            {{-- intro --}}
            <div class="col-12 p-2 d-flex justify-content-center">
                <p class="col-10 fw-bolder">{{Auth::user()->intro}}</p>
            </div>
            {{-- options edit and following --}}
            <div class="col-12 d-flex flex-row justify-content-center p-2">
                <div class="col-9">
                    <a href="{{route('users.edit', Auth::id())}}" class="btn btn-outline-secondary text-decoration-none col-10">Edit Profile</a>
                </div>
                <div class="col-2 col-md-1">
                    <a href="" class="btn btn-outline-secondary text-decoration-none col-10">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                </div>
            </div>
            {{-- postimage --}}
            <div class="col-12 d-flex justify-content-center">
                <div class="col-10 p-2 d-flex flex-wrap">
                    @foreach ($posts as $post)
                        <a href="{{route('post.show', $post)}}" class="col-4">
                            <img src="{{asset('storage/images/' . $post->image)}}" alt="" class="w-100 img-responsive border border-secondary" height="180px">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection