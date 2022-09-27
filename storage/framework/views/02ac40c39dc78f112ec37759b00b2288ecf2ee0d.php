
<div class="col-md-3 col-12 mb-3">
    <ul class="list-group" id="categoryGroup">
        <li class="p-1 list-group-item">
            <a href="<?php echo e(route('users.show', Auth::id())); ?>" class="text-decoration-none"><i class="fa-solid fa-users p-1"></i>Users</a>
        </li>
        <li class="p-1 list-group-item">
            <a href="<?php echo e(route('showPostAdmin')); ?>" class="text-decoration-none"><i class="fa-solid fa-signs-post p-1"></i>Posts</a>
        </li>
        <li class="p-1 list-group-item">
            <a href="<?php echo e(route('categories.create')); ?>" class="text-decoration-none"><i class="fa-solid fa-clipboard p-1"></i>Categories</a>
        </li>
    </ul>
</div><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/admin/components/category.blade.php ENDPATH**/ ?>