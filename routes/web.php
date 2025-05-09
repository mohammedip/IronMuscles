<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdherentController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\EntrainementController;
use App\Http\Controllers\HomeController;

    Route::get('/login', function () {
        Auth::logout();
        return view('auth\login');
    })->name('login');

    Route::get('/forgot_password', function () {
        Auth::logout();
        return view('auth\forgot-password');
    })->name('forgot_password');

    Route::get('/register', function () {
        Auth::logout();
        return view('auth\register');
    });

    Route::get('/reset_password/{token}', function () {
        Auth::logout();
        return view('auth\reset-password');
    })->name('reset_password');
    
 Route::get('/',[HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

    
  

    Route::resource('adherent', AdherentController::class);
    Route::resource('entrainement', EntrainementController::class);
    Route::resource('machine', MachineController::class);
    Route::resource('coach',CoachController::class);
    Route::resource('speciality',SpecialityController::class);
    Route::resource('dashbord',DashbordController::class);

    Route::get('/events', [EntrainementController::class, 'getEvents'])->name('planning.events');
    Route::get('/planning', [EntrainementController::class, 'planning'])->name('planning.index');


    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfileController::class, 'update'])->name('profil.update');

    Route::get('/adherent/{adherent}/ban', [AdherentController::class, 'ban'])->name('adherent.ban');
    Route::get('/adherent/{adherent}/activate', [AdherentController::class, 'activate'])->name('adherent.activate');

    Route::get('/abonnements', [AbonnementController::class, 'index'])->name('abonnement.index');
    Route::post('/abonnement/payment-form', [AbonnementController::class, 'showPaymentForm'])->name('abonnement.paymentForm');
    Route::post('/abonnement/process-payment', [AbonnementController::class, 'processPayment'])->name('abonnement.processPayment');
    Route::get('/abonnement/success', [AbonnementController::class, 'success'])->name('abonnement.success');

    Route::get('/payment/create', [AbonnementController::class, 'createPayment'])->name('payment.create');
    Route::get('/payment/success', [AbonnementController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [AbonnementController::class, 'paymentCancel'])->name('payment.cancel');

    Route::get('/profil/badge/download', [ProfileController::class, 'downloadBadge'])->name('badge.download');


});
    
    
  Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/forgot-password', [AuthController::class, 'forget_password'])->name('forgot_password.post');
    Route::post('/reset_password', [AuthController::class, 'reset_password'])->name('reset_password.post');

    Route::post('/contact', [HomeController::class, 'submitContactForm'])->name('contact.submit');
    Route::post('/newsletter', [HomeController::class, 'submitNewsletter'])->name('newsletter.submit');


