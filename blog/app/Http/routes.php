<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывод определенной список всех задач
 */

Route::get('/last/{id}', function ($id) {
  //$tasks = Task::findOrFail($id)->get();
  $tasks = DB::table('tasks')->where('id', $id)->first();

  return view('tasks_by_id', [
	'tasks' => $tasks
    ]);
});

/**
 * Админка
 */
Route::get('/admin', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('admin', [
	'tasks' => $tasks
    ]);
});


/**
 * Вывести список всех задач
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
	'tasks' => $tasks
    ]);
});

/**
 * Добавить новую задачу
 */
Route::post('/task', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
    'description' => 'required'
  ]);

  if ($validator->fails()) {
    return redirect('/admin')
      ->withInput()
      ->withErrors($validator);
  }

  $task = new Task;
  $task->name = $request->name;
  $task->description = $request->description;
  $task->save();

  return redirect('/admin');
});

/**
 * Удалить существующую задачу
 */
Route::delete('/task/{id}', function ($id) {
  Task::findOrFail($id)->delete();

  return redirect('/');
});
