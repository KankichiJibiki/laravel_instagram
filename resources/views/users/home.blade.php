@extends('layouts.app')

@section('title', 'Instagram')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($posts->isNotEmpty())
                <div class="d-flex flex-column align-items-center my-3">
                       
                    @foreach ($posts as $post)
                        <div class="col-md-10 col-11 p-2 bg-light mb-1">
                            @include('users.post.components.header')

                            @include('users.post.components.body')
                            
                            @include('users.post.components.footer')
                        </div>
                    @endforeach
                </div>
            @else
                <div class="d-flex flex-column align-items-center my-3">
                    <div class="col-md-10 col-11 p-2 bg-light mb-1">
                        <h5 class="text-center">Let's follow</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
