@extends('layout.master')
@section('title', 'نتائج البحث ')
@section('page-title', 'نتائج البحث ')
@section('contant')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="text-align: right; justify-content: right;">
                    <div class="card-body">
                        <h4 class="card-title"><span>"{{ $query }}"</span>نتائج البحث عن </h4>
                        <h6 class="card-subtitle"> نتائج بحث<span>"{{ $courses->count() }}"</span> حوالى </h6>
                        @if ($courses->count())
                            <ul class="search-listing list-style-none">
                                @foreach ($courses as $course)
                                    <li class="border-bottom p-t-15">
                                        <h4 class="m-b-0"><a href="{{ route('courses.show', $course->id) }}"
                                                class="text-cyan font-medium p-0">{{ $course->code }}
                                                - {{ $course->name_en }}</a></h4>
                                        <a href="{{ route('courses.show', $course->id) }}"
                                            class="search-links p-0 text-success">{{ $course->name_ar }}
                                        </a>
                                        <p>
                                            {{ $course->description }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>لا توجد نتائج مطابقة</p>
                        @endif
                        <nav aria-label="Page navigation example" class="m-t-40">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">السابق</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">التالى </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
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
