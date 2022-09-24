<div>
    <div class="col-md-3 col-2 d-flex flex-row mb-3">
        <div class="float-start me-1">
            <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
        </div>
        <div class="float-start pt-2 text-start"><?php echo e($post->user->username); ?></div>
    </div>
    <div class="col-12 text-center">
        <p><?php echo e($post->description); ?></p>
    </div>
    <div class="mb-3 col-5">
        <p class="text-muted"><?php echo e($post->created_at->diffForHumans()); ?></p>
    </div>
    <hr>
    
    <div class="mb-3 d-flex flex-row justify-content-between">
        <form action="<?php echo e(route('comments.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="input-group col-md-7 col-12">
                <input type="text" name="content" id="content" class="form-control" placeholder="Add a comment as <?php echo e(Auth::user()->username); ?>">
                <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                <button type="submit" class="btn btn-success input-group-item">Post</button>
            </div>
        </form>
    </div>
    <hr>
    
    <?php if($post->comments->isEmpty()): ?>
        <p class="text-center text-muted">No comment on this post</p>
    <?php else: ?>
        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center overflow-y">
                <div class="col-2 p-0">
                    <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
                </div>
                <div class="col-9">
                    <div class="d-flex">
                        <p class="me-1"><strong><?php echo e($comment->user->username); ?></strong></p>
                        <p><?php echo e($comment->content); ?></p>
                    </div>
                    <div class="d-flex">
                        <p><?php echo e($comment->created_at->diffForHumans()); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/comment.blade.php ENDPATH**/ ?>