<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\controllers\ExpertController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/service', 'App\Http\Controllers\ForntEndProgramController@service')->name('service');
Route::get('/about', 'App\Http\Controllers\ForntEndProgramController@about')->name('about');
Route::get('/blog', 'App\Http\Controllers\ForntEndProgramController@blog')->name('blog');
Route::get('/program', 'App\Http\Controllers\ForntEndProgramController@program')->name('program');



require __DIR__.'/auth.php';
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
Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/',[ExpertController::class, 'index']);
    Route::group(['prefix'=>'experts','middleware'=>'auth'],function (){

        Route::get('/',[ExpertController::class, 'index']);
        Route::post('/updateuserinfo/{id}',[ExpertController::class, 'UpdateExpert']);
        Route::get('/add-expert',[ExpertController::class, 'addExpert']);
        Route::post('/add-expert',[ExpertController::class, 'addNewExpert']);
        Route::get('/edit-expert/{id}',[ExpertController::class, 'editExpert']);
        Route::post('/edit-expert/{id}',[ExpertController::class, 'updateExpert']);
        Route::post('/delete-expert/{id}',[ExpertController::class, 'deleteExpert']);

    });
});


Route::get('/',[ForntEndProgramController::class, 'index']);
    Route::group(['prefix'=>'homeviewprograms','middleware'=>'auth'],function (){
        Route::get('/',[ForntEndProgramController::class, 'index']);
        Route::get('/view-program/{id}',[ForntEndProgramController::class, 'viewProgram']);
        Route::post('/edit-program/{id}',[ForntEndProgramController::class, 'updateprogram']);
});
