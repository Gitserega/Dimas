<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\Record\CreateController;
use App\Http\Controllers\Record\StoreController;
use App\Http\Controllers\Record\FindController;
use App\Http\Controllers\Record\ShowController;
use App\Http\Controllers\Record\EditController;
use App\Http\Controllers\Record\UpdateController;
use App\Http\Controllers\Record\DeleteController;;


Route::get('/', function (){ return view('main');}
)->name('main.index');
Route::get('/services', function (){ return view('services');}
)->name('service.index');
Route::get('/contacts', function (){ return view('contacts');}
)->name('contact.index');


Route::get('/records', function () { return view('records.index');})->name('records.index');


Route::get('records/create', CreateController::class)->name('records.create');
Route::post('/records', StoreController::class)->name('records.store');
Route::get('/records/{user}', ShowController::class)
        ->name('records.show')
        ->where('user', '[0-9]+');
Route::get('records/edit/{user}',EditController::class)->name('records.edit');
Route::patch('records/{record}', UpdateController::class)->name('records.update');
Route::post('/records/find', FindController::class)->name('records.find');
Route::delete('records/{id}', DeleteController::class)->name('records.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
