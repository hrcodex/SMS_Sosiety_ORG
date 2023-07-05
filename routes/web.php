<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DownloadController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DonationController;
use App\Http\Controllers\backend\EventsController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\MemberController;
use App\Http\Controllers\backend\MonthlyFeeController;
use App\Http\Controllers\backend\website\FaqController;
use App\Http\Controllers\backend\website\SliderController;
use App\Http\Controllers\backend\MemberFormTEMPController;
use App\Http\Controllers\backend\NoticeController;
use App\Http\Controllers\backend\settings\PositionController;
use App\Http\Controllers\backend\website\AboutController;
use App\Http\Controllers\backend\website\MotiveController;
use App\Http\Controllers\backend\website\ContactController;

Route::group(['middleware' => 'prevent-back-history'], function () { //Prevent Back History

    //Temporary for any members registration form
    Route::prefix('create_member')->group(function () {
        Route::get('/index', [MemberFormTEMPController::class, 'index'])->name('create_member.index');
        Route::post('/store', [MemberFormTEMPController::class, 'store'])->name('create_member.store');
        Route::get('/registration/success', [MemberFormTEMPController::class, 'registrationSuccess'])->name('create_member.registrationSuccess');
    });


    Route::middleware('auth')->group(function () {

        // =====================Working Routs Starts===============

        //default Login Dashboard 
        Route::get('/dashboard', [DashboardController::class, 'default'])->name('dashboard.default');
        // Dashboard 

        Route::prefix('dashboard')->group(function () {
            Route::get('/index/{id}', [DashboardController::class, 'index'])->name('dashboard.index');
            // Route::get('/data/show/{id}', [DashboardController::class, 'dataShow'])->name('dashboard.data_show');
        });

        //Admin User
        Route::prefix('admin')->group(function () {
            //admin List
            Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
            Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
            Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
            //admin Profile
            Route::get('/profile/{id}', [AdminController::class, 'profile'])->name('admin.profile');
            Route::post('/change/password', [AdminController::class, 'changePassword'])->name('admin.change_password');
            Route::post('/update', [AdminController::class, 'update'])->name('admin.update');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        });
        //Events
        Route::prefix('event')->group(function () {
            Route::get('/index', [EventsController::class, 'index'])->name('events.index');
            Route::get('/edit/{id}', [EventsController::class, 'edit'])->name('event.edit');
            Route::get('/create', [EventsController::class, 'create'])->name('event.create');
            Route::post('/store', [EventsController::class, 'store'])->name('event.store');
            Route::post('/update', [EventsController::class, 'update'])->name('event.update');
            Route::get('/delete/{id}', [EventsController::class, 'destroy'])->name('event.destroy');
        });
        //Members
        Route::prefix('member')->group(function () {
            Route::get('/index', [MemberController::class, 'index'])->name('members.index');
            Route::get('/delete', [MemberController::class, 'destroy.destroy'])->name('member.destroy');
            Route::post('/store', [MemberController::class, 'store'])->name('member.store');
            Route::get('/delete/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
            Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
            Route::post('/update', [MemberController::class, 'update'])->name('member.update');
        });
        //Monthly Fees
        Route::prefix('monthlyFees')->group(function () {
            Route::get('/index', [MonthlyFeeController::class, 'index'])->name('monthlyFees.index');
            Route::post('/store', [MonthlyFeeController::class, 'store'])->name('monthlyFees.store');
            Route::get('/monthlyFees/{id}', [MonthlyFeeController::class, 'filter'])->name('monthlyFees.filter');
            Route::get('/delete/{id}', [MonthlyFeeController::class, 'destroy'])->name('monthlyFees.destroy');
        });

        //Donation
        Route::prefix('donation')->group(function () {
            Route::get('/index', [DonationController::class, 'index'])->name('donation.index');
            Route::post('/store', [DonationController::class, 'store'])->name('donation.store');
            Route::get('/filter/{id}', [DonationController::class, 'filter'])->name('donation.filter');
            Route::get('/delete/{id}', [DonationController::class, 'destroy'])->name('donation.destroy');
        });

        //Expense
        Route::prefix('expense')->group(function () {
            Route::get('/index', [ExpenseController::class, 'index'])->name('expense.index');
            Route::post('/store', [ExpenseController::class, 'store'])->name('expense.store');
            Route::get('/filter/{id}', [ExpenseController::class, 'filter'])->name('expense.filter');
            Route::get('/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
        });

        //Website
        Route::prefix('website')->group(function () {
            //__sliders__//
            Route::get('/slider/index', [SliderController::class, 'index'])->name('slider.index');
            Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
            Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
            Route::post('/slider/update', [SliderController::class, 'update'])->name('slider.update');
            Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
            //__Faq__//
            Route::get('/faq/index', [FaqController::class, 'index'])->name('faq.index');
            Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
            Route::get('/faq/destroy/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
            Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
            Route::post('/faq/update', [FaqController::class, 'update'])->name('faq.update');
            //__about us__//
            Route::get('/about/index', [AboutController::class, 'index'])->name('about.index');
            Route::post('/about/update', [AboutController::class, 'update'])->name('about.update');
            //__Motive__//
            Route::get('/motive/index', [MotiveController::class, 'index'])->name('motive.index');
            Route::post('/motive/update', [MotiveController::class, 'update'])->name('motive.update');

            //__Contact__//
            Route::get('/contact/index', [ContactController::class, 'index'])->name('contact.index');
            Route::post('/contact/update', [ContactController::class, 'update'])->name('contact.update');
        });

        //Settings
        Route::prefix('settings')->group(function () {
            Route::get('/position/index', [PositionController::class, 'index'])->name('position.index');
            Route::post('/position/store', [PositionController::class, 'store'])->name('position.store');
            Route::get('/position/delete/{id}', [PositionController::class, 'destroy'])->name('position.destroy');
        });
        //Settings
        Route::prefix('notice')->group(function () {
            Route::get('/index', [NoticeController::class, 'index'])->name('notice.index');
            Route::post('/store', [NoticeController::class, 'store'])->name('notice.store');
            Route::get('/destroy/{id}', [NoticeController::class, 'destroy'])->name('notice.destroy');
            Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
            Route::post('/update', [NoticeController::class, 'update'])->name('notice.update');
        });

        










        
    });


    require __DIR__ . '/auth.php';
});
