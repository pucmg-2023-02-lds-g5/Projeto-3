<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\EmpresaController; 

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

// Adicione isso ao seu arquivo de rotas web.php
Route::get('/perfil', function () {
    if(Auth::guard('professor')->check()) {
        $user = Auth::guard('professor')->user();
    } elseif(Auth::guard('aluno')->check()) {
        $user = Auth::guard('aluno')->user();
    } elseif(Auth::guard('empresa')->check()) {
        $user = Auth::guard('empresa')->user();
    } else {
        return redirect('/login');
    }

    return view('perfil', ['user' => $user]);
})->name('perfil');


Route::get('/cadastro_aluno', 'App\Http\Controllers\AlunoController@create')->name('alunos.cadastro');
Route::post('/cadastro_aluno', 'App\Http\Controllers\AlunoController@store')->name('alunos.store');
Route::get('/login_aluno', [AlunoController::class, 'loginForm'])->name('login_aluno');
Route::post('/login_aluno', [AlunoController::class, 'login']);
Route::post('/logout_aluno', [AlunoController::class, 'logout'])->name('logout.aluno');
Route::get('/index_aluno', [AlunoController::class, 'index'])->name('index_aluno');
Route::get('/crud_alunos', [AlunoController::class, 'crud'])->name('alunos.crud');
Route::get('/alunos/{aluno}/edit', 'App\Http\Controllers\AlunoController@edit')->name('alunos.edit');
Route::put('/alunos/{aluno}', 'App\Http\Controllers\AlunoController@update')->name('alunos.update');
Route::get('/alunos/transacoes', 'App\Http\Controllers\AlunoController@transacoes')->name('alunos.transacoes');
Route::get('/alunos/vantagens', 'App\Http\Controllers\VantagemController@alunosVantagens')->name('vantagens.alunos');
Route::get('/vantagens', 'App\Http\Controllers\VantagemController@index')->name('vantagens.index');
Route::get('/vantagens/disponiveis', 'App\Http\Controllers\VantagemController@vantagensDisponiveis')->name('vantagens.disponiveis');
Route::get('/vantagens/{id}/resgatar', 'App\Http\Controllers\VantagemController@resgatar')->name('vantagens.resgatar');
Route::resource('alunos', AlunoController::class);
View::composer('*', function ($view) {
    if (Auth::guard('aluno')->check()) {
        $aluno = Auth::guard('aluno')->user();
        $view->with('aluno', $aluno);
    }
});


Route::get('/login_professor', [ProfessorController::class, 'loginForm'])->name('login_professor');
Route::post('/login_professor', [ProfessorController::class, 'login']);
Route::post('/logout_professor', [ProfessorController::class, 'logout'])->name('logout.professor');
Route::get('/index_professor', [ProfessorController::class, 'index'])->name('index_professor');
Route::get('/professores/transacoes', 'App\Http\Controllers\ProfessorController@transacoes')->name('professores.transacoes');
Route::post('/professores/enviarMoedas', 'App\Http\Controllers\ProfessorController@enviarMoedas')->name('professores.enviarMoedas');
View::composer('*', function ($view) {
    if (Auth::guard('professor')->check()) {
        $professor = Auth::guard('professor')->user();
        $view->with('professor', $professor);
    }
});

Route::get('/cadastro_empresa', 'App\Http\Controllers\EmpresaController@create')->name('empresas.cadastro');
Route::post('/cadastro_empresa', 'App\Http\Controllers\EmpresaController@processCadastro')->name('empresas.store');
Route::get('/login_empresa', [EmpresaController::class, 'loginForm'])->name('login_empresa');
Route::post('/login_empresa', [EmpresaController::class, 'login']);
Route::post('/logout_empresa', [EmpresaController::class, 'logout'])->name('logout.empresa');
Route::get('/index_empresa', [EmpresaController::class, 'index'])->name('index_empresa');
Route::get('/crud_empresas', [EmpresaController::class, 'crud'])->name('empresas.crud');
Route::get('/empresas/{empresa}/edit', 'App\Http\Controllers\EmpresaController@edit')->name('empresas.edit');
Route::put('/empresas/{empresa}', 'App\Http\Controllers\EmpresaController@update')->name('empresas.update');
Route::delete('/empresas/{empresa}', 'App\Http\Controllers\EmpresaController@destroy')->name('empresas.destroy');
Route::get('/empresas/vantagens', 'App\Http\Controllers\VantagemController@empresasVantagens')->name('vantagens.empresas');
Route::get('/empresas/vantagens/create', 'App\Http\Controllers\VantagemController@create')->name('vantagens.create');
Route::post('/empresas/vantagens', 'App\Http\Controllers\VantagemController@store')->name('vantagens.store');
Route::get('/empresas/vantagens/{id}/edit', 'App\Http\Controllers\VantagemController@edit')->name('vantagens.edit');
Route::put('/empresas/vantagens/{id}', 'App\Http\Controllers\VantagemController@update')->name('vantagens.update');
Route::delete('/empresas/vantagens/{id}', 'App\Http\Controllers\VantagemController@destroy')->name('vantagens.destroy');

