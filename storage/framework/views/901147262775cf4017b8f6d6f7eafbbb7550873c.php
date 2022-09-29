

<?php $__env->startSection('title', 'Create Post'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container d-flex justify-content-center align-items-center bg-light p-3 my-3">
        
        <form action="<?php echo e(route('post.store')); ?>" method="post" enctype="multipart/form-data" class="col-lg-8 col-md-11 col-12 d-flex flex-wrap justify-content-between p-2">
            <?php echo csrf_field(); ?>
            
            <div class="col-md-6 col-12">
                
                <div class="mb-3">
                    <div class="row">
                        <?php $__errorArgs = ['categories'];
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
                        <h5 class="col fw-bold">Category</h5>
                        <span class="col text-muted">(Up to 3)</span>
                    </div>
                    <div class="form-check-inline d-flex flex-wrap">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-5 col-4">
                                <input type="checkbox" name="categories[]" id="" value="<?php echo e($category->id); ?>" class="form-check-input">
                                <label for="categories[]" class="form-check-label"><?php echo e($category->name); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
                <div class="mb-3">
                    <?php $__errorArgs = ['description'];
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
                    <label for="description" class="form-label fw-bold fs-5">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            
            <div class="col-md-5 col-12">
                
                <div class="mb-4">
                    <?php $__errorArgs = ['image'];
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
                    <label for="image" class="form-label fw-bold fs-5">Post Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="col-12 btn btn-success">Post</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/create.blade.php ENDPATH**/ ?>