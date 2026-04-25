@extends('layout.master')
@section('title', 'ادارة نظام المستخدمين ')
@section('page-title', ' الموظفين المسجلين بالكلية ')
@section('contant')

    <div class="container-fluid">
        @include('partial.banner')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="direction: rtl; justify-content: right; text-align: right;">
                        <h4 class="card-title" style="text-align: center;">
                            <i class="mdi mdi-account-key font-20 "></i>
                            <strong> الموظفين المسجلين بالكلية </strong>
                        </h4>
                        <form class="m-t-40"
                            action="{{ isset($admin) ? route('admins.update', $admin->id) : route('admins.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($admin))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">الكود <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="code"
                                                value="{{ isset($admin) ? $admin->user->code : old('code') }}" required>
                                            <span class="input-group-text">
                                                <i class="mdi mdi-account-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> الوظيفة<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="type" required>
                                                <option value="">اختر الوظيفة</option>
                                                <option value="super"
                                                    {{ isset($admin) && $admin->type == 'super' ? 'selected' : '' }}>
                                                    مدير المنصة
                                                </option>
                                                <option value="normal"
                                                    {{ isset($admin) && $admin->type == 'normal' ? 'selected' : '' }}>
                                                    مشرف
                                                </option>
                                            </select>
                                            <span class="input-group-text">
                                                <i class="fa fa-tasks"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @if (isset($admin))
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">حالة الحساب</label>
                                            <div class="input-group">
                                                <select class="form-control" name="state">
                                                    <option value="active"
                                                        {{ $admin->user->state == 'active' ? 'selected' : '' }}>
                                                        مفعل
                                                    </option>
                                                    <option value="inactive"
                                                        {{ $admin->user->state == 'inactive' ? 'selected' : '' }}>
                                                        غير مفعل
                                                    </option>
                                                    <option value="disabled"
                                                        {{ $admin->user->state == 'disabled' ? 'selected' : '' }}>
                                                        معطل
                                                    </option>
                                                </select>
                                                <span class="input-group-text">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">الرقم القومي<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password"
                                                value="{{ isset($admin) ? $admin->user->password : old('password') }}"
                                                required>
                                            <span class="input-group-text">
                                                <i class="mdi mdi-account-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: center;">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-plus"></i> {{ isset($admin) ? 'تحديث' : 'إضافة' }}
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
