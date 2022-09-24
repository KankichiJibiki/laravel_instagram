<div class="d-flex justify-content-center flex-column bg-light p-4">
    
    <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
        <?php echo $__env->make('users.post.components.following.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <hr>
    
    <div class="col-12 d-flex flex-column justify-content-center">
        <h6 class="mb-2">Suggested for you</h6>
        <?php $__currentLoopData = $users->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('users.post.components.following.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/following/reccomedation.blade.php ENDPATH**/ ?>