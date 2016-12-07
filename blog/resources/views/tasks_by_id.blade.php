@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')   
</div>

<!--Текущие задачи -->
@if (count($tasks) > 0)
<div class="panel panel-default">


    <div class="panel-body">
        <table class="table table-striped task-table">

	    <!-- Заголовок таблицы -->
	    <thead>
            <th>Task</th>
            <th>&nbsp;</th>
	    </thead>

	    <!-- Тело таблицы -->
	    <tbody>
		@foreach ($tasks as $task)
		<tr>
		    <!-- Имя задачи -->
		    <td class="table-text">
			<div>{{ $task->name }}</div>
		    </td>
			<td class="table-text">
			<div>{{ $task->created_at }}</div>
		    </td>		    
		</tr>
		@endforeach
	    </tbody>
        </table>
    </div>
</div>
@endif
@endsection