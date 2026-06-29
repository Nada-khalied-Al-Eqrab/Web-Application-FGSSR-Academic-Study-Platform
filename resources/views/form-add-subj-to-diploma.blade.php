@extends('layout.master')
@section('title', 'ادارة المحتوى')
@section('page-title', 'ادارة المواد حسب كل دبلومة')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @include('partial.banner')
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="direction: rtl; justify-content: right; text-align: right;">
                        <h4 class="card-title" style="text-align: center;"> <i class="mdi mdi-library font-20 "></i> <strong>
                                تخصيص مادة لدبلومة
                            </strong> </h4>
                        <form class="form-horizontal m-t-30" action="{{ route('course_diploma.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wlocation2"> المادة <span class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select class="form-control" name="course_id" required
                                                data-validation-required-message="This field is required">
                                                <option value=""> اختار كود المادة </option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">
                                                        {{ $course->code }} — {{ $course->name_ar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wlocation2"> الدبلومة <span class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select class="form-control" name="diploma_id" required
                                                data-validation-required-message="This field is required">
                                                <option value=""> اختار الدبلومة</option>
                                                @foreach ($diplomas as $diploma)
                                                    <option value="{{ $diploma->id }}">
                                                        {{ $diploma->code }} — {{ $diploma->name_ar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wlocation2"> نوع المادة داخل الدبلومة <span class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select class="form-control" name="type" required
                                                data-validation-required-message="This field is required">
                                                <option value=""> اختار النوع </option>
                                                <option value="General Requirements"> متطلبات عامة</option>
                                                <option value="Major Field Requirements"> المقررات الدراسية الاجبارية
                                                </option>
                                                <option value="Core Electives"> المقررات الدراسية الاختيارية</option>
                                                <option value="Minor"> المقررات الدراسية للتخصصات الفرعية</option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wlocation2"> متطلبات المادة حسب نوعها <span class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select class="form-control" name="prerequisite" required
                                                data-validation-required-message="This field is required">
                                                <option value=""> اختار المتطلب </option>
                                                <option value="No Prerequisite"> ليس لها متطلب </option>
                                                @foreach ($courses as $course)
                                                    @php
                                                        $text = 'Prerequisite ' . $course->code;
                                                    @endphp
                                                    <option value="{{ $text }}" @selected(isset($courseDiploma) && $courseDiploma->prerequisite == $text)>
                                                        {{ $text }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-plus"></i> إضافة
                                    </button>
                                </div>
                            </div>
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
