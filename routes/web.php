<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\BeerlocalController;
use App\Http\Controllers\LocalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

Route::get('/', [BeerController::class, 'index'])->name('home');

//Route::get('/locals', function () {
//    return view('locals');
//})->name('locals');

Route::get('/locals', [LocalController::class, 'getLocalsByName'])->name('locals');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contactUsuarios', function () {
    return view('form');
})->name('contactUsuarios');

Route::get('/contactLocals', function () {
    return view('eform');
})->name('contactEmpresas');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/aboutBeerfinder', function () {
    return view('about');
})->name('aboutBeerfinder');

Route::get('/cookies', function () {
    return view('cookies');
})->name('cookiesPolicy');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacyPolicy');

Route::get('/legalAdvice', function () {
    return view('advice');
})->name('legalAdvice');

Route::get('/consumer', function () {
    return view('responsability');
})->name('consume');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::put('/dashboard/locales/{id}', [DashboardController::class, 'updateLocal'])->name('dashboard.locales.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
