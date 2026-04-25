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
                                        <th>كود الدبلومة</th>
                                        <th>صورة الدبلومة</th>
                                        <th>اسم الدبلومة بالعربي</th>
                                        <th>اسم الدبلومة بالانجليزي</th>
                                        <th> وصف الدبلومة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diplomas as $diploma)
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
                                                            href="{{ route('diplomas.edit', $diploma->id) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('diplomas.destroy', $diploma->id) }}"><i
                                                                class="ti-trash"></i> حذف</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> {{ $diploma->code }}</td>
                                            <td>
                                                <img src="  {{ $diploma->img_url }}" height="50px" width="70px">
                                            </td>
                                            <td>
                                                {{ $diploma->name_ar }}</td>
                                            <td>
                                                {{ $diploma->name_en }}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#descModal{{ $diploma->id }}">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <!-- المودال -->
                                                <div class="modal fade" id="descModal{{ $diploma->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> وصف {{ $diploma->name_ar }}</h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: right;">
                                                                {{ $diploma->description }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">إغلاق</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <div style="text-align: center;">
                            <a class="btn btn-primary btn-sm" href="{{ route('diplomas.deleteAll') }}"><span>
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
