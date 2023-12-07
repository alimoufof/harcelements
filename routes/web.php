<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TutorielController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\HarcelementController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SignalementController;
use App\Http\Controllers\UserController;

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
    return view('home');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function() {
    Route::resource('harcelement', HarcelementController::class);  
    Route::resource('institution', InstitutionController::class);  
    Route::resource('tutoriel', TutorielController::class); 
    Route::resource('signalement', SignalementController::class); 
    Route::resource('blog', BlogController::class);
    Route::resource('publication', PublicationController::class);
    Route::resource('commentaire', CommentaireController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
});
