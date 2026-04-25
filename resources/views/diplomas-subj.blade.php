@extends('layout.master')
@section('title', $diploma->name_ar)
@section('page-title', 'مواد ' . $diploma->name_ar)
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row" style="text-align:center;">
            <div class="col-12 ">
                <h4>متطلبات عامة</h4>
                <p class="text-muted m-t-0"> General Requirements (15 credit)</p>
                <!-- Row -->
                <div class="row" style="justify-content: center; text-align: center;">
                    @if (isset($coursesByType['General Requirements']))
                        @foreach ($coursesByType['General Requirements'] as $course)
                            <!-- column -->
                            <div class="col card p-0 m-2 d-flex Phone">
                                <!-- Card -->
                                <div class="card h-100">
                                    <img class="card-img-top img-responsive" src="{{ $course->img_url }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $course->title }}</h4>
                                        @if ($course->prerequisite)
                                            <span class="label label-rounded label-danger float-right">
                                                Prerequisite : {{ $course->prerequisite }}
                                            </span>
                                        @else
                                            <span class="label label-rounded label-success float-right">No
                                                Prerequisite</span>
                                        @endif
                                        <span class="label label-rounded label-primary">EN</span>
                                        <span class="label label-rounded label-primary">{{ $course->code }}</span>
                                        <p class="card-text">
                                            {{ $course->description }}
                                        </p>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">المنهج
                                            الدراسى</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                        @endforeach
                    @else
                        <p>لا توجد مواد لهذا النوع.</p>
                    @endif
                </div>
                <!-- column -->
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row" style="text-align:center;">
        <div class="col-12">
            <h4 class="d-inline">المققرات الدراسية الاجبارية</h4>
            <p class="text-muted m-t-0"> Major Field Requirements (33 credit)</p>
            <!-- Row -->
            <div class="row" style="justify-content: center; text-align: center;">
                @if (isset($coursesByType['Major Field Requirements']))
                    @foreach ($coursesByType['Major Field Requirements'] as $course)
                        <!-- column -->
                        <div class="col-lg-3 col-md-6">
                            <!-- Card -->
                            <div class="card h-100">
                                <img class="card-img-top img-responsive" src="{{ $course->img_url }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $course->name_ar }}</h4>
                                    <span class="label label-rounded label-primary">{{ $course->language }}</span>
                                    <span class="label label-rounded label-primary">{{ $course->code }}</span>
                                    @if ($course->tools)
                                        <span class="label label-rounded label-primary">{{ $course->tools }}</span>
                                    @endif
                                    <br> <br>
                                    <p class="card-text">
                                        {{ $course->description }}
                                    </p>
                                    @if ($course->pivot->prerequisite)
                                        <span class="label label-rounded label-danger float-right">
                                            Prerequisite: {{ $course->pivot->prerequisite }}
                                        </span>
                                    @else
                                        <span class="label label-rounded label-success float-right">No Prerequisite</span>
                                    @endif
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">المنهج
                                        الدراسى</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                    @endforeach
                @else
                    <p>لا توجد مواد لهذا النوع.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row" style="text-align:center;">
        <div class="col-12">
            <h4>المقررات الدراسية الاختيارية</h4>
            <p class="text-muted m-t-0"> Core Electives (12 credit)</p>
            <!-- Row -->
            <div class="row" style="justify-content: center; text-align: center;">
                @if (isset($coursesByType['Core Electives']))
                    @foreach ($coursesByType['Core Electives'] as $course)
                        <!-- column -->
                        <div class="col-lg-3 col-md-6">
                            <!-- Card -->
                            <div class="card h-100">
                                <img class="card-img-top img-responsive" src="{{ $course->img_url }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $course->name_ar }}</h4>
                                    <span class="label label-rounded label-primary">{{ $course->language }}</span>
                                    <span class="label label-rounded label-primary">{{ $course->code }}</span>
                                    @if ($course->tools)
                                        <span class="label label-rounded label-primary">{{ $course->tools }}</span>
                                    @endif
                                    <p class="card-text">
                                        {{ $course->description }}
                                    </p>
                                    @if ($course->pivot->prerequisite)
                                        <span class="label label-rounded label-danger float-right">
                                            Prerequisite: {{ $course->pivot->prerequisite }}
                                        </span>
                                    @else
                                        <span class="label label-rounded label-success float-right">No Prerequisite</span>
                                    @endif
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">المنهج
                                        الدراسى</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                    @endforeach
                @else
                    <p>لا توجد مواد لهذا النوع.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row" style="text-align:center;">
        <div class="col-12">
            <h4 class="d-inline">المقررات الدراسية للتخصصات الفرعية</h4>
            <p class="text-muted m-t-0">Minor</p>
            <!-- Row -->
            <div class="row" style="justify-content: center; text-align: center;">
                @if (isset($coursesByType['Minor']))
                    @foreach ($coursesByType['Minor'] as $course)
                        <!-- column -->
                        <div class="col card p-0 m-2 d-flex Phone">
                            <!-- Card -->
                            <div class="card h-100">
                                <img class="card-img-top img-responsive" src="{{ $course->img_url }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $course->name_ar }}</h4>
                                    @if ($course->pivot->prerequisite)
                                        <span class="label label-rounded label-danger float-right">
                                            Prerequisite: {{ $course->pivot->prerequisite }}
                                        </span>
                                    @else
                                        <span class="label label-rounded label-success float-right">No Prerequisite</span>
                                    @endif
                                    <span class="label label-rounded label-primary">{{ $course->language }}</span>
                                    <span class="label label-rounded label-primary">{{ $course->code }}</span>
                                    @if ($course->tools)
                                        <span class="label label-rounded label-primary">{{ $course->tools }}</span>
                                    @endif
                                    <p class="card-text">
                                        {{ $course->description }}
                                    </p>
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">المنهج
                                        الدراسى</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                    @endforeach
                @else
                    <p>لا توجد مواد لهذا النوع.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
