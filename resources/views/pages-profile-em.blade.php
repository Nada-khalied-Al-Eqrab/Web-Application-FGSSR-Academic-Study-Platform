@extends('layout.master')
@section('title', 'الصفحة الشخصية')
@section('page-title', 'الصفحة الشخصية')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img src="{{ $admin->user->image
                                ? asset('storage/' . $admin->user->image)
                                : asset('assets/images/users/default/default.png') }}"
                                class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10">{{ $admin->user->name }} </h4>
                            <h6 class="card-subtitle ">ادارة المنصة الدراسية</h6>
                            <h6 class="card-subtitle">EM - {{ $admin->user->code }}</h6>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body" style="text-align: center;">
                        <small class="text-muted"> مكان العمل </small>
                        <h6>كلية الدراسات العليا للبحوث الاحصائية</h6>
                        <br />
                        <small class="text-muted p-t-30 db">رقم الهاتف / الوتساب: </small>
                        <h6>{{ $admin->user->phone }}</h6>
                        <br />
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Tabs -->
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist" style=" margin:auto;">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month"
                                role="tab" aria-controls="pills-timeline" aria-selected="true">لوحة الادوات </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month"
                                role="tab" aria-controls="pills-setting" aria-selected="false">الاعدادات</a>
                        </li>
                    </ul>
                    <!-- Tabs -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel"
                            aria-labelledby="pills-timeline-tab">
                            <div class="card-body" style="text-align: center;">
                                <h4>لوحة الادوات الخاصة بالمنصة </h4>
                                <p>
                                    يمكنك الان الوصول الى كافة الادوات المتاحة لك بسرعة وسهولة
                                </p>
                                <div class="row" style="justify-content: center;">
                                    <div class="col-md-4 col-sm-4 p-20">
                                        <div class="list-group" style="text-align: center;">
                                            <a href="#subjManagementdata" class="list-group-item active btn-outline-primary"
                                                data-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="userManagement">
                                                <i class="fas fa-chevron-down"></i>
                                                بيانات المحتوى
                                            </a>
                                            <div class="collapse mt-2" id="subjManagementdata">
                                                <a class="list-group-item" href="{{ route('courses.index') }}">
                                                    بيانات المواد الدراسية
                                                </a>
                                                <a class="list-group-item" href="{{ route('course_diploma.index') }}">
                                                    بيانات المواد الدراسية المتعلقة بكل دبلومة
                                                </a>
                                                <a class="list-group-item" href="{{ route('diplomas.index') }}">
                                                    بيانات الدبلومات
                                                </a>
                                                <a class="list-group-item" href="{{ route('indexfiles') }}">
                                                    بيانات الملفات
                                                </a>
                                                <a class="list-group-item" href="{{ route('table-study') }}">
                                                    بيانات الجداول الدراسية
                                                </a>
                                                <a class="list-group-item" href="{{ route('table-ex') }}">
                                                    بيانات جداول الامتحانات
                                                </a>
                                                <a class="list-group-item" href="{{ route('places') }}">
                                                    بيانات اماكن القاعات و المعامل
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 p-20">
                                        <div class="list-group" style="text-align: center;">
                                            <a href="#subjManagement" class="list-group-item active btn-outline-primary"
                                                data-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="userManagement">
                                                <i class="fas fa-chevron-down"></i>
                                                ادارة المحتوى
                                            </a>
                                            <div class="collapse mt-2" id="subjManagement">
                                                <a class="list-group-item" href="{{ route('courses.create') }}">
                                                    اضافة مادة دراسية
                                                </a>
                                                <a class="list-group-item" href="{{ route('course_diploma.create') }}">
                                                    اضافة مادة دراسية
                                                    الى
                                                    دبلومة
                                                </a>
                                                <a class="list-group-item" href="{{ route('diplomas.create') }}">
                                                    اضافة دبلومة
                                                </a>
                                                <a class="list-group-item" href="{{ route('createplace') }}">
                                                    اضافة اماكن القاعات و المعامل
                                                </a>
                                                <a class="list-group-item" href="{{ route('createfile') }}">
                                                    اضافة ملف
                                                </a>
                                                <a class="list-group-item" href="{{ route('lecture.form') }}">
                                                    اضافة جدول دراسى
                                                </a>
                                                <a class="list-group-item" href="{{ route('exame.form') }}">
                                                    اضافة جدول امتحانات
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="justify-content: center;">
                                    <div class="col-md-4 col-sm-4 p-20">
                                        <div class="list-group" style="text-align: center;">
                                            <a href="#userManagementdata"
                                                class="list-group-item active btn-outline-primary" data-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="userManagement">
                                                <i class="fas fa-chevron-down"></i>
                                                بيانات المستخدمين
                                            </a>
                                            <div class="collapse mt-2" id="userManagementdata">
                                                <a class="list-group-item" href="{{ route('doctors.index') }}">
                                                    بيانات الدكتور
                                                </a>
                                                <a class="list-group-item" href="{{ route('doctor_courses.index') }}">
                                                    بيانات المواد لكل دكتور
                                                </a>
                                                <a class="list-group-item" href="{{ route('students.index') }}">
                                                    بيانات الطالب
                                                </a>
                                                <a class="list-group-item" href="{{ route('Student_courses.index') }}">
                                                    بيانات المواد لكل طالب
                                                </a>
                                                @if ($admin->type === 'super')
                                                    <a class="list-group-item" href="{{ route('admins.index') }}">
                                                        بيانات الموظف
                                                    </a>
                                                @endif
                                                <a class="list-group-item" href="{{ route('table-subj-study') }}">
                                                    بيانات مناهج المواد الدراسية
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 p-20">
                                        <div class="list-group" style="text-align: center;">
                                            <a href="#userManagement" class="list-group-item active btn-outline-primary"
                                                data-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="userManagement">
                                                <i class="fas fa-chevron-down"></i>
                                                إدارة نظام المستخدمين
                                            </a>
                                            <!-- القائمة المنسدلة -->
                                            <div class="collapse mt-2" id="userManagement">
                                                <a class="list-group-item" href="{{ route('doctors.create') }}">
                                                    اضافة دكتور
                                                </a>
                                                @if ($admin->type === 'super')
                                                    <a class="list-group-item" href="{{ route('admins.create') }}">
                                                        اضافة موظف
                                                    </a>
                                                @endif
                                                <a class="list-group-item" href="{{ route('students.create') }}">
                                                    اضافة طالب
                                                </a>
                                                <a class="list-group-item" href="{{ route('doctor_courses.create') }}">
                                                    اضافة دكتور لمادة دراسية
                                                </a>
                                                <a class="list-group-item" href="{{ route('materials.form') }}">
                                                    اضافة منهج مادة دراسية
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel"
                            aria-labelledby="pills-setting-tab">
                            <div class="card-body" style="text-align:right;direction: rtl;">
                                <form class="form-horizontal form-material" method="POST"
                                    action="{{ route('profile.admin.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="form-group text-center">
                                            <img id="preview"
                                                src="{{ $admin->user->image
                                                    ? asset('storage/' . $admin->user->image)
                                                    : asset('assets/images/users/default/default.png') }}"
                                                style="width:150px;height:150px;border-radius:50%;object-fit:cover;border:3px solid #6a7a8c">
                                            <div class="mt-2">
                                                <label class="btn btn-outline-primary">
                                                    <i class="fas fa-upload"></i> رفع صورة شخصية
                                                    <input type="file" name="image" hidden
                                                        onchange="previewImage(event)">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">الاسم</label>
                                            <div class="col-md-12">
                                                <input type="text" name="name"
                                                    value="{{ old('name', $admin->user->name) }}"
                                                    class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-12">رقم الهاتف(يفضل ان يكون متصل بالوتساب)</label>
                                            <div class="col-md-12">
                                                <input type="text" name="phone"
                                                    value="{{ old('phone', $admin->user->phone) }}"
                                                    class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-sm-12">
                                                <button class="btn btn-primary">تحديث</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
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
    <script>
        function previewImage(event) {
            const image = document.getElementById('preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
