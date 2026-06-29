<h4 class="m-b-20 " style="text-align: right;">الدبلومات الاكاديمية</h4>
<!-- Row -->
<div class="row" style="justify-content: center;text-align: center;">
    @foreach ($diplomas as $diploma)
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top img-responsive" src=" {{ $diploma->img_url }}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="font-normal">{{ $diploma->name_ar }} </h3>
                    <p class="m-b-0 m-t-10">
                        {{ $diploma->description }}
                    </p>
                    <a href="{{ route('course_diploma.show', $diploma->id) }}"> <button
                            class="btn btn-primary btn-rounded waves-effect waves-light m-t-20">المواد
                            الدراسية </button></a>
                </div>
            </div>
        </div>
        <!-- Column -->
    @endforeach
</div>
<!-- Row -->
