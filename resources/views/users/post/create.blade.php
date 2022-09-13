@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="container d-flex justify-content-center align-items-center border">
        {{-- main conteiner --}}
        <form action="/post" method="post" enctype="multipart/form-data" class="col-lg-8 col-md-11 col-12 d-flex flex-wrap justify-content-between p-2">
            {{-- left top container --}}
            <div class="col-md-6 col-12">
                {{-- checkbox --}}
                <div class="mb-3">
                    <div class="row">
                        <h5 class="col fw-bold">Category</h5>
                        <span class="col text-muted">(Up to 3)</span>
                    </div>
                    <div class="form-check-inline d-flex flex-wrap">
                        @foreach ($categories as $category)
                            <div class="col-md-5 col-4">
                                <input type="checkbox" name="categories[]" id="" value="{{$category->id}}" class="form-check-input">
                                <label for="categories[]" class="form-check-label">{{$category->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- description --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold fs-5">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            {{-- right bottom container --}}
            <div class="col-md-5 col-12">
                {{-- post image --}}
                <div class="mb-4">
                    <label for="image" class="form-label fw-bold fs-5">Post Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                {{-- post btn --}}
                <div class="mb-3">
                    <button type="submit" class="col-12 btn btn-success">Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection