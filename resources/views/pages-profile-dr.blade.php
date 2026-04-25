@extends('layout.master')

@section('title', 'الصفحة الشخصية')
@section('page-title', 'الصفحة الشخصية')

@section('contant')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img src="{{ $doctor->user->image
                                ? asset('storage/' . $doctor->user->image)
                                : asset('assets/images/users/default/default.png') }}"
                                class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10">{{ $doctor->user->name }}</h4>
                            <h6 class="card-subtitle">{{ $doctor->academic_degree }}</h6>
                            <h6 class="card-subtitle">{{ $doctor->department }} - جامعة القاهرة</h6>
                            <h6 class="card-subtitle">DR - {{ $doctor->user->code }}</h6>
                        </center>
                    </div>
                    <hr>
                    <div class="card-body text-center">
                        <small class="text-muted db">مكان المكتب</small>
                        <h6>{{ $doctor->place->build_name }} - الدور {{ $doctor->place->floor }}</h6>
                        <br>
                        <small class="text-muted">الساعات المكتبية</small>
                        <h6>from {{ $doctor->office_hours_from }} to {{ $doctor->office_hours_to }}</h6>
                        <br>
                        <small class="text-muted db">رقم الهاتف / واتساب</small>
                        <h6>{{ $doctor->user->phone }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#current-month" role="tab">
                                مواد الترم الحالى
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#previous-month" role="tab">
                                الإعدادات
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel">
                            <div class="card-body">
                                <h4 class="text-center">المواد المسجلة الترم الحالى</h4>
                                <p class="text-center">
                                    فيما يلي قائمة بالمقررات الدراسية التي تقوم بتدريسها خلال الفصل الدراسي الحالي
                                </p>
                                <hr>
                                <div class="profiletimeline m-t-0">
                                    @foreach ($doctor->doctorCourses as $dc)
                                        <div class="sl-item">
                                            <div class="sl-left">
                                                <img src="{{ asset('assets/images/diploma/subj/main_subj.jpg') }}"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="sl-right">
                                                <div>
                                                    <a href="javascript:void(0)" class="link">
                                                        {{ $dc->course->code }}
                                                    </a>
                                                    <span class="sl-date">
                                                        {{ $dc->course->name_en ?? '' }}
                                                    </span>
                                                    <div class="m-t-20 row text-center">
                                                        <div class="col-md-3">
                                                            <img src="{{ asset($dc->course->img_url ?? 'assets/images/diploma/subj/main_subj.jpg') }}"
                                                                class="img-fluid rounded" />
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h4>{{ $dc->course->name_ar }}</h4>
                                                            <p>
                                                                يمكنك من هنا إدارة هذا المقرر، عرض التفاصيل،
                                                                وتحديث المحتوى والطلاب.
                                                            </p>
                                                            <a href="{{ route('courses.show', $dc->course->id) }}"
                                                                class="btn btn-primary" style="border-radius: 30px;">صفحة
                                                                المادة <i class="ti-eye"></i></a>
                                                            <a href="{{ route('Student_courses.show', $dc->course->id) }}"
                                                                class="btn btn-primary" style="border-radius: 30px;">الطلاب
                                                                المسجلين <i class="ti-eye"></i></a>
                                                            <a href="{{ route('materials.form') }}" class="btn btn-primary"
                                                                style="border-radius: 30px;"> اضافة
                                                                المنهج الدراسى <i class="ti-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel">
                            <div class="card-body" style="direction: rtl;">
                                <form method="POST" action="{{ route('profile.dr.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group text-center">
                                        <img id="preview"
                                            src="{{ $doctor->user->image
                                                ? asset('storage/' . $doctor->user->image)
                                                : asset('assets/images/users/default/default.png') }}"
                                            style="width:150px;height:150px;border-radius:50%;object-fit:cover;border:3px solid #6a7a8c">
                                        <div class="mt-2">
                                            <label class="btn btn-outline-primary">
                                                <i class="fas fa-upload"></i> رفع صورة شخصية
                                                <input type="file" name="image" hidden onchange="previewImage(event)">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <label>الاسم</label>
                                        <input type="text" name="name" value="{{ old('name', $doctor->user->name) }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group text-right">
                                        <label>رقم الهاتف</label>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', $doctor->user->phone) }}" class="form-control">
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary px-4">
                                            تحديث البيانات
                                        </button>
                                    </div>
                                </form>
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
