<?php $__env->startSection('title', ' المنصة الدراسية الالكترونية '); ?>
<?php $__env->startSection('page-title', ' الصفحة الرأيسية '); ?>
<?php $__env->startSection('contant'); ?>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-apps font-20 text-muted"></i>
                                    <p class="font-16 m-b-5">المواد الترم الحالى</p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right"><?php echo e($subjectsCount); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;"
                                    aria-valuenow="<?php echo e($subjectsCount); ?>" aria-valuemin="0" aria-valuemax="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-clock font-20 text-muted"></i>
                                    <p class="font-16 m-b-5"> ساعات المحاضرات اسبوعيا </p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right"><?php echo e($weeklyHours); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;"
                                    aria-valuenow="<?php echo e($weeklyHours); ?>" aria-valuemin="0" aria-valuemax="15"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-laptop-mac font-20 text-muted"></i>
                                    <p class="font-16 m-b-5">اجمالى المحاضرات الاسبوعية </p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right"><?php echo e($weeklyLectures); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;"
                                    aria-valuenow="<?php echo e($weeklyLectures); ?>" aria-valuemin="0" aria-valuemax="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-human-male-female font-20 text-muted"></i>
                                    <p class="font-16 m-b-5"> الطلاب فى المواد الحالية </p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right"><?php echo e($studentsCount); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;"
                                    aria-valuenow="<?php echo e($studentsCount); ?>" aria-valuemin="0" aria-valuemax="1000"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12" id="diploma">
                    <?php echo $__env->make('partial.diploma', ['diplomas' => $diplomas], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <h4 class="m-b-20" style="text-align: right;"> مواد الترم الحالى</h4>
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profiletimeline m-t-0">
                                        <?php $__currentLoopData = $doctor->doctorCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img
                                                        src="<?php echo e(asset('assets/images/diploma/subj/main_subj.jpg')); ?>"
                                                        alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">
                                                            <?php echo e($dc->course->code); ?></a> <span class="sl-date">
                                                            <?php echo e($dc->course->name_en ?? ''); ?> </span>
                                                        <div class="m-t-20 row" style="text-align: center;">
                                                            <div class="col-md-3 col-xs-12"><img
                                                                    src="<?php echo e(asset($dc->course->img_url ?? 'assets/images/diploma/subj/main_subj.jpg')); ?>"
                                                                    alt="user" class="img-fluid rounded" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <h4> <?php echo e($dc->course->name_ar); ?></h4>
                                                                <p> يمكنك من هنا إدارة هذا المقرر: عرض
                                                                    تفاصيل المادة، إضافة أو تعديل
                                                                    المنهج، والاطّلاع على عدد الطلاب
                                                                    المسجلين وبياناتهم.</p>
                                                                <a href="<?php echo e(route('courses.show', $dc->course->id)); ?>"
                                                                    class="btn btn-primary"
                                                                    style="border-radius: 30px;">صفحة
                                                                    المادة <i class="ti-eye"></i></a>
                                                                <a href="<?php echo e(route('Student_courses.show', $dc->course->id)); ?>"
                                                                    class="btn btn-primary"
                                                                    style="border-radius: 30px;">الطلاب
                                                                    المسجلين <i class="ti-eye"></i></a>
                                                                <a href="<?php echo e(route('materials.form')); ?>"
                                                                    class="btn btn-primary" style="border-radius: 30px;">
                                                                    اضافة
                                                                    المنهج الدراسى <i class="ti-eye"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/index-dr.blade.php ENDPATH**/ ?>