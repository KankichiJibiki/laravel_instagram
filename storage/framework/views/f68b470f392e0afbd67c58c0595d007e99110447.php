
<?php $__env->startSection('title', 'Admin Page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-light col-12 d-flex p-4 flex-wrap justify-content-between">
            
            <div class="col-md-3 col-12 mb-3">
                <ul class="list-group">
                    <li class="p-1 list-group-item">
                        <a href="" class="text-decoration-none text-dark">Users</a>
                    </li>
                    <li class="p-1 list-group-item">
                        <a href="" class="text-decoration-none text-dark">Posts</a>
                    </li>
                    <li class="p-1 list-group-item">
                        <a href="" class="text-decoration-none text-dark">Categories</a>
                    </li>
                </ul>
            </div>
            
            <div class="col-md-8 col-12 mb-3">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>

                    <table class="table table-striped">
                        <thead class="text-uppercase bg-success text-light">
                            <th>
                                <td>name</td>
                                <td>email</td>
                                <td>created at</td>
                                <td>status</td>
                                <td></td>
                            </th>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/admin.blade.php ENDPATH**/ ?>