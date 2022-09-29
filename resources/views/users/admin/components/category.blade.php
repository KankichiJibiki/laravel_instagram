{{-- category --}}
<div class="col-md-3 col-12 my-3">
    <ul class="list-group" id="categoryGroup">
        <li class="p-1 list-group-item">
            <a href="{{ route('admin.adminPage', Auth::id()) }}" class="text-decoration-none text-dark"><i class="fa-solid fa-users p-1"></i>Users</a>
        </li>
        <li class="p-1 list-group-item">
            <a href="{{route('admin.showPostAdmin')}}" class="text-decoration-none text-dark"><i class="fa-solid fa-signs-post p-1"></i>Posts</a>
        </li>
        <li class="p-1 list-group-item">
            <a href="{{ route('admin.showCategoryAdmin') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-clipboard p-1"></i>Categories</a>
        </li>
    </ul>
</div>