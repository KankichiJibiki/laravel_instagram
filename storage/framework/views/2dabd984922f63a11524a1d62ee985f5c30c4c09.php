
<?php $__env->startSection('title', 'Following'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center my-4">
        <div class="d-flex flex-column justify-content-center align-items-center bg-light col-9">
            
            <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                <?php echo $__env->make('users.post.components.following.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            
            <div class="col-11 col-md-9 d-flex flex-column justify-content-center">
                <h6 class="mb-2">Suggested for you</h6>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('users.post.components.following.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/follow/show.blade.php ENDPATH**/ ?>