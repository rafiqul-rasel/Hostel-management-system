<?php

use App\Http\Controllers\HallAllocateController;
use App\Http\Controllers\HallApplyController;
use App\Http\Controllers\HallChangeController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HallRoomSeatController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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
    return view('homepage.index');
});

Auth::routes();
Route::group(['prefix'=>'dashboard/','as'=>'dashboard.','middleware' => 'auth'], function(){
    Route::resource('/user', userController::class);
    Route::resource('/student', StudentController::class);
    Route::resource('/roles', RolesController::class);
    Route::resource('/hall', HallController::class);
    Route::resource('/room', RoomController::class);
    Route::resource('/seat', SeatController::class);
    Route::resource('/hall-apply', HallApplyController::class);
    Route::resource('/hall-allocation', HallAllocateController::class);
    Route::resource('/hall-change', HallChangeController::class);

});
Route::get("/getroom",[HallRoomSeatController::class,'getRoomByHall']);
Route::get("/getseat",[HallRoomSeatController::class,'getSeatByRoom']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
