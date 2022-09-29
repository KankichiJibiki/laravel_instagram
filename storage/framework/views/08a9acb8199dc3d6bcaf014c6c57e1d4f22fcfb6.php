

<?php $__env->startSection('title', 'Instagram'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php if($posts->isNotEmpty() && Auth::user()->followers->count() != 0): ?>
                <div class="d-flex flex-column align-items-center my-3">
                    <?php
                        $followers_arr = [];
                        $hashMap = [];
                        foreach(Auth::user()->followers as $follower) {
                            $hashMap[$follower->following_id] = $follower->id;
                            $followers_arr[] = $follower->following_id;
                        }
                    ?>
                       
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($post->user->id, $followers_arr) || $post->user->id == Auth::id()): ?>
                            <div class="col-md-10 col-11 p-2 bg-light mb-1">
                                <?php echo $__env->make('users.post.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php echo $__env->make('users.post.components.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                                <?php echo $__env->make('users.post.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="col-3 fixedCon p-2">
                    <?php echo $__env->make('users.post.components.following.reccomedation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="text-muted">
                        <a href="<?php echo e(route('follower.show', Auth::id())); ?>" class="muted_text text-decoration-none">View All suggestion</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="d-flex flex-column align-items-center my-3">
                    <div class="col-md-10 col-11 p-2 bg-light mb-1">
                        <div class="my-5 mx-auto text-center">
                            <a href="<?php echo e(route('post.create')); ?>" class="nav-link">
                                <h5 class="bg-success text-light p-3">Let's do your first post here!!</h5>
                                <i class="fa-solid fa-circle-plus icon-sm text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-3 fixedCon p-2">
                    <?php echo $__env->make('users.post.components.following.reccomedation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="text-muted">
                        <a href="<?php echo e(route('follower.show', Auth::id())); ?>" class="muted_text text-decoration-none">View All suggestion</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/home.blade.php ENDPATH**/ ?>