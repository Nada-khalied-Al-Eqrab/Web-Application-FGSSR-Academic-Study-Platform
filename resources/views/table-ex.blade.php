@extends('layout.master')
@section('title', ' بيانات المحتوى ')
@section('page-title', ' بيانات الامتحانات ')
@section('contant')
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
                        <h4 class="card-title">بيانات مواعيد امتحانات المواد<i class="mdi mdi-clock font-20 text-muted"></i>
                        </h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>كود المادة </th>
                                        <th>نوع الامتحان</th>
                                        <th>اليوم</th>
                                        <th>التاريخ</th>
                                        <th>الوقت</th>
                                        <th>عدد الساعات</th>
                                        <th>اللينك</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $exam)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated slideInUp">
                                                        <a class="dropdown-item"
                                                            href="{{ route('exames.edit', $exam->id) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <form action="{{ route('exames.destroy', $exam->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('هل أنت متأكد من حذف هذا الامتحان؟')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item ">
                                                                <i class="ti-trash"></i> حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $exam->course->code }}</td>
                                            <td>{{ $exam->exam_type }}</td>
                                            <td>{{ $exam->day }}</td>
                                            <td>{{ $exam->exam_date }}</td>
                                            <td>{{ $exam->exam_time }}</td>
                                            <td>{{ $exam->duration }}</td>
                                            <td>
                                                @if ($exam->exam_link)
                                                    <a href="{{ $exam->exam_link }}" target="_blank" class="link"><i
                                                            class="ti-link"></i></a>
                                                @else
                                                    لا يوجد
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <form action="{{ route('exams.deleteAll') }}" method="POST"
                            onsubmit="return confirm('هل أنت متأكد أنك تريد حذف جميع الامتحانات؟');">
                            @csrf
                            <button class="btn btn-primary btn-sm">
                                <span>
                                    <i class="ti-trash"></i>
                                </span> حذف جميع البيانات
                            </button>
                        </form>
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
