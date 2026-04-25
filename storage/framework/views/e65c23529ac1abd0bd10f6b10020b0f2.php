<!DOCTYPE html>
<html dir="ltr" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
    <title><?php echo $__env->yieldContent('title-auth', 'المنصة الدراسية الالكترونية '); ?></title>
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('dist/css/style.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/auth.css')); ?>" rel="stylesheet">
    <!-- Terms & Policies css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <?php echo $__env->make('layout.Preloader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url(<?php echo e(asset('assets/images/background/login-register.jpg')); ?>) no-repeat center center;">
            <div class="auth-box on-sidebar">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"> <img src="<?php echo e(asset('assets/images/logo-icon.png')); ?>" alt="logo" />
                            <img src="<?php echo e(asset('assets/images/logo-text.png')); ?>" alt="homepage"
                                class="dark-logo" /></span>
                        <br>
                        <br>
                        <strong> <?php echo $__env->yieldContent('strong-title-form', 'المنصة الدراسية الالكترونية '); ?></strong>
                    </div>
                    <?php echo $__env->yieldContent('contant-auth'); ?>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- All Required js -->
        <!-- ============================================================== -->
        <script src="<?php echo e(asset('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?php echo e(asset('assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
        <!-- ============================================================== -->
        <!--  authentication  js -->
        <!-- ============================================================== -->
        <script src="<?php echo e(asset('assets/js/authentication.js')); ?>"></script>
        <!-- ============================================================== -->
        <!-- This page plugin js -->
        <!-- ============================================================== -->
        <script>
            $('[data-toggle="tooltip"]').tooltip();
            $(".preloader").fadeOut();
            // ==============================================================
            // Login and Recover Password
            // ==============================================================
            $('#to-recover').on("click", function() {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });
        </script>
        <!-- Terms & Policies js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/layout/auth.blade.php ENDPATH**/ ?>