<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ReportsBelumController;
use App\Http\Controllers\ReportsSudahController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\PagesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LandingController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/petugas', [RoomsController::class, 'dashPetugas'])->name('petugas.home');
Route::get('/petugas/room', [RoomsController::class, 'roomPetugas']);
Route::post('/petugas/room', [RoomsController::class, 'update']);
Route::get('/petugas/room/{room}', [RoomsController::class, 'show']);
Route::patch('/petugas/room/{room}', [RoomsController::class, 'update'])->name('update');
Route::get('/petugas/room/{room}/foto', [RoomsController::class, 'showfotoPetugas']);

// Route::get('/image-upload', [FileUpload::class, 'createForm']);
// Route::post('/image-upload', [FileUpload::class, 'fileUpload'])->name('imageUpload');

Route::get('/admin/room/{room}', [RoomsController::class, 'adminshow']);

Route::get('/admin/room/{room}/foto', [RoomsController::class, 'showfoto']);
Route::patch('/admin/room/{room}', [RoomsController::class, 'adminupdate'])->name('adminupdate');

Route::get('/admin/room/{room}/resetStatus', [RoomsController::class, 'resetStatus'])->name('resetStatus');
Route::patch('/admin/room/{room}/resetStatus', [RoomsController::class, 'resetStatus'])->name('resetStatus');

Route::get('/admin/resetAllStatus', [RoomsController::class, 'resetAllStatus'])->name('resetAllStatus');
Route::patch('/admin/resetAllStatus', [RoomsController::class, 'resetAllStatus'])->name('resetAllStatus');

Route::patch('/admin/room', [RoomsController::class, 'roomAdmin'])->middleware('is_admin');
Route::get('/admin/room', [RoomsController::class, 'roomAdmin'])->middleware('is_admin');

Route::get('/admin', [RoomsController::class, 'dashAdmin'])->name('admin.home')->middleware('is_admin');
Route::get('/success', function () {
    return view('success');
});

Route::get('/admin/reports/{report}', [ReportsController::class, 'reportShow'])->middleware('is_admin');
Route::get('/admin/deleteAllReports', [ReportsController::class, 'destroyAllReport'])->middleware('is_admin');
Route::get('/admin/reports/{report}/delete', [ReportsController::class, 'destroyReport'])->middleware('is_admin');
Route::get('/admin/reports', [ReportsController::class, 'index'])->middleware('is_admin');
Route::post('/admin/reports', [ReportsController::class, 'index'])->middleware('is_admin');
Route::get('/admin/reportsBelum', [ReportsBelumController::class, 'index'])->middleware('is_admin');
Route::get('/admin/reportsSudah', [ReportsSudahController::class, 'index'])->middleware('is_admin');

Route::get('/admin/cetakReportsSemua', [ReportsController::class, 'pdf'])->middleware('is_admin');
Route::get('/admin/cetakReportsBelum', [ReportsBelumController::class, 'pdf'])->middleware('is_admin');
Route::get('/admin/cetakReportsSudah', [ReportsSudahController::class, 'pdf'])->middleware('is_admin');

// Route::resource('user', 'App\Http\Controllers\UserController');
// Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
// Route::post('/profile', 'App\Http\Controllers\UserController@postprofile')->name('user.postProfile');
