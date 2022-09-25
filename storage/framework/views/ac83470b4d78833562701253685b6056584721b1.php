

<?php $__env->startSection('title', 'My profile'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-item-center">
        <div class="col-md-10 col-lg-9 col-12 bg-light my-4">
            
            <div class="col-12 d-flex flex-row justify-content-around p-2">
                <div class="col-3 row">
                    <?php if(Auth::user()->avatar !== null): ?>
                        <div class="col text-center">
                            <img src="<?php echo e(asset('/storage/images/' . Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->avatar); ?>" class="avatar_icon rounded-circle">
                            <div class="fw-bold"><?php echo e(Auth::user()->username); ?></div>
                        </div>
                    <?php else: ?>
                        <div class="col text-center">
                            <i class="rounded-circle profile_icon_default p-0 m-0 fa-solid fa-circle-user"></i>
                            <div class="fw-bold"><?php echo e(Auth::user()->username); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <div class="fs-5"><?php echo e(count($posts)); ?></div>
                        <p>Posts</p>
                    </div>
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <button type="button" class="fs-5 border-0 bg-light" data-bs-toggle="modal" data-bs-target="#follower">
                          <?php echo e($followers->where('following_id', Auth::id())->count()); ?>

                        </button>
                        <?php echo $__env->make('users.post.components.modal.follower', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <p>Followers</p>
                    </div>
                </div>
                <div class="col row mt-2">
                    <div class="col text-center">
                        <button type="button" class="fs-5 border-0 bg-light" data-bs-toggle="modal" data-bs-target="#following">
                          <?php echo e(Auth::user()->followers->count()); ?>

                        </button>
                        <?php echo $__env->make('users.post.components.modal.following', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <p>Following</p>
                    </div>
                </div>
            </div>
            
            <div class="col-12 p-2 d-flex justify-content-center">
                <?php if(Auth::user()->intro): ?>
                    <p class="col-10 fw-bolder"><?php echo e(Auth::user()->intro); ?></p>
                <?php else: ?>
                    <p class="col-10 fw-bolder" id="introCon"></p>
                <?php endif; ?>
            </div>
            
            <div class="col-12 d-flex flex-row justify-content-center p-2">
                <div class="col-9">
                    <a href="<?php echo e(route('users.edit', Auth::id())); ?>" class="btn btn-outline-secondary text-decoration-none col-10">Edit Profile</a>
                </div>
                <div class="col-2 col-md-1">
                    <a href="<?php echo e(route('follower.show', Auth::id())); ?>" class="btn btn-outline-secondary text-decoration-none col-10">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-12 d-flex justify-content-center">
                <div class="col-10 p-2 d-flex flex-wrap">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('post.show', $post)); ?>" class="col-4 post_image">
                            <img src="<?php echo e(asset('storage/images/' . $post->image)); ?>" alt="" class="w-100 img-responsive border border-secondary">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="introCon fixedCon">
            <h5 class="text-light">Test Vue.js</h5>
            <input type="text" v-model="Introduction" placeholder="enter your introduction">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/profile.blade.php ENDPATH**/ ?>