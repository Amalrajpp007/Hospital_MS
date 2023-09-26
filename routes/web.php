<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class,"index"])->name('user.index');
Route::get('/home', [HomeController::class,"redirect"])->middleware('auth','verified');
Route::get('/add_doctors_view', [AdminController::class,"addDoctors"])->name('add_doctors_view');
Route::post('/upload_doctor', [AdminController::class,"uploadDoctor"])->name('doctor.upload');
Route::post('/post_appointment', [HomeController::class,"postAppointment"])->name('user.appointment');
Route::get('/my_appointments', [HomeController::class,"viewAppointment"])->name('user.view.appointment');
Route::get('/cancel_appointment/{id}', [HomeController::class,"deleteAppointment"]);
Route::get('/view_appontments', [AdminController::class,"viewAppontments"])->name('view_appontments');
Route::get('/set_as_canceled/{id}', [AdminController::class,"cancelAppoint"])->name('cancel_appontments');
Route::get('/set_as_approved/{id}', [AdminController::class,"approveAppoint"])->name('approve_appontments');
Route::get('/view_doctors', [AdminController::class,"viewDoctors"])->name('admin.view_doctors');
Route::get('/delete_doctor/{id}', [AdminController::class,"deleteDoctor"])->name('delete_doctor');
Route::get('/edit_doctor/{id}', [AdminController::class,"updateDoctor"])->name('update_doctor');
Route::post('/update_doctor/{id}', [AdminController::class,"saveUpdate"])->name('save_update');
Route::get('/view_email/{id}', [AdminController::class,"viewEmail"])->name('view_email');
Route::post('/send_email/{id}', [AdminController::class,"sendEmail"])->name('send_email');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
