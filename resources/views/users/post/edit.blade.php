@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    {{-- <div class="text-light">{{$post}}</div> --}}
    <div class="container d-flex justify-content-center align-items-center bg-light p-2 my-2">
        <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data" class="col-12 col-md-10 col-lg-8 d-flex flex-wrap justify-content-between p-2">
            @csrf
            @method('PATCH')
            {{-- leftTop --}}
            <div class="order-2 col-12 col-md-5">
                {{-- checkBox --}}
                <div class="mb-3 text-dark">
                    <h5>Category</h5>
                    <div class="form-check-inline d-flex flex-wrap">
                        @php
                            $selected_categories = [];
                            foreach($post->post_categories as $post_category) $selected_categories[] = $post_category->category->id;
                        @endphp
                        @foreach ($categories as $category)
                            @if (in_array($category->id, $selected_categories, true))
                                <div class="col-4 col-md-5">
                                    <input type="checkbox" name="categories[]" value="{{$category->id}}" checked>
                                    <label for="categories[]" class="form-check-label">{{$category->name}}</label>
                                </div>
                            @else
                                <div class="col-4 col-md-5">
                                    <input type="checkbox" name="categories[]" id="" value="{{$category->id}}">
                                    <label for="categories[]" class="form-check-label">{{$category->name}}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{-- description --}}
                <div class="mb-3">
                    <h5>Description</h5>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                </div>

                {{-- btn --}}
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
            {{-- rightBottom --}}
            <div class="order-1 col-12 col-md-6">
                {{-- image --}}
                <div class="mb-3">
                    <img src="{{asset('storage/images/' . $post->image)}}" alt="" class="w-100 img-thumbnail">
                </div>

                {{-- imageInput --}}
                <div class="mb-3">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
        </form>
    </div>
@endsection