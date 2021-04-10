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

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/sair', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});
Route::get('/registrar', 'RegistrarController@create');
Route::post('/registrar', 'RegistrarController@store');
Route::get('/inicio', 'InicioController@index');
Route::get('/pacientes', 'PacienteController@index');
Route::get('/pacientes/criar', 'PacienteController@create')->middleware('Autenticador');
Route::post('/pacientes/criar', 'PacienteController@store')->middleware('Autenticador');
Route::post('/pacientes/criar/{id_paciente}', 'PacienteController@editarPaciente')->middleware('Autenticador');

Route::get('/pacientes/criar/{id_paciente}', 'PacienteController@editarPaciente')->middleware('Autenticador');
//caso o post abaixo falhe, ele vai pra rota get de cima
Route::post('/pacientes/criar/{id_paciente}/efetuar', 'PacienteController@editarPacienteEfetuar')->middleware('Autenticador');

Route::delete('/pacientes/{id_paciente}', 'PacienteController@destroy')->middleware('Autenticador');
Route::get('/pacientes/pesquisar', 'PacienteController@indexPesquisar')->middleware('Autenticador');
Route::post('/pacientes/pesquisar', 'PacienteController@pesquisar')->middleware('Autenticador');

Route::get('/pacientes/consultas/{id_paciente}', 'ConsultaController@index');
Route::get('/consultas/criar/{id_paciente}', 'ConsultaController@create')->middleware('Autenticador');
Route::post('/consultas/criar/{id_paciente}', 'ConsultaController@store')->middleware('Autenticador');
Route::delete('/consultas/{id_paciente}/{id_consulta}', 'ConsultaController@destroy')->middleware('Autenticador');
Route::post('/consultas/{id_paciente}/editarConsulta/{id_consulta}', 'ConsultaController@editarConsulta')->middleware('Autenticador');

Route::post('/consultas/criar/{id_consulta}/efetuar', 'ConsultaController@editarConsultaEfetuar')->middleware('Autenticador');
Route::get('/consultas/{id_consulta}/editarConsulta/{id_paciente}', 'ConsultaController@editarConsulta')->middleware('Autenticador');
Route::get('/consultas/pesquisar', 'ConsultaController@indexPesquisar')->middleware('Autenticador');
Route::post('/consultas/pesquisar', 'ConsultaController@pesquisar')->middleware('Autenticador');



Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/criar', 'ProdutoController@create')->middleware('Autenticador');
Route::post('/produtos/criar', 'ProdutoController@store')->middleware('Autenticador');
Route::post('/produtos/criar/{id_produto}', 'ProdutoController@editarProduto')->middleware('Autenticador');
Route::delete('/produtos/{id_produto}', 'ProdutoController@destroy')->middleware('Autenticador');

Route::get('/produtos/criar/{id_produto}', 'ProdutoController@editarProduto')->middleware('Autenticador');
//caso o post abaixo falhe, ele vai pra rota get de cima
Route::post('/produtos/criar/{id_produto}/efetuar', 'ProdutoController@editarProdutoEfetuar')->middleware('Autenticador');
Route::get('/produtos/pesquisar', 'ProdutoController@indexPesquisar')->middleware('Autenticador');
Route::post('/produtos/pesquisar', 'ProdutoController@pesquisar')->middleware('Autenticador');



