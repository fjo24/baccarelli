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

//PAGINA DE ACCIONES DE LOS PROCESOS (ESTADOS)
//estad

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

Route::prefix('admin')->middleware('admin')->middleware('auth')->group(function () {

    Route::get('/home', ['uses' => 'Admin\AdminController@home', 'as' => 'admin.home'])->middleware('admin');

    /*------------PEDIDOS----------------*/
    Route::resource('pedidosadmin', 'Admin\PedidosController')->middleware('admin');

});


/*----------------LOGIN TIENDA----------------*/
Route::get('/tienda', 'Tienda\TiendaController@login')->name('tienda.login');

Route::prefix('tienda')->middleware('auth')->group(function () {

    Route::get('/home', ['uses' => 'Tienda\TiendaController@home', 'as' => 'tienda.home']);
    Route::get('/presupuestos', ['uses' => 'Tienda\TiendaController@presupuestos', 'as' => 'tienda.presupuestos']);
    /*------------PEDIDOS----------------*/
    Route::resource('pedidostienda', 'Tienda\PedidosController');
});

/*******************ADMIN************************/
Route::prefix('adm')->middleware('admin')->middleware('auth')->group(function () {

    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard')->middleware('admin');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController')->middleware('admin');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController')->middleware('admin');

    /*------------ADICIONALES----------------*/
    Route::resource('adicionales', 'Adm\AdicionalesController')->middleware('admin');

    /*------------LOCALIDADES----------------*/
    Route::resource('localidades', 'Adm\LocalidadesController')->middleware('admin');

    /*------------TERMINACION DE BORDES----------------*/
    Route::resource('bordes', 'Adm\BordesController')->middleware('admin');

    /*------------TRABAJOS APLICADOS----------------*/
    Route::resource('aplicados', 'Adm\T_aplicadosController')->middleware('admin');

    /*------------SUPERFICIES----------------*/
    Route::resource('superficies', 'Adm\SuperficiesController')->middleware('admin');

    /*------------STOCKS----------------*/
    Route::resource('stocks', 'Adm\StocksController')->middleware('admin');

    /*------------DESCUENTOS----------------*/
    Route::resource('descuentos', 'Adm\DescuentosController')->middleware('admin');

    /*------------RUBROS----------------*/
    Route::resource('rubros', 'Adm\RubrosController')->middleware('admin');

    /*------------CONTENIDO OBSERVACIONES----------------*/
    Route::resource('contenido_observaciones', 'Adm\ContenidoobservacionesController')->middleware('admin');

    /*------------UNIDADES----------------*/
    Route::resource('unidades', 'Adm\UnidadesController')->middleware('admin');

    /*------------MATERIALES----------------*/
    Route::resource('materiales', 'Adm\MaterialesController')->middleware('admin');

    /*------------TIENDA----------------*/
    Route::resource('tiendas', 'Adm\TiendasController')->middleware('admin');

    /*------------DOLARES----------------*/
    Route::resource('dolares', 'Adm\DolaresController')->middleware('admin');

    /*------------FLETES----------------*/
    Route::resource('fletes', 'Adm\FletesController')->middleware('admin');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin')->name('inicio.adm')->middleware('admin');

    /*-----CARGA DE EXCELS-----------*/
    Route::get('excelcat', ['uses' => 'Adm\MaterialesController@excelcat', 'as' => 'excelcat'])->middleware('admin');
    Route::post('/import-excel', 'Adm\MaterialesController@importCat')->name('importCat')->middleware('admin');

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
