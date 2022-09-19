<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InterestAreasController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AluminiController;
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
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginAttempt');

Route::group(['middleware' => ['auth:admin','permitted']], function () {

   Route::get('logout', [AuthController::class, 'logout'])->name('logout');
   Route::get('/dashboard/{id?}', [DashboardController::class, 'index'])->name('dashboard');

   Route::resource('universities','UniversityController');
   Route::resource('graduate','GraduateController');
   Route::resource('alumini','AluminiController');
   Route::resource('users','UserController');

   Route::get('/interestAreas', [InterestAreasController::class, 'index'])->name('interestAreas');

   Route::post('/getData', [InterestAreasController::class, 'get_data'])->name('getData');
   Route::post('/getSubCatData', [InterestAreasController::class, 'get_sub_data'])->name('getSubCatData');
   
   

   Route::get('/universityadAdmin/{id}', [UserController::class, 'university_admin_view'])->name('universityAdmin');
   Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
   Route::put('/update_profile/{id}', [UserController::class, 'profile_update'])->name('update_profile');
   Route::get('/collegeList', [CollegeController::class, 'index'])->name('collegeList');
   
   //Route::get('/{uni_slug?}', [DashboardController::class, 'index'])->name('dashboard');



   Route::get('/booster_list', function () {
      return view('admin.booster.booster_list');
   });

   Route::get('/meetings_list', function () {
      return view('admin.meetings.meetings_list');
   });

   Route::get('/schedule_meeting', function () {
      return view('admin.meetings.schedule_meeting');
   });
   Route::get('/permissions', function () {
      return view('admin.permissions');
   });
   Route::get('/university_list', function () {
      return view('admin.university.university_list'); 
   });

}); 


