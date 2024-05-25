<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('tarefa/exportar', 'App\Http\Controllers\TarefaController@exportar')->name('tarefa.exportar');
Route::resource('tarefa', 'App\Http\Controllers\TarefaController')->middleware('verified');


Route::get('/mensagem', function (){
   return new \App\Mail\MensagemTesteMail();
    /*\Illuminate\Support\Facades\Mail::to('fasneto2@gmail.com')->send(new \App\Mail\MensagemTesteMail());

    return 'Email enviado';*/
});
