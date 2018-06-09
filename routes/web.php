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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'/admin', 'as'=>'admin.'],function(){
    //Authentication Rotes
    $this->get('/login','Auth\LoginController@showLoginForm')->name('login');
    $this->post('/login', 'Auth\LoginController@login');
    $this->post('/logout', 'Auth\LoginController@logout')->name('logout');

    //Password Reset
    $this->get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset','Auth\ResetPasswordController@reset');

    $this->get('/home', 'HomeController@index')->name('home');


    Route::get('/veiculos', 'VeiculoController@listar');

    Route::get('veiculos/cadastrar', 'VeiculoController@cadastrarVisao');
    Route::post('veiculos/cadastrar', 'VeiculoController@cadastrarLogica');


    Route::get('veiculos/editar/{id}', 'VeiculoController@editarVisao');
    Route::post('veiculos/editar/{id}', 'VeiculoController@editarLogica');

    Route::get('veiculos/excluir/{id}', 'VeiculoController@excluir');
});


// Rota usuário comum
Route::get('veiculos', 'VeiculoController@listar');
Route::get('veiculos/editar/{id}', 'VeiculoController@editarVisao');
Route::post('veiculos/editar/{id}', 'VeiculoController@editarLogica');