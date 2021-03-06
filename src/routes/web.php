<?php

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

Auth::routes(['register'=>false]);

Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => [ 'can:ver reportes' ]], function() {
    Route::get('/ventas/diarias', 'VentasController@diarias')
        ->name('ventas.diarias');

    Route::get('/ventas/productos', 'VentasController@productos')
        ->name('ventas.productos');

    Route::get('/ventas/vendedores', 'VentasController@vendedores')
        ->name('ventas.vendedores');
});

Route::group(['middleware' => ['can:administrar usuarios']], function() {
    Route::get('/users/nomina', 'UsersController@nomina')
        ->name('users.nomina');
    Route::get('/users/{user}/roles', 'UsersController@roles')
        ->name('users.roles');
    Route::post('/users/{user}/addRole', 'UsersController@addRole')
        ->name('users.addRole');
    Route::post('/users/{user}/delRole', 'UsersController@delRole')
        ->name('users.delRole');
    Route::get('/users/{user}/ventas', 'UsersController@ventas')
        ->name('users.ventas');        

    Route::resource('/users', 'UsersController');
});

Route::group(['middleware' => ['can:administrar inventario']], function() {
    Route::get('productos/{producto}/proveedores', 'ProductosController@proveedores')
        ->name('productos.proveedores');
    Route::get('productos/{producto}/addProveedor', 'ProductosController@addProveedor')
        ->name('productos.addProveedor');
    Route::post('productos/{producto}/addProveedor', 'ProductosController@storeProveedor')
        ->name('productos.storeProveedor');
    Route::delete('productos/{producto}/delProveedor', 'ProductosController@delProveedor')
        ->name('productos.delProveedor');
    Route::get('productos/{producto}/comprar/{proveedor}', 'ProductosController@comprar')
        ->name('productos.comprar');
    Route::post('productos/{producto}/comprar/{proveedor}', 'ProductosController@comprarGuardar')
        ->name('productos.comprarGuardar');

    Route::get('solicitudescompra', 'SolicitudesCompraController@index')
        ->name('solicitudescompra.index');

    Route::get('solicitudescompra/status/{status}', 'SolicitudesCompraController@index')
        ->name('solicitudescompra.index.status');

    Route::get('solicitudescompra/{solicitud}', 'SolicitudesCompraController@show')
        ->name('solicitudescompra.show');
    Route::get('solicitudescompra/{solicitud}/pagada', 'SolicitudesCompraController@pagada')
        ->name('solicitudescompra.pagada');
    Route::get('solicitudescompra/{solicitud}/cancelar', 'SolicitudesCompraController@cancelar')
        ->name('solicitudescompra.cancelar');
    Route::get('solicitudescompra/{solicitud}/surtida', 'SolicitudesCompraController@surtida')
        ->name('solicitudescompra.surtida');

    Route::resource('productos', 'ProductosController');
});


Route::prefix('pdv')->middleware(['can:vender'])->group(function()  {
    Route::get('/', 'PuntoDeVentaController@index')
        ->name('puntodeventa.index');
    Route::get('sesion', 'PuntoDeVentaController@sesion')
        ->name('puntodeventa.sesion');
    Route::post('agregar', 'PuntoDeVentaController@agregar')
        ->name('puntodeventa.agregar');
    Route::get('limpiar', 'PuntoDeVentaController@limpiar')
        ->name('puntodeventa.limpiar');
    Route::post('guardar', 'PuntoDeVentaController@guardar')
        ->name('puntodeventa.guardar');
    Route::get('recibo/{venta}', 'PuntoDeVentaController@recibo')
        ->name('puntodeventa.recibo');
});

Route::prefix('ventas')
    ->middleware(['can:facturar'])->group(function() {
    Route::get('buscar', 'VentasController@buscar')
        ->name('ventas.buscar');
    Route::post('buscar',  'VentasController@buscarReal')
        ->name('ventas.buscarReal');
    Route::post('facturar/{venta}', 'VentasController@facturar')
        ->name('ventas.facturar');
    Route::get('ver/{venta}', 'VentasController@ver')
        ->name('ventas.ver');
    Route::get('factura/{venta}', 'VentasController@factura')
        ->name('ventas.factura');
});

