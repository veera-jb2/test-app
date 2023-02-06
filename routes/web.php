<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\DashboardController;

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


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::get('/access-denied',[AuthController::class,'denied'])->name('access-denied');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware'=> ['auth','check.role']], function (){

    /*** Dashboard ***/
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index']);

    /******* Project *****/
    Route::resource('project',App\Http\Controllers\Web\ProjectController::class);
    Route::get('invite/team/{id}',[App\Http\Controllers\Web\ProjectController::class,'invite'])->name('project.invite');
    Route::get('create/team/{id}',[App\Http\Controllers\Web\ProjectController::class,'team'])->name('project.team.create');
    Route::get('all_projects',[App\Http\Controllers\Web\ProjectController::class,'all_projects'])->name('project.all_projects');
    /******* Tasks *******/
    Route::get('{project_id}/task',[App\Http\Controllers\Web\TaskController::class,'index'])->name('task.index');
    Route::get('{project_id}/task/create',[App\Http\Controllers\Web\TaskController::class,'create'])->name('task.create');
    Route::get('{project_id}/task/edit/{task_id}',[App\Http\Controllers\Web\TaskController::class,'edit'])->name('task.edit');
});

