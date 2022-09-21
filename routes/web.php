<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InterestAreasCategoryController;
use App\Http\Controllers\Admin\InterestAreasSubCategoryController;
use App\Http\Controllers\Admin\InterestAreasController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AluminiController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\InviteController;
use App\Http\Controllers\Admin\SurveyManageController;
use App\Http\Controllers\Frontend\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login/{id?}', [AuthController::class, 'index'])->name('login');
Route::post('/login/{id?}', [AuthController::class, 'login'])->name('loginAttempt');
Route::get('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot-password');
Route::post('/forgotpassword', [AuthController::class, 'submitForgetPassword'])->name('submit-ForgetPassword');
Route::get('/change-password/{id}', [AuthController::class, 'changepassword'])->name('change-password');
Route::post('/changepassword/{id}', [AuthController::class, 'submitchangepassword'])->name('submit-change-password');

Route::group(['middleware' => ['auth:web','permitted']], function () {

   Route::get('logout', [AuthController::class, 'logout'])->name('logout');
   Route::get('/dashboard/{id?}', [DashboardController::class, 'index'])->name('dashboard');

   /**** Universities ****/
   Route::resource('universities','App\Http\Controllers\Admin\UniversityController');

   /**** Graduates ****/
   Route::resource('student','App\Http\Controllers\Admin\GraduateController');

   /**** Alumini ****/
   Route::resource('alumni','App\Http\Controllers\Admin\AluminiController');
   Route::post('/bulk_upload', [AluminiController::class, 'bulk_upload'])->name('bulk_upload');

   /**** Users ****/
   Route::resource('users','App\Http\Controllers\Admin\UserController');
   Route::get('/create/{id}',[UserController::class,'create_user'])->name('create');
   Route::post('/store/{id}',[UserController::class,'store_user'])->name('store');
   Route::get('/usersList/{id}', [UserController::class, 'users_view'])->name('usersList');//users view based on universities

   /**** User Profile ****/
   Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
   Route::put('/update_profile/{id}', [UserController::class, 'profile_update'])->name('update_profile');

   /**** Interest Area Category ****/
   Route::resource('interestCategories','App\Http\Controllers\Admin\InterestAreasCategoryController');
   
   /**** Interest Area SubCategory ****/
   Route::resource('interestSubCategories','App\Http\Controllers\Admin\InterestAreasSubCategoryController');



   /**** Interest Area ****/
   Route::get('/interestAreas', [InterestAreasController::class, 'index'])->name('interestAreas');
   Route::post('/getData', [InterestAreasController::class, 'get_data'])->name('getData');
   Route::post('/getSubCatData', [InterestAreasController::class, 'get_sub_data'])->name('getSubCatData');
   Route::post('/storeInterestArea', [InterestAreasController::class, 'storeInterestArea'])->name('storeInterestArea');

   /****Admin Interest Area ****/
   Route::get('/interest-Areas', [InterestAreasController::class, 'interest_list'])->name('interest_Areas');
   Route::get('/add-interestAreas', [InterestAreasController::class, 'add_interest_areas'])->name('add_interest_areas');
   Route::post('/save-interest-areas', [InterestAreasController::class, 'save_interest_areas'])->name('save_interest_areas');
   Route::get('/edit-interestArea/{id}', [InterestAreasController::class, 'edit_interestArea'])->name('edit_interestArea');
   Route::post('/update-interestArea/{id}', [InterestAreasController::class, 'update_interestArea'])->name('update_interestArea');
   Route::post('/destroy-interestArea/{id}', [InterestAreasController::class, 'destroy_interestArea'])->name('destroy_interestArea');

   /**** Permission ****/
   Route::post('/storeUserPermission', [PermissionController::class, 'permissionStore'])->name('storeUserPermission');
   Route::post('/getUserPermissions', [PermissionController::class, 'view'])->name('getUserPermissions');
   Route::resource('permission','App\Http\Controllers\Admin\PermissionController');


   /**** Booster ****/
   Route::resource('booster','App\Http\Controllers\Admin\BoosterController');
   
   /**** Meeting ****/
   Route::resource('meeting','App\Http\Controllers\Admin\MeetingController');
   Route::post('/get_alumini_date',[MeetingController::class,'get_alumini_date'])->name('get_alumini_date');
   
   

   /**** Mentors ****/
   Route::resource('mentors','App\Http\Controllers\Admin\MentorController');
   Route::post('/storeMentors', [MentorController::class, 'storeMentors'])->name('storeMentors');
  
   /**** College List ****/
   Route::get('/collegeList', [CollegeController::class, 'index'])->name('collegeList');

   Route::get('/add-availability',[AluminiController::class,'add_availability'])->name('add-availability');
   Route::post('/add-availability', [AluminiController::class, 'addavailability'])->name('addavailability');

  
   Route::post('/changepassword/{id}', [AuthController::class, 'submitchangepassword'])->name('submit-change-password');
   
   //Route::get('/{uni_slug?}', [DashboardController::class, 'index'])->name('dashboard');
   
  // Route::post('/forgotpassword', [AuthController::class, 'submitForgetPassword'])->name('submit-ForgetPassword');
   

/*******  Survey email send   *******/
   Route::any('/send_email', [DashboardController::class, 'send_email'])->name('email-send');
   Route::get('/survey/{id}', [DashboardController::class, 'survey'])->name('survey');
   //Route::post('/survey_create', [DashboardController::class, 'surveycreate'])->name('survey-create');

/***** send inviter ******/
   Route::get('/send_invite', [InviteController::class, 'index'])->name('sendInvite');
   Route::post('/create_invite', [InviteController::class, 'create'])->name('create-invite');
  
   Route::post('/get_survey_data', [InviteController::class, 'get_survey_data'])->name('get-survey-data');
   Route::post('/get_user_data', [InviteController::class, 'get_user_data'])->name('get-user-data');

   Route::get('/feedback', [InviteController::class, 'feedback'])->name('feedback');
   Route::post('/survey_create', [InviteController::class, 'surveycreate'])->name('survey-create');


/****** Survey Manage *******/

  Route::get('/survey_manage', [InviteController::class, 'survey_manage'])->name('survey-manage');
  Route::get('/survey', [SurveyManageController::class, 'view'])->name('survey');
  Route::post('/create_surveymanage', [SurveyManageController::class, 'create'])->name('createsurvey-manage');
}); 

/**** Register ****/
Route::resource('register','App\Http\Controllers\Frontend\RegisterController');




Route::get('/', function () {
      return view('frontend.home'); 
});

Route::get('/teams', function () {
      return view('admin.coming_soon'); 
});

Route::get('/colleges', function () {
      return view('admin.coming_soon'); 
});
/*Route::get('/mentors', function () {
      return view('admin.mentors.mentors'); 
});*/
Route::get('/admission-form', function () {
      return view('frontend.admission_form'); 
});
/*Route::get('/interestarea-cat', function () {
      return view('admin.interestAreas.category.list'); 
});
Route::get('/add-interestarea-cat', function () {
      return view('admin.interestAreas.category.add_category'); 
});
Route::get('/interestarea-subcat', function () {
      return view('admin.interestAreas.subcategory.list'); 
});*/

Route::get('/admission-form', function () {
      return view('frontend.admission_form'); 
});

Route::get('/home1', function () {
      return view('frontend.home1'); 
});
Route::get('/home2', function () {
      return view('frontend.home2'); 
});
Route::get('/chart', function () {
      return view('admin.chart'); 
});
