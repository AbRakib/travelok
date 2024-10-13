<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\TourRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/tour-packages', [FrontendController::class, 'packages'])->name('packages');
Route::get('/package-details/{slug}', [FrontendController::class, 'package_details'])->name('package.details');
Route::get('/destination', [FrontendController::class, 'destination'])->name('destination');
Route::get('/destination-details/{slug}', [FrontendController::class, 'destination_details'])->name('destination.details');
Route::get('/guide', [FrontendController::class, 'guide'])->name('guide');
Route::get('/testimonial', [FrontendController::class, 'testimonial'])->name('testimonial');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact-store', [FrontendController::class, 'store'])->name('contact.store');
//register member
Route::get('/register-member', [FrontendController::class, 'memberCreate'])->name('register.member');
Route::post('/getDivision', [GuideController::class, 'getDivision'])->name('getDivision');
Route::post('/getDistrict', [GuideController::class, 'getDistrict'])->name('getDistrict');
Route::get('/login-member', [FrontendController::class, 'memberLogin'])->name('login.member');
Route::post('/store-member', [FrontendController::class, 'memberStore'])->name('member.store');
Route::post('/check-member', [FrontendController::class, 'memberCheck'])->name('member.check');
Route::get('/logout-member', [FrontendController::class, 'memberLogout'])->name('logout.member');
//blog
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog-details/{slug}', [FrontendController::class, 'blog_details'])->name('blog.details');

Route::middleware('registration')->group(function () {
    Route::get('/booking/{slug}', [FrontendController::class, 'booking'])->name('booking');
});

// admin section
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/check', [AuthController::class, 'access'])->name('access');
// amin dashboard
Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // tour request
    Route::prefix('/tour')->group(function () {
        Route::get('/requests', [TourRequestController::class, 'index'])->name('tour.request');
    });

    //Packages
    Route::prefix('/package')->group(function () {
        Route::get('/list', [PackageController::class, 'index'])->name('package.index');
        Route::get('/create', [PackageController::class, 'create'])->name('package.create');
        Route::get('/edit/{slug}', [PackageController::class, 'edit'])->name('package.edit');
        Route::post('/store', [PackageController::class, 'store'])->name('package.store');
        Route::post('/update/{slug}', [PackageController::class, 'update'])->name('package.update');
        Route::get('/delete/{slug}', [PackageController::class, 'destroy'])->name('package.delete');
    });

    //destination
    Route::prefix('/destination')->group(function () {
        Route::get('/index', [DestinationController::class, 'index'])->name('destination.index');
        Route::get('/create', [DestinationController::class, 'create'])->name('destination.create');
        Route::get('/edit/{slug}', [DestinationController::class, 'edit'])->name('destination.edit');
        Route::post('/store', [DestinationController::class, 'store'])->name('destination.store');
        Route::post('/update/{slug}', [DestinationController::class, 'update'])->name('destination.update');
        Route::get('/delete/{slug}', [DestinationController::class, 'destroy'])->name('destination.delete');
    });

    // service
    Route::prefix('/service')->group(function () {
        Route::get('/index', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/pending', [ServiceController::class, 'pending'])->name('service.pending');
        Route::get('/active', [ServiceController::class, 'active'])->name('service.active');
        Route::get('/show/{slug}', [ServiceController::class, 'show'])->name('service.show');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{slug}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::post('/update/{slug}', [ServiceController::class, 'update'])->name('service.update');
        Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
    });

    // guide
    Route::prefix('/guide')->group(function () {
        Route::get('/index', [GuideController::class, 'index'])->name('guide.index');
        Route::get('/show/{slug}', [GuideController::class, 'show'])->name('guide.show');
        Route::get('/create', [GuideController::class, 'create'])->name('guide.create');

        Route::post('/store', [GuideController::class, 'store'])->name('guide.store');
        Route::get('/edit/{slug}', [GuideController::class, 'edit'])->name('guide.edit');
        Route::post('/update/{id}', [GuideController::class, 'update'])->name('guide.update');
        Route::get('/delete/{id}', [GuideController::class, 'destroy'])->name('guide.delete');
    });

    // about us
    Route::prefix('/about')->group(function () {
        Route::get('/create', [AboutController::class, 'create'])->name('about.create');
        Route::get('/list', [AboutController::class, 'index'])->name('about.index');
        Route::post('/store', [AboutController::class, 'store'])->name('about.store');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::post('/update/{id}', [AboutController::class, 'update'])->name('about.update');
        Route::get('/delete/{id}', [AboutController::class, 'destroy'])->name('about.delete');
    });

    // blog us
    Route::prefix('/blog')->group(function () {
        Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
        Route::get('/list', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/show/{id}', [BlogController::class, 'show'])->name('blog.show');
        Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
    });

    // country
    Route::prefix('/country')->group(function () {
        Route::get('/countries', [CountryController::class, 'index'])->name('country.index');
        Route::post('/update/{slug}', [CountryController::class, 'update'])->name('country.update');
        Route::get('/store/{slug}', [CountryController::class, 'destroy'])->name('country.delete');
        Route::post('/store', [CountryController::class, 'store'])->name('country.store');
    });

    // district
    Route::prefix('/district')->group(function () {
        Route::get('/districts', [DistrictController::class, 'index'])->name('district.index');
        Route::get('/delete/{slug}', [DistrictController::class, 'destroy'])->name('district.delete');
        Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
    });

    // division
    Route::prefix('/division')->group(function () {
        Route::get('/divisions', [DivisionController::class, 'index'])->name('division.index');
        Route::get('/delete/{slug}', [DivisionController::class, 'destroy'])->name('division.delete');
        Route::post('/store', [DivisionController::class, 'store'])->name('division.store');
    });

    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    Route::prefix('/setting')->group(function () {
        Route::get('/settings', [SettingController::class, 'settings'])->name('settings');
        Route::post('/update/{id}', [SettingController::class, 'update'])->name('setting.update');
        Route::get('/contact', [SettingController::class, 'contact'])->name('setting.contact');
        Route::get('/delete/{id}', [SettingController::class, 'contactDestroy'])->name('contact.delete');
    });

    //theme
    Route::prefix('/theme')->group(function () {
        Route::get('/themes', [ThemeController::class, 'index'])->name('theme.index');
        Route::get('/create', [ThemeController::class, 'create'])->name('theme.create');
        Route::get('/create/{id}', [ThemeController::class, 'edit'])->name('theme.edit');
        Route::post('/update/{id}', [ThemeController::class, 'update'])->name('theme.update');
        Route::post('/store', [ThemeController::class, 'store'])->name('theme.store');
        Route::get('/delete/{id}', [ThemeController::class, 'destroy'])->name('theme.delete');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
