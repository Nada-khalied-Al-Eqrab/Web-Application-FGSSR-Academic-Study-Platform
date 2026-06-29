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
                        <form class="form-horizontal m-t-30"
                            action="{{ route('course_diploma.update', $courseDiploma->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="course_id"> المادة <span class="danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="course_id" required>
                                                <option value=""> اختار كود المادة </option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}" @selected(isset($courseDiploma) && $courseDiploma->course_id == $course->id)>
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
                                        <label for="diploma_id"> الدبلومة <span class="danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="diploma_id" required>
                                                <option value=""> اختار الدبلومة</option>
                                                @foreach ($diplomas as $diploma)
                                                    <option value="{{ $diploma->id }}" @selected(isset($courseDiploma) && $courseDiploma->diploma_id == $diploma->id)>
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
                                        <label for="type"> نوع المادة داخل الدبلومة <span
                                                class="danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="type" required>
                                                <option value=""> اختار النوع </option>
                                                <option value="General Requirements" @selected(isset($courseDiploma) && $courseDiploma->type == 'General Requirements')>
                                                    متطلبات عامة
                                                </option>
                                                <option value="Major Field Requirements" @selected(isset($courseDiploma) && $courseDiploma->type == 'Major Field Requirements')>
                                                    المقررات الدراسية الاجبارية
                                                </option>
                                                <option value="Core Electives" @selected(isset($courseDiploma) && $courseDiploma->type == 'Core Electives')>
                                                    المقررات الدراسية الاختيارية
                                                </option>
                                                <option value="Minor" @selected(isset($courseDiploma) && $courseDiploma->type == 'Minor')>
                                                    المقررات الدراسية للتخصصات الفرعية
                                                </option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prerequisite"> متطلبات المادة حسب نوعها <span
                                                class="danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="prerequisite" required>
                                                <option value=""> اختار المتطلب </option>
                                                <option value="No Prerequisite" @selected(isset($courseDiploma) && $courseDiploma->prerequisite == 'No Prerequisite')>
                                                    لا يوجد متطلب
                                                </option>
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
                                    <button type="submit" class="btn btn-secondary px-4">
                                        <i class="fas fa-edit"></i> تحديث
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
