@extends('layout.master')

@section('title', ' ادارة نظام المستخدمين ')
@section('page-title', 'حسابات الطلاب ')

@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @include('partial.banner')
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="direction: rtl; justify-content: right; text-align: right;">
                        <h4 class="card-title text-center">
                            <i class="mdi mdi-account-key font-20"></i>
                            <strong> حسابات الطلاب </strong>
                        </h4>
                        <form class="m-t-40" novalidate
                            action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($student))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>اسم الطالب <span class="text-danger">*</span></h5>
                                        <div class="controls input-group">
                                            <input type="text" name="name" class="form-control" required
                                                value="{{ old('name', $student->user->name ?? '') }}"
                                                placeholder="اسم الطالب">
                                            <span class="input-group-text"><i class="ti ti-user"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>كود الطالب <span class="text-danger">*</span></h5>
                                        <div class="controls input-group">
                                            <input type="text" name="code" class="form-control" required
                                                value="{{ old('code', $student->user->code ?? '') }}"
                                                {{ isset($student) ? 'readonly' : '' }} placeholder="ادخل كود الطالب">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-account-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>الرقم القومي <span class="text-danger">*</span></h5>
                                        <div class="controls input-group">
                                            <input type="text" name="national_id" class="form-control" required
                                                value="{{ old('national_id', $student->national_id ?? '') }}"
                                                placeholder="ادخل الرقم القومي للطالب">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-account-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>تخصص الدبلوم <span class="text-danger">*</span></h5>
                                        <div class="controls input-group">
                                            <select name="diploma_id" class="form-control" required>
                                                <option value="">اختر الدبلوم</option>
                                                @foreach ($diplomas as $diploma)
                                                    <option value="{{ $diploma->id }}"
                                                        {{ old('diploma_id', $student->diploma_id ?? '') == $diploma->id ? 'selected' : '' }}>
                                                        {{ $diploma->name_ar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>رقم الهاتف <span class="text-danger">*</span></h5>
                                        <div class="controls input-group">
                                            <input type="text" name="phone" class="form-control" required
                                                value="{{ old('phone', $student->user->phone ?? '') }}"
                                                placeholder="ادخل رقم الهاتف">
                                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>حالة الحساب <span class="text-danger">*</span></h5>
                                        <div class="controls input-group">
                                            <select class="form-control" name="state" required>
                                                <option value="">اختر الحالة</option>
                                                <option value="active"
                                                    {{ old('state', $student->user->state ?? '') == 'active' ? 'selected' : '' }}>
                                                    مفعل
                                                </option>
                                                <option value="inactive"
                                                    {{ old('state', $student->user->state ?? '') == 'inactive' ? 'selected' : '' }}>
                                                    غير مفعل
                                                </option>
                                                <option value="disabled"
                                                    {{ old('state', $student->user->state ?? '') == 'disabled' ? 'selected' : '' }}>
                                                    معطل
                                                </option>
                                            </select>
                                            <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn {{ isset($student) ? 'btn-secondary' : 'btn-primary' }} px-4">
                                        <i class="fas {{ isset($student) ? 'fa-edit' : 'fa-plus' }}"></i>
                                        {{ isset($student) ? 'تحديث ' : 'إضافة ' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
