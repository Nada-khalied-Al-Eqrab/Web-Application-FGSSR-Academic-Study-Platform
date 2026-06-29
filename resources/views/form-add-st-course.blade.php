@extends('layout.master')
@section('title', 'ادارة المحتوى')
@section('page-title', 'مواد الترم الحالى')
@section('contant')
    <div class="container-fluid">
        @include('partial.banner')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="direction: rtl; justify-content: right; text-align: right;">
                        <h4 class="card-title" style="text-align: center;">
                            <i class="mdi mdi-lightbulb-on-outline font-20"></i>
                            <strong>مواد الترم الحالى</strong>
                        </h4>
                        <form class="form-horizontal m-t-30" action="{{ route('student.courses.store', $student->id) }}"
                            method="POST">
                            @csrf
                            <div class="row justify-content-center  text-center">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="form-label">كود المادة</label>
                                        <div class="input-group">
                                            <select class="form-control text-center" name="course_id" required>
                                                <option value="">-- اختر المادة --</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">
                                                        {{ $course->code }} - {{ $course->name_ar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text">
                                                <i class="fa fa-tasks"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">
                                    حفظ المادة
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
