<?php

use App\Http\Livewire\Comisiones\Create;
use App\Http\Livewire\Comisiones\Crud;
use App\Http\Livewire\Comisiones\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Modulo Comisiones
Route::group(['prefix' => 'comisiones'], function(){
    Route::get('/', Index::class)->middleware('auth')->name('comisiones');
    Route::get('editar/{comisionID?}', Create::class)->middleware('auth')->name('comisiones-editar');
    //Route::get('editar/{comision_id?}', Crud::class)->middleware('auth')->name('comisiones-edit');
});
