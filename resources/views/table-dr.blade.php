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
                                        <th>الكود</th>
                                        <th>الاسم</th>
                                        <th>الصورة</th>
                                        <th>المسمى الوظيفى</th>
                                        <th>القسم </th>
                                        <th>مكان المكتب</th>
                                        <th>الساعات المكتبية</th>
                                        <th>الرقم القومى</th>
                                        <th>رقم الهاتف</th>
                                        <th>مواد يدرسها الترم الحالى</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu animated slideInUp">
                                                    <a class="dropdown-item"
                                                        href="{{ route('doctors.edit', $doctor->id) }}"><i
                                                            class="ti-pencil-alt"></i> تعديل </a>
                                                    <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="ti-trash"></i> حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>DR-{{ $doctor->user->code }}</td>
                                        <td>{{ $doctor->user->name }} </td>
                                        <td>
                                            @if (isset($doctor->user->image))
                                                <img src="{{ asset('storage/' . $doctor->user->image) }}" height="50px"
                                                    width="50px">
                                            @else
                                                <img src="{{ asset('assets/images/users/default/default.png') }}"
                                                    height="50px" width="50px">
                                            @endif
                                        </td>
                                        <td>{{ $doctor->academic_degree == 'teaching_assistant' ? 'معيد' : 'دكتور' }}</td>
                                        <td>{{ $doctor->department }}</td>
                                        <td> {{ $doctor->place->build_name }} - الدور: {{ $doctor->place->floor }} </td>
                                        <td>من {{ $doctor->office_hours_from }} الى {{ $doctor->office_hours_to }}</td>
                                        <td>***************</td>
                                        <td>{{ $doctor->user->phone }}</td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#coursesModal{{ $doctor->id }}">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <div class="modal fade" id="coursesModal{{ $doctor->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content shadow-lg ">
                                                        <!-- Header -->
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">
                                                                <i class="ti-book"></i>
                                                                مواد الترم الحالي – {{ $doctor->user->name }}
                                                            </h3>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <!-- Body -->
                                                        <div class="modal-body ">
                                                            @if ($doctor->doctorCourses->count() > 0)
                                                                <ul class="list-group">
                                                                    @foreach ($doctor->doctorCourses as $index => $dc)
                                                                        <li
                                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                                            <div> <i class="ti-book"></i>
                                                                                مادة
                                                                                {{ $dc->course->name_ar }}
                                                                                ({{ $dc->course->code }})
                                                                            </div>
                                                                            {{-- <span class="badge badge-secondary badge-pill">
                                                                                0 طالب
                                                                            </span> --}}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <p class="text-center">لا توجد مواد مرتبطة</p>
                                                            @endif
                                                        </div>
                                                        <!-- Footer -->
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-dismiss="modal">
                                                                <i class="ti-close"></i> إغلاق
                                                            </button>
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
                        <div style="text-align: center; margin-top: 20px;">
                            <form action="{{ route('doctors.deleteAll') }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكدة من حذف كل الدكاترة؟');">
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
