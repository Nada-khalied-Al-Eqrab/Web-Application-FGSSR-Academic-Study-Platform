<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title> الاشعارات </title>
    @include('layout.styles')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="container mt-12">
            <!-- <div class="card shadow border-0"> -->
            <div class="card-body" style="text-align: right;">
                <h4 class="card-title mb-3" style="text-align: center;">🔔 جميع الإشعارات</h4>
                @forelse($notifications as $notification)
                    <div class="alert d-flex align-items-start border-bottom py-3">
                        <div class="flex-grow-1">
                            <strong class="d-block">
                                {{ $notification->data['title'] }}
                                <small class="text-secondary float-left">
                                    {{ $notification->created_at->diffForHumans() }}
                                </small>
                                <span><i class="ti-comments"></i></span>
                            </strong>
                            <span class="text-muted">
                                {{ $notification->data['message'] }}
                                <small class="text-secondary float-left">
                                    <form action="{{ route('notifications.destroy', $notification->id) }}"
                                        method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-secondary btn-sm" type="submit"
                                            onclick="return confirm('هل تريد حذف هذا الإشعار؟')">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('notifications.read', $notification->id) }}"><button
                                            class="btn btn-secondary btn-sm">
                                            <i class="ti-eye"></i>
                                        </button></a>
                                </small>
                            </span>
                            <br>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">
                        لا يوجد لديك أي إشعارات 🔕
                    </div>
                @endforelse
                <div style="text-align: center;">
                    @if (auth()->user()->notifications->count())
                        <form action="{{ route('notifications.deleteAll') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger  btn-sm"
                                onclick="return confirm('هل أنت متأكد من حذف جميع الإشعارات؟')">
                                <span>
                                    <i class="ti-trash"></i>
                                </span>
                                حذف جميع الإشعارات
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- ==================================================== -->
        <!-- End PAge Content -->
        <!-- ==================================================== -->
@include('layout.scripts')
</body>
</html>
