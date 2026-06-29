@extends('layout.master')
@section('title', 'بيانات المستخدمين ')
@section('page-title', ' بيانات الطلاب ')
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
                        <h4 class="card-title">بيانات الطلاب <i class="mdi mdi-account-multiple font-20 text-muted"></i>
                        </h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>اسم الطالب </th>
                                        <th>كود الطالب </th>
                                        <th>الرقم القومى </th>
                                        <th>تخصص الدبلوم </th>
                                        <th>رقم الهاتف </th>
                                        <th>المواد المسجلة الترم الحالى </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
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
                                                            href="{{ route('students.edit', $student->id) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <form action="{{ route('students.destroy', $student->id) }}"
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
                                            <td> {{ $student->user->name }} </td>
                                            <td>{{ $student->user->code }}</td>
                                            <td>**************</td>
                                            <td>{{ $student->diploma->name_ar }}</td>
                                            <td>{{ $student->user->phone }}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#coursesModal{{ $student->id }}">
                                                    <i class="ti-eye"></i>
                                                    ({{ $student->studentCourses->count() }})
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="coursesModal{{ $student->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content shadow-lg">
                                                            <!-- Header -->
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">
                                                                    <i class="ti-book"></i>
                                                                    مواد الترم الحالي للطالب / الطالبة :
                                                                    {{ $student->user->name }}
                                                                </h3>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal">
                                                                    &times;
                                                                </button>
                                                            </div>
                                                            <!-- Body -->
                                                            <div class="modal-body">
                                                                @if ($student->studentCourses->count() > 0)
                                                                    <ul class="list-group">
                                                                        @foreach ($student->studentCourses as $courseRow)
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between">
                                                                                <span>
                                                                                    <i class="ti-book"></i>
                                                                                    {{ $courseRow->course->name_ar }}
                                                                                </span>
                                                                                <span class="badge badge-primary">
                                                                                    {{ $courseRow->course->code }}
                                                                                </span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                    <p class="text-center">
                                                                        لا توجد مواد مسجلة
                                                                    </p>
                                                                @endif
                                                            </div>
                                                            <!-- Footer -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" data-dismiss="modal">
                                                                    إغلاق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <!-- زر حذف الكل -->
                        <div style="text-align: center;">
                            <form action="{{ route('students.deleteAll') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div style="text-align: center;">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <span><i class="ti-trash"></i></span> حذف جميع البيانات
                                    </button>
                                </div>
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
