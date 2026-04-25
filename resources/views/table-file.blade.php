@extends('layout.master')
@section('title', 'بيانات المحتوى ')
@section('page-title', ' بيانات الملفات ')
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
                        <h4 class="card-title">بيانات الملفات <i class="mdi mdi-book font-20 text-muted"></i>
                        </h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>اسم الملف </th>
                                        <th>وصف الملف </th>
                                        <th>رابط الملف </th>
                                        <th>منشأ الملف</th>
                                        <th>تاريخ تحديث الملف </th>
                                        <th>تاريخ رفع الملف </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
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
                                                            href="{{ route('editfile', ['id' => $file->id]) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('deletefile', ['id' => $file->id]) }}"><i
                                                                class="ti-trash"></i> حذف</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $file->name }}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#descModal1">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <div class="modal fade" id="descModal1" tabindex="-1" role="dialog"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{ $file->name }}</h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: right;">
                                                                {{ $file->description }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">إغلاق</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="{{ asset('assets/FSSR_files/' . $file->file_link) }}"> <i
                                                        class="mdi mdi-link"></i></a></td>
                                            <td>كلية الدراسات العليا للبحوث الاحصائية </td>
                                            <td>{{ isset($file->updated_at) ? $file->updated_at : 'لم يتم التحديث' }}</td>
                                            <td>{{ $file->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <div style="text-align: center;">
                            <form action="{{ route('delete_all_file') }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد من حذف جميع البيانات؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <span>
                                        <i class="ti-trash"></i>
                                    </span> حذف جميع البيانات
                                </button>
                            </form>
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
