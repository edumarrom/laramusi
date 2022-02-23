<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TemaController;
use App\Mail\Prueba;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Por lo que veo, la ruta de recurso no se genera de forma automáticamente
Route::resource('albumes', AlbumController::class)
    ->parameters(['albumes' => 'album']);  // En caso de problemas con los plurales, indicarlo así

Route::resource('temas', TemaController::class)
    ->parameters(['temas' => 'tema']);

Route::get('/albumes/{album}/descargar', [AlbumController::class, 'descargar'])
    ->name('albumes-descargar');

Route::get('/correo', function () {
    Mail::to('contacto@laramusi.com')->send(new Prueba('Vicenta'));
});

require __DIR__ . '/auth.php';
