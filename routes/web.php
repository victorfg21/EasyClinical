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

Auth::routes();

Route::get('/', function(){
    return view('auth/login');
});

Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/tasks', 'TaskController@index');

//Pacientes
Route::get('admin/pacientes', ['as' => 'admin.pacientes', 'uses' => 'Admin\PacienteController@index']);
Route::get('admin/pacientes/create', ['as' => 'admin.pacientes.create', 'uses' => 'Admin\PacienteController@create']);
Route::post('admin/pacientes/store', ['as' => 'admin.pacientes.store', 'uses' => 'Admin\PacienteController@store']);
Route::get('admin/pacientes/edit/{id}', ['as' => 'admin.pacientes.edit', 'uses' => 'Admin\PacienteController@edit']);
Route::put('admin/pacientes/update/{id}', ['as' => 'admin.pacientes.update', 'uses' => 'Admin\PacienteController@update']);
Route::get('admin/pacientes/listarpacientes', ['as' => 'admin.pacientes.listarpacientes', 'uses' => 'Admin\PacienteController@listarpacientes']);
//Route::get('admin/pacientes/deletar/{id}', ['as' => 'admin.pacientes.deletar', 'uses' => 'Admin\PacienteController@delete']);

//Profissionais
Route::get('admin/profissionais', ['as' => 'admin.profissionais', 'uses' => 'Admin\ProfissionalController@index']);
Route::get('admin/profissionais/create', ['as' => 'admin.profissionais.create', 'uses' => 'Admin\ProfissionalController@create']);
Route::post('admin/profissionais/store', ['as' => 'admin.profissionais.store', 'uses' => 'Admin\ProfissionalController@store']);
Route::get('admin/profissionais/edit/{id}', ['as' => 'admin.profissionais.edit', 'uses' => 'Admin\ProfissionalController@edit']);
Route::put('admin/profissionais/update/{id}', ['as' => 'admin.profissionais.update', 'uses' => 'Admin\ProfissionalController@update']);
Route::get('admin/profissionais/listarpacientes', ['as' => 'admin.profissionais.listarprofissionais', 'uses' => 'Admin\ProfissionalController@listarprofissionais']);
//Route::get('admin/profissionais/deletar/{id}', ['as' => 'admin.profissionais.deletar', 'uses' => 'Admin\ProfissionalController@delete']);

//Especialidades
Route::get('admin/especialidades', ['as' => 'admin.especialidades', 'uses' => 'Admin\EspecialidadeController@index']);
Route::get('admin/especialidades/create', ['as' => 'admin.especialidades.create', 'uses' => 'Admin\EspecialidadeController@create']);
Route::post('admin/especialidades/store', ['as' => 'admin.especialidades.store', 'uses' => 'Admin\EspecialidadeController@store']);
Route::get('admin/especialidades/edit/{id}', ['as' => 'admin.especialidades.edit', 'uses' => 'Admin\EspecialidadeController@edit']);
Route::put('admin/especialidades/update/{id}', ['as' => 'admin.especialidades.update', 'uses' => 'Admin\EspecialidadeController@update']);
Route::get('admin/especialidades/listarespecialidades', ['as' => 'admin.especialidades.listarespecialidades', 'uses' => 'Admin\EspecialidadeController@listarespecialidades']);
Route::get('admin/especialidades/delete/{id}', ['as' => 'admin.especialidades.delete', 'uses' => 'Admin\EspecialidadeController@delete']);
Route::post('admin/especialidades/confirmardelete/{id}', ['as' => 'admin.especialidades.confirmardelete', 'uses' => 'Admin\EspecialidadeController@confirmardelete']);

//Area Atuações
Route::get('admin/areas-atuacao', ['as' => 'admin.areas-atuacao', 'uses' => 'Admin\AreaAtuacaoController@index']);
Route::get('admin/areas-atuacao/create', ['as' => 'admin.areas-atuacao.create', 'uses' => 'Admin\AreaAtuacaoController@create']);
Route::post('admin/areas-atuacao/store', ['as' => 'admin.areas-atuacao.store', 'uses' => 'Admin\AreaAtuacaoController@store']);
Route::get('admin/areas-atuacao/edit/{id}', ['as' => 'admin.areas-atuacao.edit', 'uses' => 'Admin\AreaAtuacaoController@edit']);
Route::put('admin/areas-atuacao/update/{id}', ['as' => 'admin.areas-atuacao.update', 'uses' => 'Admin\AreaAtuacaoController@update']);
Route::get('admin/areas-atuacao/listarareasatuacao', ['as' => 'admin.areas-atuacao.listarareasatuacao', 'uses' => 'Admin\AreaAtuacaoController@listarareasatuacao']);
Route::get('admin/areas-atuacao/delete/{id}', ['as' => 'admin.areas-atuacao.delete', 'uses' => 'Admin\AreaAtuacaoController@delete']);
Route::post('admin/areas-atuacao/confirmardelete/{id}', ['as' => 'admin.areas-atuacao.confirmardelete', 'uses' => 'Admin\AreaAtuacaoController@confirmardelete']);

//Exame Materiais
Route::get('admin/exame-materiais', ['as' => 'admin.exame-materiais', 'uses' => 'Admin\ExameMaterialController@index']);
Route::get('admin/exame-materiais/create', ['as' => 'admin.exame-materiais.create', 'uses' => 'Admin\ExameMaterialController@create']);
Route::post('admin/exame-materiais/store', ['as' => 'admin.exame-materiais.store', 'uses' => 'Admin\ExameMaterialController@store']);
Route::get('admin/aexame-materiais/edit/{id}', ['as' => 'admin.exame-materiais.edit', 'uses' => 'Admin\ExameMaterialController@edit']);
Route::put('admin/exame-materiais/update/{id}', ['as' => 'admin.exame-materiais.update', 'uses' => 'Admin\ExameMaterialController@update']);
Route::get('admin/exame-materiais/listarexamemateriais', ['as' => 'admin.exame-materiais.listarexamemateriais', 'uses' => 'Admin\ExameMaterialController@listarexamemateriais']);
Route::get('admin/exame-materiais/delete/{id}', ['as' => 'admin.exame-materiais.delete', 'uses' => 'Admin\ExameMaterialController@delete']);
Route::post('admin/exame-materiais/confirmardelete/{id}', ['as' => 'admin.exame-materiais.confirmardelete', 'uses' => 'Admin\ExameMaterialController@confirmardelete']);

//Exame Metodos
Route::get('admin/exame-metodos', ['as' => 'admin.exame-metodos', 'uses' => 'Admin\ExameMetodoController@index']);
Route::get('admin/exame-metodos/create', ['as' => 'admin.exame-metodos.create', 'uses' => 'Admin\ExameMetodoController@create']);
Route::post('admin/exame-metodos/store', ['as' => 'admin.exame-metodos.store', 'uses' => 'Admin\ExameMetodoController@store']);
Route::get('admin/aexame-metodos/edit/{id}', ['as' => 'admin.exame-metodos.edit', 'uses' => 'Admin\ExameMetodoController@edit']);
Route::put('admin/exame-metodos/update/{id}', ['as' => 'admin.exame-metodos.update', 'uses' => 'Admin\ExameMetodoController@update']);
Route::get('admin/exame-metodos/listarexamemetodos', ['as' => 'admin.exame-metodos.listarexamemetodos', 'uses' => 'Admin\ExameMetodoController@listarexamemetodos']);
Route::get('admin/exame-metodos/delete/{id}', ['as' => 'admin.exame-metodos.delete', 'uses' => 'Admin\ExameMetodoController@delete']);
Route::post('admin/exame-metodos/confirmardelete/{id}', ['as' => 'admin.exame-metodos.confirmardelete', 'uses' => 'Admin\ExameMetodoController@confirmardelete']);

//Fabricantes
Route::get('admin/fabricantes', ['as' => 'admin.fabricantes', 'uses' => 'Admin\FabricanteController@index']);
Route::get('admin/fabricantes/create', ['as' => 'admin.fabricantes.create', 'uses' => 'Admin\FabricanteController@create']);
Route::post('admin/fabricantes/store', ['as' => 'admin.fabricantes.store', 'uses' => 'Admin\FabricanteController@store']);
Route::get('admin/fabricantes/edit/{id}', ['as' => 'admin.fabricantes.edit', 'uses' => 'Admin\FabricanteController@edit']);
Route::put('admin/fabricantes/update/{id}', ['as' => 'admin.fabricantes.update', 'uses' => 'Admin\FabricanteController@update']);
Route::get('admin/fabricantes/listarfabricantes', ['as' => 'admin.fabricantes.listarfabricantes', 'uses' => 'Admin\FabricanteController@listarfabricantes']);
Route::get('admin/fabricantes/delete/{id}', ['as' => 'admin.fabricantes.delete', 'uses' => 'Admin\FabricanteController@delete']);
Route::post('admin/fabricantes/confirmardelete/{id}', ['as' => 'admin.fabricantes.confirmardelete', 'uses' => 'Admin\FabricanteController@confirmardelete']);

//Medicamentos
Route::get('admin/medicamentos', ['as' => 'admin.medicamentos', 'uses' => 'Admin\MedicamentoController@index']);
Route::get('admin/medicamentos/create', ['as' => 'admin.medicamentos.create', 'uses' => 'Admin\MedicamentoController@create']);
Route::post('admin/medicamentos/store', ['as' => 'admin.medicamentos.store', 'uses' => 'Admin\MedicamentoController@store']);
Route::get('admin/medicamentos/edit/{id}', ['as' => 'admin.medicamentos.edit', 'uses' => 'Admin\MedicamentoController@edit']);
Route::put('admin/medicamentos/update/{id}', ['as' => 'admin.medicamentos.update', 'uses' => 'Admin\MedicamentoController@update']);
Route::get('admin/medicamentos/listarmedicamentos', ['as' => 'admin.medicamentos.listarmedicamentos', 'uses' => 'Admin\MedicamentoController@listarmedicamentos']);
Route::get('admin/medicamentos/delete/{id}', ['as' => 'admin.medicamentos.delete', 'uses' => 'Admin\MedicamentoController@delete']);
Route::post('admin/medicamentos/confirmardelete/{id}', ['as' => 'admin.medicamentos.confirmardelete', 'uses' => 'Admin\MedicamentoController@confirmardelete']);
