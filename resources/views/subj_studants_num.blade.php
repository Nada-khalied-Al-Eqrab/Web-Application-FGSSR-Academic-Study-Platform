@extends('layout.master')
@section('title', $course->name_ar)
@section('page-title', $course->name_ar)
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-xl-9 col-md-9" style="direction: rtl; text-align: center;">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><strong>بيانات الطلاب المسجلين فى مادة {{ $course->name_ar }}
                                ({{ $course->code }})</strong></h4>
                        <br><br>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-bordered nowrap display">
                                <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>كود المادة </th>
                                        <th>كود الطالب</th>
                                        <th>اسم الطالب</th>
                                        <th>دبلوم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($course->students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $course->code }}</td>
                                            <td>{{ $student->user->code }}</td>
                                            <td>
                                                {{ $student->user->name }}
                                            </td>
                                            <td>
                                                {{ $student->diploma->name_ar ?? '—' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-xl-3 col-md-3">
                <div class="card">
                    <div class="border-bottom p-15">
                        <img class="card-img-top"
                            src="{{ asset($course->img_url ?? 'assets/images/diploma/subj/main_subj.jpg') }}"
                            alt="Card image cap" style="max-height: 450px">
                        <a href="subj-contant.html"><button type="button" class="list-group-item active"
                                data-toggle="modal" data-target="#Sharemodel" style="width: 100%">
                                {{ $course->code }} - {{ $course->name_en }} </button></a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title m-t-30 "><strong>Total:</strong> {{ $course->students->count() }} student
                        </h4>
                        <div class="list-group">
                            @foreach ($diplomas as $diploma)
                                <span class="list-group-item">
                                    <i class="ti-bookmark m-r-10"></i>
                                    {{ $diploma->name_en }}({{ $diploma->code }})
                                    <span class="badge badge-info float-right">
                                        {{ $course->students->where('diploma_id', $diploma->id)->count() }}
                                    </span>
                                </span>
                            @endforeach
                        </div>
                        <div class="list-group m-t-30   text-center">
                            <a href="javascript:void(0)" class="list-group-item active">
                                اعضاء تدريس المادة
                                <i class="ti-layers m-r-10"></i>
                            </a>
                            @foreach ($course->doctors as $doctor)
                                <span class="list-group-item">
                                    {{ $doctor->user->name }}
                                    <i class="ti-star m-r-10"></i>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
