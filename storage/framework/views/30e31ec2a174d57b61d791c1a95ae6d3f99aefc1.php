
<?php $__env->startSection('title', 'Post'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light col-12 d-flex p-4 flex-wrap justify-content-between">
            
            <?php echo $__env->make('users.admin.components.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <div class="col-lg-8 col-12 mb-3">

                <table class="table table-striped table-hover">
                    <thead class="text-uppercase bg-success text-light">
                        <tr>
                            <th>Image</th>
                            <th>User</th>
                            <th>created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="col-3">
                                    <img src="<?php echo e(asset('storage/images/' . $post->image)); ?>" alt="" class="w-25">
                                </td>
                                <td class="col-2"><?php echo e($post->user->username); ?></td>
                                <td class="col-5"><?php echo e($post->created_at); ?></td>
                                <td>
                                    <?php if($post->deleted_at == null): ?>
                                        <form action="<?php echo e(route('hideBlock', $post->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" class="btn btn-danger">Hide</button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('unhide', $post->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>

                                            <button type="submit" class="btn btn-success">Unhide</button>
                                        </form>         
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
    <script>
        categoryColor(1);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/admin/post.blade.php ENDPATH**/ ?>