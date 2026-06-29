<div class="p-20">
    <div class="card" style="border-radius:20px;">
        <div class="card-body">
            <h4 class="card-title text-center">
                <strong>{{ $course->code ?? 'Course' }} Chat</strong>
            </h4>
            <hr>
            <div class="chat-box scrollable" style="height:calc(100vh - 300px);">
                <ul class="chat-list">
                    @if (isset($messages) && $messages->isNotEmpty())
                        @foreach ($messages as $msg)
                            @if ($msg->user_id == auth()->id())
                                <li class="odd chat-item" >
                                    <div class="chat-content" >
                                        <div class="box bg-light-inverse">
                                            {{ $msg->message }}
                                        </div>
                                        <div class="chat-img">
                                        <img src="{{ $user->image
                                ? asset('storage/' . $user->image)
                                : asset('assets/images/users/default/default.png') }}" alt="User">
                                    </div>
                                    </div>
                                    <div class="chat-time">
                                        {{ $msg->created_at->format('h:i a') }}
                                    </div>
                                </li>
                            @else
                                <li class="chat-item" >

                                    <div class="chat-content" >
                                        <h6 class="font-medium">{{ $msg->user->name ?? 'User'}}</h6>
                                        <div class="box bg-light-info" >
                                            {{ $msg->message }}
                                        </div>
                                        {{-- <div class="chat-img">
                                        <img src="{{ $user->image
                                ? asset('storage/' . $user->image)
                                : asset('assets/images/users/default/default.png') }}" alt="User">
                                    </div> --}}
                                    </div>
                                    <div class="chat-time">
                                        {{ $msg->created_at->format('h:i a') }}
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    @else
                        <li class="text-center text-muted">
                            لا توجد رسائل بعد
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="card-body border-top">
            <form method="POST" action="{{ route('chat.send', $course->id) }}">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <input name="message" placeholder="Type and enter" class="form-control border-0" type="text"
                            required>
                    </div>
                    <div class="col-3">
                        <button class="btn-circle btn-lg btn-info float-right text-white">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                        <br><br>
                    </div>
                </div>
            </form>
            <br><br>
            @if (auth()->user()->is_admin)
                <form action="{{ route('chat.deleteAll') }}" method="POST"
                    onsubmit="return confirm('هل أنت متأكد أنك تريد حذف جميع الرسائل؟');">
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        <i class="ti-trash"></i> حذف الشات بالكامل
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
