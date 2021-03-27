<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ForntEndProgramController;



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
//     return view('welcome');
// });

// Route::get('', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/client', function () {
    return view('layouts.client');
});

Route::get('/expert', function () {
    return view('layouts.expert');
});

require __DIR__.'/auth.php';
// Route::get('/123/{id}',[UserController::class, 'editUser']);
Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/',[UserController::class, 'index']);

       
    Route::group(['prefix'=>'users','middleware'=>'auth'],function (){

        Route::get('/',[UserController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[UserController::class, 'UpdateUser']);
        Route::get('/add-user',[UserController::class, 'addUser']);
        Route::post('/add-user',[UserController::class, 'addNewUser']);
        Route::get('/edit-user/{id}',[UserController::class, 'editUser']);
        Route::post('/edit-user/{id}',[UserController::class, 'updateUser']);
        Route::post('/delete-user/{id}',[UserController::class, 'deleteUser']);

    });
    
});

    Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
        Route::get('/',[ProgramController::class, 'index']);

        Route::group(['prefix'=>'programs','middleware'=>'auth'],function (){

            Route::get('/',[Programcontroller::class, 'index']);
            Route::post('/updateuserinfo/{id}',[Programcontroller::class, 'Updateprogram']);
            Route::get('/add-program',[Programcontroller::class, 'addProgram']);
            Route::post('/add-program',[Programcontroller::class, 'addNewprogram']);
            Route::get('/edit-program/{id}',[Programcontroller::class, 'editprogram']);
            Route::post('/edit-program/{id}',[Programcontroller::class, 'updateprogram']);
            Route::post('/delete-program/{id}',[Programcontroller::class, 'deleteprogram']);

    });


});

Route::get('/',[ForntEndProgramController::class, 'index']);

Route::group(['prefix'=>'homeviewprograms','middleware'=>'auth'],function (){

    Route::get('/',[ForntEndProgramController::class, 'index']);
    Route::get('/view-program/{id}',[ForntEndProgramController::class, 'viewProgram']);
    Route::post('/edit-program/{id}',[ForntEndProgramController::class, 'updateprogram']);
   

});
