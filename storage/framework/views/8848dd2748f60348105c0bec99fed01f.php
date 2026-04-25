<?php $__env->startSection('title', 'نتائج البحث '); ?>
<?php $__env->startSection('page-title', 'نتائج البحث '); ?>
<?php $__env->startSection('contant'); ?>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="text-align: right; justify-content: right;">
                    <div class="card-body">
                        <h4 class="card-title"><span>"<?php echo e($query); ?>"</span>نتائج البحث عن </h4>
                        <h6 class="card-subtitle"> نتائج بحث<span>"<?php echo e($courses->count()); ?>"</span> حوالى </h6>
                        <?php if($courses->count()): ?>
                            <ul class="search-listing list-style-none">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="border-bottom p-t-15">
                                        <h4 class="m-b-0"><a href="<?php echo e(route('courses.show', $course->id)); ?>"
                                                class="text-cyan font-medium p-0"><?php echo e($course->code); ?>

                                                - <?php echo e($course->name_en); ?></a></h4>
                                        <a href="<?php echo e(route('courses.show', $course->id)); ?>"
                                            class="search-links p-0 text-success"><?php echo e($course->name_ar); ?>

                                        </a>
                                        <p>
                                            <?php echo e($course->description); ?>

                                        </p>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <p>لا توجد نتائج مطابقة</p>
                        <?php endif; ?>
                        <nav aria-label="Page navigation example" class="m-t-40">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">السابق</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">التالى </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/pages-search-result.blade.php ENDPATH**/ ?>