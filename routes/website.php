<?php

use App\Http\Controllers\frontend\DetailsController;
use App\Http\Controllers\frontend\GalleryController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\WebsiteController;
use App\Http\Controllers\frontend\EventController;
use Illuminate\Support\Facades\Route;

//Website All Routes


// website Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/events', [EventController::class, 'index'])->name('event.index');

Route::get('/details', [DetailsController::class, 'index'])->name('details.index');















Route::get('/members', [WebsiteController::class, 'memberIndex'])->name('member.index');


Route::get('/notice', [WebsiteController::class, 'noticeIndex'])->name('notice.index');
