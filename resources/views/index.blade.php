@extends('layouts.app')

@section('title', 'Índice')
@section('content')
<div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('task.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>Não ha tarefas!</div>
    @endforelse      
</div>
@endsection