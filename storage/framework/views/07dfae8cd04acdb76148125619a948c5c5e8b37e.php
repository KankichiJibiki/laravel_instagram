
<div class="col-12 d-flex flex-row justify-content-between">
    <div class="col-5 d-flex flex-row ">
        <?php
            $likes_arr = [];
            $hashMap = [];
            foreach(Auth::user()->likes as $like):
                $likes_arr[] = $like->post_id;
                $hashMap[$like->post_id] = $like->id;
            endforeach;
        ?>

        
        <?php if(in_array($post->id, $likes_arr)): ?>
            
            <form action="<?php echo e(route('likes.destroy', $hashMap[$post->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field("DELETE"); ?>

                <input type="text" hidden value="<?php echo e($post->id); ?>" name="post_id">
                <input type="text" hidden value="<?php echo e(Auth::id()); ?>" name="user_id">
                <button type="submit" class="action_icon p-0 bg-light border-0 me-1">
                    <i class="fa-solid fa-heart btn-opt"></i>
                </button>
            </form>
        <?php else: ?>
            
            <form action="<?php echo e(route('likes.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="text" hidden value="<?php echo e($post->id); ?>" name="post_id">
                <input type="text" hidden value="<?php echo e(Auth::id()); ?>" name="user_id">
                <button type="submit" class="action_icon p-0 bg-light border-0 me-1">
                    <i class="like_icon fa-regular fa-heart btn-opt"></i>
                </button>
            </form>
        <?php endif; ?>

        
        
            
        


        
        <!-- Modal trigger button -->
        <button type="button" class="action_icon p-0 bg-light border-0" data-bs-toggle="modal" data-bs-target="#view_comment_<?php echo e($post->id); ?>">
            <i class="fa-regular fa-comment btn-opt"></i>
        </button>
        
    </div>
    <div class="col text-end">
        <button type="submit" class="action_icon p-0 bg-light border-0">
            <i class="fa-regular fa-star btn-opt"></i>
        </button>
    </div>
</div>


<div>
    <?php if($post->likes->count() > 1): ?>
        <?php echo e($post->likes->count()); ?> likes
    <?php else: ?>
        <?php echo e($post->likes->count()); ?> like
    <?php endif; ?>
</div>


<?php $__currentLoopData = $post->post_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="badge bg-secondary">
        <?php echo e($post_category->category->name); ?>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<div class="col-12 ">
    <div><strong><?php echo e($post->user->username); ?></strong> <?php echo e($post->description); ?></div>
</div>


<div class="col-12 text-start">
    <form action="<?php echo e(route('comments.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php if($post->comments->isEmpty()): ?>
            <button type="button" class="bg-light border-0 p-0 text-muted muted_text" id="addComment_<?php echo e($post->id); ?>" onclick="displayCommentInput(<?php echo e($post->id); ?>);">Add a comment</button>
            <div class="d-none col-12 d-flex p-1 justify-content-around" id="commentInput_<?php echo e($post->id); ?>">
                <div class="col-1">
                    <i class="fa-solid fa-circle-user icon-sm user_icon"></i>
                </div>
                <div class="col-9 col-lg-10">
                    <div class="input-group">
                        <input type="text" name="content" id="content" placeholder="Add a comment as <?php echo e(Auth::user()->username); ?>" class="form-control border-radius-5">
                        
                        <input type="text" name="post_id" id="post_id" hidden value="<?php echo e($post->id); ?>">
                        <button type="submit" class="input-group-item btn btn-outline-primary">Post</button>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Modal trigger button -->
            <button type="button" class="action_icon p-0 bg-light border-0 text-muted muted_text" data-bs-toggle="modal" data-bs-target="#view_comment_<?php echo e($post->id); ?>" id="viewComment_btn">
                View all <?php echo e(count($post->comments)); ?> comments
            </button>
            
        <?php endif; ?>
    </form>
</div>



<div class="col-12 text-start text-muted muted_text">
    <p><?php echo e($post->created_at->diffForHumans()); ?></p>
</div>
<?php echo $__env->make('users.post.components.modal.viewComment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.post.components.modal.viewComment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kan04\OneDrive\デスクトップ\laravel_portfolio\laravel_instagram\resources\views/users/post/components/footer.blade.php ENDPATH**/ ?>