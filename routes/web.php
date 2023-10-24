<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\HarcelementController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SignalementController;
use App\Http\Controllers\TutorielController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::get('contact', function () {
//     return view('contact');
// })->middleware('auth');
// Route::get('/blog/{slug}-{id}', function (string $slug, string $id, Request $request) {
//     return [
//         'slug' => $slug,
//         'id' => $id,
//         'name' => $request->input('name'),
//     ];
// })->where([
//     'id' => '[0-9]+',
//     'slug' => '[a-z0-9\-]+'
// ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact']);

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('harcelement', HarcelementController::class);  
    Route::resource('institution', InstitutionController::class);  
    Route::resource('tutoriel', TutorielController::class); 
    Route::resource('signalement', SignalementController::class); 
    Route::resource('blog', BlogController::class);
    Route::resource('publication', PublicationController::class);
    Route::resource('commentaire', CommentaireController::class);
});
