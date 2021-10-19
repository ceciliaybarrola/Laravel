<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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

// Route::get('/', function () {
//     return view('vista1', ['nombre'=>'Cecilia']);
// });

Route::get('/','App\Http\Controllers\InicioController@index');

//Route::resource('/','App\Http\Controllers\ClienteController');

Route::get('/vista3',function(){
    $users = ['Juan', 'Pedro', 'Karen','Pili'];
    //$users = ['Juan'];
    //$users = [];
    return view('vista3')->with('users', $users);
});
Route::get('/vista4',function(){
    return view('vista4');
});
if (view::exists('vista1')){
    Route::get('/vista1', function () {
        return view('vista1', ['nombre'=>'Cecilia']);
    });
}else{
    Route::get('/vista1', function () {
        return 'no se enocntro la vista solicitada';
    });
}

//ejemplo 1: retorno texto
route::get('/texto', function(){
    return "esto es un texto de prueba";
});

//ejemplo 2: codigo html
route::get('/textoHtml', function(){
    return "<h1>esto es un texto de prueba con una etiqueta html</h1>";
});

//ejemplo 3: array

route::get('/array', function(){
    $array = ['lunes', 'martes', 'miercoles', 'jueves'];
    return var_dump($array);
});

//ejemplo 4: array asociativo
route::get('/arrayAsociativo', function(){
    $array = ['lunes'=> "primer dia", 
              'martes'=> "segundo dia", 
              'miercoles'=> "tercer dia", 
              'jueves'=> "cuarto dia"];
    return ($array);
});

//ejemplo 5: parametros
Route::get('/nombre/{nombre}',function($nombre){
    return "<h2>mi nombre es: ". $nombre.'</h2>';
});

//ejemplo 5: parametros con valor por defecto
Route::get('/empleado/{empleado?}',function($empleado = 'empleado general'){
    return "<h2>El empleado es: ". $empleado.'</h2>';
});

//ejemplo 6: declaracion de nombres y redireccionamiento
route::get('/ruta1', function(){
    return "<h3>Esta es vista de la ruta 1</h3>";
})->name('rutaNro1');

route::get('/ruta2', function(){
   // return "<h3>Esta es vista de la ruta 2</h3>";
   return redirect()->route('rutaNro1');
});

//ejemplo 6: restriccion de caracteres
route::get('/usuarioId/{usuarioId}', function($usuarioId){
    return 'El id del usuario es: '.$usuarioId;
})->where('usuarioId', '[0-9]+');//restrinjo estos caracteres

route::get('/usuario/{usuario}', function($usuario){
    return 'El usuario es: '.$usuario;
})->where('usuario', '[A-Za-z]+');//restrinjo estos caracteres


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
