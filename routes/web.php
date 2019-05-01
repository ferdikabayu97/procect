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
$router->get('/api/req/', 'RekomendasiController@index');
$router->get('/api/pend/', 'PendudukController@index');
$router->get('/api/login/', 'LoginController@index');
$router->get('/api/pes/', 'PesaingUsahaController@index');
$router->post('/api/opt/', 'OptimalisationController@index');
$router->post('/api/gpass/', 'GantiPasswordController@index'); // maunya pake put mas:(
$router->post('/api/bakun/', 'BuatAkunController@index');
$router->get('/api/veri/', 'VerifikasiController@index');
$router->get('/api/lpass/', 'LupaPasswordController@index');





$router->get('/key', function() {
    return str_random(32);
});
