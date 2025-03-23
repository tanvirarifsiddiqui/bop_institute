<?php

use App\Http\Controllers\Admin\BulkEnrollmentController;
use App\Http\Controllers\Admin\CourseApplicationApprovalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\StudentRegistrationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseApplicationController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicCourseController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // User Dashboard
    Route::get('/dashboard', function () {
        return redirect('/'); // Or another fallback route
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Student Registration Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/student/register', [StudentRegistrationController::class, 'showRegistrationForm'])
        ->name('student.registration.form');
    Route::post('/student/register', [StudentRegistrationController::class, 'register'])
        ->name('student.register.submit');
});

// User-facing routes for course application
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/courses', [StudentCourseController::class, 'index'])->name('courses.index');
//    Route::get('/course-application/select', [CourseApplicationController::class, 'showCourseSelection'])
//        ->name('course_application.select');
//    Route::post('/course-application/submit', [CourseApplicationController::class, 'submitApplication'])
//        ->name('course_application.submit');
    // Student dashboard
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
        ->name('student.dashboard');

    // Course application
    Route::get('/course-application/select', [CourseApplicationController::class, 'showCourseSelection'])
        ->name('course_application.select');
    Route::post('/course-application/submit', [CourseApplicationController::class, 'submitApplication'])
        ->name('course_application.submit');

    // Payment status
    Route::get('/student/payment-status', [PaymentStatusController::class, 'index'])
        ->name('student.payment_status');

    // Course materials
    Route::get('/student/course-materials/{courseId}', [CourseMaterialController::class, 'show'])
        ->name('student.course_materials');
});

Route::prefix('admin/course-management')
    ->name('admin.course_management.')
    ->middleware(['auth:admin', 'verified'])
    ->group(function () {
        // Course Type routes
        Route::resource('course_types', \App\Http\Controllers\Admin\CourseManagement\CourseTypeController::class);
        // Program routes
        Route::resource('programs', \App\Http\Controllers\Admin\CourseManagement\ProgramController::class);

        // Course session routes
        Route::resource('sessions', \App\Http\Controllers\Admin\CourseManagement\CourseSessionController::class);

        // Batch routes
        Route::resource('batches', \App\Http\Controllers\Admin\CourseManagement\BatchController::class);

        // Course routes
        Route::resource('courses', \App\Http\Controllers\Admin\CourseManagement\CourseController::class);
    });

// Admin Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth:admin', 'verified'])
    ->group(function () {
        // Admin Home
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('home');
        Route::get('/course_management.index', [AdminHomeController::class, 'courseManagement'])->name('course_management.index');


        // Category Routes
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        // Formula Routes
        Route::prefix('formulas')->name('formulas.')->group(function () {
            Route::get('/image/{id}', [FormulaController::class, 'viewImage'])->name('viewImage');
            Route::get('/pdf/{id}', [FormulaController::class, 'viewPdf'])->name('viewPdf');
            Route::get('/', [FormulaController::class, 'index'])->name('index');
            Route::get('/create', [FormulaController::class, 'create'])->name('create');
            Route::post('/', [FormulaController::class, 'store'])->name('store');
            Route::get('/{formula}/edit', [FormulaController::class, 'edit'])->name('edit');
            Route::put('/{formula}', [FormulaController::class, 'update'])->name('update');
            Route::delete('/{formula}', [FormulaController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('/{user}', [UserController::class, 'show'])->name('show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        });

        // Inquiry Management Routes
        Route::prefix('inquiries')->name('inquiries.')->group(function () {
            Route::get('/', [InquiryController::class, 'index'])->name('index');
            Route::get('/{inquiry}', [InquiryController::class, 'show'])->name('show');
            Route::post('/{inquiry}/approve', [InquiryController::class, 'approve'])->name('approve');
            Route::post('/{inquiry}/reply', [InquiryController::class, 'reply'])->name('reply');
            Route::delete('/{inquiry}', [InquiryController::class, 'destroy'])->name('destroy');
        });

        // Student registrations approval routes.
        Route::get('student-registrations', [\App\Http\Controllers\Admin\StudentApprovalController::class, 'index'])
            ->name('student_registrations.index');
        Route::get('student-registrations/{studentRegistration}', [\App\Http\Controllers\Admin\StudentApprovalController::class, 'show'])
            ->name('student_registrations.show');
        Route::get('student-registrations/{studentRegistration}/edit', [\App\Http\Controllers\Admin\StudentApprovalController::class, 'edit'])
            ->name('student_registrations.edit');
        Route::put('student-registrations/{studentRegistration}', [\App\Http\Controllers\Admin\StudentApprovalController::class, 'update'])
            ->name('student_registrations.update');
        Route::delete('student-registrations/{studentRegistration}', [\App\Http\Controllers\Admin\StudentApprovalController::class, 'destroy'])
            ->name('student_registrations.destroy');
        Route::post('student-registrations/{studentRegistration}/approve', [\App\Http\Controllers\Admin\StudentApprovalController::class, 'approve'])
            ->name('student_registrations.approve');
        Route::post('student-registrations/{studentRegistration}/reject', [\App\Http\Controllers\Admin\StudentApprovalController::class, 'reject'])
            ->name('student_registrations.reject');

        // Admin routes for managing course applications
        Route::get('course-applications', [CourseApplicationApprovalController::class, 'index'])
            ->name('course_applications.index');
        Route::get('student-applications/{courseApplication}', [CourseApplicationApprovalController::class, 'show'])
            ->name('course_applications.show');
        Route::post('course-applications/{courseApplication}/approve', [CourseApplicationApprovalController::class, 'approve'])
            ->name('course_applications.approve');
        Route::post('course-applications/{courseApplication}/enroll', [CourseApplicationApprovalController::class, 'enroll'])
            ->name('course_applications.enroll');
        Route::post('course-applications/{courseApplication}/reject', [CourseApplicationApprovalController::class, 'reject'])
            ->name('course_applications.reject');

        // Admin routes for bulk enrollment processing
        Route::get('bulk-enrollment', [BulkEnrollmentController::class, 'index'])->name('bulk_enrollment.index');
        Route::post('bulk-enrollment/process', [BulkEnrollmentController::class, 'processBulkEnrollments'])->name('bulk_enrollment.process');



        //search payment
        Route::get('/bkash/search/{trxID}', [App\Http\Controllers\BkashTokenizePaymentController::class,'searchTnx'])->name('bkash-serach');

        //refund payment routes
        Route::get('/bkash/refund', [App\Http\Controllers\BkashTokenizePaymentController::class,'refund'])->name('bkash-refund');
        Route::get('/bkash/refund/status', [App\Http\Controllers\BkashTokenizePaymentController::class,'refundStatus'])->name('bkash-refund-status');

    });


//guests & users
// Public Routes
Route::get('/courses', [PublicCourseController::class, 'index'])->name('public.courses.index');
Route::get('/', [FormulaController::class, 'topPurchasedFormulas'])->name('welcome');
Route::get('/formulas', [FormulaController::class, 'formulaPage'])->name('user.formula.index');
Route::get('/formula/{id}', [FormulaController::class, 'show'])->name('formula.profile');
//Route::get('/formula/landing/{id}', [FormulaController::class, 'landingPage'])->name('formula.profile');
Route::get('/formula/landing/{id}', [FormulaController::class, 'landingPage'])->name('formula.landing');
Route::get('/sidebar', [FormulaController::class, 'showSidebar'])->name('sidebar');
Route::post('/formula/{id}/inquiry', [FormulaController::class, 'submitInquiry'])->name('formula.inquiry');

//guest formula image
Route::get('/formula/image/{id}', [FormulaController::class, 'viewImage']);



//about
Route::get('/about', function () {
    return view('about');
});

//about
Route::get('/contact', function () {
    return view('contact');
});

// Purchase Route
Route::middleware(['auth'])->group(function () {
    Route::get('/formula/{id}/purchase', [FormulaController::class, 'purchasePage'])->name('formula.purchase');
    Route::post('/formula/{id}/purchase', [FormulaController::class, 'processPurchase'])->name('formula.processPurchase');

    // bKash Payment Routes
    Route::get('/payment/bkash', [PaymentController::class, 'showBkashPaymentPage'])->name('payment.bkash');
    Route::post('/payment/bkash/process', [PaymentController::class, 'processBkashPayment'])->name('payment.bkash.process');

    Route::get('/bkash/payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'index']);
//    Route::post('/bkash/create-payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'createPayment'])->name('bkash-create-payment');
    Route::get('/bkash/callback', [App\Http\Controllers\BkashTokenizePaymentController::class,'callBack'])->name('bkash-callBack');
    Route::get('/formula/download/{paymentId}', [FormulaController::class, 'downloadPDF'])->name('formula.download');

    //test todo: have to remove it
    Route::post('/bkash/callback-test', [App\Http\Controllers\BkashTokenizePaymentController::class,'callBack'])->name('bkash.callback.test');

});

Route::view('/coming-soon', 'coming')->name('coming-soon');


// Include Breeze Authentication Routes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';

