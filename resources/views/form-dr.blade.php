@extends('layout.master')
@section('title', ' ادارة نظام المستخدمين ')
@section('page-title', ' حسابات اعضاء هيئة التدريس ')
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
                        <h4 class="card-title" style="text-align: center;"> <i class="mdi mdi-account-key font-20 "></i>
                            <strong> حسابات اعضاء هيئة التدريس
                            </strong>
                        </h4>
                        <form class="m-t-40" novalidate
                            action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : route('doctors.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($doctor))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">الاسم الكامل<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $doctor->user->name ?? '' }}" required
                                                data-validation-required-message="This field is required">
                                            <span class="input-group-text"><i class="ti ti-user"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">رقم الهاتف</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" name="phone"
                                                value="{{ $doctor->user->phone ?? '' }}">
                                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                        </div>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">الكود <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="doctor_code"
                                                value="{{ $doctor->user->code ?? '' }}" required
                                                data-validation-required-message="This field is required">
                                            <span class="input-group-text"><i class="mdi mdi-account-plus"></i></span>
                                        </div>
                                        @error('doctor_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">المسمى الوظيفي<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="academic_degree" required
                                                data-validation-required-message="هذا الحقل مطلوب">
                                                <option value="">اختر الرتبة الأكاديمية</option>
                                                <option value="teaching_assistant"
                                                    {{ isset($doctor) && $doctor->academic_degree === 'teaching_assistant' ? 'selected' : '' }}>
                                                    معيد (Teaching Assistant)
                                                </option>
                                                <option value="assistant_lecturer"
                                                    {{ isset($doctor) && $doctor->academic_degree === 'assistant_lecturer' ? 'selected' : '' }}>
                                                    مدرس مساعد / معيد
                                                    (Assistant Lecturer)
                                                </option>
                                                <option value="lecturer"
                                                    {{ isset($doctor) && $doctor->academic_degree === 'lecturer' ? 'selected' : '' }}>
                                                    مدرس / دكتور
                                                    (Lecturer/ Doctor)
                                                </option>
                                                <option value="associate_professor"
                                                    {{ isset($doctor) && $doctor->academic_degree === 'associate_professor' ? 'selected' : '' }}>
                                                    أستاذ مساعد (Associate Professor)
                                                </option>
                                                <option value="professor"
                                                    {{ isset($doctor) && $doctor->academic_degree === 'professor' ? 'selected' : '' }}>
                                                    أستاذ (Professor)
                                                </option>
                                                <option value="professor_emeritus"
                                                    {{ isset($doctor) && $doctor->academic_degree === 'professor_emeritus' ? 'selected' : '' }}>
                                                    أستاذ متفرغ (Professor Emeritus)
                                                </option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">حالة الحساب<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="state" required
                                                data-validation-required-message="This field is required">
                                                <option value="">اختر الحالة</option>
                                                <option value="active"
                                                    {{ isset($doctor) && $doctor->user->state == 'active' ? 'selected' : '' }}>
                                                    مفعل</option>
                                                <option value="inactive"
                                                    {{ isset($doctor) && $doctor->user->state == 'inactive' ? 'selected' : '' }}>
                                                    غير مفعل</option>
                                                <option value="disabled"
                                                    {{ isset($doctor) && $doctor->user->state == 'disabled' ? 'selected' : '' }}>
                                                    معطل</option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">القسم<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="department" required
                                                data-validation-required-message="هذا الحقل مطلوب">
                                                <option value="">اختر القسم</option>
                                                <option value="Statistics"
                                                    {{ isset($doctor) && $doctor->department === 'Statistics' ? 'selected' : '' }}>
                                                    إحصاء (Statistics)
                                                </option>
                                                <option value="Mathematical Statistics"
                                                    {{ isset($doctor) && $doctor->department === 'Mathematical Statistics' ? 'selected' : '' }}>
                                                    إحصاء رياضي (Mathematical Statistics)
                                                </option>
                                                <option value="Biostatistics and Demography"
                                                    {{ isset($doctor) && $doctor->department === 'Biostatistics and Demography' ? 'selected' : '' }}>
                                                    إحصاء حيوي وسكاني (Biostatistics and Demography)
                                                </option>
                                                <option value="Information Systems"
                                                    {{ isset($doctor) && $doctor->department === 'Information Systems' ? 'selected' : '' }}>
                                                    نظم معلومات (Information Systems)
                                                </option>
                                                <option value="Computer Science"
                                                    {{ isset($doctor) && $doctor->department === 'Computer Science' ? 'selected' : '' }}>
                                                    علوم الحاسب (Computer Science)
                                                </option>
                                                <option value="Operations Research"
                                                    {{ isset($doctor) && $doctor->department === 'Operations Research' ? 'selected' : '' }}>
                                                    بحوث العمليات (Operations Research)
                                                </option>
                                                <option value="Operations Management"
                                                    {{ isset($doctor) && $doctor->department === 'Operations Management' ? 'selected' : '' }}>
                                                    إدارة العمليات (Operations Management)
                                                </option>
                                                <option value="Data Science"
                                                    {{ isset($doctor) && $doctor->department === 'Data Science' ? 'selected' : '' }}>
                                                    علم البيانات (Data Science)
                                                </option>
                                                <option value="Software Engineering"
                                                    {{ isset($doctor) && $doctor->department === 'Software Engineering' ? 'selected' : '' }}>
                                                    هندسة البرمجيات (Software Engineering)
                                                </option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">مكان المكتب<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select name="place_id" class="form-control">
                                                <option value="">اختر المكتب</option>
                                                @foreach ($places as $place)
                                                    <option value="{{ $place->id }}"
                                                        {{ old('place_id', $doctor->place_id ?? '') == $place->id ? 'selected' : '' }}>
                                                        {{ $place->build_name }} - الدور:
                                                        {{ $place->floor }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-home"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">الساعات المكتبية<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <label>من</label>
                                            <input type="time" class="form-control" name="office_hours_from"
                                                value="{{ $doctor->office_hours_from ?? '' }}" required>
                                            <span class="input-group-text"><i class="fa fa-hourglass-half"></i></span>
                                            <label>الى</label>
                                            <input type="time" class="form-control" name="office_hours_to"
                                                value="{{ $doctor->office_hours_to ?? '' }}" required>
                                            <span class="input-group-text"><i class="fa fa-hourglass-half"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">الرقم القومي (سيكون كلمة السر)<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" value=""
                                                placeholder="ادخل الرقم القومي فقط عند الإضافة أو لتغيير الباسورد">
                                            <span class="input-group-text"><i class="mdi mdi-account-edit"></i></span>
                                        </div>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: center;">
                                    <div class="form-group">
                                        <!--  الإضافة أو التحديث -->
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-plus"></i> {{ isset($doctor) ? 'تحديث' : 'إضافة' }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
