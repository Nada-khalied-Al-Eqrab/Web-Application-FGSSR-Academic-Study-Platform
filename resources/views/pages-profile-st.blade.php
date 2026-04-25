@extends('layout.master')
@section('title', 'الصفحة الشخصية')
@section('page-title', 'الصفحة الشخصية')
@section('contant')
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <img src="{{ $student->user->image
                            ? asset('storage/' . $student->user->image)
                            : asset('assets/images/users/default/default.png') }}"
                            class="rounded-circle" width="150" />
                        <h4 class="card-title m-t-10">
                            {{ $student->user->name }}
                        </h4>
                        <h6 class="card-subtitle">
                            {{ $student->diploma->name_ar ?? 'طالب' }}
                        </h6>
                        <h6 class="card-subtitle">
                            ST-{{ $student->user->code }}
                        </h6>
                    </center>
                </div>
                <hr>
                <div class="card-body" style="text-align: center;">
                    <small class="text-muted db">كود الطالب</small>
                    <h6>{{ $student->user->code }}</h6>
                    <br>
                    <small class="text-muted db">رقم الهاتف / واتساب</small>
                    <h6>{{ $student->user->phone }}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" role="tablist" style="margin:auto;">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#current-month">
                            مواد الترم الحالى
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#previous-month">
                            الإعدادات
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="current-month">
                        <div class="card-body text-center">
                            <h4>المواد المسجلة الترم الحالى</h4>
                            <p>
                                فيما يلي قائمة بالمقررات الدراسية التي تقوم بتدريسها خلال الفصل الدراسي
                                الحالي، وذلك لإدارتها ومتابعة محتواها وتحديث ما يلزم للطلاب
                            </p>
                            <div class="card-body text-center">
                                @if ($student->courses->count() > 0)
                                    <ul class="m-b-0">
                                        @foreach ($student->courses as $course)
                                            <li class="list-group-item">
                                                <span class="badge badge-pill float-left">
                                                    <img src="../assets/images/diploma/subj/main_subj.jpg" alt="user"
                                                        width="20" class="rounded-circle float-left">
                                                </span>
                                                <span
                                                    class="badge badge-pill badge-primary float-left">{{ $course->code }}</span>&nbsp;&nbsp;
                                                <span
                                                    class="badge badge-pill badge-primary float-left">{{ $course->language }}</span>
                                                <span class="todo-desc">{{ $course->name_ar }}</span>
                                                <a href="{{ route('courses.show', $course->id) }}"
                                                    class="float-left badge badge-pill badge-secondary">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <form
                                                    action="{{ route('student.courses.destroy', [$student->id, $course->id]) }}"
                                                    method="POST" class="float-right">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="badge badge-pill badge-secondary   border-0  "
                                                        style="outline: none;"><i class="ti-trash"></i> حذف</button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="card-body" style="text-align: center;">
                                        <a href="https://csds.cu.edu.eg/ISSR_Student/" class="btn btn-primary"
                                            style="border-radius: 30px;">
                                            <i class="icon-globe"></i> منصة تسجيل المواد و نتائج الامتحانات
                                        </a>
                                    </div>
                                @else
                                    <ul class="m-b-0">
                                        <li class="list-group-item text-muted">
                                            رجاءا عليك اختيار المواد التى سجلتها هذا الترم ليظهر لك المنهج الدراسى الخاص بكل
                                            مادة
                                            <br>
                                            <strong>ملاحظة: </strong> تسجيل موادك فى هذة المنصى لا يعنى اختيارها فعليا، بل
                                            هو من
                                            اجل عرض المنهج الدراسى لها، ان كنت لم تسجل المواد فى منصة تسجيل المواد عليك اولا
                                            التسجيل فيها من خلال الرابط التالى
                                            <a
                                                href="https://csds.cu.edu.eg/ISSR_Student/">https://csds.cu.edu.eg/ISSR_Student/</a>
                                        </li>
                                    </ul>
                                    <div class="card-body text-center">
                                        <a href="{{ route('student.courses.create', $student->id) }}"
                                            class="btn btn-primary" style="border-radius: 30px;">
                                            <i class="icon-check"></i> اختار مود الترم الحالى
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month">
                        <div class="card-body" style="direction: rtl; text-align:right;">
                            <form method="POST" action="{{ route('profile.st.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group text-center">
                                    <img id="preview"
                                        src="{{ $student->user->image
                                            ? asset('storage/' . $student->user->image)
                                            : asset('assets/images/users/default/default.png') }}"
                                        style="width:150px;height:150px;border-radius:50%;
                                    object-fit:cover;border:3px solid #6a7a8c;margin-bottom:15px;">
                                    <div>
                                        <label class="btn btn-outline-primary mt-2">
                                            <i class="fas fa-upload"></i> رفع صورة شخصية
                                            <input type="file" name="image" hidden onchange="previewImage(event)">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الاسم</label>
                                    <input type="text" name="name" value="{{ old('name', $student->user->name) }}"
                                        class="form-control form-control-line">
                                </div>
                                <div class="form-group">
                                    <label>رقم الهاتف (يفضل واتساب)</label>
                                    <input type="text" name="phone" value="{{ old('phone', $student->user->phone) }}"
                                        class="form-control form-control-line">
                                </div>
                                <div class="form-group">
                                    <label>عدد المواد المجتازة</label>
                                    <input type="number" name="courses_completed" min="0"
                                        value="{{ old('courses_completed', $student->courses_completed) }}"
                                        class="form-control form-control-line">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary">
                                        تحديث
                                    </button>
                                </div>
                            </form>
                            <div class="card-body text-center">
                                <a href="{{ route('student.courses.create', $student->id) }}" class="btn btn-primary"
                                    style="border-radius: 30px;">
                                    <i class="icon-check"></i> اختار مود الترم الحالى
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            document.getElementById('preview').src =
                URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
