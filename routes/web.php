<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogMainController;
use App\Http\Controllers\ProjectMainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;



Route::get('/', [HomeController::class,'index']) -> name('home');
Route::get('/blogs',[BlogMainController::class, 'index']) -> name('blogM');
Route::get('/projects', [ ProjectMainController::class, 'index']) ->name('project');
Route::get('/project/detail/{id}', [ProjectMainController::class, 'detail']);
Route::get('/about', [HomeController::class, 'about']) -> name('about');
Route::get('/contact', [ContactController::class, 'index']) -> name('contact');
Route::get('/service', [HomeController::class,'service']) -> name('service');

Route::prefix('admin')->middleware('auth', 'verified')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    }) -> name('dashboard');

  
    
    //for blog

    Route::get('/blog', [BlogController::class,'index']) -> name('blog.index');
    Route::post('/blog', [BlogController::class, 'store']);
    Route::put('/blog/{id}' , [BlogController::class, 'update']);
    Route::delete('/blog/{id}' , [BlogController::class, 'destroy']);

    //for tag
    Route::get('/tag' ,[TagController::class, 'index']) -> name('tag.index');
    Route::post('/tag',[TagController::class,'store']);
    Route::put('/tag/{id}' , [TagController::class, 'update']);
    Route::delete('/tag/{id}', [TagController::class, 'destroy']);

    //for project
    Route::get('/project', [ProjectController::class, 'index']) -> name('project.index');
    Route::post('/project', [ProjectController::class, 'store']);
    Route::put('/project/{id}', [ProjectController::class, 'update']);
    Route::delete('/project/{id}', [ProjectController::class, 'destroy']);

    //for message
    Route::get('/message', [AdminController::class, 'message']) -> name('message.index');
 

  
});

require __DIR__.'/auth.php';
