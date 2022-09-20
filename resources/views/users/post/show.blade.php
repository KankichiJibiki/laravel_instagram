@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light p-2 col-md-9 col-11 my-2 shadow-lg">
            <div class="d-flex flex-wrap justify-content-around">
                <div class="col-11 col-md-7 p-0">
                    <img src="{{asset('/storage/images/' . $post->image)}}" alt="" class="w-100 img-thumbnail">
                </div>
                <div class="col-11 col-md-4">
                    <div class="mb-4">
                        @include('users.post.components.header')
                    </div>
                    <div>
                        @include('users.post.components.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection