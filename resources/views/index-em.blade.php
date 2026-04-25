@extends('layout.master')
@section('title', 'المنصة الدراسية الالكترونية ')
@section('page-title', 'الصفحة الرأيسية ')
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
                                    <i class="mdi mdi-account-multiple font-20 text-muted"></i>
                                    <p class="font-16 m-b-5"> عدد الطلاب</p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right">{{ $studentsCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <i class="mdi mdi-account-circle font-20 text-muted"></i>
                                    <p class="font-16 m-b-5"> عدد الدكاترة و المعيدين </p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right">{{ $doctorsCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;"
                                    aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <i class="mdi mdi-account-edit font-20 text-muted"></i>
                                    <p class="font-16 m-b-5"> عدد الموظفين </p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right">{{ $adminsCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;"
                                    aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <i class="mdi mdi-animation font-20 text-muted"></i>
                                    <p class="font-16 m-b-5"> اجمالى عدد الدبلومات </p>
                                </div>
                                <div class="ml-auto">
                                    <h1 class="font-light text-right">{{ $diplomasCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!--  chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12" id="diploma">
                    <h4 class="m-b-20" style="text-align: right;">حول المنصة </h4>
                </div>
                <!-- Row -->
                <div class="row" style="text-align: center;">
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-inverse">
                            <div class="card-body">
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="mdi mdi-widgets font-20 text-white"></i>
                                            <p class="text-white">بيانات الطالب</p>
                                            <h3 class="text-white font-medium">يمكنك الاطلاع على <span class="font-bold">
                                                    جميع بيانات </span> الطلاب فى كل دبلومة
                                            </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('students.index') }}" style="color: white;">
                                                        عرض
                                                        بيانات الطلاب
                                                    </a></button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="mdi mdi-widgets font-20 text-white"></i>
                                            <p class="text-white">بيانات الدكاترة و المعيدين</p>
                                            <h3 class="text-white font-medium">يمكنك الاطلاع على <span class="font-bold">
                                                    جميع بيانات </span> الدكاترة و المعيدين
                                            </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('doctors.index') }}" style="color: white;">
                                                        عرض
                                                        بيانات الدكاترة
                                                    </a> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-inverse">
                            <div class="card-body">
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="mdi mdi-transcribe-close font-20 text-white"></i>
                                            <p class="text-white"> الجداول الدراسية</p>
                                            <h3 class="text-white font-medium">يمكنك اضافة جدول <span class="font-bold">
                                                    دراسى خاص </span> بمواد كل دبلومة </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('lecture.form') }}" style="color: white;">
                                                        اضافة
                                                        جدول
                                                    </a> </button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="mdi mdi-transcribe-close font-20 text-white"></i>
                                            <p class="text-white"> جداول الامتحانات </p>
                                            <h3 class="text-white font-medium">يمكنك اضافة جدول <span class="font-bold">
                                                    امتحانات خاص </span> بمواد كل دبلومة
                                            </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('exame.form') }}" style="color: white;">
                                                        اضافة جدول
                                                    </a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-inverse">
                            <div class="card-body">
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="mdi mdi-relative-scale font-20 text-white"></i>
                                            <p class="text-white"> ملفات المنصة </p>
                                            <h3 class="text-white font-medium">يمكنك اضافة و تعديل <span
                                                    class="font-bold"> الملفات المهمة </span> الخاصة بالكلية
                                            </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('createfile') }}" style="color: white;">
                                                        اضف ملف الان
                                                    </a> </button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="mdi mdi-relative-scale font-20 text-white"></i>
                                            <p class="text-white"> تخصيص دكتور لكل مادة </p>
                                            <h3 class="text-white font-medium">يمكنك اضافة او حذف <span class="font-bold">
                                                    دكتور مادة </span> من مواد اى دبلومة
                                            </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('doctor_courses.create') }}" style="color: white;">
                                                        اضافة دكتور
                                                    </a> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-inverse">
                            <div class="card-body">
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="mdi mdi-account-key font-20 text-white"></i>
                                            <p class="text-white">حسابات الطلاب</p>
                                            <h3 class="text-white font-medium">يمكنك اضافة او حذف <span class="font-bold">
                                                    حسابات الطلاب </span> فى كل دبلومة
                                            </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('students.index') }}" style="color: white;">
                                                        اطلع الان
                                                    </a></button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="mdi mdi-account-key font-20 text-white"></i>
                                            <p class="text-white"> حسابات اعضاء هيئة التدريس </p>
                                            <h3 class="text-white font-medium">يمكنك اضافة او حذف <span class="font-bold">
                                                    حسابات الدكاترة و المعيدين </span> لكل
                                                الاقسام
                                            </h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">
                                                    <a href="{{ route('doctors.index') }}" style="color: white;">
                                                        اطلع الان
                                                    </a> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- Row -->
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <div class="row">
                            <div class="col-lg-3 col-md-2"><br><img src="{{ asset('assets/images/platform.png') }}"
                                    class="img-fluid" style="width: 600; height:200px;justify-content: center;" />
                            </div>
                            <div class="col-lg-8 col-md-9" id="slimtest1" style="height: 250px;">
                                <div>
                                    <!-- <div class="col-md-6"> -->
                                    <h4 class="card-title"><strong>المنصة الدراسية الالكترونية لكلية الدراسات
                                            العليا للبحوث الاحصائية</strong></h4>
                                    <a class="popup-youtube btn btn-danger"
                                        href="https://www.youtube.com/watch?v=9q6lVMEKgIo&t=9081s"> <i
                                            class="mdi mdi-play-circle-outline"></i> ارشادات الاستخدام
                                        المنصة </a>
                                    <!-- </div> -->
                                    <br>
                                    <br>
                                    <p>
                                        مرحباً بك في المنصة التعليمية الخاصة بـ <strong>كلية الدراسات العليا
                                            للبحوث الإحصائية – جامعة القاهرة</strong>،
                                        التي تم تطويرها لخدمة الموظفين وتسهيل إدارة العملية التعليمية.
                                    </p>
                                    <p>
                                        تهدف المنصة إلى تمكين الموظف من إدارة بيانات المستخدمين بكفاءة،
                                        سواء كانوا طلاباً، أعضاء هيئة تدريس، أو موظفين داخل الكلية.
                                    </p>
                                    <p>
                                        من خلال المنصة يمكنك إضافة وتحديث المواد الدراسية والجداول الأكاديمية
                                        والامتحانات بشكل مرن يلبي احتياجات العملية التعليمية.
                                    </p>
                                    <p>
                                        توفر المنصة أدوات متكاملة لتوثيق وحفظ البيانات وضمان سهولة الوصول إليها،
                                        مما يقلل من الأخطاء اليدوية ويوفر الوقت والجهد.
                                    </p>
                                    <p>
                                        تسهم المنصة في تعزيز التواصل الفعال بين الإدارة، أعضاء هيئة التدريس،
                                        والطلاب،
                                        مما ينعكس إيجابياً على جودة العملية التعليمية.
                                    </p>
                                    <p>
                                        تعتمد المنصة على أحدث التقنيات في تطوير البرمجيات وقواعد البيانات
                                        لتقديم تجربة استخدام سلسة وسهلة التفاعل.
                                    </p>
                                    <p>
                                        تأتي هذه الجهود في إطار دعم خطة التحول الرقمي في الجامعات المصرية،
                                        ورؤية <strong>مصر الرقمية</strong> لتحقيق تنمية مستدامة في قطاع التعليم
                                        العالي.
                                    </p>
                                    <p>
                                        نؤمن أن هذه المنصة ستكون خطوة مهمة نحو رفع كفاءة الأداء الإداري
                                        والتعليمي،
                                        وتحقيق الاعتماد والجودة على المستويين المحلي والدولي.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="m-b-20" style="text-align: right;">ادوات ادارة المنصة</h4>
                    <div class="row draggable-cards" id="draggable-area"
                        style="justify-content: center; text-align:center;">
                        <div class="col-md-6 col-sm-12">
                            <div class="card  card-hover">
                                <div class="card-header bg-inverse">
                                    <h4 class="m-b-0 text-white"> <i class="mdi mdi-account-key font-20 text-white"></i>
                                        ادارة نظام
                                        المستخدمين</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        يمكنك الان التعامل بحرية مع بيانات المستخدم و الاضافة و الحذف و التعديل
                                        عليها .
                                    </p>
                                    <a class=" btn btn-secondary" href="{{ route('doctors.create') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة دكتور
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('students.create') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة طالب
                                    </a>
                                    @if ($admin->type === 'super')
                                        <a class=" btn btn-secondary" href="{{ route('admins.create') }}"> <i
                                                class="mdi mdi-cards-variant"></i>
                                            اضافة موظف
                                        </a>
                                    @endif
                                    <br>
                                    <br>
                                    <a class=" btn btn-secondary" href="{{ route('doctor_courses.create') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة دكتور لمادة دراسية
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('materials.form') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة منهج مادة دراسية
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card  card-hover">
                                <div class="card-header bg-inverse">
                                    <h4 class="m-b-0 text-white"> <i
                                            class="mdi mdi-laptop-windows font-20 text-white"></i> ادارة المحتوى
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        يمكنك الان التعامل بحرية مع بيانات المحتوى و الاضافة و الحذف و التعديل
                                        عليها .
                                    </p>
                                    <a class=" btn btn-secondary" href="{{ route('courses.create') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة مادة دراسية
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('course_diploma.create') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة مادة دراسية الى دبلومة
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('diplomas.create') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة دبلومة
                                    </a>
                                    <br>
                                    <br>
                                    <a class=" btn btn-secondary" href="{{ route('createplace') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة اماكن القاعات و المعامل
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('createfile') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة ملف
                                    </a>
                                    <br>
                                    <br>
                                    <a class=" btn btn-secondary" href="{{ route('lecture.form') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة جدول دراسى
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('exame.form') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        اضافة جدول امتحانات
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card  card-hover">
                                <div class="card-header bg-inverse">
                                    <h4 class="m-b-0 text-white"> <i class="mdi mdi-account-key font-20 text-white"></i>
                                        عرض و تعديل
                                        بينات المستخدمين</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        يمكنك الان الاطلاع على جداول البيانات الخاصة بالمستخدم و التعديل و الحذف
                                        منها و طباعتها .
                                    </p>
                                    <a class=" btn btn-secondary" href="{{ route('doctors.index') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات الدكتور
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('doctor_courses.index') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات الدكاترة الخاصة بكل مادة
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('students.index') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات الطالب
                                    </a>
                                    <br>
                                    <br>
                                    <a class=" btn btn-secondary" href="{{ route('Student_courses.index') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات المواد لكل طالب
                                    </a>
                                    <br><br>
                                    @if ($admin->type === 'super')
                                        <a class=" btn btn-secondary" href="{{ route('admins.index') }}"> <i
                                                class="mdi mdi-cards-variant"></i>
                                            بيانات الموظف
                                        </a>
                                    @endif
                                    <a class=" btn btn-secondary" href="{{ route('table-subj-study') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات مناهج المواد الدراسية
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card  card-hover">
                                <div class="card-header bg-inverse">
                                    <h4 class="m-b-0 text-white"> <i
                                            class="mdi mdi-laptop-windows font-20 text-white"></i> عرض و تعديل
                                        بيانات المحتوى</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        يمكنك الان الاطلاع على جداول البيانات الخاصة بالمحتوى و التعديل و الحذف
                                        منها و طباعتها .
                                    </p>
                                    <a class=" btn btn-secondary" href="{{ route('courses.index') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات المواد الدراسية
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('course_diploma.index') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات المواد الدراسية لكل دبلومة
                                    </a>
                                    <br>
                                    <br>
                                    <a class=" btn btn-secondary" href="{{ route('diplomas.index') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات الدبلومات
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('indexfiles') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات الملفات
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('table-study') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات الجداول الدراسية
                                    </a>
                                    <br><br>
                                    <a class=" btn btn-secondary" href="{{ route('table-ex') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات جداول الامتحانات
                                    </a>
                                    <a class=" btn btn-secondary" href="{{ route('places') }}"> <i
                                            class="mdi mdi-cards-variant"></i>
                                        بيانات اماكن القاعات و المعامل
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    @endsection
