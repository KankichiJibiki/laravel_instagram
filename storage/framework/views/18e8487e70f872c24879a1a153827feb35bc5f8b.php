<div class="d-flex justify-content-center">
    <div class="col-2 p-0">
        <?php if($comment->user->avatar): ?>
            <div class="float-start me-1">
                <img src="<?php echo e(asset('/storage/images/' . $comment->user->avatar)); ?>" alt="" class="avatar_icon_sm rounded-circle">
            </div>
        <?php else: ?>
            <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
        <?php endif; ?>
    </div>
    <div class="col-9">
        <?php if($comment->user->id == Auth::id()): ?>
            <div class="d-flex">
                <p class="me-1"><strong><?php echo e($comment->user->username); ?></strong></p>
                <p><?php echo e($comment->content); ?></p>
            </div>
            <div class="d-flex justify-content-between col-6 col-md-10">
                <p><?php echo e($comment->created_at->diffForHumans()); ?></p>
                <form action="<?php echo e(route('comments.destroy', $comment->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="border-0 p-0 badge bg-light text-danger mb-2 btn-sm" onsubmit="return confirmPop();">
                        delete
                    </button>
                </form>
            </div>
        <?php else: ?>
            <div class="d-flex">
                <p class="me-1"><strong><?php echo e($comment->user->username); ?></strong></p>
                <p><?php echo e($comment->content); ?></p>
            </div>
            <div class="d-flex">
                <p><?php echo e($comment->created_at->diffForHumans()); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/comment/commentview.blade.php ENDPATH**/ ?>