@php
    $user = auth()->user();
    $unreadNotifications = $user->unreadNotifications;
    $unreadCount = $unreadNotifications->count();
@endphp
<a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    <i class="mdi mdi-bell-outline font-22"></i>
    <span class="badge badge-pill badge-danger noti">
        {{ $unreadCount }}
    </span>
</a>
<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
    <span class="with-arrow">
        <span class="bg-danger"></span>
    </span>
    <ul class="list-style-none">
        <li>
            <div class="drop-title bg-danger text-white text-center">
                <h4 class="m-b-0 m-t-5">
                    لديك {{ $unreadCount }} إشعارات جديدة
                </h4>
            </div>
        </li>
        <li>
            <div class="message-center notifications">
                @forelse($unreadNotifications as $notification)
                    <a href="{{ route('notifications.read', $notification->id) }}" class="message-item">
                        <span>
                            <i class="ti-comments"></i>
                        </span>
                        <div class="mail-contnet">
                            <span class="mail-desc">
                                {{ $notification->data['title'] ?? 'بدون عنوان' }}
                            </span>
                            <span class="time">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="text-center p-3 text-muted">
                        لا توجد إشعارات 🔕
                    </div>
                @endforelse
            </div>
        </li>
        <li>
            <a class="popup-youtube nav-link text-center m-b-5 text-dark" href="{{ route('notifications.index') }}">
                <strong>مشاهدة كل الاشعارات</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
</div>
