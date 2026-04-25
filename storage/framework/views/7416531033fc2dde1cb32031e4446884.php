<?php $__env->startSection('title-auth', 'المنصة الدراسية الالكترونية | تسجيل الدخول'); ?>
<?php $__env->startSection('strong-title-form', 'تسجيل الدخول للمنصة الدراسية'); ?>
<?php $__env->startSection('contant-auth'); ?>
    <div class="row">
        <div class="col-12">
            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger text-center ">
                    بيانات الدخول غير صحيحة
                </div>
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                <div class="alert alert-danger text-center">
                    <?php echo e(session('error')); ?>

                    <br>
                    <!-- أيقونة العين -->
                    <span onclick="toggleReason()" style="cursor:pointer; margin-right:10px;">
                        <i class="ti-eye"></i>
                    </span>
                    اطلع على الاسباب المحتملة
                    <!-- الأسباب (مخفية في الأول) -->
                    <div id="reasonBox"
                        style="display:none; margin-top:10px; background:#ffeaea; padding:10px; border-radius:6px;">
                        <ul
                            style=" direction: rtl; list-style-type: square; list-style-position: inside; text-align: right; padding-right: 0;">
                            اسباب ايقاف الحساب:
                            <li> للطالب : يكون سبب الايقاف عدم دفع المصاريف او عدم تفعيل حسابة بعد على المنصة .</li>
                            <li>لأعضاء هيئة التدريس : يكون بسبب عدم تفعيل حسابة بعد على المنصة او اسباب ادارية اخرى ادت الى
                                تعطيل الحساب .</li>
                            <li> للموظفين : بسبب عدم تفعيل حسابة بعد على المنصة و برجاء انشاء حساب من خلال بيناته الخصاصة ،
                                او لاسباب ادارية اخرى ادت الى تعطيل الحساب . </li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <script>
                function toggleReason() {
                    let box = document.getElementById("reasonBox");
                    box.style.display = (box.style.display === "none") ? "block" : "none";
                }
            </script>
            <form class="form-horizontal m-t-20" id="loginform" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <!-- كود المستخدم -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="ti-user"></i>
                        </span>
                    </div>
                    <input type="text" name="code" class="form-control form-control-lg" placeholder="كود المستخدم"
                        value="<?php echo e(old('code')); ?>" required autofocus>
                </div>
                <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger d-block mb-2">
                        <?php echo e($message); ?>

                    </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <!-- كلمة المرور -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="ti-pencil"></i>
                        </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="كلمة المرور"
                        required>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger d-block mb-2">
                        <?php echo e($message); ?>

                    </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <!-- تذكرني -->
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                            <label class="custom-control-label" for="customCheck1">
                                تذكرني
                            </label>
                        </div>
                    </div>
                </div>
                <!-- زر تسجيل الدخول -->
                <div class="form-group text-center">
                    <div class="col-xs-12 p-b-20">
                        <button class="btn btn-dark btn-lg btn-info" type="submit">
                            تسجيل الدخول
                        </button>
                    </div>
                </div>
                
                <div class="form-group m-b-0 m-t-10">
                    <div class="col-sm-12 text-center">
                        هل تريد انشاء حساب؟
                        <a href="<?php echo e(route('register')); ?>" class="text-primary m-l-5">
                            <b> انشاء حساب</b>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/auth/login.blade.php ENDPATH**/ ?>