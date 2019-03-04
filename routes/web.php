<?php

use Illuminate\Filesystem\Filesystem;
use App\Services\Twitter;
use App\Repositories\UserRepository;



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

/*
|    naming convention in Laravel
|    quick note: when needed generate resourcefull controller with php artisan make:controller TestsController -r
|    
|    GET /projects (index)
|    GET /projects/create (create)
|    POST /projects (store)
|    GET /projects/1 (show)
|    GET /projects/1/edit (edit)
|    PATCH /projects/1 (update)
|    DELETE /projects/1 (destroy)
*/

// home page route
// Route::get('/', 'PagesController@home');

Route::get('/', function ( Twitter $twitter) {
    dd($twitter);
    return view('welcome');
});
// Test page route
Route::get('/test', 'PagesController@test');
// About route
Route::get('/about', 'PagesController@about');
// Contact route(s)
Route::get('/contact', 'PagesController@contact');
// Projects routes
Route::resource('projects', 'ProjectsController');
// Tasks routes
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');
