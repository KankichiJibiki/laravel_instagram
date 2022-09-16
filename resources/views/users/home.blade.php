@extends('layouts.app')

@section('title', 'Instagram')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card my-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            @if ($posts->isNotEmpty())
                <div class="d-flex flex-column align-items-center my-3">
                       
                    @foreach ($posts as $post)
                            <a href="{{route('post.show', $post->id)}}" class="text-dark text-decoration-none">
                                <div class="col-md-10 col-11 p-2 bg-light mb-1">
                                    {{-- username&avatar --}}
                                    <div class="col-12 d-flex flex-row justify-content-between mb-1">
                                        {{-- username&avatar --}}
                                        <div class="col-md-3 col-2 d-flex flex-row">
                                            <div class="float-start me-1">
                                                {{-- <img src="{{$post->}}" alt=""> --}}
                                                <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
                                            </div>
                                            <div class="float-start pt-2 text-start">{{$post->user->username}}</div>
                                        </div>
                                        {{-- more --}}
                                        <div class="col-3 text-end pt-1">
                                            <i class="fa-solid fa-ellipsis m-0 p-0"></i>
                                        </div>
                                    </div>

                                    {{-- photo --}}
                                    <div class="col-12 mb-1">
                                        <img src="{{asset('storage/images/' . $post->image)}}" alt="Not found" class="img-cover imgFit img-responsive col-12">
                                    </div>

                                    {{-- action column --}}
                                    <div class="col-12 d-flex flex-row justify-content-between">
                                        <div class="col-5">
                                            <i class="fa-regular fa-heart btn-opt"></i>
                                            <i class="fa-regular fa-comment btn-opt"></i>
                                        </div>
                                        <div class="col text-end">
                                            <i class="fa-regular fa-star btn-opt"></i>
                                            {{-- <div>{{$post->post_categories->categories}}</div> --}}
                                        </div>
                                    </div>

                                    {{-- post content --}}
                                    <div class="col-12 ">
                                        <div><strong>{{$post->user->username}}</strong> {{$post->description}}</div>
                                    </div>
                                </a>

                                {{-- view comment --}}
                                <div class="col-12 text-start">
                                    <a href="" class="text-decoration-none text-muted muted_text">View all comments</a>
                                </div>


                                {{-- post created at --}}
                                <div class="col-12 text-start text-muted muted_text">
                                    <p>{{$post->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
