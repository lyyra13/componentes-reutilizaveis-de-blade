<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

//Rotas de autenticação

Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/new-note', [MainController::class, 'newNote'])->name('new');
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');
    Route::get('/edit-note/{id}', [MainController::class, 'editNote'])->name('edit');
    Route::post('/edit-note-submit', [MainController::class, 'editNoteSubmit'])->name('edit.note.submit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/edit-note/{id}', [MainController::class, 'editNote'])->name('edit');
    Route::get('/delete-note/{id}', [MainController::class, 'deleteNote'])->name('delete');
    Route::get('/deleteNoteConfirm/{id}', [MainController::class, 'deleteNoteConfirm'])->name('deleteNoteConfirm');

});



Route::middleware([CheckIsNotLogged::class])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('register', [AuthController::class, 'create'])->name('register');
});


Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
