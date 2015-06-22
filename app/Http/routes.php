<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

//Nested Resources so you have things like
//GET|HEAD | projects/{projects}/tasks   

Route::resource('projects', 'ProjectsController');
// Route::resource('tasks', 'TasksController');
Route::resource('projects.tasks', 'TasksController');

/*
*
*We’ve almost got our routes perfect however in their current state we’ll have URLs like /projects/1/tasks/2. 
*It would be much better for our visitors if the model IDs were replaced with their respective slug fields instead.
*So we’d get for example /projects/my-first-project/tasks/buy-milk.
 *
 */


Route::bind('tasks', function($value, $route) {
	return App\Task::whereSlug($value)->first();
});
Route::bind('projects', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});

/*he above will override the default behavior for the tasks and projects wildcards in php artisan routes.*/