<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Student;

Route::get('/welcome', [HomeController::class,'Wellcome']) ;
Route::get('/crud', [HomeController::class,'index']) ;
Route::get('/register', [HomeController::class,'register'])->name('register');
// Route::post('/upload',[HomeController::class,'upload']);
Route::get('/view', [HomeController::class, 'view']);
Route::get('/delete/{id}', [HomeController::class, 'delete']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/update_view/{id}', [HomeController::class, 'update_view']);
Route::post('/update/{id}', [HomeController::class, 'update']);
