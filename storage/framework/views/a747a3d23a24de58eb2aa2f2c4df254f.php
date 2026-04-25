<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">لوحة
                        التحكم</span></li>
                <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"
                        href="<?php echo e(route('dashboard')); ?>" aria-expanded="false"><i class="ti-home"></i><span
                            class="hide-menu">المنصة
                            لدراسية</span></a></li>
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">الدراسة
                        الاكاديمية</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span
                            class="hide-menu">حوال الدراسة
                            الاكاديمية</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="<?php echo e(route('courses_registration')); ?>" class="sidebar-link"><i
                                    class="mdi mdi-lightbulb-on-outline"></i><span class="hide-menu">كيفية تسجيل
                                    المواد</span></a></li>
                        <li class="sidebar-item"><a href="<?php echo e(route('StudentGuide')); ?>" class="sidebar-link"><i
                                    class="mdi mdi-cards-variant"></i> <span class="hide-menu"> دليل
                                    الطالب</span></a></li>
                        <li class="sidebar-item"><a href="<?php echo e(route('StudyPlan')); ?>" class="sidebar-link"><i
                                    class="mdi mdi-clock-end"></i><span class="hide-menu"> خطة الدراسة
                                </span></a></li>
                        <li class="sidebar-item"><a href="<?php echo e(route('Graduation')); ?>" class="sidebar-link"><i
                                    class="mdi mdi-school"></i><span class="hide-menu"> حول مشاريع
                                    التخرج</span></a></li>
                    </ul>
                </li>
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">اعدادات
                        متنوعة</span></li>
                <li class="sidebar-item mega-dropdown"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-widgets"></i><span
                            class="hide-menu">موادالدبلومات الاكاديمية</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <?php $__currentLoopData = $sidebar_diplomas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diploma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="sidebar-item">
                                <a href="<?php echo e(route('course_diploma.show', $diploma->id)); ?>" class="sidebar-link">
                                    <i class="mdi mdi-library"></i>
                                    <span class="hide-menu"> <?php echo e($diploma->name_ar); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-notification-clear-all"></i><span class="hide-menu">المنصات الرسمية
                            للكلية</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="https://fgssr.cu.edu.eg/" class="sidebar-link"><i
                                    class="icon icon-globe"></i><span class="hide-menu"> الموقع الرسمى
                                    للكلية</span></a></li>
                        <li class="sidebar-item"><a href="https://csds.cu.edu.eg/ISSR_Student/" class="sidebar-link"><i
                                    class="icon icon-globe"></i><span class="hide-menu">منصة
                                    تسجيل
                                    المواد</span></a></li>
                        <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="#"
                                aria-expanded="false"> <i class="icon  icon-social-facebook"></i> <span
                                    class="hide-menu"> صفحات الفيسبوك </span> </a>
                            <ul aria-expanded="false" class="collapse second-level">
                                <li class="sidebar-item"><a href="#" class="sidebar-link"> <i
                                            class="mdi mdi-facebook-box"></i> <span class="hide-menu"> ادارة
                                            العلاقات
                                            العامة و التسويق</span></a></li>
                                <li class="sidebar-item"><a href="#" class="sidebar-link"> <i
                                            class="mdi mdi-facebook-box"></i> <span class="hide-menu"> الدراسات
                                            الاكـاديمية
                                            و الـخاصة </span></a></li>
                                <li class="sidebar-item"><a href="#" class="sidebar-link"> <i
                                            class="mdi mdi-facebook-box"></i> <span class="hide-menu"> ادارة
                                            التدريب
                                            و اختبارات القبول</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span
                            class="hide-menu">
                            اعدادات المنصة الدراسية </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <!-- <li class="sidebar-item"><a href="pages-profile-st.html" class="sidebar-link"><i
                                            class="mdi mdi-account-key"></i><span class="hide-menu"> بروفيل الطالب
                                        </span></a></li>
                                <li class="sidebar-item"><a href="pages-profile-em.html" class="sidebar-link"><i
                                            class="mdi mdi-account-key"></i><span class="hide-menu"> بروفيل الموظف
                                        </span></a></li>
                                <li class="sidebar-item"><a href="pages-profile-dr.html" class="sidebar-link"><i
                                            class="mdi mdi-account-key"></i><span class="hide-menu"> بروفيل الدكتور
                                        </span></a></li>
                                <li class="sidebar-item"><a href="index-dr.html" class="sidebar-link"><i
                                            class="mdi mdi-account-key"></i><span class="hide-menu"> الصفحة الرأيسية
                                            الدكتور
                                        </span></a></li>
                                <li class="sidebar-item"><a href="index-em.html" class="sidebar-link"><i
                                            class="mdi mdi-account-key"></i><span class="hide-menu"> الصفحة الرأيسية
                                            للموظف
                                        </span></a></li> -->
                        <!-- -------------------------------------------- -->

                        
                        <li class="sidebar-item"><a href="<?php echo e(userSettingsRoute()); ?>" class="sidebar-link"><i
                                    class="mdi mdi-account-edit"></i> <span class="hide-menu">
                                    الاعدادات الملف الشخصى
                                </span></a></li>
                        <li class="sidebar-item"><a href="<?php echo e(route('profile.password.change')); ?>"
                                class="sidebar-link"><i class="mdi mdi-lock m-r-5 m-l-5"></i> <span
                                    class="hide-menu">
                                    اعادة تعيين كلمة السر
                                </span></a></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i>
                                <span class="hide-menu"> تسجيل الخروج </span>
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>


                        </li>

                        <!----------------------------------- -->
                        <!-- <li class="sidebar-item"><a href="form-subj-contant.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            اضافة منهج مادة درسية
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-file.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            اضافة ملف
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-study-schedule.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            اضافة جدول دراسى
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-dr.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            اضافة دكتور
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-exam-schedule.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            اضافة جدول امتحانات
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-dr-subj.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            اضافة دكتور لمادة
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-st.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            اضافة طالب
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-place.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            فورم اضافة اماكن القاعات
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-add-subj.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            فورم اضافة مادة دراسية
                                        </span></a></li> -->
                        <!-- ------------------------------------------- -->
                        <!-- <li class="sidebar-item"><a href="table-subj.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول المواد
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-study.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول الجداول الدراسية
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-subj-study.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول المناهج الدراسية
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-file.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول الملفات
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-st.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول الطلاب
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-em.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول الموظفين
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-places.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول اماكن القاعات
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-dr.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول الدكاترة و المعيدين
                                        </span></a></li>
                                <li class="sidebar-item"><a href="table-ex.html" class="sidebar-link"><i
                                            class="mdi mdi-cart-plus"></i> <span class="hide-menu">
                                            جدول الامتحانات
                                        </span></a></li> -->
                        <!-- ---------------------------------------------- -->
                        
                    </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>