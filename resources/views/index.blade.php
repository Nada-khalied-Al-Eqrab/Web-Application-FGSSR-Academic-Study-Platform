@extends('layout.master')
@section('title', 'المنصة الدراسية الالكترونية ')
@section('page-title', 'الصفحة الرأيسية')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-emoticon font-20 text-muted"></i>
                                    <p class="font-16 m-b-5">المواد المسجلة حاليا</p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right">{{ $registeredCoursesCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;"
                                    aria-valuenow="{{ $registeredCoursesCount }}" aria-valuemin="0" aria-valuemax="6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-emoticon-cool font-20 text-muted"></i>
                                    <p class="font-16 m-b-5">المواد التى تم اجتيازها </p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right"> {{ $student->courses_completed }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;"
                                    aria-valuenow=" {{ $student->courses_completed }}" aria-valuemin="0" aria-valuemax="20">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-emoticon-neutral font-20 text-muted"></i>
                                    <p class="font-16 m-b-5">المواد المتبقية</p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right">{{ $remainingCourses }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;"
                                    aria-valuenow="{{ $remainingCourses }}" aria-valuemin="0" aria-valuemax="20"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <i class="mdi mdi-emoticon-happy font-20 text-muted"></i>
                                    <p class="font-16 m-b-5">اجمالى مواد الدبلومة</p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right">{{ $totalCourses }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;"
                                    aria-valuenow="{{ $totalCourses }}" aria-valuemin="0"
                                    aria-valuemax="{{ $totalCourses }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row" dir="rtl">
                <div class="col-12" id="diploma">
                    @include('partial.diploma', ['diplomas' => $diplomas])
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="m-b-20" style="text-align: right;">ملفات ارشادية </h4>
                            <div class="card" style="justify-content: center;text-align: center;">
                                <div class="card-body " id="files">
                                    <h4 class="card-title ">ملفات مهمة </h4>
                                    <h5 class="card-subtitle">يمكنك الاطلاع على اهم الملفات الخاصة بالكلية </h5>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">اسم الملف</th>
                                                    <th class="border-top-0">وصف الملف</th>
                                                    <th class="border-top-0">مشاهدة الملف</th>
                                                    <th class="border-top-0">تحميل الملف</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($files as $file)
                                                    <tr>
                                                        <td> <span class="round label-primary"><i class="ti-file "></i>
                                                            </span>
                                                            {{ $file->name }}</td>
                                                        <td>
                                                            <h6><a href="{{ route('showfile', ['id' => $file->id]) }}"
                                                                    class="link">ملف
                                                                    {{ $file->description }}</a></h6>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('showfile', ['id' => $file->id]) }}"
                                                                class="link"><i class="ti-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ asset('assets/FSSR_files/' . $file->file_link) }}"
                                                                class="link" download><i class="ti-download"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- Recent comment   -->
                    <!-- ============================================================== -->
                    <h4 class="m-b-20" style="text-align: right;">المواد الدراسية </h4>
                    <div class="row" dir="rtl">
                        <!-- column -->
                        <div class="col-lg-6">
                            <div class="card" style="justify-content: center;text-align: center;">
                                <div class="card-body btn-dark">
                                    <h4 class="card-title">مواد متطلبات الدبلومة لكل الاقسام</h4>
                                </div>
                                <div class="comment-widgets scrollable" style="height:430px;">
                                    <h4>{{ $student->diploma ? $student->diploma->name_ar : 'لا يوجد دبلومة' }}
                                        ({{ $student->diploma ? $student->diploma->name_en : '' }})
                                    </h4>
                                    @forelse($coursesByType as $course)
                                        <div class="d-flex flex-row comment-row">
                                            <div class="comment-text w-100">
                                                <div class="p-2">
                                                    <img src="{{ $course->img && str_starts_with($course->img, 'assets/')
                                                        ? asset($course->img)
                                                        : ($course->img
                                                            ? asset('storage/' . $course->img)
                                                            : asset('assets/images/diploma/subj/General/default.png')) }}"
                                                        alt="{{ $course->name_ar }}" width="50" height="50"
                                                        class="rounded-circle">
                                                </div>
                                                <h6 class="font-medium"><strong>{{ $course->name_ar }}</strong></h6>
                                                <span class="m-b-15 d-block">{{ $course->description }}</span>
                                                <div class="comment-footer">
                                                    <span class="label label-rounded label-danger">
                                                        <a href="{{ route('courses.show', $course->id) }}"
                                                            class="link">
                                                            <i class="ti-eye" style="color: white;"></i>
                                                        </a>
                                                    </span>
                                                    <span
                                                        class="label label-rounded label-danger">{{ $course->language }}</span>
                                                    <span
                                                        class="label label-rounded label-danger">{{ $course->code }}</span>
                                                    <span
                                                        class="label label-rounded label-danger">{{ $course->name_en }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>لا توجد مواد متطلبات الدبلومة لهذا الطالب.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-lg-6">
                            <div class="card" style="justify-content: center;text-align: center;">
                                <div class="card-body btn-dark">
                                    <h4 class="card-title">المواد المسجلة الترم الحالى </h4>
                                </div>
                                <div class="comment-widgets scrollable" style="height:430px;">
                                    @forelse($student->courses as $course)
                                        <div class="d-flex flex-row comment-row">
                                            <div class="comment-text w-100">
                                                <div class="p-2">
                                                    <img src="{{ $course->img && str_starts_with($course->img, 'assets/')
                                                        ? asset($course->img)
                                                        : ($course->img
                                                            ? asset('storage/' . $course->img)
                                                            : asset('assets/images/diploma/subj/General/default.png')) }}"
                                                        alt="{{ $course->name_ar }}" width="50" height="50"
                                                        class="rounded-circle">
                                                </div>
                                                <h6 class="font-medium"><strong>{{ $course->name_ar }}</strong></h6>
                                                <span class="m-b-15 d-block">{{ $course->description }}</span>
                                                <div class="comment-footer">
                                                    <span class="label label-rounded label-danger">
                                                        <a href="{{ route('courses.show', $course->id) }}"
                                                            class="link">
                                                            <i class="ti-eye" style="color: white;"></i>
                                                        </a>
                                                    </span>
                                                    <span
                                                        class="label label-rounded label-primary">{{ $course->language }}</span>
                                                    <span
                                                        class="label label-rounded label-success">{{ $course->code }}</span>
                                                    <span
                                                        class="label label-rounded label-info">{{ $course->name_en }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <br> <br>
                                        <p> رجاءً عليك اختيار المواد التي سجلتها هذا الترم ليظهر لك المنهج الدراسي الخاص بكل
                                            مادة
                                        </p>
                                        <br>
                                        <strong>ملاحظة:</strong>
                                        <p>
                                            تسجيل موادك في هذه المنصة لا يعني اختيارها فعليًا، بل هو فقط
                                            لعرض المنهج الدراسي.
                                        </p>
                                        <br>
                                        <p> إن لم تقم بتسجيل المواد على منصة التسجيل الرسمية، يرجى التسجيل أولًا من خلال:
                                        </p>
                                        <br>
                                        <a href="https://csds.cu.edu.eg/ISSR_Student/" target="_blank">
                                            https://csds.cu.edu.eg/ISSR_Student/
                                        </a>
                                        <div class="card-body text-center">
                                            <a href="{{ route('student.courses.create', $student->id) }}"
                                                class="btn btn-primary" style="border-radius: 30px;">
                                                <i class="icon-check"></i> اختار مواد الترم الحالي
                                            </a>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
