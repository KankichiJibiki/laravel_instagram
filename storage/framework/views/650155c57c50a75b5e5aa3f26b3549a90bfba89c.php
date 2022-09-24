
<?php $__env->startSection('title', 'Edit My profile'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-8 col-lg-7 col-12 p-2 bg-light my-4">
            <div class="col-12">
                <form action="<?php echo e(route('users.update', Auth::id())); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    
                    <div class="d-flex justify-content-center">
                        <div class="col-4 p-2 text-center">
                            <?php if(Auth::user()->avatar): ?>
                                <img src="<?php echo e(asset('storage/images/' . Auth::user()->avatar)); ?>" alt="" class="avatar_icon_bigger rounded-circle">
                            <?php else: ?>
                                <i class="profile_icon_default rounded-circle p-0 m-0 fa-solid fa-circle-user icon-sm"></i>
                            <?php endif; ?>
                            <input type="file" name="avatar" id="avatar" class="border-0 text-primary">
                        </div>
                    </div>
                    <hr>
                    
                    <div class="d-flex flex-column p-2">
                        
                        <div class="input-group col-12 mb-1">
                            <label for="first_name" class="form-label input-group-text col-3 fw-bolder m-0">First name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control col" value="<?php echo e(Auth::user()->first_name); ?>">
                        </div>
                        
                        <div class="input-group col-12 mb-1">
                            <label for="last_name" class="form-label input-group-text col-3 fw-bolder m-0">Last name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control col" value="<?php echo e(Auth::user()->last_name); ?>">
                        </div>
                        
                        <div class="input-group col-12 mb-1">
                            <label for="username" class="form-label input-group-text col-3 fw-bolder m-0">Username</label>
                            <input type="text" name="username" id="username" class="form-control col" value="<?php echo e(Auth::user()->username); ?>">
                        </div>
                        
                        <div class="input-group col-12 mb-1">
                            <label for="email" class="form-label input-group-text col-3 fw-bolder m-0">Email</label>
                            <input type="text" name="email" id="email" class="form-control col" value="<?php echo e(Auth::user()->email); ?>">
                        </div>
                        
                        <div class="input-group col-12 mb-1">
                            <label for="intro" class="form-label input-group-text col-3 fw-bolder m-0">Introduction</label>
                            <textarea name="intro" id="intro" cols="30" rows="10" class="form-control"><?php echo e(Auth::user()->intro); ?></textarea>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/edit.blade.php ENDPATH**/ ?>