@extends('layout.master')
@section('title', ' بيانات المحتوى ')
@section('page-title', ' بيانات مواد الدبلومات الاكاديمية ')
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
                        <h4 class="card-title">بيانات المواد الدراسية للمواد <i class="mdi mdi-book font-20 text-muted"></i>
                        </h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>كود المادة</th>
                                        <th>صورة المادة</th>
                                        <th>اسم المادة بالعربي</th>
                                        <th>اسم المادة بالانجليزي</th>
                                        <th> وصف المادة</th>
                                        <th>لغة المادة </th>
                                        <th> الادوات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
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
                                                            href="{{ route('courses.edit', $course->id) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('courses.destroy', $course->id) }}"><i
                                                                class="ti-trash"></i> حذف</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> {{ $course->code }}</td>
                                            <td>
                                                <img src="{{ $course->img_url }}" height="50px" width="70px">
                                            </td>
                                            <td>
                                                {{ $course->name_ar }}
                                            </td>
                                            <td>
                                                {{ $course->name_en }}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#descModal{{ $course->id }}">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <!-- المودال -->
                                                <div class="modal fade" id="descModal{{ $course->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">وصف مادة {{ $course->name_ar }}
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: right;">
                                                                {{ $course->description }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">إغلاق</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $course->language }}
                                            </td>
                                            <td>
                                                {{ $course->tools }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <div style="text-align: center;">
                            <a class="btn btn-primary btn-sm" href="{{ route('courses.deleteAll') }}"><span>
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
