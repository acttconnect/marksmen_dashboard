<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductEnquiryController;
use App\Http\Controllers\Admin\ContactEnquiryController;
use App\Http\Controllers\Admin\JobOpeningController;
use App\Http\Controllers\Admin\JobApplicationController;

use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\JobController as UserJobController;
use App\Http\Controllers\User\ApplicationController as UserApplicationController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\EnquiryController as UserEnquiryController;

use App\Http\Controllers\FrontendController;

use App\Http\Controllers\FrontendEnquiryController;




Route::post('/product-enquiry', [FrontendEnquiryController::class, 'store'])
    ->name('product-enquiry.store');

Route::post(
    '/contact-enquiry',
    [FrontendEnquiryController::class, 'contact']
)->name('contact-enquiry.store');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/clients', [FrontendController::class, 'clients'])->name('clients');
Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');






Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::middleware('guest')->group(function () {

            Route::get('/login', [
                AuthController::class,
                'showLogin'
            ])->name('login');

            Route::post('/login', [
                AuthController::class,
                'login'
            ])->name('login.submit');

        });
/*
|--------------------------------------------------------------------------
| Protected Admin
|--------------------------------------------------------------------------
*/

Route::middleware('admin')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [
                DashboardController::class,
                'index'
            ]
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/logout',
            [
                AuthController::class,
                'logout'
            ]
        )->name('logout');


        /*
        |--------------------------------------------------------------------------
        | Change Password
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/change-password',
            [
                AuthController::class,
                'showChangePassword'
            ]
        )->name('change-password');


        Route::put(
            '/change-password',
            [
                AuthController::class,
                'changePassword'
            ]
        )->name('change-password.update');


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'categories',
            CategoryController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Gallery
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'galleries',
            GalleryController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Blogs
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'blogs',
            BlogController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Product Enquiries
        |--------------------------------------------------------------------------
        */

       Route::resource(
    'product-enquiries',
    ProductEnquiryController::class
)->only([
    'index',
    'show',
    'edit',
    'update',
    'destroy'
]);

        Route::patch(
            'product-enquiries/{productEnquiry}/status',
            [
                ProductEnquiryController::class,
                'updateStatus'
            ]
        )->name('product-enquiries.status');


        /*
        |--------------------------------------------------------------------------
        | Contact Enquiries
        |--------------------------------------------------------------------------
        */

        Route::resource(
    'contact-enquiries',
    ContactEnquiryController::class
)->only([
    'index',
    'show',
    'edit',
    'update',
    'destroy'
]);


        Route::patch(
            'contact-enquiries/{contactEnquiry}/status',
            [
                ContactEnquiryController::class,
                'updateStatus'
            ]
        )->name('contact-enquiries.status');


        /*
        |--------------------------------------------------------------------------
        | Job Openings
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'jobs',
            JobOpeningController::class
        );


        Route::patch(
            'jobs/{job}/status',
            [
                JobOpeningController::class,
                'updateStatus'
            ]
        )->name('jobs.status');


        /*
        |--------------------------------------------------------------------------
        | Job Applications
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'applications',
            JobApplicationController::class
        )->only([
            'index',
            'show',
            'edit',
            'update',
            'destroy'
        ]);


        Route::patch(
            'applications/{application}/status',
            [
                JobApplicationController::class,
                'updateStatus'
            ]
        )->name('applications.status');


        Route::get(
            'applications/{application}/resume',
            [
                JobApplicationController::class,
                'downloadResume'
            ]
        )->name('applications.resume');

    });
    });

       Route::prefix('user')
    ->name('user.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Guest User
        |--------------------------------------------------------------------------
        */

        Route::middleware('guest')->group(function () {

            Route::get('/login', [
                UserAuthController::class,
                'showLogin'
            ])->name('login');

            Route::post('/login', [
                UserAuthController::class,
                'login'
            ])->name('login.submit');


            Route::get('/register', [
                UserAuthController::class,
                'showRegister'
            ])->name('register');

            Route::post('/register', [
                UserAuthController::class,
                'register'
            ])->name('register.submit');

        });


        /*
        |--------------------------------------------------------------------------
        | Authenticated User
        |--------------------------------------------------------------------------
        */

        Route::middleware('user')->group(function () {


            /*
            |--------------------------------------------------------------------------
            | Dashboard
            |--------------------------------------------------------------------------
            */

            Route::get('/dashboard', [
                UserDashboardController::class,
                'index'
            ])->name('dashboard');


            /*
            |--------------------------------------------------------------------------
            | Jobs
            |--------------------------------------------------------------------------
            */

            Route::get('/jobs', [
                UserJobController::class,
                'index'
            ])->name('jobs.index');


            Route::get('/jobs/{job}', [
                UserJobController::class,
                'show'
            ])->name('jobs.show');


            Route::get('/jobs/{job}/apply', [
                UserApplicationController::class,
                'create'
            ])->name('jobs.apply');


            Route::post('/jobs/{job}/apply', [
                UserApplicationController::class,
                'store'
            ])->name('jobs.apply.store');


            /*
            |--------------------------------------------------------------------------
            | My Applications
            |--------------------------------------------------------------------------
            */

            Route::get('/applications', [
                UserApplicationController::class,
                'index'
            ])->name('applications.index');


            /*
            |--------------------------------------------------------------------------
            | Product Enquiry
            |--------------------------------------------------------------------------
            */

            Route::get('/product-enquiry', [
                UserEnquiryController::class,
                'productForm'
            ])->name('product-enquiry');


            Route::post('/product-enquiry', [
                UserEnquiryController::class,
                'submitProduct'
            ])->name('product-enquiry.submit');


            /*
            |--------------------------------------------------------------------------
            | Contact / Callback
            |--------------------------------------------------------------------------
            */

            Route::get('/contact', [
                UserEnquiryController::class,
                'contactForm'
            ])->name('contact');


            Route::post('/contact', [
                UserEnquiryController::class,
                'submitContact'
            ])->name('contact.submit');


            /*
            |--------------------------------------------------------------------------
            | Profile
            |--------------------------------------------------------------------------
            */

            Route::get('/profile', [
                UserProfileController::class,
                'index'
            ])->name('profile');


            Route::put('/profile', [
                UserProfileController::class,
                'update'
            ])->name('profile.update');


            /*
            |--------------------------------------------------------------------------
            | Change Password
            |--------------------------------------------------------------------------
            */

            Route::get('/change-password', [
                UserProfileController::class,
                'passwordForm'
            ])->name('change-password');


            Route::put('/change-password', [
                UserProfileController::class,
                'changePassword'
            ])->name('change-password.update');


            /*
            |--------------------------------------------------------------------------
            | Logout
            |--------------------------------------------------------------------------
            */

            Route::post('/logout', [
                UserAuthController::class,
                'logout'
            ])->name('logout');

        });

    });

