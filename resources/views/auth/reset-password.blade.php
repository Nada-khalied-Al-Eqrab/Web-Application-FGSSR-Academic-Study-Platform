@extends('layout.auth')

@section('title-auth', 'المنصة الدراسية الالكترونية | اعادة تعيين كلمة المرور')
@section('strong-title-form', 'تغيير كلمة المرور')

@section('contant-auth')
    <!-- Form -->
    <div class="row" dir="rtl">
        <div class="col-12">
            <form class="form-horizontal m-t-20" method="POST" action="{{ route('profile.password.update') }}">
                @csrf
                <!-- Student Code -->
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="text" name="code"
                               value="{{ old('code', $request->code) }}" required
                               placeholder="كود المستخدم">
                        @error('code')
                            <span class="text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- New Password -->
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="password" name="password" required
                               placeholder="كلمة السر الجديدة">
                        @error('password')
                            <span class="text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="password" name="password_confirmation" required
                               placeholder="تأكيد كلمة السر الجديدة">
                        @error('password_confirmation')
                            <span class="text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="form-group text-center">
                    <div class="col-xs-12 p-b-20">
                        <button class="btn btn-dark btn-lg btn-info" type="submit">
                            إعادة تعيين كلمة المرور
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
