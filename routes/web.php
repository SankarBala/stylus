<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StyleController;
use Illuminate\Support\Facades\Route;
use App\Models\Style;

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
Route::get('/style/{id}', [FrontendController::class, 'styleDetails'])->name('styleDetails');




Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('home');
    Route::resource('/style', StyleController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
