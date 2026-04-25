<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseDiplomaController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Placecontroller;
use App\Http\Controllers\ExameScheduleController;
use App\Http\Controllers\LectureScheduleController;
use App\Http\Controllers\MaterialscheduleController;
use App\Http\Controllers\MessageScheduleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileEmController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorCourseController;
use App\Http\Controllers\ProfileDrController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\ProfileStController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\NewPasswordController;

use App\Models\DoctorCourse;

// Team Members: Nada Khaled Said Ibrahim
// Team Members: Christin Mokbel Elias Eskaros
// Team Members: Dina Salah El-Sayed Tawfik

//Team Members: Nada Khaled Said Ibrahim /////////////////////////////////////////////////////////////////////////////////////////////////

// =========================== Home Route ===========================
// This is the default landing page of the system.
// It redirects users to the login page view.
//
// How to open:
// http://127.0.0.1:8000/

Route::get('/', function () {
    return view('auth.login');
});

// =========================== Dashboard Route ===========================
// This route is the main entry point after login.
// It redirects users to their appropriate dashboard based on role:
// student, doctor, or admin.
//
// Middleware protection:
// - auth: user must be logged in
// - verified: email/account must be verified
//
// Role routing:
// - student → student dashboard
// - doctor  → doctor dashboard
// - admin   → admin dashboard
// - fallback → login page
//
// How to open:
// http://127.0.0.1:8000/dashboard

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'student') {
        return redirect()->route('student.dashboard');
    }
    if ($user->role === 'doctor') {
        return redirect()->route('doctor.dashboard');
    }
    if ($user->role === 'admain') {
        return redirect()->route('admain.dashboard');
    }
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// =========================== Redirect by Role Route ===========================
// This route redirects the user after login based on their role.
// It checks the user role and sends them to the correct dashboard:
// student, doctor, or admin.
//
// How it works:
// - student  → student dashboard
// - doctor   → doctor dashboard
// - admin    → admin dashboard
// - default  → login page
//
// How to open:
// http://127.0.0.1:8000/redirect-by-role

Route::get('/redirect-by-role', function () {
    $user = Auth::user();
    if ($user->role === 'student') {
        return redirect()->route('student.dashboard');
    }
    if ($user->role === 'doctor') {
        return redirect()->route('doctor.dashboard');
    }
    if ($user->role === 'admain') {
        return redirect()->route('admain.dashboard');
    }
    return redirect()->route('login');
})->name('redirect-by-role');
require __DIR__ . '/auth.php';
// =========================== Auth & Admin Routes ===========================
// This section includes authentication-related routes and admin-only system routes.
// It handles password change, admin dashboard, and full management system
// (admins, doctors, students, and admin profile).
//
// Access is protected by:
// - auth middleware (logged-in users only)
// - active middleware (only active accounts)
// - checkrole:admin (admin-only access)
//
// How to open:
// Admin Dashboard: http://127.0.0.1:8000/admin/dashboard
// Change Password: http://127.0.0.1:8000/profile/change-password
// Admin Profile: http://127.0.0.1:8000/admin/profile
// Admins list: http://127.0.0.1:8000/admins
// Doctors list: http://127.0.0.1:8000/doctors
// Students list: http://127.0.0.1:8000/students

Route::middleware(['auth', 'active'])->group(function () {
    Route::get('profile/change-password', [NewPasswordController::class, 'create'])
        ->name('profile.password.change');
    Route::post('profile/change-password', [NewPasswordController::class, 'store'])
        ->name('profile.password.update');
    //=========================== Routes admin ==========================
    Route::middleware('checkrole:admin')->group(function () {
        Route::get('/admin/dashboard', [UserController::class, 'indexEm'])
            ->name('admin.dashboard');
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admins', 'index')->name('admins.index');
            Route::get('/admins/create', 'create')->name('admins.create');
            Route::post('/admins/store', 'store')->name('admins.store');
            Route::get('/admins/edit/{id}', 'edit')->name('admins.edit');
            Route::put('/admins/update/{id}', 'update')->name('admins.update');
            Route::delete('/admins/destroy/{id}', 'destroy')->name('admins.destroy');
            Route::post('/admins/delete-all', 'deleteAll')->name('admins.deleteAll');
        });
        Route::controller(DoctorController::class)->group(function () {
            Route::get('/doctors', 'index')->name('doctors.index');
            Route::get('/doctors/create', 'create')->name('doctors.create');
            Route::post('/doctors/store', 'store')->name('doctors.store');
            Route::get('/doctors/edit/{id}', 'edit')->name('doctors.edit');
            Route::put('/doctors/update/{id}', 'update')->name('doctors.update');
            Route::delete('/doctors/destroy/{id}', 'destroy')->name('doctors.destroy');
            Route::delete('/doctors/delete-all', 'deleteAll')->name('doctors.deleteAll');
        });
        Route::controller(StudentController::class)->group(function () {
            Route::get('/students', 'index')->name('students.index');
            Route::get('/students/create', 'create')->name('students.create');
            Route::post('/students/store', 'store')->name('students.store');
            Route::get('/students/edit/{id}', 'edit')->name('students.edit');
            Route::put('/students/update/{id}', 'update')->name('students.update');
            Route::delete('/students/destroy/{id}', 'destroy')->name('students.destroy');
            Route::delete('/students/delete/all', 'deleteAll')->name('students.deleteAll');
        });
        Route::controller(ProfileEmController::class)->group(function () {
            Route::get('/admin/profile', 'index')
                ->name('profile.admin');
            Route::get('/admin/profile/edit', 'edit')
                ->name('profile.admin.edit');
            Route::put('/admin/profile/update', 'update')
                ->name('profile.admin.update');
        });
    });
    // =========================== Student Routes ===========================
    // This section is for student-only access routes.
    // It includes dashboard, profile management, and graduation page.
    // Access is restricted using role middleware (student only).
    //
    // How to open:
    // Student Dashboard: http://127.0.0.1:8000/student/dashboard
    // Student Profile: http://127.0.0.1:8000/student/profile
    // Edit Profile: http://127.0.0.1:8000/student/profile/edit
    // Graduation Page: http://127.0.0.1:8000/student/graduation

    Route::middleware('checkrole:student')->group(function () {
        Route::get('/student/dashboard', [UserController::class, 'index'])
            ->name('student.dashboard');
        Route::controller(ProfileStController::class)->group(function () {
            Route::get('/student/profile', 'index')
                ->name('profile.st');
            Route::get('/student/profile/edit', 'edit')
                ->name('profile.st.edit');
            Route::put('/student/profile/update', 'update')
                ->name('profile.st.update');
        });
        Route::get('/student/graduation', function () {
            return view('student.graduation');
        })->name('student.graduation');
    });
    // =========================== Doctor Routes ===========================
    // This section is for doctor-only access routes.
    // It includes dashboard and profile management (view, edit, update).
    // Access is restricted using role middleware (doctor only).
    //
    // How to open:
    // Doctor Dashboard: http://127.0.0.1:8000/doctor/dashboard
    // Doctor Profile: http://127.0.0.1:8000/doctor/profile
    // Edit Profile: http://127.0.0.1:8000/doctor/profile/edit

    Route::middleware('checkrole:doctor')->group(function () {
        Route::get('/doctor/dashboard', [UserController::class, 'indexDr'])
            ->name('doctor.dashboard');
        Route::controller(ProfileDrController::class)->group(function () {
            Route::get('/doctor/profile', 'index')
                ->name('profile.dr');
            Route::get('/doctor/profile/edit', 'edit')
                ->name('profile.dr.edit');
            Route::put('/doctor/profile/update', 'update')
                ->name('profile.dr.update');
        });
    });
});
// =========================== Diploma Routes ===========================
// This section manages diplomas in the system.
// It allows creating, viewing, editing, updating, and deleting diplomas.
// Also includes bulk delete for all diplomas.
//
// How to open:
// Diplomas list: http://127.0.0.1:8000/diplomas
// Create diploma: http://127.0.0.1:8000/diplomas/create
// Edit diploma: http://127.0.0.1:8000/diplomas/edit/{id}

Route::controller(DiplomaController::class)->group(function () {
    Route::get('/diplomas', 'index')->name('diplomas.index');
    Route::get('/diplomas/create', 'create')->name('diplomas.create');
    Route::post('/diplomas/store', 'store')->name('diplomas.store');
    Route::get('/diplomas/edit/{id}', 'edit')->name('diplomas.edit');
    Route::put('/diplomas/update/{id}', 'update')->name('diplomas.update');
    Route::get('/diplomas/destroy/{id}', 'destroy')->name('diplomas.destroy');
    Route::get('/diplomas/delete/all', 'deleteAll')->name('diplomas.deleteAll');
});
// =========================== Courses Routes ===========================
// This section manages courses in the system.
// It allows creating, viewing, editing, updating, and deleting courses.
// Also includes bulk delete for all courses.
//
// How to open:
// Courses list: http://127.0.0.1:8000/courses
// Create course: http://127.0.0.1:8000/courses/create
// View course: http://127.0.0.1:8000/courses/{id}
// Edit course: http://127.0.0.1:8000/courses/edit/{id}

Route::controller(CourseController::class)->group(function () {
    Route::get('/courses', 'index')->name('courses.index');
    Route::get('/courses/create', 'create')->name('courses.create');
    Route::post('/courses/store', 'store')->name('courses.store');
    Route::get('/courses/{id}', 'show')->name('courses.show');
    Route::get('/courses/edit/{id}', 'edit')->name('courses.edit');
    Route::put('/courses/update/{id}', 'update')->name('courses.update');
    Route::get('/courses/destroy/{id}', 'destroy')->name('courses.destroy');
    Route::get('/courses/delete/all', 'deleteAll')->name('courses.deleteAll');
});
// =========================== Course Diploma Routes ===========================
// This section manages the relationship between courses and diplomas.
// It allows assigning courses to diplomas, viewing details, editing, and deleting records.
// Also includes bulk delete for all mappings.
//
// How to open:
// Course-Diploma list: http://127.0.0.1:8000/course_diploma
// Create new link: http://127.0.0.1:8000/course_diploma/create
// View details: http://127.0.0.1:8000/course_diploma/{id}

Route::controller(CourseDiplomaController::class)->group(function () {
    Route::get('/course_diploma', 'index')->name('course_diploma.index');
    Route::get('/course_diploma/create', 'create')->name('course_diploma.create');
    Route::post('/course_diploma/store', 'store')->name('course_diploma.store');
    Route::get('/course_diploma/{id}', 'show')->name('course_diploma.show');
    Route::get('/course_diploma/edit/{id}', 'edit')->name('course_diploma.edit');
    Route::put('/course_diploma/update/{id}', 'update')->name('course_diploma.update');
    Route::delete('/course_diploma/destroy/{id}', 'destroy')->name('course_diploma.destroy');
    Route::delete('/course_diploma/delete/all', 'deleteAll')->name('course_diploma.deleteAll');
});
// =========================== Doctor Courses Routes ===========================
// This section manages assigning courses to doctors.
// It allows linking courses with doctors, updating assignments, and deleting them.
// Also includes bulk delete for all assignments.
//
// How to open:
// Doctor Courses list: http://127.0.0.1:8000/doctor_courses
// Create assignment: http://127.0.0.1:8000/doctor_courses/create
// Edit assignment: http://127.0.0.1:8000/doctor_courses/edit/{id}

Route::controller(DoctorCourseController::class)->group(function () {
    Route::get('/doctor_courses', 'index')->name('doctor_courses.index');
    Route::get('/doctor_courses/create', 'create')->name('doctor_courses.create');
    Route::post('/doctor_courses/store', 'store')->name('doctor_courses.store');
    Route::get('/doctor_courses/edit/{id}', 'edit')->name('doctor_courses.edit');
    Route::put('/doctor_courses/update/{id}', 'update')->name('doctor_courses.update');
    Route::delete('/doctor_courses/destroy/{id}', 'destroy')->name('doctor_courses.destroy');
    Route::delete('/doctor_courses/delete-all', 'deleteAll')->name('doctor_courses.deleteAll');
});
// =========================== Student Courses Routes ===========================
// This section manages student course enrollment system.
// Students can view, add, and remove courses assigned to them.
// Also includes admin actions to delete all enrollments.
//
// How to open:
// Student Courses list: http://127.0.0.1:8000/student_courses
// Course details: http://127.0.0.1:8000/student_courses/show/{id}
// Add course to student: http://127.0.0.1:8000/student_courses/create/{id}

Route::controller(StudentCourseController::class)->group(function () {
    Route::get('/student_courses', 'index')->name('Student_courses.index');
    Route::get('/student_courses/show/{id}', 'show')->name('Student_courses.show');
    Route::get('/student_courses/create/{id}', 'create')->name('student.courses.create');
    Route::post('/student_courses/store/{id}', 'store')->name('student.courses.store');
    Route::delete('/student_courses/destroy/{student_id}/{course_id}', 'destroy')->name('student.courses.destroy');
    Route::delete('/student_courses/delete-all', 'deleteAll')->name('student.courses.deleteAll');
});
// =========================== Static Pages Routes ===========================
// This section handles static and informational pages in the system.
// Includes course registration, study plan, student guide, and graduation projects.
//
// How to open:
// Course Registration: http://127.0.0.1:8000/courses_registration
// Study Plan: http://127.0.0.1:8000/StudyPlan
// Student Guide: http://127.0.0.1:8000/StudentGuide
// Graduation Projects: http://127.0.0.1:8000/Graduation

Route::get('/courses_registration', function () {
    return view('Subj-registration');
})->name('courses_registration');
Route::get('/StudyPlan', function () {
    return view('StudyPlan');
})->name('StudyPlan');
Route::get('/StudentGuide', function () {
    return view('StudentGuide');
})->name('StudentGuide');
Route::get('/Graduation', function () {
    $doctorCourses = DoctorCourse::whereHas('course', function ($query) {
        $query->where('code', 'PP502');
    })->with('doctor.user', 'course')->get();
    return view('Graduation-projects', compact('doctorCourses'));
})->name('Graduation');

//Team Members: Christin Mokbel Elias Eskaros /////////////////////////////////////////////////////////////////////////////////////////////////

// =========================== Course Search Route ===========================
// This route handles searching for courses in the system.
// It allows users to search by course name or related keywords.
//
// How to open:
// http://127.0.0.1:8000/search?query=course_name

Route::get('/search', [CourseController::class, 'search'])
    ->name('courses.search');
// =========================== File Routes ===========================
// This section manages course files (upload, view, edit, delete).
// Files can be PDFs, documents, presentations, or compressed files.
//
// How to open:
// Create file: http://127.0.0.1:8000/file/createfile
// Files list: http://127.0.0.1:8000/file/files
// View file: http://127.0.0.1:8000/file/showfile/{id}

Route::prefix('file')->group(function () {
    Route::get('/createfile', [FileController::class, 'create'])->name('createfile');
    Route::post('/storefile', [FileController::class, 'store'])->name('storefile');
    Route::get('/files', [FileController::class, 'index'])->name('files');
    Route::get('/editfile/{id}', [FileController::class, 'edit'])->name('editfile');
    Route::put('/updatefile/{id}', [FileController::class, 'update'])->name('updatefile');
    Route::get('/deletefile/{id}', [FileController::class, 'destroy'])->name('deletefile');
    Route::delete('/delete_all_file', [FileController::class, 'destroyAll'])->name('delete_all_file');
    Route::get('/showfile/{id}', [FileController::class, 'show'])->name('showfile');
    Route::get('/indexfiles', [FileController::class, 'showindex'])->name('indexfiles');
});
// =========================== Place Routes ===========================
// This section manages places (buildings, halls, and floors).
// It allows creating, editing, updating, deleting, and viewing all places.
//
// How to open:
// Create place: http://127.0.0.1:8000/place/createplace
// Places table: http://127.0.0.1:8000/place/places

Route::prefix('place')->group(function () {
    Route::get('/createplace', [Placecontroller::class, 'create'])->name('createplace');
    Route::post('/storeplace', [Placecontroller::class, 'store'])->name('storeplace');
    Route::get('/places', [Placecontroller::class, 'index'])->name('places');
    Route::get('/editplace/{id}', [Placecontroller::class, 'edit'])->name('editplace');
    Route::put('/updateplace/{id}', [Placecontroller::class, 'update'])->name('updateplace');
    Route::get('/deleteplace/{id}', [Placecontroller::class, 'destroy'])->name('deleteplace');
    Route::delete('/delete_all_place', [Placecontroller::class, 'destroyAll'])->name('delete_all_place');
});
// =========================== Notifications Routes ===========================
// This section handles user notifications system.
// Users can view notifications, mark them as read, delete single notifications,
// or delete all notifications (requires authentication).
//
// How to open:
// Notifications page: http://127.0.0.1:8000/notifications

Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::delete(
        '/notifications/{id}',
        [NotificationController::class, 'destroy']
    )->name('notifications.destroy');
    Route::delete(
        '/notifications/delete-all',
        [NotificationController::class, 'deleteAll']
    )
        ->name('notifications.deleteAll');
});

//Team Members: Dina Salah El-Sayed Tawfik /////////////////////////////////////////////////////////////////////////////////////////////////

// =========================== Lecture Schedule Routes ===========================
// This section manages the lecture scheduling system for courses.
// It allows creating, editing, updating, deleting, and viewing lecture schedules.
//
// How to open:
// Lecture form page: http://127.0.0.1:8000/lecture
// Lecture table page: http://127.0.0.1:8000/tablelecture
// Alternative table link: http://127.0.0.1:8000/table-study

Route::controller(LectureScheduleController::class)->group(function () {
    Route::get('/lecture', 'index')->name('lecture.form');
    Route::get('/tablelecture', 'indextable')->name('table-study');
    Route::get('/table-study', 'indextable');
    Route::post('/lectures/store', 'store')->name('lectures.store');
    Route::get('/lectures/{id}/edit', 'edit')->name('lectures.edit');
    Route::put('/lectures/{id}', 'update')->name('lectures.update');
    Route::delete('/lectures/{id}', 'destroy')->name('lectures.destroy');
    Route::post('/lectures/delete-all', 'deleteAll')->name('lectures.deleteAll');
});
// =========================== Exam Schedule Routes ===========================
// This section manages the exam scheduling system for courses.
// It allows creating, editing, updating, deleting, and viewing exam schedules.
//
// How to open:
// Exam form page: http://127.0.0.1:8000/exame
// Exams table page: http://127.0.0.1:8000/tableexame

Route::controller(ExameScheduleController::class)->group(function () {
    Route::get('/exame', 'index')->name('exame.form');
    Route::get('/tableexame', 'indextable')->name('table-ex');
    Route::get('/table-ex', 'indextable');
    Route::post('/exames/store', 'store')->name('exames.store');
    Route::get('/exames/{id}/edit', 'edit')->name('exames.edit');
    Route::put('/exames/{id}', 'update')->name('exames.update');
    Route::delete('/exames/{id}', 'destroy')->name('exames.destroy');
    Route::post('/exams/delete-all', 'deleteAll')->name('exams.deleteAll');
});
// =========================== Material Schedule Routes ===========================
// This section manages course materials (files, videos, online links, and descriptions).
// Allows creating, editing, updating, deleting, and viewing all materials per course.
//
// How to open:
// Materials form page: http://127.0.0.1:8000/materials
// Materials table page: http://127.0.0.1:8000/tablematerial

Route::controller(MaterialScheduleController::class)->group(function () {
    Route::get('/materials', 'index')->name('materials.form');
    Route::get('/tablematerial', 'indextable')->name('table-subj-study');
    Route::post('/materials/store', 'store')->name('materials.store');
    Route::get('/materials/{id}/edit', 'edit')->name('materials.edit');
    Route::put('/materials/{id}', 'update')->name('materials.update');
    Route::delete('/materials/{id}', 'destroy')->name('materials.destroy');
    Route::post('/materials/delete-all', 'deleteAll')->name('materials.deleteAll');
});
// =========================== Lecture Chat Routes ===========================
// Simple chat system for courses (Lectures).
// Students and doctors can communicate inside each course room.
//
// How to open:
// http://127.0.0.1:8000/chat/{courseId}
// Example:
// http://127.0.0.1:8000/chat/1

Route::controller(MessageScheduleController::class)->group(function () {
    Route::get('/chat/{courseId}', 'show')->name('subj-contant');
    Route::post('/chat/send/{courseId}', 'send')->name('chat.send');
    Route::get('/chat/messages/{courseId}', [MessageScheduleController::class, 'messages'])->name('chat.messages');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/chat/delete-all', [MessageScheduleController::class, 'deleteAll'])
        ->name('chat.deleteAll');
});
