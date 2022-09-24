<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="follower" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="follower" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Follower</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    $followers_arr = [];
                    $hashMap = [];
                    foreach(Auth::user()->followers as $follower) {
                        $hashMap[$follower->following_id] = $follower->id;
                        $followers_arr[] = $follower->following_id;
                    }
                ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $user->followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($follower->following_id == Auth::id()): ?>
                            <div class="col-12 d-flex flex-row justify-content-between align-items-center">
                                <div class="col-5 col-md-7 d-flex flex-row justify-content-start">
                                    
                                    <div class="col-1 col-md-2 me-4 me-md-3">
                                        <?php if($user->avatar): ?>
                                            <img src="<?php echo e(asset('/storage/images/' . $user->avatar)); ?>" alt="" class="rounded-circle avatar_icon_sm">
                                        <?php else: ?>
                                        
                                            <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="col-3 col-md-4 text-start">
                                        <h6><?php echo e($user->username); ?></h6>
                                        <p class="text-muted text-sm"><?php echo e($user->first_name . " " . $user->last_name); ?></p>
                                    </div>
                                </div>
                                
                                <div class="col-4 col-md-5 text-center">
                                    <?php if(in_array($follower->user_id, $followers_arr)): ?>

                                        <form action="<?php echo e(route('follower.destroy', $hashMap[$follower->user_id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button class="border-0 p-0 badge bg-light text-danger mb-2 btn-sm">
                                                Unfollow
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('follower.store')); ?>" method="post">
                                            <?php echo csrf_field(); ?>

                                            <input type="number" name="following_id" value="<?php echo e($user->id); ?>" hidden>

                                            <button class="border-0 p-0 badge bg-light text-success mb-2 btn-sm">
                                                Follow
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>    
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/modal/follower.blade.php ENDPATH**/ ?>