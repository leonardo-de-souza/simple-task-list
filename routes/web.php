<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

$tasks = [];

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use ($tasks) {
    return view('index', 
    [
        'tasks'=> $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function($id) use($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if(!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show', ['task' => $task]);

})->name('task.show');

Route::fallback(function () {
    return redirect()->route('tasks.index');
});