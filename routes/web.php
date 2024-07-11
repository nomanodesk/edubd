<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\InstitueClassController;
use App\Http\Controllers\ClassSectionController;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\InstitutionController::class, 'dashboard'])->name('home');

Route::resource('institutions', InstitutionController::class);
Route::resource('institute_classes', InstitueClassController::class);
Route::resource('class_sections', ClassSectionController::class);
Route::post('/getsection', [ClassSectionController::class, 'index'])->name('getsection');
Route::post('/addsection', [ClassSectionController::class, 'create'])->name('addsection');