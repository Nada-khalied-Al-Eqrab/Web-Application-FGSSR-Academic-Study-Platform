@extends('layout.master')
@section('title', 'ادارة المحتوى')
@section('page-title', 'الامتحانات')
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
                        <h4 class="card-title" style="text-align: center;"> <i
                                class="mdi mdi-lightbulb-on-outline font-20 "></i> <strong> الامتحانات
                            </strong> </h4>
                        <form class="form-horizontal m-t-30"
                            action="{{ isset($exam) ? route('exames.update', $exam->id) : route('exames.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($exam))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">كود المادة</label>
                                        <div class="input-group">
                                            <select class="form-control" name="course_id" required>
                                                <option value="">-- اختر المادة --</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        {{ isset($exam) && $exam->course_id == $course->id ? 'selected' : '' }}>
                                                        {{ $course->code }} - {{ $course->name_ar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">نوع الامتحان</label>
                                        <div class="input-group">
                                            <select class="form-control" name="exam_type" required>
                                                <option value="">اختر نوع الامتحان</option>
                                                <option value="شهري"
                                                    {{ isset($exam) && $exam->exam_type == 'شهري' ? 'selected' : '' }}>
                                                    شهري</option>
                                                <option value="أسبوعي"
                                                    {{ isset($exam) && $exam->exam_type == 'أسبوعي' ? 'selected' : '' }}>
                                                    أسبوعي</option>
                                                <option value="تدريبي"
                                                    {{ isset($exam) && $exam->exam_type == 'تدريبي' ? 'selected' : '' }}>
                                                    تدريبي</option>
                                                <option value="فاينل"
                                                    {{ isset($exam) && $exam->exam_type == 'فاينل' ? 'selected' : '' }}>
                                                    فاينل</option>
                                                <option value="ميدترم"
                                                    {{ isset($exam) && $exam->exam_type == 'ميدترم' ? 'selected' : '' }}>
                                                    ميدترم</option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">اليوم</label>
                                        <div class="input-group">
                                            <select class="form-control" name="day" required>
                                                <optgroup label="ايام الاسبوع">
                                                    <option value="السبت"
                                                        {{ isset($exam) && $exam->day == 'السبت' ? 'selected' : '' }}>
                                                        السبت</option>
                                                    <option value="الاحد"
                                                        {{ isset($exam) && $exam->day == 'الاحد' ? 'selected' : '' }}>
                                                        الاحد</option>
                                                    <option value="الاثنين"
                                                        {{ isset($exam) && $exam->day == 'الاثنين' ? 'selected' : '' }}>
                                                        الاثنين</option>
                                                    <option value="الثلاثاء"
                                                        {{ isset($exam) && $exam->day == 'الثلاثاء' ? 'selected' : '' }}>
                                                        الثلاثاء</option>
                                                    <option value="الاربعاء"
                                                        {{ isset($exam) && $exam->day == 'الاربعاء' ? 'selected' : '' }}>
                                                        الاربعاء</option>
                                                    <option value="الخميس"
                                                        {{ isset($exam) && $exam->day == 'الخميس' ? 'selected' : '' }}>
                                                        الخميس</option>
                                                    <option value="الجمعه"
                                                        {{ isset($exam) && $exam->day == 'الجمعه' ? 'selected' : '' }}>
                                                        الجمعه</option>
                                                </optgroup>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">التاريخ</label>
                                        <div class="input-group">
                                            <input type="date" name="exam_date" class="form-control"
                                                value="{{ isset($exam) ? $exam->exam_date : '' }}" required>
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">الوقت</label>
                                        <div class="input-group">
                                            <input type="time" name="exam_time" class="form-control"
                                                value="{{ isset($exam) ? $exam->exam_time : '' }}" required>
                                            <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">عدد الساعات</label>
                                        <div class="input-group">
                                            <input type="number" name="duration" class="form-control"
                                                value="{{ isset($exam) ? $exam->duration : '' }}"
                                                placeholder="أدخل عدد الساعات" required>
                                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">وضع الامتحان</label>
                                        <div class="input-group">
                                            <select class="form-control" id="examMode" name="exam_mode"
                                                onchange="toggleExamLink()" required>
                                                <option value="">-- اختر وضع الامتحان --</option>
                                                <option value="in-person"
                                                    {{ isset($exam) && $exam->exam_mode == 'in-person' ? 'selected' : '' }}>
                                                    حضوري داخل الكلية</option>
                                                <option value="online"
                                                    {{ isset($exam) && $exam->exam_mode == 'online' ? 'selected' : '' }}>
                                                    أونلاين</option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="examLinkField"
                                    style="display: {{ isset($exam) && $exam->exam_mode == 'online' ? 'block' : 'none' }};">
                                    <div class="form-group">
                                        <label class="form-label">لينك الامتحان</label>
                                        <div class="input-group">
                                            <input type="url" name="exam_link" class="form-control"
                                                placeholder="إذا كان الامتحان أونلاين أدخل الرابط هنا"
                                                value="{{ isset($exam) ? $exam->exam_link : '' }}">
                                            <span class="input-group-text"><i class="fa fa-link"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function toggleExamLink() {
                                    var examMode = document.getElementById("examMode").value;
                                    var examLinkField = document.getElementById("examLinkField");
                                    examLinkField.style.display = (examMode === "online") ? "block" : "none";
                                }
                            </script>
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-check"></i> {{ isset($exam) ? 'تحديث' : 'إضافة' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
