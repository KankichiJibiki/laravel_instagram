<div>
    
    <?php echo $__env->make('users.post.components.comment.postview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <hr>
    
    <?php echo $__env->make('users.post.components.comment.input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <hr>
    
    <?php if($post->comments->isEmpty()): ?>
        <p class="text-center text-muted">No comment on this post</p>
    <?php else: ?>
        <div class="overflow-y" style="height:200px;">
            <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('users.post.components.comment.commentview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/comment/comment.blade.php ENDPATH**/ ?>