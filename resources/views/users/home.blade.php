@extends('layouts.app')

@section('title', 'Instagram')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            @if ($posts->isNotEmpty())
                <div class="d-flex flex-column align-items-center mb-3">

                    @foreach ($posts as $post)
                    <div class="col-md-10 col-11 p-2 bg-light">
                        {{-- username&avatar --}}
                        <div class="col-12 d-flex flex-row justify-content-between mb-1">
                            {{-- username&avatar --}}
                            <div class="col-7">
                                <div class="">
                                    {{-- <img src="{{$post->}}" alt=""> --}}
                                    <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
                                </div>
                                <div>{{$post->users}}</div>
                            </div>
                            {{-- more --}}
                            <div class="col-3 text-end">
                                <i class="fa-solid fa-ellipsis m-0 p-0"></i>
                            </div>
                        </div>

                        {{-- photo --}}
                        <div class="col-12">
                            <img src="{{asset('storage/images/' . $post->image)}}" alt="Not found" class="img-cover imgFit img-responsive col-12">
                        </div>

                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
