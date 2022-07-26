<?php

use Illuminate\Support\Facades\Route;

// use Spatie\Permission\Models\Role; //Crear Roles de Usuarios: Admin y Cliente

// Role::create(['name'=>'admin']);
// Role::create(['name'=>'cliente']);

Route::get('/', function () {
    return view('home');
})->name("home");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
