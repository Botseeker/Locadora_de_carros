<?php
/*
| add(routes): api
| refactor(routes): api
| rm(routes): api
*/
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // rotas com acesso sem autenticação

    Route::get('/limpar-cache', function () {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        return "Cache está limpo!";
    })->name('limpar-cache.index');
});

Route::prefix('v1')->group(function () {
    Route::group(['middleware' => 'auth:api'], function () { 
    // rotas com acesso por autenticação
     
    });
    Route::group(['middleware' => 'api'], function () {
    // rotas de acesso livre  
    // Route::resource('user', 'UserController')->except(['create', 'edit']);
    Route::apiResource('cliente', 'ClienteController');
    Route::apiResource('carro', 'CarroController');
    Route::apiResource('locacao', 'LocacaoController');
    Route::apiResource('marca', 'MarcaController');
    Route::apiResource('modelo', 'ModeloController');
    });
});

