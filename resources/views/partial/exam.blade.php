<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">مواعيد الامتحانات</h4>
            <h6 class="card-subtitle">
                يمكنك الان الاطلاع على جميع مواعيد الامتحانات الخاصة بالمادة
                ، سواء شهرية او اسبوعية او ميدترم او فاينل ، و الوصول الى كل
                جديد</h6>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-dark m-b-0">
                <thead>
                    <tr>
                        <th scope="col">كود المادة</th>
                        <th scope="col">نوع الامتحان</th>
                        <th scope="col">اليوم</th>
                        <th scope="col">التاريخ </th>
                        <th scope="col">الوقت</th>
                        <th scope="col">عدد الساعات</th>
                        <th scope="col">اللينك</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <th scope="row">{{ $course->code }}</th>
                            <td>{{ $exam->exam_type }}</td>
                            <td>{{ $exam->day }}</td>
                            <td>{{ $exam->exam_date }}</td>
                            <td>{{ $exam->exam_time }}</td>
                            <td>{{ $exam->duration }}</td>
                            <td>
                                @if ($exam->exam_link)
                                    <a href="{{ $exam->exam_link }}"><i class="ti ti-link"></i></a>
                                @else
                                    لا يوجد
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <p style="text-align: center;">
                تنبية هام ، يتم معرفة اماكن لجان امتحانات كل طالب من على
                منصة تسجيل المواد و النتائج الدراسية ، و ليس من على هذة
                المنصة
                <i class="mdi mdi-arrange-bring-forward"></i>
                <br><br>
                <a href="https://csds.cu.edu.eg/ISSR_Student/" class="btn btn-secondary" style="border-radius: 30px;">
                    قم بزيارة المنصة الان <i class="icon-globe"></i></a>
                <br>
            </p>
        </div>
    </div>
