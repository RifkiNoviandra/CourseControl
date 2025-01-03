<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\ClassTypeController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseLevelController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\CurriculumSectionController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\MasterClassController;
use App\Http\Controllers\Admin\PriceTypeController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\OauthController;
use App\Http\Controllers\BecomeInstructorController;
use App\Http\Controllers\CheckCertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Instructor\DashboardInstructorController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Instructor\MakeCourseController;
use App\Http\Controllers\Instructor\OrderCourseController;
use App\Http\Controllers\Instructor\ReviewCourseController;
use App\Http\Controllers\Instructor\StudentCourseController;
use App\Http\Controllers\InstructorListController;
use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Student\MyCourseController;
use App\Http\Controllers\Instructor\ManageCourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/dashboard', [DashboardController::class, 'index']);

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('courses', [CourseController::class, 'index'])->name('courses');
Route::get('courses/{course_slug}/detail', [CourseController::class, 'show'])->name('detail.courses');
Route::get('become/instructor', [BecomeInstructorController::class, 'index'])->name('become.instructor');
Route::get('instructors', [InstructorListController::class, 'index'])->name('list.instructor');
Route::get('about/basicschool', [AboutController::class, 'basicschool'])->name('about.basicschool');
Route::get('about', [AboutController::class, 'about'])->name('about');
Route::get('contact', [AboutController::class, 'contact'])->name('contact');
Route::get('help', [HelpController::class, 'index'])->name('help');
Route::get('certificate/check', [CheckCertificateController::class, 'index'])->name('certificate.check');

// Login and register with google
Route::get('/oauth/google', [OauthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/oauth/google/callback', [OauthController::class, 'googleCallBack'])->name('auth.google.callback');

// Route For Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
        Route::resource('profile', AdminProfileController::class, ['only' => ['show', 'post', 'put', 'delete']]);
        Route::resource('users/admins', AdminController::class, ['only' => ['index', 'show']])->parameters([
            'users' => 'username'
        ]);
        Route::resource('users/students', StudentController::class)->parameters([
            'users' => 'username'
        ]);
        Route::resource('users/instructors', InstructorController::class)->parameters([
            'users' => 'username'
        ]);
        Route::resource('roles', RoleController::class, ['only' => ['index']])->parameters([
            'roles' => 'roles'
        ]);
        Route::resource('category/course-categories', CourseCategoryController::class, ['except' => 'show'])->parameters([
            'course_categories' => 'category_slug',
        ]);
        Route::resource('category/price-types', PriceTypeController::class, ['except' => 'show'])->parameters([
            'course_price_types' => 'price_type_slug'
        ]);
        Route::resource('category/class-types', ClassTypeController::class, ['except' => 'show'])->parameters([
            'course_class_types' => 'class_type_slug'
        ]);
        Route::resource('category/course-levels', CourseLevelController::class, ['except' => 'show'])->parameters([
            'course_masterclass_level' => 'masterclass_level_slug'
        ]);
        Route::resource('classes', ClassController::class);
        Route::resource('masterclasses', MasterClassController::class)->parameters([
            'course_masterclasses' => 'masterclass_slug'
        ]);
        Route::resource('masterclass.curriculum-section', CurriculumSectionController::class, ['except' => 'show'])->parameters([
            'course_curriculum_sections' => 'curriculum_section'
        ]);

        Route::resource('masterclass.curriculum-section.curriculum', CurriculumController::class, ['except' => 'show'])->parameters([
            'course_curriculum' => 'curriculum'
        ]);

        Route::resource('certificates', CertificateController::class);
        Route::resource('reviews', ReviewController::class);
    });
});


// Routes For Student
Route::middleware(['auth', 'student'])->group(function () {
    Route::get('student/setting', [DashboardStudentController::class, 'setting'])->middleware('verified')->name('student.setting');
    Route::get('student/profile', [DashboardStudentController::class, 'setting'])->middleware('verified')->name('student.profile');
    Route::get('student/my-course', [MyCoursecontroller::class, 'index'])->middleware('verified')->name('student.mycourse');
    Route::get('student/delete/account', [DashboardStudentController::class, 'deleteAccount'])->middleware('verified')->name('student.update');
    Route::put('student/password/update/{id}', [DashboardStudentController::class, 'updatePass'])->middleware('verified')->name('student.password.update');
    Route::put('student/setting/update/{id}', [DashboardStudentController::class, 'update'])->middleware('verified')->name('student.profile.update');
    Route::get('student/delete/account', [DashboardInstructorController::class, 'deleteAccount'])->middleware('verified')->name('student.delete');
    Route::resource('student', DashboardStudentController::class)->middleware('verified');
});

Route::middleware('auth')->group(function () {
    Route::get('courses/{course_slug}/detail/{curriculum}', [CourseController::class, 'course'])->middleware('verified')->name('course.detail.learning');
});

// Routes For Instructor
Route::middleware(['auth', 'instructor'])->group(function () {
    Route::get('instructor/setting', [DashboardInstructorController::class, 'setting'])->middleware('verified')->name('instructor.setting');
    // Route::get('instructor/create/course', [MakeCourseController::class, 'create'])->middleware('verified')->name('instructor.makecourse');
    Route::resource('instructor/make', ManageCourseController::class);
    Route::post('instructor/make/curriculum', [ManageCourseController::class, 'storeCurriculum'])->name('curriculum.store');

    Route::get('instructor/mycourse', [MakeCourseController::class, 'show'])->middleware('verified')->name('instructor.mycourse');
    Route::get('instructor/reviews', [ReviewCourseController::class, 'index'])->middleware('verified')->name('instructor.review');
    Route::get('instructor/orders', [OrderCourseController::class, 'index'])->middleware('verified')->name('instructor.order');
    Route::get('instructor/student', [StudentCourseController::class, 'index'])->middleware('verified')->name('instructor.student');
    Route::put('instructor/setting/update/{id}', [DashboardInstructorController::class, 'update'])->middleware('verified')->name('instructor.profile.update');
    Route::put('instructor/socmed/update/{id}', [DashboardInstructorController::class, 'updateSocmed'])->middleware('verified')->name('instructor.socmed.update');
    Route::put('instructor/password/update/{id}', [DashboardInstructorController::class, 'updatePass'])->middleware('verified')->name('instructor.password.update');
    Route::get('instructor/delete/account', [DashboardInstructorController::class, 'deleteAccount'])->middleware('verified')->name('instructor.delete');
    Route::resource('instructor', DashboardInstructorController::class)->middleware('verified');
});

//// Routes For Instructor
//Route::middleware('auth')->group(function() {
//    Route::get('/{username}', [ProfileController::class, 'index']);
//});
