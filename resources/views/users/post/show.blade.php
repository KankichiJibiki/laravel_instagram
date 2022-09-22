@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light p-2 col-md-9 col-11 my-2 shadow-lg">
            <div class="d-flex flex-wrap justify-content-around">
                <div class="col-11 col-lg-7 p-0">
                    <img src="{{asset('/storage/images/' . $post->image)}}" alt="" class="w-100 img-thumbnail">
                </div>
                <div class="col-11 col-lg-4">
                    <div class="mb-4">
                        @include('users.post.components.header')
                    </div>
                    <div>
                        @include('users.post.components.footer')
                        @foreach ($post->comments->take(3) as $comment)
                            @include('users.post.components.comment.commentview')
                            @if ($loop->last)
                                <button type="button" class="action_icon p-0 bg-light border-0 text-muted muted_text" data-bs-toggle="modal" data-bs-target="#view_comment_{{$post->id}}" id="viewComment_btn">
                                    View all {{count($post->comments)}} comments
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection