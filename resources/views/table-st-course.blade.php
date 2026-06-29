@extends('layout.master')

@section('title', 'بيانات المستخدمين')
@section('page-title', 'بيانات الطلاب و المواد المسجلة الترم الحالى')

@section('contant')
    <div class="container-fluid">
        @include('partial.banner')
        <div class="row">
            <div class="col-12">
                <div class="card" style="text-align: center;">
                    <div class="card-body">
                        <h4 class="card-title">
                            بيانات الطلاب و المواد المسجلة الترم الحالى
                            <i class="mdi mdi-account-multiple font-20 text-muted"></i>
                        </h4>
                        <h6 class="card-subtitle">
                            يمكنك الاطلاع على جميع البيانات
                        </h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>كود الطالب</th>
                                        <th>اسم الطالب</th>
                                        <th>مواد الترم الحالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>ST-{{ $student->user->code }}</td>
                                            <td>{{ $student->user->name }}</td>
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
                        <!-- حذف الكل -->
                        <div style="text-align: center;">
                            <form action="{{ route('student.courses.deleteAll') }}" method="POST"
                                onsubmit="return confirm('هل أنتِ متأكدة من حذف جميع البيانات؟');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary btn-sm">
                                    <i class="ti-trash"></i>
                                    حذف جميع البيانات
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
