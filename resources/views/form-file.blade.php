@extends('layout.master')
@section('title', 'ادارة المحتوى ')
@section('page-title', 'الملفات المهمة ')
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
                    <h4 class="card-title" style="text-align: center;"> <i class="mdi mdi-book font-20 "></i>
                        <strong>
                            ملفات مهمة
                        </strong>
                    </h4>
                    <form class="m-t-40" novalidate
                        action="{{ isset($file) ? route('updatefile', $file->id) : route('storefile') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($file))
                            @method('put')
                        @endif
                        <div class="form-group text-center">
                            <h5 class="mb-3">رفع الملف <span class="text-danger">*</span></h5>
                            <input type="file" id="fileInput" name="file_link" class="d-none"
                                {{ isset($file) ? '' : 'required' }}>
                            <label for="fileInput" class="btn btn-outline-primary btn-lg shadow-sm">
                                <i class="fas fa-upload"></i> {{ isset($file) ? 'اختر ملفا جديديا' : 'اختر ملف' }}
                            </label>
                            <p id="fileName" class="mt-2 text-muted" style="font-style: italic;">
                                {{ isset($file) ? 'الملف الحالى :' . $file->file_link : 'لم يتم الاختيار بعد ' }}
                            </p>
                            @if (isset($file))
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2">الملف الحالي:</h6>
                                    <p class="text-muted">{{ $file->file_link }}</p>
                                    <iframe src="{{ asset('assets/FSSR_files/' . $file->file_link) }}" width="100%"
                                        height="400px" style="border:none;">
                                    </iframe>
                                    <p class="mt-2 text-info" style="font-style: italic;">
                                        يمكنك رفع ملف جديد ليتم استبداله بالملف الحالي.
                                    </p>
                                </div>
                            @endif
                        </div>
                        <div class="modal fade" id="fileModal" tabindex="-1" role="dialog"
                            aria-labelledby="fileModalLabel" aria-hidden="true" style="direction: ltr;">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fileModalLabel">معاينة الملف</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <iframe id="filePreview" src="" width="100%" height="600px"
                                            style="border: none;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- JS -->
                        <script>
                            document.getElementById("fileInput").addEventListener("change", function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    document.getElementById("fileName").textContent = "📂 " + file.name;
                                    const fileURL = URL.createObjectURL(file);
                                    document.getElementById("filePreview").src = fileURL;
                                    $('#fileModal').modal('show');
                                } else {
                                    document.getElementById("fileName").textContent = "لم يتم اختيار ملف بعد";
                                }
                            });
                        </script>
                        <div class="form-group">
                            <h5>اسم الملف <span class="text-danger">*</span></h5>
                            <div class="controls input-group">
                                <input type="text" name="name" class="form-control" required
                                    data-validation-required-message="This field is required"
                                    value="{{ old('name', $file->name ?? '') }}">
                                <span class="input-group-text"><i class="fa fa-book"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>وصف الملف <span class="text-danger">*</span></h5>
                            <div class="controls input-group">
                                <textarea name="description" id="textarea" class="form-control" required placeholder="وصف الملف ">{{ old('description', $file->description ?? '') }}</textarea>
                                <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ isset($file) ? 'تحديث' : 'إضافة' }}
                                </button>
                            </div>
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
