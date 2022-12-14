<div class="mb-3 d-flex flex-row justify-content-between">
    <form action="<?php echo e(route('comments.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="input-group col-md-7 col-12">
            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input type="text" name="content" id="content" class="form-control" placeholder="Add a comment as <?php echo e(Auth::user()->username); ?>">
            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
            <button type="submit" class="btn btn-success input-group-item">Post</button>
        </div>
    </form>
</div><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/comment/input.blade.php ENDPATH**/ ?>