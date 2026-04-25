<h4 class="m-b-20 " style="text-align: right;">الدبلومات الاكاديمية</h4>
<!-- Row -->
<div class="row" style="justify-content: center;text-align: center;">
    <?php $__currentLoopData = $diplomas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diploma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src=" <?php echo e($diploma->img_url); ?>" alt="Card image cap">
                <div class="card-body">
                    <h3 class="font-normal"><?php echo e($diploma->name_ar); ?> </h3>
                    <p class="m-b-0 m-t-10">
                        <?php echo e($diploma->description); ?>

                    </p>
                    <a href="<?php echo e(route('course_diploma.show', $diploma->id)); ?>"> <button
                            class="btn btn-primary btn-rounded waves-effect waves-light m-t-20">المواد
                            الدراسية </button></a>
                </div>
            </div>
        </div>
        <!-- Column -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!-- Row -->
<?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/partial/diploma.blade.php ENDPATH**/ ?>