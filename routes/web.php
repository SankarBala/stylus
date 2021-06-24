<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StyleController;
use Illuminate\Support\Facades\Route;
use App\Models\Style;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AdminController;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');
Route::post('/query', [FrontendController::class, 'query'])->name('query');


Route::get('/styles/', [FrontendController::class, 'styles'])->name('styles');
Route::get('/styles/premium', [FrontendController::class, 'premium'])->name('premium');
Route::get('/styles/free', [FrontendController::class, 'free'])->name('free');
Route::get('/style/{style:slug}', [FrontendController::class, 'styleDetails'])->name('styleDetails');


Route::get('/style/download/{style:slug}.user.css', [FrontendController::class, 'styleDownload'])
    ->name('styleDownload')
    ->middleware('styleDownload');




Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('/style', StyleController::class);
    Route::get('/users', [AdminController::class, 'users'])->name('users');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
