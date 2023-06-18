<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RestauranteController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ESTOS SON CLONTROLADORES ANTERIORES 
//Se deben de agrupar los controladores para que este mas ordenado
//Primero se llama a la ruta que se le mostrara al usuario, esto no afecta en nada a menos que se le pase un parametro
//Segundo esta el metodo que se va a extraer de los controlladores ex: 'index', 'new', etc
//Tercero en la parte de ->name('<nombre de la ruta>') sera el nombre con el que podremos llamar a las rutas desde las vistas 
//Se llaman a las rutas desde las vistas asi: {{route('<nombre asignado en estas rutas>')}}
Route::controller(RestauranteController::class)->group(function(){
    Route::get('/restaurantes', 'index');
    Route::post('/restaurante', 'new');
    Route::put('/restaurante/{id}', 'update');
    Route::delete('/restaurante/{id}', 'destroy');
});

Route::controller(ReservaController::class)->group(function(){
    Route::post('/reservar/{id_restaurante}', 'index')->name('reserva.index');
    Route::post('/reserva/{id_restaurante}', 'new')->name('reserva.insertar');
    Route::get('/reservas','index2')->name('reservas.usuario');
    Route::post('/reserva/modificar/{id_reserva}', 'showmod')->name('reserva.modificar');
    Route::put('/reserva/modificar/{id}', 'update')->name('reserva.actualizar');
    Route::delete('/reserva/{id}', 'destroy')->name('reserva.eliminar');    
});

Route::controller(FacturaController::class)->group(function(){
    Route::get('/facturas', 'index');
    Route::post('/factura', 'new');
    Route::put('/factura/{id}', 'update');
    Route::delete('/factura/{id}', 'destroy');
});

Route::controller(ConsultaController::class)->group(function(){
    Route::get('/consultas','index')->name('consultas.index');
    Route::get('/consultas/registrar','indexinsert')->name('consulta.insertar');
    Route::post('/consultas/registrar','new')->name('consulta.insertar.confirmar');
    Route::delete('/consultas/eliminar/{id}','destroy')->name('consulta.eliminar');
    Route::get('/consultas/modificar/{id}','showToUpdate')->name('consulta.mostrar.modificar');
    Route::put('/consultas/modificar/{id}', 'update')->name('consulta.actualizar');
});
