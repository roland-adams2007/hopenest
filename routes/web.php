<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DontationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLoggedIN;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'store'])->name('contact');
Route::get('/donation',[DontationController::class,'index'])->name('donation');
Route::post('/donation',[DontationController::class,'donate'])->name('donation');
Route::get('/pay_verify',[DontationController::class,'verify'])->name('pay.verify');

//admin
Route::middleware([CheckLoggedIN::class])->group(function () {
    Route::get('/admin/login',[UserController::class,'show'])->name('login');
});
Route::post('/admin/login',[UserController::class,'login'])->name('login.store');
Route::get('/admin',[UserController::class,'index'])->middleware('auth')->name('admin.dashboard');
Route::get('/admin/blog',[BlogController::class,'admin_index'])->middleware('auth')->name('admin.blog');
Route::get('/admin/blog/create',[BlogController::class,'admin_create'])->middleware('auth')->name('admin.blog.create');
Route::post('/admin/blog/create',[BlogController::class,'admin_store'])->middleware('auth')->name('admin.blog.store');
Route::post('/admin/blog/delete',[BlogController::class,'admin_delete'])->middleware('auth')->name('admin.blog.delete');
Route::get('/admin/donations',[DontationController::class,'admin_donation'])->middleware('auth')->name('admin.donation');
Route::get('/admin/profile',[UserController::class,'admin_profile'])->middleware('auth')->name('admin.profile');
Route::post('/admin/logout',[UserController::class,'logout'])->middleware('auth')->name('logout');


