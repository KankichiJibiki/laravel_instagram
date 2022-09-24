<form action="<?php echo e(route('follower.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php
        $followers_arr = [];
        foreach(Auth::user()->followers as $follower) {
            $followers_arr[] = $follower->following_id;
        }
    ?>
    
    <?php if($user->id != Auth::id() && !in_array($user->id, $followers_arr, true)): ?>
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
                    <input type="number" name="following_id" value="<?php echo e($user->id); ?>" hidden>
                </div>
            </div>
            
            <div class="col-4 col-md-5 text-center">
                <button type="submit" class="btn btn-success btn-sm">&plus;</button>
                <p class="text-muted text-sm">Follow</p>
            </div>
        </div>
    <?php endif; ?>
</form><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/following/body.blade.php ENDPATH**/ ?>