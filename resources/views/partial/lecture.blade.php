<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">مواعيد المحاضرات</h4>
            <h6 class="card-subtitle">
                يمكنك الان الاطلاع على مواعيد المحاضرات الخاص بالمادة و
                اماكنها و الحضور داخل الكلية
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-dark m-b-0">
                <thead>
                    <tr>
                        <th scope="col">كود المادة </th>
                        <th scope="col">اليوم</th>
                        <th scope="col">الوقت </th>
                        <th scope="col">المكان</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @foreach ($lectures as $lecture)
                        <tr>
                            <th scope="row">{{ $course->code }}</th>
                            <td>{{ $lecture->day }}</td>
                            <td>{{ $lecture->start_time }} - {{ $lecture->end_time }}</td>
                            <td> {{ $lecture->place
                                ? $lecture->place->hall_name . ' - مبنى ' . $lecture->place->build_name . ' - الدور ' . $lecture->place->floor
                                : '—' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
