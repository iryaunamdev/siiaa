<?php

use App\Http\Livewire\Comisiones\Create;
use App\Http\Livewire\Comisiones\Index as ComisionesIndex;
use App\Http\Livewire\Configuraciones\Catalogos;
use App\Http\Livewire\Configuraciones\Index as ConfiguracionesIndex;
use App\Http\Livewire\Personas\CRUD as PersonasCRUD;
use App\Http\Livewire\Personas\Index as PersonasIndex;
use App\Http\Livewire\Usuarios\CRUD as UsuariosCRUD;
use App\Http\Livewire\Usuarios\Permisos as UsuariosPermisos;
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
    Route::get('/', ComisionesIndex::class)->middleware('auth')->name('comisiones');
    Route::get('editar/{comisionID?}', Create::class)->middleware('auth')->name('comisiones-editar');
});

//Modulo Personal
Route::group([
    'prefix' => 'siiaa/personal',
    'middleware'=>[
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ]
], function(){
    Route::get('/', PersonasIndex::class)->name('personas-list');
    Route::get('editar/{personaID?}', PersonasCRUD::class)->name('personas-crud');
});

Route::group([
    'prefix' => 'siiaa/configuraciones',
    'middleware'=>[
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ]
], function(){
    Route::get('/', ConfiguracionesIndex::class)->name('configuraciones');
    Route::get('catalogos', Catalogos::class)->name('catalogos');
    Route::get('usuarios', UsuariosCRUD::class)->name('usuarios');
    Route::get('permisos', UsuariosPermisos::class)->name('usuarios-permisos');
});
