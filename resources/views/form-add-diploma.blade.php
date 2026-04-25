@extends('layout.master')
@section('title', 'ادارة المحتوى')
@section('page-title', 'ادارة الدبلومات')
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
                                الدبلومات
                                الاكاديمية
                            </strong> </h4>
                        <form class="form-horizontal m-t-30" action="{{ route('diplomas.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="form-group text-center">
                                    <img id="preview" src="{{ asset('assets/images/diploma/subj.png') }}"
                                        alt="Profile Picture"
                                        style="width: 300px; height: 150px; object-fit: cover; border: 3px solid #6a7a8c; margin-bottom: 15px;">
                                    <div>
                                        <label class="btn btn-outline-primary mt-2" for="profileImage">
                                            <i class="fas fa-upload"></i> رفع صورة الدبلومة
                                        </label>
                                        <input type="file" name ="img" id="profileImage" accept="image/*"
                                            style="display: none;" onchange="previewImage(event)" required
                                            data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <script>
                                    function previewImage(event) {
                                        const image = document.getElementById('preview');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    }
                                </script>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">كود الدبلومة <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="code" value="كود الدبلومة">
                                            <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">اسم الدبلومة باللغة العربية <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name_ar"
                                                value="اسم الدبلومة بالعربي">
                                            <span class="input-group-text"><i class="fa fa-language"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="form-label">اسم الدبلومة باللغة الانجليزية <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name_en"
                                                    value="اسم الدبلومة  الانجليزي">
                                                <span class="input-group-text"><i class="fa fa-language"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">وصف الدبلومة <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="description"
                                                value="وصف الدبلومة">
                                            <span class="input-group-text"><i class="fa fa-file"></i></span>
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
