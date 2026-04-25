<?php $__env->startSection('title', $course->name_ar); ?>
<?php $__env->startSection('page-title', $course->name_ar); ?>
<?php $__env->startSection('contant'); ?>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Row -->
            <div class="col-md-12">
                <div class="card">
                    <img class="card-img-top" src="<?php echo e($course->img_url); ?>" alt="Card image cap" style="max-height: 450px">
                </div>
            </div>
            <!-- End Row -->
            <!-- ============================================================== -->
            <!-- Example -->
            <!-- ============================================================== -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <span class="btn btn-dark float-right"><i class="mdi mdi-account-multiple"></i>
                            <?php echo e($studentsCount); ?></span>
                        <span class="btn btn-dark float-left"><?php echo e($course->language); ?></span>
                        <h4 class="card-title" style="text-align: center;"> <strong><?php echo e($course->name_ar); ?></strong></h4>
                        <h4 class="card-title" style="text-align: center;"> <strong><?php echo e($course->code); ?> -
                                <?php echo e($course->name_en); ?> </strong>
                        </h4>
                        <p style="text-align: center;">
                            <?php echo e($course->description); ?>

                        </p>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs justify-content-center" id="registrationTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab"
                                    aria-controls="info" aria-selected="true"> معلومات المادة </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab"
                                    aria-controls="chat" aria-selected="false"> شات المادة </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-4" id="registrationTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel"
                                aria-labelledby="info-tab">
                                <section style="text-align: center;">
                                    <?php
                                        $material = $course->material;
                                        $lectures = $course->lectures;
                                        $exams = $course->exams;
                                        $hasMaterial = $material != null;
                                        $hasLectures = $lectures->isNotEmpty();
                                        $hasExams = $exams->isNotEmpty();
                                    ?>
                                    <?php if($hasMaterial || $hasLectures || $hasExams): ?>
                                        <?php if($hasMaterial): ?>
                                            <section style="text-align: right;">
                                                <?php echo $__env->make('partial.materials', ['material' => $material], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            </section>
                                        <?php endif; ?>
                                        <?php if($hasLectures): ?>
                                            <section style="text-align: center;">
                                                <?php echo $__env->make('partial.lecture', ['lectures' => $lectures], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            </section>
                                        <?php endif; ?>
                                        <?php if($hasExams): ?>
                                            <section style="text-align: center;">
                                                <?php echo $__env->make('partial.exam', ['exams' => $exams], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            </section>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="alert alert-info text-center">
                                            لا توجد بيانات متاحة لهذا الكورس حالياً
                                        </div>
                                    <?php endif; ?>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                                <section style="text-align: center;">
                                    <section style="text-align: right;">
                                        <?php echo $__env->make('partial.chat', [
                                            'course' => $course,
                                            'messages' => $messages ?? collect(),
                                            'materialId' => $materialId ?? null,
                                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </section>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const chatList = document.querySelector('.chat-list');
                    const courseId = "<?php echo e($course->id); ?>";

                    async function fetchMessages() {
                        try {
                            const res = await fetch(`/chat/messages/${courseId}`);
                            const messages = await res.json();
                            chatList.innerHTML = '';
                            messages.forEach(msg => {
                                const li = document.createElement('li');
                                li.className = (msg.user_id == <?php echo e(auth()->id()); ?>) ? 'odd chat-item' :
                                    'chat-item';
                                li.innerHTML = `
                                    ${msg.user_id != <?php echo e(auth()->id()); ?> ? `<div class="chat-img">
                                                    <img src="../assets/images/users/default/default.png" alt="User">
                                                </div>` : ''}
                                    <div class="chat-content">
                                        ${msg.user_id != <?php echo e(auth()->id()); ?> ? `<h6 class="font-medium">${msg.user_name}</h6>` : ''}
                                        <div class="box ${msg.user_id == <?php echo e(auth()->id()); ?> ? 'bg-light-inverse' : 'bg-light-info'}">
                                            ${msg.message}
                                        </div>
                                    </div>
                                    <div class="chat-time">${msg.created_at}</div>
                                `;
                                chatList.appendChild(li);
                            });
                            chatList.scrollTop = chatList.scrollHeight;
                            console.error('Error fetching messages:', err);
                        }
                    }
                    setInterval(fetchMessages, 2000);
                    fetchMessages();
                });
            </script>
            <!-- ============================================================== -->
            <!-- Example -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\FGSSR2027\FGSSR_Final_Version\resources\views/subj-contant.blade.php ENDPATH**/ ?>