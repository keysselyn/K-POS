<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route("home");
});
Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");


Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

Route::get('/home', 'HomeController@index')->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");


Route::middleware("auth")
    ->group(function () {
        Route::resource('empresa','EmpresaController');
        Route::resource('almacenes','AlmacenController');

        Route::resource("clientes", "ClientesController");
        Route::resource("suplidores", "SuplidoresController");
        Route::resource("usuarios", "UserController")->parameters(["usuarios" => "user"]);
        Route::resource("productos", "ProductosController");
        Route::resource("familias", "FamiliasController");
        Route::resource("impuestos", "ImpuestosController");
        Route::get("/ventas/ticket", "VentasController@ticket")->name("ventas.ticket");
        Route::resource("ventas", "VentasController");
        Route::get("/vender", "VenderController@index")->name("vender.index");
        Route::get("/vender2", "VenderController@obtenerProductos")->name("obtenerProductos");
        Route::post("/productoDeVenta", "VenderController@agregarProductoVenta")->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", "VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", "VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");
        Route::get("ExportExcel","ProductosController@ExportExcel")->name("ExportExcel");
        Route::post("ImportExcel","ProductosController@ImportExcel")->name("ImportExcel");


    });

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
