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

Route::get('/', function () {
    return view('welcome');
});

//HOME
Route::get('/', 'PaginasController@home')->name('inicio');

Auth::routes();

Route::post('logindistribuidor', 'Auth\LoginDistribuidorController@login')->name('logindistribuidor');
Route::get('/home', 'HomeController@index')->name('home');

//REGISTRO DE DISTRIBUIDORES
Route::get('registro', ['uses' => 'DistribuidorController@index', 'as' => 'registro']);
Route::post('/registro', ['uses' => 'DistribuidorController@store', 'as' => 'cliente.store']);
Route::post('/nuevousuario', ['uses' => 'DistribuidorController@registroStore', 'as' => 'registro.store']);

//EXCEL
Route::get('importExport', 'Adm\ExcelController@importExport')->name('importExport');
Route::get('downloadExcel/{type}', 'Adm\ExcelController@downloadExcel')->name('downloadExcel');
Route::post('importExcell', 'Adm\ExcelController@importExcell')->name('importExcell');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*----------------LOGIN ADMIN COTIZADOR----------------*/
Route::get('/admin', 'Admin\AdminController@login')->name('admin.login');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/home', ['uses' => 'Admin\AdminController@home', 'as' => 'admin.home']);

    /*------------PEDIDOS----------------*/
    Route::resource('pedidosadmin', 'Admin\PedidosController');

});
/*------------PEDIDOS----------------*/
Route::resource('pedidos', 'PedidosController');

/*----------------LOGIN TIENDA----------------*/
Route::get('/tienda', 'Tienda\TiendaController@login')->name('tienda.login');

Route::prefix('tienda')->middleware('auth')->group(function () {

    Route::get('/home', ['uses' => 'Tienda\TiendaController@home', 'as' => 'tienda.home']);
    Route::get('/presupuestos', ['uses' => 'Tienda\TiendaController@presupuestos', 'as' => 'tienda.presupuestos']);
    /*------------PEDIDOS----------------*/
    Route::resource('pedidostienda', 'Tienda\PedidosController');
});

/*******************ADMIN************************/
Route::prefix('adm')->middleware('auth')->group(function () {

    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController');

    /*------------ADICIONALES----------------*/
    Route::resource('adicionales', 'Adm\AdicionalesController');

    /*------------OBSERVACIONES----------------*/
    Route::resource('observaciones', 'Adm\ObservacionesController');

    /*------------SUPERFICIES----------------*/
    Route::resource('superficies', 'Adm\SuperficiesController');

    /*------------STOCKS----------------*/
    Route::resource('stocks', 'Adm\StocksController');

    /*------------DESCUENTOS----------------*/
    Route::resource('descuentos', 'Adm\DescuentosController');

    /*------------RUBROS----------------*/
    Route::resource('rubros', 'Adm\RubrosController');

    /*------------UNIDADES----------------*/
    Route::resource('unidades', 'Adm\UnidadesController');

    /*------------MATERIALES----------------*/
    Route::resource('materiales', 'Adm\MaterialesController');

    /*------------TIENDA----------------*/
    Route::resource('tiendas', 'Adm\TiendasController');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin');

    /*-----CARGA DE EXCELS-----------*/
    Route::get('excelcat', ['uses' => 'Adm\MaterialesController@excelcat', 'as' => 'excelcat']);
    Route::post('/import-excel', 'Adm\MaterialesController@importCat')->name('importCat');

});

/*******************ADMIN TIENDA PAGINAS************************/
Route::prefix('adm_tienda')->middleware('auth')->group(function () {

    Route::get('/', 'Adm_tienda\AdminTiendaController@dashboard')->name('dashboard_tienda');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidorestienda', 'Adm_tienda\DistribuidoresTiendaController');

    /*------------TIENDA----------------*/
    Route::resource('admintiendas', 'Adm_tienda\TiendasController');

    /*------------SUCURSALES----------------*/
    Route::resource('sucursales', 'Adm_tienda\SucursalesController');

    //DASHBOARD
    Route::get('/dashboard_tienda', 'Adm_tienda\AdminTiendaController@admin');

    

});
