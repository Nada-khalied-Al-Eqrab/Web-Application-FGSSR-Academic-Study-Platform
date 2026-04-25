@extends('layout.master')
@section('title', $file->name)
@section('page-title', $file->name)
@section('contant')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div style="text-align: center;">
            <br><br><br>
            <strong class="card-title" style="font-size: 25px;"> {{ $file->name }} </strong>
            <br><br>
            <iframe src="{{ asset('assets/FSSR_files/' . $file->file_link) }}" width="900px" height="1000px" class="frame"
                title="{{ $file->name }}"></iframe>
        </div>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
    @endsection
