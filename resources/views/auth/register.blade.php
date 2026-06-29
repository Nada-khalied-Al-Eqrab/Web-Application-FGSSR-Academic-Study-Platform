@extends('layout.auth')
@section('title-auth', 'المنصة الدراسية الالكترونية | انشاء حساب للموظفين')
@section('strong-title-form', 'انشاء حساب للموظفين المنصة الدراسية')
@section('contant-auth')
    <br>
    <div class="row" style="direction: rtl;">
        <div class="col-12">
            {{-- رسالة خطأ عامة --}}
            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{-- الاسم بالكامل --}}
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}"
                            required placeholder="الاسم بالكامل">
                    </div>
                </div>
                {{-- كود الموظف --}}
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="text" name="code"
                            value="{{ old('code') }}" required placeholder="كود الموظف">
                    </div>
                </div>
                {{-- الرقم القومي --}}
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="password" name="password" required
                            placeholder="الرقم القومي">
                    </div>
                </div>
                {{-- تأكيد الرقم القومي --}}
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="password" name="password_confirmation" required
                            placeholder="اعد كتابة الرقم القومي">
                    </div>
                </div>
                {{-- الموافقة على الشروط --}}
                <div class="form-group row" style="text-align: center;">
                    <div class="col-md-12 ">
                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">
                                أوافق على جميع
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#termsModal">الشروط
                                    والسياسات</a>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- نافذة الشروط والسياسات -->
                <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="justify-content: center;">
                                <h5 class="modal-title" id="termsModalLabel"> <i class="ti-book"></i> الشروط والسياسات</h5>
                            </div>
                            <div class="modal-body" style="text-align: right; direction: rtl;">
                                <p style="text-align: center;">بإنشائك حسابًا على هذه المنصة فأنت تقرّ
                                    وتوافق على الشروط والسياسات التالية:</p>
                                <ol>
                                    <li><b>الهوية الوظيفية:</b> الحساب مخصص للموظفين العاملين رسميًا
                                        بالكلية فقط.</li>
                                    <li><b>الصلاحيات:</b> الموظف يمتلك صلاحية إنشاء حسابات للطلاب وأعضاء
                                        هيئة التدريس والتحكم في المحتوى.</li>
                                    <li><b>الاستخدام:</b> استخدام الحساب فقط للأغراض الأكاديمية
                                        والإدارية الخاصة بالكلية.</li>
                                    <li><b>المسؤولية:</b> الحفاظ على سرية بيانات الدخول وعدم مشاركتها مع
                                        الغير.</li>
                                    <li><b>المساءلة:</b> أي إساءة استخدام تؤدي إلى إيقاف الحساب ومساءلة
                                        الموظف إداريًا.</li>
                                    <li><b>الموافقة:</b> باستكمال التسجيل تؤكد التزامك بالشروط
                                        والسياسات.</li>
                                </ol>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- زر التسجيل --}}
                <div class="form-group text-center">
                    <div class="col-xs-12 p-b-20">
                        <button class="btn btn-dark btn-lg btn-info" type="submit">
                            انشاء حساب
                        </button>
                    </div>
                </div>
                {{-- رابط تسجيل الدخول --}}
                <div class="form-group m-b-0 m-t-10">
                    <div class="col-sm-12 text-center">
                        هل لديك حساب بالفعل؟
                        <a href="{{ route('login') }}" class="text-primary m-l-5">
                            <b>سجل دخول</b>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
