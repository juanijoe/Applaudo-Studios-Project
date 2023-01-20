<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostulationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

//Public Routes

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin');
Route::post('/login/admin', [LoginController::class, 'adminLogin']);

Route::get('/login/candidate', [LoginController::class, 'showCandidateLoginForm'])->name('login.candidate');
Route::post('/login/candidate', [LoginController::class, 'candidateLogin']);

Route::get('/login/recruiter', [LoginController::class, 'showRecruiterLoginForm'])->name('login.recruiter');
Route::post('/login/recruiter', [LoginController::class, 'recruiterLogin']);

Route::get('/login/company', [LoginController::class, 'showCompanyLoginForm'])->name('login.company');
Route::post('/login/company', [LoginController::class, 'companyLogin']);

Route::get('/register/candidate', [RegisterController::class, 'showCandidateRegisterForm'])->name('register.candidate');
Route::post('/register/candidate', [RegisterController::class, 'createCandidate']);

Route::get('/candidate', [CandidateController::class, 'home'])->name('candidate.home');

Route::get('position/{id}', [PositionController::class, 'show'])->name('position.show');

Auth::routes();

//Candidate Routes

Route::group(['middleware' => 'candidate'], function () {

    Route::post('/candidate', [PostulationController::class, 'store'])->name('postulation.create');
    Route::get('/candidate/profile', [CandidateController::class, 'profile'])->name('candidate.profile');
    Route::post('/candidate/profile/edit', [CandidateController::class, 'editProfile'])->name('candidate.editProfile');
    Route::get('/candidate/profile/edit', [CandidateController::class, 'uploadProfile'])->name('candidate.uploadProfile');
    Route::get('/candidate/profile/delete', [CandidateController::class, 'delete'])->name('candidate.delete');
    Route::post('/candidate/profile/delete', [CandidateController::class, 'deleteProfile'])->name('candidate.deleteProfile');
});

//Recruiter Routes

Route::group(['middleware' => 'recruiter'], function () {

    Route::get('/recruiter', [RecruiterController::class, 'home'])->name('recruiter.home');

    Route::post('/postulation/status/{id}', [PostulationController::class, 'received'])->name('postulation.received');
    Route::get('/postulation/report/{id}', [PostulationController::class, 'generateReport'])->name('postulation.report');
    Route::post('/postulation/report', [PostulationController::class, 'reportStore'])->name('postulation.reported');
    Route::post('/postulation/report/show', [PostulationController::class, 'showReport'])->name('postulation.showReport')->withoutMiddleware('recruiter');
    Route::get('/postulation/email/{id}', [PostulationController::class, 'generateEmail'])->name('postulation.mailer');
    Route::post('/postulation/email', [PostulationController::class, 'sendEmail'])->name('postulation.email');
    Route::get('/postulation/{id}', [PostulationController::class, 'show'])->name('postulation.show')->withoutMiddleware('recruiter');
    Route::get('/postulation/profile/{id}', [PostulationController::class, 'showProfile'])->name('postulation.showProfile');
});
Route::group(['middleware' => ['recruiter', 'company']], function () {

    //
});

Route::group(['middleware' => 'company'], function () {

    Route::get('/company', [CompanyController::class, 'home'])->name('company.home');
    Route::get('/company/profile', [CompanyController::class, 'profile'])->name('company.profile');
    Route::resource('company/recruiters', RecruiterController::class);
    Route::get('position/edit/{position}', [PositionController::class, 'edit'])->name('position.edit');
    Route::post('position', [PositionController::class, 'store'])->name('position.store');
    Route::get('position', [PositionController::class, 'create'])->name('position.create');
    Route::patch('position/edit/{position}', [PositionController::class, 'update'])->name('position.update');
});


Route::group(['middleware' => 'admin'], function () {

    Route::get('admin', [AdminController::class, 'home'])->name('admin.home');
    Route::resource('admin/candidates', CandidateController::class);
    Route::resource('admin/companies', CompanyController::class);
    Route::resource('admin/recruiters', CompanyController::class);
    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/positions', PositionController::class);
    Route::resource('admin/postulations', PostulationController::class);
    Route::get('/register/company', [RegisterController::class, 'showCompanyRegisterForm'])->name('register.company');
    Route::get('/register/recruiter', [RegisterController::class, 'showRecruiterRegisterForm'])->name('register.recruiter');
    Route::post('/register/company', [RegisterController::class, 'createCompany']);
    Route::post('/register/recruiter', [RegisterController::class, 'createRecruiter']);
});
