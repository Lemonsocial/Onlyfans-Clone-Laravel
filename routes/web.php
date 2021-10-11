<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Redirect;
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
    
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/admin9090secretsauce', function () {
    return view('lavacoach.dashboard.admin');
})->name('admin9090');

Route::middleware(['auth:sanctum', 'verified'])->get('/stripe_attached', function () {
    User::where('id',Auth::user()->id)->update(['stripe_verified'=>true]);
    return Redirect::to('http://172.17.193.149/user/profile#connectStripe');
})->name('stripe_attached');

Route::middleware(['auth:sanctum', 'verified'])->get('/stripe_refresh', function () {
    User::where('id',Auth::user()->id)->update(['stripe_verified'=>false]);
    return Redirect::to('http://172.17.193.149/user/profile#connectStripe');
})->name('stripe_refresh');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    \App::setLocale(Auth::user()->personal_settings['Language']);
    return view('lavacoach.dashboard.home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/notifications', function () {
    return view('lavacoach.dashboard.notifications');
})->name('notifications');

Route::middleware(['auth:sanctum', 'verified'])->get('/post', function () {
    return view('lavacoach.dashboard.post');
})->name('post');

Route::middleware(['auth:sanctum', 'verified'])->get('/interactions', function () {
    return view('lavacoach.dashboard.interactions');
})->name('interactions');

Route::middleware(['auth:sanctum', 'verified'])->get('/purchased', function () {
    return view('lavacoach.dashboard.purchased');
})->name('purchased');
Route::middleware([])->get('/{username}', function () {
    return view('lavacoach.dashboard.profile');
})->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('file-upload', [FileUploadController::class, 'fileUpload'])->name('file.upload');

Route::middleware(['auth:sanctum', 'verified'])->post('file-upload', [FileUploadController::class, 'fileUploadPost'])->name('file.upload.post');

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/USC2257', function () {
    return view('layouts.USC2257');
});
Route::get('/terms', function () {
    return view('layouts.terms');
});
Route::get('/contact', function () {
    return view('layouts.contact');
});
Route::get('/privacy', function () {
    return view('layouts.privacy');
});
Route::get('/features', function () {
    return view('layouts.features');
});
Route::get('/how-it-works', function () {
    return view('layouts.how-it-works');
});
Route::get('/regen_sitemap', function () {
    SitemapGenerator::create('https://lavacoach.social')->writeToFile("/home/ubuntu/lavacoach/public/sitemap.xml");
});
