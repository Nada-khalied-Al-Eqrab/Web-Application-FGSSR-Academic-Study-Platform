@extends('layout.master')
@section('title', 'بيانات المستخدمين ')
@section('page-title', ' بيانات المناهج الدراسية ')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @include('partial.banner')
        <div class="row">
            <div class="col-12">
                <div class="card" style="justify-content: center;text-align: center;">
                    <div class="card-body">
                        <h4 class="card-title">
                            بيانات المناهج الدراسية للمواد
                            <i class="mdi mdi-book font-20 text-muted"></i>
                        </h4>
                        <h6 class="card-subtitle">
                            يمكنك الآن الاطلاع على جميع البيانات كما يمكنك الإضافة والحذف والتعديل
                        </h6>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered" style="direction: rtl;">
                                <thead>
                                    <tr>
                                        <th>الإعدادات</th>
                                        <th>كود المادة</th>
                                        <th>لينك الملفات</th>
                                        <th>لينك الفيديوهات</th>
                                        <th>لينك المحاضرات الأون لاين</th>
                                        <th>الوصف</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>تاريخ التحديث</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($materials as $material)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated slideInUp">
                                                        <a class="dropdown-item"
                                                            href="{{ route('materials.edit', $material->id) }}">
                                                            <i class="ti-pencil-alt"></i> تعديل
                                                        </a>
                                                        <form action="{{ route('materials.destroy', $material->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('هل أنت متأكد من حذف هذا ؟')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item ">
                                                                <i class="ti-trash"></i> حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $material->course->code }}</td>
                                            <td>
                                                @if ($material->files_link)
                                                    <a href="{{ $material->files_link }}" target="_blank">
                                                        <i class="mdi mdi-link font-20 text-primary"></i>
                                                    </a>
                                                @else
                                                    <span class="text-muted">لا يوجد</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($material->videos_link)
                                                    <a href="{{ $material->videos_link }}" target="_blank">
                                                        <i class="mdi mdi-link font-20 text-success"></i>
                                                    </a>
                                                @else
                                                    <span class="text-muted">لا يوجد</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($material->online_link)
                                                    <a href="{{ $material->online_link }}" target="_blank">
                                                        <i class="mdi mdi-link font-20 text-info"></i>
                                                    </a>
                                                @else
                                                    <span class="text-muted">لا يوجد</span>
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($material->description, 30) }}</td>
                                            <td>{{ $material->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $material->updated_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-muted">
                                                لا توجد بيانات حتى الآن
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <form action="{{ route('materials.deleteAll') }}" method="POST"
                            onsubmit="return confirm('هل أنت متأكد أنك تريد حذف جميع البيانات؟');">
                            @csrf
                            <button class="btn btn-primary btn-sm">
                                <i class="ti-trash"></i> حذف جميع البيانات
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
