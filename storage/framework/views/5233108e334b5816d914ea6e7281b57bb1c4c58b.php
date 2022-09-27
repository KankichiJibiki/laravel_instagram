
<?php $__env->startSection('title', 'Category'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light col-12 d-flex p-4 flex-wrap justify-content-between">
            
            <?php echo $__env->make('users.admin.components.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-lg-8 col-12 mb-3">
                
                <table class="table table-striped table-hover">
                    <thead class="text-uppercase bg-success text-light">
                        <tr>
                            <th>Category</th>
                            <th>
                                <!-- Add Modal trigger button -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category">
                                  + Add a Category
                                </button>
                                <?php echo $__env->make('users.admin.components.modal/createCategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="col-7">
                                    <div><?php echo e($category->name); ?></div>
                                </td>
                                <td>
                                    <?php if($category->deleted_at == null): ?>
                                        <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" class="btn btn-danger">Hide</button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('unhide_category', $category->id)); ?>" method="post">
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/admin/category.blade.php ENDPATH**/ ?>