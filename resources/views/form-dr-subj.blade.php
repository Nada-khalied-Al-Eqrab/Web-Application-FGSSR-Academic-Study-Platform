@extends('layout.master')
@section('title', 'ادارة نظام المستخدمين ')
@section('page-title', 'تخصيص مادة دراسية لعضو هيئة تدريس ')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @include('partial.banner')
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="direction: rtl; justify-content: right; text-align: right;">
                    <h4 class="card-title" style="text-align: center;"> <i class="mdi mdi-account-key font-20 "></i>
                        <strong> تخصيص مادة لعضو هيئة تدريس
                        </strong>
                    </h4>
                    <form class="m-t-40" novalidate
                        action="{{ isset($doctorCourse) ? route('doctor_courses.update', $doctorCourse->id) : route('doctor_courses.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($doctorCourse))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم الدكتور</label>
                                    <div class="input-group">
                                        <select name="doctor_id" required class="form-control">
                                            <option value="">اختر الدكتور</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" {{ isset($doctorCourse) && $doctorCourse->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                    {{ $doctor->user->name }} - {{ $doctor->department }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text"><i class="fa fa-book"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>كود المادة</label>
                                    <div class="input-group">
                                        <select name="course_id" required class="form-control">
                                            <option value="">اختر المادة</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    {{ isset($doctorCourse) && $doctorCourse->course_id == $course->id ? 'selected' : '' }}>
                                                    {{ $course->code }} - {{ $course->name_ar }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text"><i class="fa fa-book"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- الأزرار -->
                        <div class="col-md-12 text-center">
                            <!--  الإضافة أو التحديث -->
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-plus"></i> {{ isset($doctorCourse) ? 'تحديث' : 'إضافة' }}
                            </button>
                        </div>
                    </form>
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
