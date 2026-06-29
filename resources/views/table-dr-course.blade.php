@extends('layout.master')
@section('title', ' بيانات المستخدمين ')
@section('page-title', 'بيانات اعضاء هيئة التدريس ')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @include('partial.banner')
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="justify-content: center;text-align: center;">
                    <div class="card-body">
                        <h4 class="card-title">بيانات الدكاترة و المعيدين <i
                                class="mdi mdi-account-multiple font-20 text-muted"></i></h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>كود المادة</th>
                                        <th>اسم المادة</th>
                                        <th>اسم الدكتور</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctorCourses as $doctorCourse)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <i class="ti-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated slideInUp">
                                                        <a class="dropdown-item"
                                                            href="{{ route('doctor_courses.edit', $doctorCourse->id) }}">
                                                            <i class="ti-pencil-alt"></i> تعديل
                                                        </a>
                                                        <form
                                                            action="{{ route('doctor_courses.destroy', $doctorCourse->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="ti-trash"></i> حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $doctorCourse->course->code ?? '-' }}</td>
                                            <td>{{ $doctorCourse->course->name_ar ?? '-' }}</td>
                                            <td>{{ $doctorCourse->doctor->user->name ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center; margin-top: 20px;">
                                <form action="{{ route('doctor_courses.deleteAll') }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكدة من حذف كل التخصيصات؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary btn-sm">
                                        <i class="ti-trash"></i> حذف جميع البيانات
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        @endsection
