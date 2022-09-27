@extends('layouts.app')
@section('title', 'Admin Page')

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
                            <th>name</th>
                            <th>email</th>
                            <th>created at</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if (is_null($user->deleted_at))
                                    
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    @if (is_null($user->deleted_at) && $user->id != Auth::id())
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        
                                            <button type="submit" class="btn btn-danger">Deactivate</button>
                                        </form>
                                    @elseif(!is_null($user->deleted_at) && $user->id != Auth::id())
                                        <form action="{{ route('activate', $user->id) }}" method="post">
                                        @csrf
                                        @method("PATCH")

                                            <button type="submit" class="btn btn-success">Activate</button>
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
        categoryColor(0);
    </script>
@endsection