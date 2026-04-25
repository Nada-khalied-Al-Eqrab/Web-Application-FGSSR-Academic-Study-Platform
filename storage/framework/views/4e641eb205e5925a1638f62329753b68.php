<div class="p-20">
    <div class="card" style="border-radius:20px;">
        <div class="card-body">
            <h4 class="card-title text-center">
                <strong><?php echo e($course->code ?? 'Course'); ?> Chat</strong>
            </h4>
            <hr>
            <div class="chat-box scrollable" style="height:calc(100vh - 300px);">
                <ul class="chat-list">
                    <?php if(isset($messages) && $messages->isNotEmpty()): ?>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($msg->user_id == auth()->id()): ?>
                                <li class="odd chat-item" >
                                    <div class="chat-content" >
                                        <div class="box bg-light-inverse">
                                            <?php echo e($msg->message); ?>

                                        </div>
                                        <div class="chat-img">
                                        <img src="<?php echo e($user->image
                                ? asset('storage/' . $user->image)
                                : asset('assets/images/users/default/default.png')); ?>" alt="User">
                                    </div>
                                    </div>
                                    <div class="chat-time">
                                        <?php echo e($msg->created_at->format('h:i a')); ?>

                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="chat-item" >

                                    <div class="chat-content" >
                                        <h6 class="font-medium"><?php echo e($msg->user->name ?? 'User'); ?></h6>
                                        <div class="box bg-light-info" >
                                            <?php echo e($msg->message); ?>

                                        </div>
                                        
                                    </div>
                                    <div class="chat-time">
                                        <?php echo e($msg->created_at->format('h:i a')); ?>

                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <li class="text-center text-muted">
                            لا توجد رسائل بعد
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="card-body border-top">
            <form method="POST" action="<?php echo e(route('chat.send', $course->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-9">
                        <input name="message" placeholder="Type and enter" class="form-control border-0" type="text"
                            required>
                    </div>
                    <div class="col-3">
                        <button class="btn-circle btn-lg btn-info float-right text-white">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                        <br><br>
                    </div>
                </div>
            </form>
            <br><br>
            <?php if(auth()->user()->is_admin): ?>
                <form action="<?php echo e(route('chat.deleteAll')); ?>" method="POST"
                    onsubmit="return confirm('هل أنت متأكد أنك تريد حذف جميع الرسائل؟');">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger btn-sm">
                        <i class="ti-trash"></i> حذف الشات بالكامل
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/partial/chat.blade.php ENDPATH**/ ?>