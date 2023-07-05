<?php


use App\Http\Controllers\frontend\DetailsController;
use App\Http\Controllers\frontend\GalleryController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\WebsiteController;
use App\Http\Controllers\frontend\EventController;
use App\Http\Controllers\frontend\MemberController;
use App\Http\Controllers\frontend\NoticeController;
use Illuminate\Support\Facades\Route;

//Website All Routes


// website Home
Route::get('/', [HomeController::class, 'index'])->name('web_home.index');

Route::get('web/gallery', [GalleryController::class, 'index'])->name('web_gallery.index');

Route::get('web/events', [EventController::class, 'index'])->name('web_event.index');

Route::get('web/details/{id}', [DetailsController::class, 'index'])->name('web_details.index');


Route::get('web/members', [MemberController::class, 'index'])->name('web_member.index');

Route::get('web/notice', [NoticeController::class, 'index'])->name('web_notice.index');

