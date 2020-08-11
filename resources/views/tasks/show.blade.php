@extends('layouts.app')

@section('content')

 <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>status</th>
            <td>{{ $task->status }}</td>
        </tr>
    </table>
    
    @if (Auth::id() == $task->user_id)
    {{-- タスク編集ページへのリンク --}}
    {!! link_to_route('tasks.edit', 'このメッセージを編集', ['task' => $task->id], ['class' => 'btn btn-light']) !!}
    @endif
    
    @if (Auth::id() == $task->user_id)
        {{-- 投稿削除ボタンのフォーム --}}
        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}
    @endif

@endsection