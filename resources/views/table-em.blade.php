@extends('layout.master')
@section('title', 'بيانات المستخدمين ')
@section('page-title', 'بيانات الموظفين ')
@section('contant')
    <div class="container-fluid">
        @include('partial.banner')
        <div class="row">
            <div class="col-12">
                <div class="card" style="justify-content: center;text-align: center;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="card-body">
                                <h4 class="card-title">بيانات الموظفين <i
                                        class="mdi mdi-account-multiple font-20 text-muted"></i>
                                </h4>
                                <h6 class="card-subtitle">يمكنك الان الاطلاع على جميع البيانات كما يمكنك الاضافة و الحذف
                                    و التعديل</h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered"
                                        style="direction: rtl;">
                                        <thead>
                                            <tr>
                                                <th>الاعدادات</th>
                                                <th>كود الموظف</th>
                                                <th>اسم الموظف</th>
                                                <th>الوظيفة</th>
                                                <th>حالة الحساب</th>
                                                <th>رقم الهاتف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($admins as $admin)
                                                <tr>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-dark dropdown-toggle"
                                                                data-toggle="dropdown">
                                                                <i class="ti-settings"></i>
                                                            </button>
                                                            <div class="dropdown-menu animated slideInUp">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admins.edit', $admin->user->id) }}"><i
                                                                        class="ti-pencil-alt"></i> تعديل </a>
                                                                <form
                                                                    action="{{ route('admins.destroy', $admin->user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"><i
                                                                            class="ti-trash"></i> حذف</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $admin->user->code }}</td>
                                                    <td>
                                                        {{ $admin->user->name ?? 'لم يتم استكمال البيانات' }}
                                                    </td>
                                                    <td>
                                                        @if ($admin->type == 'super')
                                                            <span class="badge badge-success">مدير </span>
                                                        @else
                                                            <span class="badge badge-danger">مشرف </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($admin->user->state == 'active')
                                                            <span class="badge badge-success">مفعل</span>
                                                        @elseif($admin->user->state == 'inactive')
                                                            <span class="badge badge-primary">غير مفعل</span>
                                                        @else
                                                            <span class="badge badge-danger"> معطل</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $admin->user->phone ?? '---' }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7">
                                                        لا يوجد موظفين حالياً
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <br><br>
                                <div style="text-align: center;">
                                    <form action="{{ route('admins.deleteAll') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary btn-sm"
                                            onclick="return confirm('هل انت متأكد من حذف جميع البيانات؟')">
                                            <i class="ti-trash"></i>
                                            حذف جميع البيانات
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
