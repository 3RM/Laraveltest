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
		@var_dump($tasks)
		
	    </tbody>
        </table>
    </div>
</div>
@endif
@endsection