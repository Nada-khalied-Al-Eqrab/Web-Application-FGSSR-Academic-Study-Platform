@extends('layout.master')
@section('title', 'بيانات المحتوى ')
@section('page-title', ' بيانات الاماكن ')
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
                        <h4 class="card-title"> بيانات القاعات و المعامل<i class="mdi mdi-home font-20 text-muted"></i></h4>
                        <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                            و التعديل</h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الاعدادات</th>
                                        <th>اسم القاعة او المعمل</th>
                                        <th>اسم المبنى</th>
                                        <th>الدور</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>تاريخ التحديث</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($places as $place)
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
                                                            href="{{ route('editplace', ['id' => $place->id]) }}"><i
                                                                class="ti-pencil-alt"></i> تعديل </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('deleteplace', ['id' => $place->id]) }}"><i
                                                                class="ti-trash"></i> حذف</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $place->hall_name }}</td>
                                            <td>{{ $place->build_name }}</td>
                                            <td>{{ $place->floor }}</td>
                                            <td>{{ $place->created_at }}</td>
                                            <td>{{ isset($place->updated_at) ? $place->updated_at : 'لم يتم التحديث' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <div style="text-align: center;">
                            <form action="{{ route('delete_all_place') }}" method="POST"
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
