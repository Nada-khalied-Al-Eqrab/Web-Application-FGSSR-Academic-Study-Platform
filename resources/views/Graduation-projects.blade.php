@extends('layout.master')
@section('title', 'حول مشاريع التخرج')
@section('page-title', 'مشاريع التخرج')
@section('contant')
    <div class="container-fluid" dir="rtl">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('assets/images/diploma/subj/PP/PP502.png') }}" alt="Card image cap"
                        style="max-height: 450px">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center"><strong>حول مشاريع التخرج</strong></h4>
                        <p>تُعد مشاريع التخرج أحد الركائز الأساسية في العملية التعليمية بالكلية، حيث تمنح الطالب فرصة لتطبيق
                            ما تعلمه من معارف ومهارات على أرض الواقع من خلال تنفيذ مشروع عملي أو بحثي تحت إشراف أعضاء هيئة
                            التدريس. تهدف هذه المشاريع إلى صقل مهارات الطلاب في البحث العلمي، التحليل، البرمجة، التصميم،
                            وإدارة المشروعات، بما يؤهلهم للعمل في سوق العمل أو استكمال الدراسات العليا.</p>

                        <ul class="nav nav-tabs justify-content-center" id="graduationTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-center" id="projects-tab" data-toggle="tab" href="#projects"
                                    role="tab" aria-controls="projects" aria-selected="true">المشاريع حسب الدبلومات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" id="conditions-tab" data-toggle="tab" href="#conditions"
                                    role="tab" aria-controls="conditions" aria-selected="false">شروط التقديم</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" id="steps-tab" data-toggle="tab" href="#steps"
                                    role="tab" aria-controls="steps" aria-selected="false">خطوات المشروع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" id="supervisors-tab" data-toggle="tab" href="#supervisors"
                                    role="tab" aria-controls="supervisors" aria-selected="false">هيئة الإشراف على
                                    المشاريع</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="graduationTabContent">
                            <!-- المشاريع حسب الدبلومات -->
                            <div class="tab-pane fade show active" id="projects" role="tabpanel"
                                aria-labelledby="projects-tab">
                                <section style="text-align: right; overflow: hidden;">
                                    <img src="{{ asset('assets/images/diploma/subj/PP/PP502.png') }}"
                                        class="img-fluid float-left"
                                        style="width:300px; height:200px; margin-right:15px; margin-bottom:15px;" />
                                    <h3> الدبلومات التالية ملزمة بتقديم مشروع تخرج</h3>
                                    <p><strong>دبلوم علوم الحاسب</strong> يركز على تطوير أنظمة برمجية، تطبيقات ويب، الذكاء
                                        الاصطناعي، التعلم الآلي، وتحليل البيانات <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <p><strong>دبلوم تكنولوجيا ونظم المعلومات</strong> تهتم بمشاريع إدارة قواعد البيانات،
                                        نظم المعلومات الإدارية، نظم دعم القرار، وتكامل الأنظمة <i
                                            class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                    <p><strong>دبلوم الإحصاء والإحصاء الحيوي والسكاني</strong> يتناول مشاريع التحليل
                                        الإحصائي للبيانات، الدراسات السكانية، والنماذج الإحصائية <i
                                            class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                    <p><strong>دبلوم بحوث العمليات وإدارة العمليات</strong> يركز على النمذجة الرياضية،
                                        المحاكاة، تحسين العمليات، وإدارة سلاسل الإمداد <i
                                            class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                </section>
                            </div>
                            <!-- شروط التقديم -->
                            <div class="tab-pane fade" id="conditions" role="tabpanel" aria-labelledby="conditions-tab">
                                <section style="text-align: right; overflow: hidden;">
                                    <img src="{{ asset('assets/images/diploma/subj/PP/PP502.png') }}"
                                        class="img-fluid float-left"
                                        style="width:300px; height:200px; margin-right:15px; margin-bottom:15px;" />
                                    <h3> يجب ان تتوفر الشروط التالية</h3>
                                    <p><strong>اجتياز العدد المطلوب من مواد الدبلومة</strong> يجب ان يجتاز الطالب 15 مادة
                                        دراسية و ينجح فيهم <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <p><strong>PP501 اجتياز مادة مهارات اعداد المشروع</strong> يجب ان يجتاز الطالب مادة
                                        مهارات اعداد المشروع و ينجح فيها فى الترم الثالث <i
                                            class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                    <p><strong>عدد فريق المشروع</strong> يجب ان يكون عدد فريق مشاريع التخرج لدبلوم علوم حاسب
                                        و نظم المعلومات بحد ادنى 3 طلاب، <br>اما باقى التخصصات تكون المشاريع فردية كل طالب
                                        يقدم مشروع بمفرده <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <p><strong>معاد تقديم المشروع</strong> أن يُقدَّم المشروع عادة في الفصل الدراسي الأخير
                                        من الدراسة <i class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                    <p><strong>الالتزام مع مشرف المشروع</strong> أن يلتزم الطالب بتسليم تقارير دورية للمشرف
                                        حول تقدم العمل <i class="mdi mdi-arrange-bring-forward" style="float: right;"></i>
                                    </p>
                                    <p><strong>اتباع المعايير</strong> الالتزام بالمعايير الأكاديمية والأخلاقية في البحث
                                        العلمي (الأمانة العلمية، تجنب الانتحال، التوثيق الجيد للمصادر) <i
                                            class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                </section>
                            </div>
                            <!-- خطوات المشروع -->
                            <div class="tab-pane fade" id="steps" role="tabpanel" aria-labelledby="steps-tab">
                                <section style="text-align: right; overflow: hidden;">
                                    <img src="{{ asset('assets/images/diploma/subj/PP/PP502.png') }}"
                                        class="img-fluid float-left"
                                        style="width:300px; height:200px; margin-right:15px; margin-bottom:15px;" />
                                    <h3>: فى اعداد مشروع التخرج يتم اتباع التالى</h3>
                                    <p><strong>اختيار موضوع المشروع</strong> يختار الطالب (أو مجموعة الطلاب) فكرة من قائمة
                                        مقترحة أو يقترح فكرة جديدة بعد موافقة المشرف <i
                                            class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                    <p><strong>(Proposal) إعداد المقترح</strong> كتابة وثيقة مبدئية تشمل فكرة المشروع،
                                        الأهداف، الأدوات، والمنهجية <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <p><strong>التنفيذ والتوثيق</strong> العمل على المشروع باستخدام الأدوات والبرمجيات
                                        المناسبة، مع توثيق كل مرحلة <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <p><strong>المناقشة والتقييم</strong> تقديم المشروع أمام لجنة علمية، حيث يتم عرض النتائج
                                        ومناقشتها ثم تقييمها وفق معايير واضحة <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                </section>
                            </div>
                            <!-- هيئة الإشراف -->
                            <div class="tab-pane fade" id="supervisors" role="tabpanel"
                                aria-labelledby="supervisors-tab">
                                <section style="text-align: right; overflow: hidden;">
                                    <img src="{{ asset('assets/images/diploma/subj/PP/PP502.png') }}"
                                        class="img-fluid float-left"
                                        style="width:300px; height:200px; margin-right:15px; margin-bottom:15px;" />
                                    <h3> مسؤوليات عضو هيئة التدريس</h3>
                                    <p><strong>توجيه الطالب لاختيار الفكرة</strong> <i
                                            class="mdi mdi-arrange-bring-forward" style="float: right;"></i></p>
                                    <ul style="list-style: none !important; padding-right: 0;">
                                        <li>مساعدة الطلاب على اختيار فكرة مناسبة لمجال الدبلوم والتأكد من قابليتها للتنفيذ
                                            <i class="mdi mdi-numeric-1-box-outline" style="float: right;"></i>
                                        </li>
                                        <li>اقتراح موضوعات بحثية أو تطبيقية تتماشى مع خطة الكلية ورؤية المجتمع <i
                                                class="mdi mdi-numeric-2-box-outline" style="float: right;"></i></li>
                                    </ul>
                                    <p><strong>إعداد خطة العمل</strong> <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <ul style="list-style: none !important; padding-right: 0;">
                                        <li>وضع جدول زمني للطلاب لمتابعة مراحل التنفيذ <i
                                                class="mdi mdi-numeric-1-box-outline" style="float: right;"></i></li>
                                        <li>تحديد الأدوات والبرمجيات واللغات المناسبة للمشروع <i
                                                class="mdi mdi-numeric-2-box-outline" style="float: right;"></i></li>
                                    </ul>
                                    <p><strong>المتابعة والإشراف الدوري</strong> <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <ul style="list-style: none !important; padding-right: 0;">
                                        <li>عقد لقاءات منتظمة مع الطلاب لمراجعة ما تم إنجازه <i
                                                class="mdi mdi-numeric-1-box-outline" style="float: right;"></i></li>
                                        <li>تصحيح المسار عند وجود مشكلات تقنية أو بحثية <i
                                                class="mdi mdi-numeric-2-box-outline" style="float: right;"></i></li>
                                        <li>تدريب الطلاب على مهارات البحث العلمي، كتابة التقارير، والعرض التقديمي <i
                                                class="mdi mdi-numeric-3-box-outline" style="float: right;"></i></li>
                                    </ul>
                                    <p><strong>التقييم الأكاديمي</strong> <i class="mdi mdi-arrange-bring-forward"
                                            style="float: right;"></i></p>
                                    <ul style="list-style: none !important; padding-right: 0;">
                                        <li>تقييم المشروع من حيث الجودة العلمية، الابتكار، ودقة التنفيذ <i
                                                class="mdi mdi-numeric-1-box-outline" style="float: right;"></i></li>
                                        <li>الإشراف على إعداد نسخة المشروع النهائية وتسليمها <i
                                                class="mdi mdi-numeric-2-box-outline" style="float: right;"></i></li>
                                        <li>المشاركة في لجنة مناقشة المشاريع وتقدير الدرجات النهائية <i
                                                class="mdi mdi-numeric-3-box-outline" style="float: right;"></i></li>
                                    </ul>
                                    <h3> مشرفين المشاريع</h3>
                                    <br><br>
                                    <div class="container-fluid">
                                        <div class="row el-element-overlay"
                                            style="display: flex; align-items: center; justify-content: center;">
                                            @foreach ($doctorCourses as $doctorCourse)
                                                @php $doctor = $doctorCourse->doctor; @endphp
                                                <div class="col-lg-3 col-md-6 mb-4">
                                                    <div class="card"
                                                        style="background-color: #32383e; text-align: center; color: white; border-radius: 12px;">
                                                        <div class="el-card-item">
                                                            <img src="{{ $doctor->user->image
                                                                ? asset('storage/' . $doctor->user->image)
                                                                : asset('assets/images/users/default/default.png') }}"
                                                                class="img-fluid rounded-circle mt-3"
                                                                style="width:120px; height:120px; border:3px solid #6a7a8c; box-shadow: 0px 4px 12px rgba(0,0,0,0.5);">
                                                        </div>
                                                        <div class="el-card-content p-3">
                                                            <h4 class="m-b-0">{{ $doctor->user->name }}</h4>
                                                            <span class="text-muted">{{ $doctor->department }}</span>
                                                            <br><br>
                                                            <button class="btn btn-outline-light btn-sm mt-2"
                                                                data-toggle="modal"
                                                                data-target="#doctorModal{{ $doctor->id }}">
                                                                <i class="fas fa-info-circle"></i> عرض التفاصيل
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal لكل دكتور -->
                                                <div class="modal fade" id="doctorModal{{ $doctor->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="doctorModalLabel{{ $doctor->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content"
                                                            style="background-color: #2b2f36; color: #f1f1f1; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.6);">
                                                            <div class="modal-header border-0 text-center w-100">
                                                                <h5 class="modal-title w-100"
                                                                    id="doctorModalLabel{{ $doctor->id }}"
                                                                    style="color: #ffffff;">معلومات الدكتور</h5>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal" aria-label="Close"
                                                                    style="position: absolute; left: 15px; top: 15px;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ $doctor->user->image
                                                                    ? asset('storage/' . $doctor->user->image)
                                                                    : asset('assets/images/users/default/default.png') }}"
                                                                    alt="user" class="rounded-circle mb-3"
                                                                    width="120" height="120"
                                                                    style="border: 3px solid #6a7a8c; box-shadow: 0px 4px 12px rgba(0,0,0,0.5);">
                                                                <h4 style="color: #ffffff;">{{ $doctor->user->name }}</h4>
                                                                <p class="text-muted">{{ $doctor->department }}</p>
                                                                <hr style="border-color: #444;">
                                                                <p><strong>مكان المكتب</strong> <i
                                                                        class="fas fa-map-marker-alt text-info"></i><br>{{ $doctor->place->build_name }}
                                                                    - الدور {{ $doctor->place->floor }}</p>
                                                                <p><strong>الساعات المكتبية</strong> <i
                                                                        class="fas fa-clock text-warning"></i><br>{{ $doctor->office_hours_from }}
                                                                    - {{ $doctor->office_hours_to }}</p>
                                                                <p><strong>الهاتف / واتساب</strong> <i
                                                                        class="fas fa-phone text-success"></i><br>{{ $doctor->user->phone ?? 'غير متوفر' }}
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer justify-content-center border-0">
                                                                <button type="button" class="btn btn-outline-light"
                                                                    data-dismiss="modal">إغلاق</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
