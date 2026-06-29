@extends('layout.auth')
@section('title-auth', 'المنصة الدراسية الالكترونية | تسجيل الدخول')
@section('strong-title-form', 'تسجيل الدخول للمنصة الدراسية')
@section('contant-auth')
    <div class="row">
        <div class="col-12">
            {{-- رسالة خطأ من الـ validation --}}
            @if ($errors->any())
                <div class="alert alert-danger text-center ">
                    بيانات الدخول غير صحيحة
                </div>
            @endif
            {{-- رسالة خطأ من الـ middleware --}}
            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
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
            @endif
            <script>
                function toggleReason() {
                    let box = document.getElementById("reasonBox");
                    box.style.display = (box.style.display === "none") ? "block" : "none";
                }
            </script>
            <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login') }}">
                @csrf
                <!-- كود المستخدم -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="ti-user"></i>
                        </span>
                    </div>
                    <input type="text" name="code" class="form-control form-control-lg" placeholder="كود المستخدم"
                        value="{{ old('code') }}" required autofocus>
                </div>
                @error('code')
                    <small class="text-danger d-block mb-2">
                        {{ $message }}
                    </small>
                @enderror
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
                @error('password')
                    <small class="text-danger d-block mb-2">
                        {{ $message }}
                    </small>
                @enderror
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
                {{-- رابط تسجيل الدخول --}}
                <div class="form-group m-b-0 m-t-10">
                    <div class="col-sm-12 text-center">
                        هل تريد انشاء حساب؟
                        <a href="{{ route('register') }}" class="text-primary m-l-5">
                            <b> انشاء حساب</b>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
