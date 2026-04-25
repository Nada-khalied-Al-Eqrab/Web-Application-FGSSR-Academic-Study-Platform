<a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="{{ userProfileRoute() }}" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <img src="{{ auth()->user()->image
        ? asset('storage/' . auth()->user()->image)
        : asset('assets/images/users/default/default.png') }}"
        alt="user" class="rounded-circle" width="40">
    <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ auth()->user()->name }} <i
            class="mdi mdi-chevron-down"></i></span>
</a>
<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
    <span class="with-arrow"><span class="bg-primary"></span> </span>
    <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
        <div>
            <img src="{{ auth()->user()->image
                ? asset('storage/' . auth()->user()->image)
                : asset('assets/images/users/default/default.png') }}"
                alt="user" class="rounded-circle" width="60">
        </div>
        <div class="m-l-10">
            <h4 class="m-b-0">{{ auth()->user()->name }}</h4>
        </div>
    </div>
    <a class="dropdown-item" href="{{ userProfileRoute() }}"><i class="ti-user m-r-5 m-l-5"></i> الملف الشخصى</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('profile.password.change') }}">
        <i class="mdi mdi-lock m-r-5 m-l-5"></i> تغيير كلمة السر
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off m-r-5 m-l-5"></i> تسجيل الخروج
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <div class="dropdown-divider"></div>
