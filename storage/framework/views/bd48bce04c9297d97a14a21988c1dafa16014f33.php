

<?php $__env->startSection('title', 'Post'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $followers_arr = [];
        $hashMap = [];
        foreach(Auth::user()->followers as $follower) {
            $hashMap[$follower->following_id] = $follower->id;
            $followers_arr[] = $follower->following_id;
        }
    ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light p-2 col-md-9 col-11 my-2 shadow-lg">
            <div class="d-flex flex-wrap justify-content-around">
                <div class="col-11 col-lg-7 p-0">
                    <img src="<?php echo e(asset('/storage/images/' . $post->image)); ?>" alt="" class="w-100 img-thumbnail">
                </div>
                <div class="col-11 col-lg-4">
                    <div class="mb-4">
                        <?php echo $__env->make('users.post.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div>
                        <?php echo $__env->make('users.post.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php $__currentLoopData = $post->comments->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('users.post.components.comment.commentview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php if($loop->last): ?>
                                <button type="button" class="action_icon p-0 bg-light border-0 text-muted muted_text" data-bs-toggle="modal" data-bs-target="#view_comment_<?php echo e($post->id); ?>" id="viewComment_btn">
                                    View all <?php echo e(count($post->comments)); ?> comments
                                </button>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/show.blade.php ENDPATH**/ ?>