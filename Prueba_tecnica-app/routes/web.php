<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;


Route::controller(IndexController::class)->group(function(){
    Route::get('/','index');
    Route::get('datatable/Listar','Listar')->name('datatable.Listar');
    Route::get('datatable/Select_Ciudad','Select_Ciudad')->name('select.Ciudad');
    Route::get('datatable/Select_Cliente','Select_Cliente')->name('select.Cliente');
    Route::get('datatable/Select_Producto','Select_Producto')->name('select.Producto');
    Route::get('insert/cliente','Insert_Cliente')->name('cliente.nuevo');
    Route::get('insert/producto','Insert_Producto')->name('producto.nuevo');
    Route::get('insert/ciudad','Insert_Ciudad')->name('ciudad.nuevo');
    Route::get('insert/orden','Insert_Orden')->name('orden.nuevo');
    Route::get('detalle/modal','Detalle')->name('detalle');
    Route::get('eliminar/ord','Eliminar_Orden')->name('eliminar.orden');
    Route::get('update/ord','Update_Orden')->name('update.ord');
});
