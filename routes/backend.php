<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\InterestAreasController;
use App\Http\Controllers\Backend\CollegeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginAttempt');

Route::group(['middleware' => ['auth:backend','permitted']], function () {

   Route::get('logout', [AuthController::class, 'logout'])->name('logout');
   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
   Route::get('/interestAreas', [InterestAreasController::class, 'index'])->name('interestAreas');

   Route::post('/getData', [InterestAreasController::class, 'get_data'])->name('getData');
   Route::post('/getSubCatData', [InterestAreasController::class, 'get_sub_data'])->name('getSubCatData');
   
   Route::resource('universities','UniversityController');
   Route::resource('users','UserController');

  // Route::get('/{uni_slug?}', [DashboardController::class, 'index'])->name('dashboard');


   Route::get('/collegeList', [CollegeController::class, 'index'])->name('collegeList');
});

Route::get('/university_list', function () {
   return view('backend.university.university_list');
});

/*Route::get('/users', function () {
   return view('backend.university.users.index');
});*/
/*Route::get('/college_list', function () {
   return view('backend.university.college.college_list');
});*/


Route::get('/graduates_list', function () {
   return view('backend.graduates.graduates_list');
});
Route::get('/graduatesCreate', function () {
   return view('backend.graduates.add_graduates');
});

Route::get('/alumini_list', function () {
   return view('backend.alumini.alumini_list');
});
Route::get('/aluminiCreate', function () {
   return view('backend.alumini.add_alumini');
});

Route::get('/booster_list', function () {
   return view('backend.booster.booster_list');
});

/*Route::get('/interest_area_list', function () {
   return view('backend.interestArea.interest_area_list');
});*/

Route::get('/meetings_list', function () {
   return view('backend.meetings.meetings_list');
});

Route::get('/schedule_meeting', function () {
   return view('backend.meetings.schedule_meeting');
});
Route::get('/test', function () {
   return view('backend.university.test');
});

Route::get('/profile', function () {
   return view('backend.profile');
});

Route::get('/permissions', function () {
   return view('backend.permissions');
});
