<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\AdherentController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\AbonnementController;



    Route::get('/login', function () {
        return view('auth\login');
    })->name('login');

    Route::get('/forgot_password', function () {
        return view('auth\forgot-password');
    })->name('forgot_password');

    Route::get('/register', function () {
        return view('auth\register');
    });

    Route::get('/reset_password/{token}', function () {
        return view('auth\reset-password');
    })->name('reset_password');
    

    Route::get('/404', function () {
        return view('pages\404');
    });

  



Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashbord');
    });

    Route::get('/dashbord', function () {
        return view('dashbord');
    })->name('dashbord');
    
    Route::get('/profile', function () {
        return view('pages\profil');
    });

    Route::resource('Abonnement', AbonnementController::class);
    Route::resource('Adherent', AdherentController::class);
    Route::resource('Planning', PlanningController::class);
    Route::resource('Machine', MachineController::class);
    Route::resource('Coach',CoachController::class);
});
    
    
  Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/forgot-password', [AuthController::class, 'forget_password'])->name('forgot_password.post');
    Route::post('/reset_password', [AuthController::class, 'reset_password'])->name('reset_password.post');



