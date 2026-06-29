@extends('layout.master')
@section('title', ' ادارة المحتوى ')
@section('page-title', ' جداول المحاضرات و السكاشن ')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @include('partial.banner')
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="direction: rtl; justify-content: right; text-align: right;">
                        <h4 class="card-title" style="text-align: center;"> <i
                                class="mdi mdi-lightbulb-on-outline font-20 "></i> <strong> المحاضرات و السكاشن
                            </strong> </h4>
                        <form class="form-horizontal m-t-30"
                            action="{{ isset($lecture) ? route('lectures.update', $lecture->id) : route('lectures.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($lecture))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">كود المادة</label>
                                        <div class="input-group">
                                            <select class="form-control" name="course_id" required>
                                                <option value="">اختر المادة</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        {{ isset($lecture) && $lecture->course_id == $course->id ? 'selected' : '' }}>
                                                        {{ $course->code }} - {{ $course->name_ar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">اليوم</label>
                                        <div class="input-group">
                                            <select class="form-control" name="day" required>
                                                <option value="">اختر اليوم</option>
                                                <option value="السبت"
                                                    {{ isset($lecture) && $lecture->day == 'السبت' ? 'selected' : '' }}>
                                                    السبت
                                                </option>
                                                <option value="الاحد"
                                                    {{ isset($lecture) && $lecture->day == 'الاحد' ? 'selected' : '' }}>
                                                    الاحد
                                                </option>
                                                <option value="الاثنين"
                                                    {{ isset($lecture) && $lecture->day == 'الاثنين' ? 'selected' : '' }}>
                                                    الاثنين
                                                </option>
                                                <option value="الثلاثاء"
                                                    {{ isset($lecture) && $lecture->day == 'الثلاثاء' ? 'selected' : '' }}>
                                                    الثلاثاء</option>
                                                <option value="الاربعاء"
                                                    {{ isset($lecture) && $lecture->day == 'الاربعاء' ? 'selected' : '' }}>
                                                    الاربعاء</option>
                                                <option value="الخميس"
                                                    {{ isset($lecture) && $lecture->day == 'الخميس' ? 'selected' : '' }}>
                                                    الخميس
                                                </option>
                                                <option value="الجمعه"
                                                    {{ isset($lecture) && $lecture->day == 'الجمعه' ? 'selected' : '' }}>
                                                    الجمعه
                                                </option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-file"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">وقت بداية المحاضرة</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="start_time"
                                                value="{{ isset($lecture) ? $lecture->start_time : '' }}" required>
                                            <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">وقت نهاية المحاضرة</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="end_time"
                                                value="{{ isset($lecture) ? $lecture->end_time : '' }}" required>
                                            <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">المكان</label>
                                        <div class="input-group">
                                            <select class="form-control" name="place_id" required>
                                                <option value="">اختر المكان</option>
                                                @foreach ($places as $place)
                                                    <option value="{{ $place->id }}"
                                                        {{ isset($lecture) && $lecture->place_id == $place->id ? 'selected' : '' }}>
                                                        {{ $place->build_name }} - {{ $place->hall_name }}
                                                        ({{ $place->floor }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-home"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    @if (isset($lecture))
                                        <button type="submit" class="btn btn-secondary px-4">
                                            <i class="fas fa-edit"></i> تعديل
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-plus"></i> إضافة
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
