<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HeloController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

/*Task
*URL :  http://localhost:8000/api/halo
*METHOD: GET
*Exec: function
*Return : JSON => {"me": "Cantik"}
*/

Route::get('halo', function(){
    $data = ["me" => "Cantik"];

    return $data;
});

//Route::get('siswa',[SiswaController::class, 'index']);
//Route::get('siswa/{id}',[SiswaController::class, 'show']);
//Route::post('siswa',[SiswaController::class, 'store']);
//Route::get('siswa/{id}',[SiswaController::class, 'update']);
//Route::get('siswa/{id}',[SiswaController::class, 'destroy']);

//Route::resource('siswa', SiswaController::class);
//Route::resource('books', BookController::class);



//public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/Books/{id}', [BookController::class, 'show']);
Route::get('/Authors', [AuthController::class, 'index']);
Route::get('/Authors/{id}', [AuthController::class, 'show']);

//protected routes
Route::middleware('auth:sanctum')->group(function() {
    Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('authors', AuthController::class)->except('create', 'edit', 'show', 'index');
});


