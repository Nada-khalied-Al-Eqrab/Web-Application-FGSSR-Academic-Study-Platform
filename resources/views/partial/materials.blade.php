<div class="col-12">
    <div class="card">
        <div class="card-body" style="text-align: center;">
            <h4 class="card-title"> المنهج الدراسى </h4>
            <p>
                يمكنك الان الاطلاع على المنهج الدراسى بكل سهولة ، و التركيز
                على المذاكرة بشكل اكبر ، كما يمكنك تحميل كل الملفات او
                الفيديوهات الخاصة بهذة المادة مباشرة دول الحاجة للبحث عن
                مصادر خارجية
            </p>
            <div class="row m-t-40" style="text-align: center; justify-content: center;">
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-dark text-center">
                            <span class="input-group-text" style="justify-content: center;"><i class="fa fa-book"></i>
                                ملفات المحاضرات
                            </span>
                            <h1 class="font-light text-white">{{ $course->code }}</h1>
                            <h6 class="text-white"> {{ $course->name_en }} -
                                Lectures </h6>
                            <!--  عرض التفاصيل -->
                            <a href="{{ $material?->files_link ?? '#' }}" class="btn btn-outline-light btn-sm mt-2"> <i
                                    class="fas fa-link"></i> اطلع
                                الان </a>
                            <!-- الـ Modal -->
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-dark text-center">
                            <span class="input-group-text" style="justify-content: center;"><i
                                    class="fa fa-comments"></i>
                                شات التواصل
                            </span>
                            <h1 class="font-light text-white">{{ $course->code }}</h1>
                            <h6 class="text-white"> {{ $course->name_en }} -
                                Chat </h6>
                            <!--  عرض التفاصيل -->
                            <a href="" class="btn btn-outline-light btn-sm mt-2"> <i class="fas fa-link"></i>
                                اطلع
                                الان </a>
                            <!-- الـ Modal -->
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-dark text-center">
                            <span class="input-group-text" style="justify-content: center;"><i
                                    class="mdi mdi-play-circle-outline"></i>
                                فيديوهات المحاضرات
                            </span>
                            <h1 class="font-light text-white">{{ $course->code }}</h1>
                            <h6 class="text-white"> {{ $course->name_en }} -
                                Videos </h6>
                            <!-- زر عرض التفاصيل -->
                            <a href="{{ $material?->videos_link ?? '#' }}" class="btn btn-outline-light btn-sm mt-2"> <i
                                    class="fas fa-link"></i> اطلع
                                الان </a>
                            <!-- الـ Modal -->
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-dark text-center">
                            <span class="input-group-text" style="justify-content: center;"><i class="fa fa-laptop"></i>
                                لينك المحاضرات
                                الاونلاين
                            </span>
                            <h1 class="font-light text-white">{{ $course->code }}</h1>
                            <h6 class="text-white"> {{ $course->name_en }} -
                                Online lecture</h6>
                            <!--  عرض التفاصيل -->
                            <a href="{{ $material?->online_link ?? '#' }}" class="btn btn-outline-light btn-sm mt-2">
                                <i class="fas fa-link"></i> اطلع
                                الان</a>
                            <!-- الـ Modal -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">اعضاء هيئة تدريس المادة</h4>
                    <p>يمكنك الان التواصل على الدكتور الخاص بتدريس هذة
                        المادة ، سواء تواصل مباشر و حضورى داخل الكلية او من
                        خلال شات المادة
                    </p>
                    <div class="container-fluid">
                        <div class="row el-element-overlay"
                            style=" display: flex; align-items: center;justify-content: center;">
                            <!-- الكارت -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card"
                                    style="background-color: #32383e; text-align: center; color: white; border-radius: 12px;">
                                    <div class="el-card-item">
                                        <div class="el-card-content p-3">
                                            <h4 class="m-b-0">د/ صلاح مهدى
                                            </h4>
                                            <span class="text-muted">قسم
                                                الإحصاء</span>
                                            <br><br>
                                            <!-- زر عرض التفاصيل -->
                                            <button class="btn btn-outline-light btn-sm mt-2" data-toggle="modal"
                                                data-target="#doctorModal">
                                                <i class="fas fa-info-circle"></i>
                                                عرض التفاصيل
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- الـ Modal -->
                            <div class="modal fade" id="doctorModal" tabindex="-1" role="dialog"
                                aria-labelledby="doctorModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content"
                                        style="background-color: #2b2f36; color: #f1f1f1; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.6);">
                                        <!-- الهيدر -->
                                        <div class="modal-header border-0 text-center w-100">
                                            <h5 class="modal-title w-100" id="doctorModalLabel" style="color: #ffffff;">
                                                معلومات
                                                الدكتور</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close" style="position: absolute; left: 15px; top: 15px;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- البادي -->
                                        <div class="modal-body text-center">
                                            <img src="../assets/images/users/dr/salah.jpg" alt="user"
                                                class="rounded-circle mb-3" width="120" height="120"
                                                style="border: 3px solid #6a7a8c; box-shadow: 0px 4px 12px rgba(0,0,0,0.5);">
                                            <h4 style="color: #ffffff;">د/
                                                صلاح
                                                مهدى
                                            </h4>
                                            <p class="text-muted">قسم
                                                الإحصاء
                                            </p>
                                            <hr style="border-color: #444;">
                                            <p>
                                                <strong>مكان المكتب</strong>
                                                <i class="fas fa-map-marker-alt text-info"></i>
                                                <br>
                                                المبنى الأساسي - الدور
                                                الرابع
                                            </p>
                                            <p>
                                                <strong>الساعات
                                                    المكتبية</strong> <i class="fas fa-clock text-warning"></i>
                                                <br>
                                                from 05:00pm to 07:00pm
                                            </p>
                                            <p>
                                                <strong>الهاتف /
                                                    واتساب</strong>
                                                <i class="fas fa-phone text-success"></i>
                                                <br>
                                                +(20) 1034688362
                                            </p>
                                        </div>
                                        <!-- الفوتر -->
                                        <div class="modal-footer justify-content-center border-0">
                                            <button type="button" class="btn btn-outline-light"
                                                data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
