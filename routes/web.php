<?php

use App\Http\Controllers\BeerController;
//use App\Http\Controllers\LocalBeerController;
//use App\Http\Controllers\ProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

Route::get('/', [BeerController::class, 'index'])->name('home');

Route::get('/locals', function () {
    return view('locals');
})->name('locals');

//Route::get('/locals', [LocalBeerController::class, 'getLocalesByName'])->name('locals');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contactUsuarios', function () {
    return view('contactUsuarios');
})->name('contactUsuarios');

Route::get('/contactLocals', function () {
    return view('contactLocales');
})->name('contactLocales');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/aboutBeerfinder', function () {
    return view('aboutBeerfinder');
})->name('aboutBeerfinder');

Route::get('/cookies', function () {
    return view('cookiesPolytics');
})->name('cookiesPolicy');

Route::get('/privacy', function () {
    return view('privacyPolicy');
})->name('privacyPolicy');

Route::get('/legalAdvice', function () {
    return view('legalAdvice');
})->name('legalAdvice');

Route::get('/consumer', function () {
    return view('consume');
})->name('consume');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require _DIR_ . '/auth.php';
