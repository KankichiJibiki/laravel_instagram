@extends('layouts.app')
@section('title', 'Post')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light col-12 d-flex p-4 flex-wrap justify-content-between">
            {{-- category --}}
            @include('users.admin.components.category')

            {{-- table --}}
            <div class="col-lg-8 col-12 mb-3">

                <table class="table table-striped table-hover">
                    <thead class="text-uppercase bg-success text-light">
                        <tr>
                            <th>Image</th>
                            <th>User</th>
                            <th>created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="col-3">
                                    <img src="{{asset('storage/images/' . $post->image)}}" alt="" class="w-25">
                                </td>
                                <td class="col-2">{{ $post->user->username }}</td>
                                <td class="col-5">{{ $post->created_at }}</td>
                                <td>
                                    @if ($post->deleted_at == null)
                                        <form action="{{ route('hideBlock', $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Hide</button>
                                        </form>
                                    @else
                                        <form action="{{ route('unhide', $post->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="btn btn-success">Unhide</button>
                                        </form>         
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
    <script>
        categoryColor(1);
    </script>
@endsection