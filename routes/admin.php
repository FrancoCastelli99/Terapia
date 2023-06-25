<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\EstiloController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\OurController;
use App\Http\Controllers\CarController;

Route::get('', [HomeController::class,'index']);
Route::resource('types', TypeController::class)->names('admin.types');
Route::resource('brands', BrandController::class)->names('admin.brands');
Route::resource('estilos', EstiloController::class)->names('admin.estilos');
Route::resource('transmissions', TransmissionController::class)->names('admin.transmissions');
Route::resource('fuels', FuelController::class)->names('admin.fuels');
Route::resource('ours', OurController::class)->names('admin.ours');
Route::resource('cars', CarController::class)->names('admin.cars');

// Route::get('admin/brands/index', [BrandController::class, 'index'])->name('admin.brands.index');
