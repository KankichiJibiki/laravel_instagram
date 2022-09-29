
<div class="col-12 d-flex flex-row justify-content-between mb-1">
    
    <div class="col-md-3 col-2 d-flex flex-row">
        <?php if($post->user->avatar): ?>
            <div class="float-start me-1">
                <img src="<?php echo e(asset('/storage/images/' . $post->user->avatar)); ?>" alt="" class="avatar_icon_sm rounded-circle">
            </div>
        <?php else: ?>
            <div class="float-start me-1">
                <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
            </div>
        <?php endif; ?>
        <div class="float-start pt-2 text-start"><?php echo e($post->user->username); ?></div>
    </div>
    
    <div class="col-3 text-end pt-1">
        <div class="dropdown">
            <a href="" class="text-decoration-none text-dark" role="button" data-bs-toggle="dropdown" id="dropdownMore">
                <i class="fa-solid fa-ellipsis m-0 p-0"></i>
            </a>

            
            <ul class="dropdown-menu" aria-labelledby="dropdownMore">
                    <?php if($post->user->id == Auth::id()): ?>
                        <div class="dropdown-item">
                            <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="text-decoration-none text-dark">Edit</a>
                        </div>
                        <div class="dropdown-item">
                            <!-- Modal trigger button -->
                            <button type="button" class="p-0 border-0 bg-light text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-<?php echo e($post->id); ?>">
                                Delete
                            </button>
                            
                        </div>
                    <?php else: ?>
                        <div class="dropdown-item">
                            <form action="<?php echo e(route('follower.destroy', $hashMap[$post->user->id])); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>

                                <button type="submit" class="text-danger border-0 p-0 bg-light">Unfollow</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </ul>
        </div>
    </div>
</div>
<?php echo $__env->make('users.post.components.modal.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/header.blade.php ENDPATH**/ ?>