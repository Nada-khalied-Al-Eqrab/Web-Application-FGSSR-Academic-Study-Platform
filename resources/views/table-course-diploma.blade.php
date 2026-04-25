@extends('layout.master')
@section('title', ' بيانات المحتوى ')
@section('page-title', ' بيانات الدبلومات الاكاديمية ')
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
                        <h4 class="card-title">بيانات الدراسية للمواد <i class="mdi mdi-book font-20 text-muted"></i>
                        </h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>اسم الدبلومة</th>
                                        <th>كود المادة</th>
                                        <th>اسم المادة</th>
                                        <th>النوع</th>
                                        <th>المتطلبات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courseDiploma as $course_diploma)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated slideInUp" x-placement="bottom-start"
                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                        <a class="dropdown-item"
                                                            href="{{ route('course_diploma.edit', $course_diploma->id) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('course_diploma.destroy', $course_diploma->id) }}"><i
                                                                class="ti-trash"></i> حذف</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $course_diploma->diploma->name_ar }}</td>
                                            <td>{{ $course_diploma->course->code }}</td>
                                            <td>{{ $course_diploma->course->name_ar }}</td>
                                            <td>{{ $course_diploma->type }}</td>
                                            <td>{{ $course_diploma->prerequisite }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <!-- زر حذف الكل -->
                        <div style="text-align: center;">
                            <a class="btn btn-primary btn-sm" href="{{ route('course_diploma.deleteAll') }}"><span>
                                    <i class="ti-trash"></i>
                                </span> حذف جميع البيانات
                            </a>
                        </div>
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
@endsection
