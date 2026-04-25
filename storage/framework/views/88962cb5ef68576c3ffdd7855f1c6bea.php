<a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="<?php echo e(userProfileRoute()); ?>" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <img src="<?php echo e(auth()->user()->image
        ? asset('storage/' . auth()->user()->image)
        : asset('assets/images/users/default/default.png')); ?>"
        alt="user" class="rounded-circle" width="40">
    <span class="m-l-5 font-medium d-none d-sm-inline-block"><?php echo e(auth()->user()->name); ?> <i
            class="mdi mdi-chevron-down"></i></span>
</a>
<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
    <span class="with-arrow"><span class="bg-primary"></span> </span>
    <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
        <div>
            <img src="<?php echo e(auth()->user()->image
                ? asset('storage/' . auth()->user()->image)
                : asset('assets/images/users/default/default.png')); ?>"
                alt="user" class="rounded-circle" width="60">
        </div>
        <div class="m-l-10">
            <h4 class="m-b-0"><?php echo e(auth()->user()->name); ?></h4>
        </div>
    </div>
    <a class="dropdown-item" href="<?php echo e(userProfileRoute()); ?>"><i class="ti-user m-r-5 m-l-5"></i> الملف الشخصى</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?php echo e(route('profile.password.change')); ?>">
        <i class="mdi mdi-lock m-r-5 m-l-5"></i> تغيير كلمة السر
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off m-r-5 m-l-5"></i> تسجيل الخروج
    </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
    <div class="dropdown-divider"></div>
<?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/layout/components/user-profile.blade.php ENDPATH**/ ?>