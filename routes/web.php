<?php

use App\Http\Controllers\DioceseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\LandingController;
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

Route::get('/', function () {
    return redirect('/landing');
});

Auth::routes();

Route::get('/landing', [LandingController::class, 'index'])->name('landing');
Route::get('/register', [LandingController::class, 'register'])->name('register');
Route::get('/verify', [LandingController::class, 'verify'])->name('verify');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/changepsd', [HomeController::class, 'change_psd'])->name('changepsd')->middleware('auth');

Route::post('/contact/add', [ContactController::class, 'addNewContact'])->name('addcontact');
Route::post('/contact/find', [ContactController::class, 'findContact'])->name('findcontact');
Route::post('/contact/verify', [ContactController::class, 'verifyPhone'])->name('verifyPhone');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts');
    Route::get('/contacts/list', [App\Http\Controllers\ContactController::class, 'contactList']);
    Route::get('/contacts/print', [App\Http\Controllers\ContactController::class, 'printContacts']);
    Route::get('/contacts/reportlist', [App\Http\Controllers\ContactController::class, 'reportListContacts']);
    Route::get('/contacts/report', [App\Http\Controllers\ContactController::class, 'report']);
    Route::get('/contacts/csvdownload', [App\Http\Controllers\ContactController::class, 'downloadCsv']);

    Route::post('/contact/hostel', [App\Http\Controllers\ContactController::class, 'hostel']);
    Route::get('/upload', [App\Http\Controllers\UploadController::class, 'index'])->name('upload');
    Route::post('/upload', [App\Http\Controllers\UploadController::class, 'upload']);
});

Route::get('/hostel', [HostelController::class, 'index'])->name('hostel');
Route::post('/hostel/edit', [HostelController::class, 'edit'])->name('hostelEdit');
Route::post('/hostel/delete', [HostelController::class, 'delete'])->name('hostelDelete');

Route::get('/diocese', [DioceseController::class, 'index'])->name('diocese');
Route::post('/diocese/edit', [DioceseController::class, 'edit'])->name('dioceseEdit');
Route::post('/diocese/delete', [DioceseController::class, 'delete'])->name('dioceseDelete');