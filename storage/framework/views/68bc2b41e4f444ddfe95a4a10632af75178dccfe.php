

<?php $__env->startSection('title', 'Edit Post'); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container d-flex justify-content-center align-items-center bg-light p-2 my-2">
        <form action="<?php echo e(route('post.update', $post->id)); ?>" method="post" enctype="multipart/form-data" class="col-12 col-md-10 col-lg-8 d-flex flex-wrap justify-content-between p-2">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            
            <div class="order-2 col-12 col-md-5">
                
                <div class="mb-3 text-dark">
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
                    <h5>Category</h5>
                    <div class="form-check-inline d-flex flex-wrap">
                        <?php
                            $selected_categories = [];
                            foreach($post->post_categories as $post_category) $selected_categories[] = $post_category->category->id;
                        ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($category->id, $selected_categories, true)): ?>
                                <div class="col-4 col-md-5">
                                    <input type="checkbox" name="categories[]" value="<?php echo e($category->id); ?>" checked>
                                    <label for="categories[]" class="form-check-label"><?php echo e($category->name); ?></label>
                                </div>
                            <?php else: ?>
                                <div class="col-4 col-md-5">
                                    <input type="checkbox" name="categories[]" id="" value="<?php echo e($category->id); ?>">
                                    <label for="categories[]" class="form-check-label"><?php echo e($category->name); ?></label>
                                </div>
                            <?php endif; ?>
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
                    <h5>Description</h5>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php echo e($post->description); ?></textarea>
                </div>

                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
            
            <div class="order-1 col-12 col-md-6">
                
                <div class="mb-3">
                    <img src="<?php echo e(asset('storage/images/' . $post->image)); ?>" alt="" class="w-100 img-thumbnail">
                </div>

                
                <div class="mb-3">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/edit.blade.php ENDPATH**/ ?>