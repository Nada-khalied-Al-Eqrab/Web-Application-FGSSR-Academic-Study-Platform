@extends('layout.master')
@section('title', 'خطة الدراسة ')
@section('page-title', 'خطة الدراسة ')
@section('contant')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div style="text-align: center;">
            <br><br><br>
            <strong class="card-title" style="font-size: 25px;">ملف خطة لدراسة </strong>
            <br><br>
            <iframe src="{{ asset('assets/FSSR_files/study_plan.pdf') }}" width="900px" height="1000px"
                class="frame"></iframe>
        </div>
        <!-- ============================================================== -->
        <!-- Page wrapper -->
        <!-- ============================================================== -->
    @endsection
