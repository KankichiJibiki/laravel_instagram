
<?php $__env->startSection('title', 'Admin Page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light col-12 d-flex p-4 flex-wrap justify-content-between">
            
            <?php echo $__env->make('users.admin.components.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
            
            <div class="col-lg-8 col-12 mb-3">
                
                <div class="col-7 float-end mb-3">
                    <form action="<?php echo e(route('search_result', Auth::id())); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="input-group">
                            <input type="text" name="q" id="q" placeholder="Search..." class="form-control">
                            
                            <button type="submit" class="btn btn-dark text-light input-group-btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <table class="table table-striped table-hover">
                    <thead class="text-uppercase bg-success text-light">
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>created at</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->username); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td>
                                    <?php if(is_null($user->deleted_at)): ?>
                                        Active
                                    <?php else: ?>
                                        Inactive
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(is_null($user->deleted_at) && $user->id != Auth::id()): ?>
                                        <form action="<?php echo e(route('admin.deactivate', $user->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("DELETE"); ?>
                                        
                                            <button type="submit" class="btn btn-danger">Deactivate</button>
                                        </form>
                                    <?php elseif(!is_null($user->deleted_at) && $user->id != Auth::id()): ?>
                                        <form action="<?php echo e(route('admin.activate', $user->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("PATCH"); ?>

                                            <button type="submit" class="btn btn-success">Activate</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($users->links()); ?>

            </div>
        </div>
    </div>
    <script>
        categoryColor(0);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/admin/user.blade.php ENDPATH**/ ?>