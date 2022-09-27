@extends('layouts.app')

@section('title', 'Instagram')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($posts->isNotEmpty() && Auth::user()->followers->count() != 0)
                <div class="d-flex flex-column align-items-center my-3">
                    @php
                        $followers_arr = [];
                        foreach(Auth::user()->followers as $follower) {
                            $followers_arr[] = $follower->following_id;
                        }
                    @endphp
                       
                    @foreach ($posts as $post)
                        @if (in_array($post->user->id, $followers_arr) || $post->user->id == Auth::id())
                            <div class="col-md-10 col-11 p-2 bg-light mb-1">
                                @include('users.post.components.header')

                                @include('users.post.components.body')
                                
                                @include('users.post.components.footer')
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- //following suggestion --}}
                <div class="col-3 fixedCon p-2">
                    @include('users.post.components.following.reccomedation')
                    <div class="text-muted">
                        <a href="{{route('follower.show', Auth::id())}}" class="muted_text text-decoration-none">View All suggestion</a>
                    </div>
                </div>
            @else
                <div class="d-flex flex-column align-items-center my-3">
                    <div class="col-md-10 col-11 p-2 bg-light mb-1">
                        <div class="my-5 mx-auto text-center">
                            <a href="{{route('post.create')}}" class="nav-link">
                                <h5 class="bg-success text-light p-3">Let's do your first post here!!</h5>
                                <i class="fa-solid fa-circle-plus icon-sm text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- //following suggestion --}}
                <div class="col-3 fixedCon p-2">
                    @include('users.post.components.following.reccomedation')
                    <div class="text-muted">
                        <a href="{{route('follower.show', Auth::id())}}" class="muted_text text-decoration-none">View All suggestion</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
