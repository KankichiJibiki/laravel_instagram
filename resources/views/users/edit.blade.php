@extends('layouts.app')
@section('title', 'Edit My profile')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-8 col-lg-7 col-12 p-2 bg-light my-4">
            <div class="col-12">
                <form action="{{route('users.update', Auth::id())}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- icon --}}
                    <div class="d-flex justify-content-center">
                        <div class="col-4 p-2 text-center">
                            @if (Auth::user()->avatar)
                                <img src="{{asset('storage/images/' . Auth::user()->avatar)}}" alt="" class="avatar_icon_bigger rounded-circle">
                            @else
                                <i class="profile_icon_default rounded-circle p-0 m-0 fa-solid fa-circle-user icon-sm"></i>
                            @endif
                            <input type="file" name="avatar" id="avatar" class="border-0 text-primary">
                        </div>
                    </div>
                    <hr>
                    {{-- input --}}
                    <div class="d-flex flex-column p-2">
                        {{-- firstname --}}
                        <div class="input-group col-12 mb-1">
                            <label for="first_name" class="form-label input-group-text col-3 fw-bolder m-0">First name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control col" value="{{Auth::user()->first_name}}">
                        </div>
                        {{-- lastname --}}
                        <div class="input-group col-12 mb-1">
                            <label for="last_name" class="form-label input-group-text col-3 fw-bolder m-0">Last name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control col" value="{{Auth::user()->last_name}}">
                        </div>
                        {{-- username --}}
                        <div class="input-group col-12 mb-1">
                            <label for="username" class="form-label input-group-text col-3 fw-bolder m-0">Username</label>
                            <input type="text" name="username" id="username" class="form-control col" value="{{Auth::user()->username}}">
                        </div>
                        {{-- email --}}
                        <div class="input-group col-12 mb-1">
                            <label for="email" class="form-label input-group-text col-3 fw-bolder m-0">Email</label>
                            <input type="text" name="email" id="email" class="form-control col" value="{{Auth::user()->email}}">
                        </div>
                        {{-- intro --}}
                        <div class="input-group col-12 mb-1">
                            <label for="intro" class="form-label input-group-text col-3 fw-bolder m-0">Introduction</label>
                            <textarea name="intro" id="intro" cols="30" rows="10" class="form-control">{{Auth::user()->intro}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection