@extends('layouts.app')
@section('title', 'Category')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light col-12 d-flex p-4 flex-wrap justify-content-between">
            {{-- category --}}
            @include('users.admin.components.category')

            <div class="col-lg-8 col-12 mb-3">
                {{-- table --}}
                <table class="table table-striped table-hover">
                    <thead class="text-uppercase bg-success text-light">
                        <tr>
                            <th>Category</th>
                            <th>
                                <!-- Add Modal trigger button -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category">
                                  + Add a Category
                                </button>
                                @include('users.admin.components.modal/createCategory')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="col-7">
                                    <div>{{ $category->name }}</div>
                                </td>
                                <td>
                                    @if($category->deleted_at == null)
                                        <form action="{{ route('admin.hide_category', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Hide</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.unhide_category', $category->id) }}" method="post">
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
                {{ $categories->links() }}
            </div>

        </div>
    </div>
    
@endsection