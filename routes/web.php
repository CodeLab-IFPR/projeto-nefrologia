<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Mail\RedefinirSenha;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\AdminController;

Route::view('/about', 'about');
Route::redirect('/sobre', 'about');

// Rotas do SiteController
Route::resource('home', SiteController::class);
Route::get('/', [SiteController::class, 'index'])->name('user.index');
Route::get('/video/{slug}', [SiteController::class, 'details'])->name('video.details');

// Rotas de login
Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


// Rotas para redefinir senha
Route::get('/redefinir-senha', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/redefinir-senha', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// Painel administrativo
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Painel do administrador
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Editar senha
    Route::get('/seguranca', [AdminController::class, 'editPassword'])->name('seguranca.edit');

    // Atualizar senha
    Route::post('/seguranca', [AdminController::class, 'updatePassword'])->name('seguranca.update');

    Route::resource('videos', VideoController::class);
});
