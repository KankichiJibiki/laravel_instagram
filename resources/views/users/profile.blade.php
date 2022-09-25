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
                            <i class="rounded-circle profile_icon_default p-0 m-0 fa-solid fa-circle-user"></i>
                            <div class="fw-bold">{{Auth::user()->username}}</div>
                        </div>
                    @endif
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <div class="fs-5">{{count($posts)}}</div>
                        <p>Posts</p>
                    </div>
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <button type="button" class="fs-5 border-0 bg-light" data-bs-toggle="modal" data-bs-target="#follower">
                          {{$followers->where('following_id', Auth::id())->count()}}
                        </button>
                        @include('users.post.components.modal.follower')
                        <p>Followers</p>
                    </div>
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <button type="button" class="fs-5 border-0 bg-light" data-bs-toggle="modal" data-bs-target="#following">
                          {{Auth::user()->followers->count()}}
                        </button>
                        @include('users.post.components.modal.following')
                        <p>Following</p>
                    </div>
                </div>
            </div>
            {{-- intro --}}
            <div class="col-12 p-2 d-flex justify-content-center">
                @if (Auth::user()->intro)
                    <p class="col-10 fw-bolder">{{Auth::user()->intro}}</p>
                @else
                    <p class="col-10 fw-bolder" id="introCon"></p>
                @endif
            </div>
            {{-- options edit and following --}}
            <div class="col-12 d-flex flex-row justify-content-center p-2">
                <div class="col-9">
                    <a href="{{route('users.edit', Auth::id())}}" class="btn btn-outline-secondary text-decoration-none col-10">Edit Profile</a>
                </div>
                <div class="col-2 col-md-1">
                    <a href="{{route('follower.show', Auth::id())}}" class="btn btn-outline-secondary text-decoration-none col-10">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                </div>
            </div>
            {{-- postimage --}}
            <div class="col-12 d-flex justify-content-center">
                <div class="col-10 p-2 d-flex flex-wrap">
                    @foreach ($posts as $post)
                        <a href="{{route('post.show', $post)}}" class="col-4 post_image">
                            <img src="{{asset('storage/images/' . $post->image)}}" alt="" class="w-100 img-responsive border border-secondary">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="introCon fixedCon">
            <h5 class="text-light">Test Vue.js</h5>
            <input type="text" v-model="Introduction" placeholder="enter your introduction">
        </div>
    </div>
@endsection