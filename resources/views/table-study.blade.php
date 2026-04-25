@extends('layout.master')
@section('title', 'بيانات المحتوى ')
@section('page-title', 'بيانات مواعيد محاضرات الدراسة ')
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
                        <h4 class="card-title">بيانات مواعيد المحاضرات و السكاشن <i
                                class="mdi mdi-clock font-20 text-muted"></i></h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>كود المادة</th>
                                        <th>اليوم</th>
                                        <th>الوقت</th>
                                        <th>المكان</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>تاريخ التحديث</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lectures as $lecture)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated slideInUp">
                                                        <a class="dropdown-item"
                                                            href="{{ route('lectures.edit', $lecture->id) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <form action="{{ route('lectures.destroy', $lecture->id) }}"
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
                                            <td>{{ $lecture->course?->code }}</td>
                                            <td>{{ $lecture->day }}</td>
                                            <td>{{ $lecture->start_time }}- {{ $lecture->end_time }}</td>
                                            </td>
                                            <td> {{ $lecture->place
                                                ? $lecture->place->hall_name . ' - مبنى ' . $lecture->place->build_name . ' - الدور ' . $lecture->place->floor
                                                : '—' }}
                                            </td>
                                            <td>{{ $lecture->created_at }}</td>
                                            <td>{{ $lecture->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <!-- زر حذف الكل -->
                        <form action="{{ route('lectures.deleteAll') }}" method="POST"
                            onsubmit="return confirm('هل أنت متأكد أنك تريد حذف جميع البيانات؟');">
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
