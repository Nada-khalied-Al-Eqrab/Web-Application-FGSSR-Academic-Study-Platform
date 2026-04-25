@extends('layout.master')
@section('title', ' ادارة نظام المستخدمين ')
@section('page-title', 'المنهج الدراسى للمواد ')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @include('partial.banner')
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- Example -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="direction: rtl; justify-content: right; text-align: right;">
                            <h4 class="card-title" style="text-align: center;"> <i class="mdi mdi-book font-20 "></i>
                                <strong> المنهج الدراسى </strong>
                            </h4>
                            <form class="m-t-40" novalidate
                                action="{{ isset($material) ? route('materials.update', $material->id) : route('materials.store') }}"
                                method="POST">
                                @csrf
                                @if (isset($material))
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="filesLink"> المادة </label>
                                            <div class="input-group">
                                                <select class="form-control" name="course_id" required
                                                    data-validation-required-message="This field is required ">
                                                    <option value=""> </option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}"
                                                            {{ isset($material) && $material->course_id == $course->id ? 'selected' : '' }}>
                                                            {{ $course->code }} - {{ $course->name_ar }}
                                                        </option>
                                                    @endforeach
                                                    </span>
                                                </select>
                                                <span class="input-group-text"><i class="fa fa-book"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="filesLink">رابط درايف ملفات المحاضرات:</label>
                                            <div class="input-group">
                                                <input type="url" class="form-control" id="filesLink" name="files_link"
                                                    value="{{ isset($material) ? $material->files_link : '' }}">
                                                <span class="input-group-text"><i class="fa fa-link"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="videosLink">رابط فيديوهات المحاضرات:</label>
                                            <div class="input-group">
                                                <input type="url" class="form-control" id="videosLink"
                                                    name="videos_link"
                                                    value="{{ isset($material) ? $material->videos_link : '' }}">
                                                <span class="input-group-text"><i class="fa fa-link"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="onlineLink">رابط المحاضرات الأونلاين:</label>
                                            <div class="input-group">
                                                <input type="url" class="form-control" id="onlineLink"
                                                    name="online_link"
                                                    value="{{ isset($material) ? $material->online_link : '' }}">
                                                <span class="input-group-text"><i class="fa fa-link"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">اكتب وصف للمادة:</label>
                                            <div class="input-group">
                                                <textarea name="description" id="description" rows="5" class="form-control">{{ isset($material) ? $material->description : '' }}</textarea>
                                                <span class="input-group-text"><i class="fa fa-file"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center mt-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fas fa-check"></i> {{ isset($material) ? 'تحديث' : 'إضافة' }}
                                            </button>
                                        </div>
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
