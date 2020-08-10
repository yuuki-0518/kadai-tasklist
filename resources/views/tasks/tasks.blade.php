@if (count($tasks) > 0)
    <ul class="list-unstyled">
        @foreach ($tasks as $task)
            <li class="media mb-3">
                <div class="media-body">
                    <!--<div>-->
                    <!--    {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}-->
                    <!--    {!! link_to_route('users.show', $task->user->name, ['user' => $task->user->id]) !!}-->
                    <!--    <span class="text-muted">posted at {{ $task->created_at }}</span>-->
                    <!--</div>-->
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($task->content)) !!}</p>
                    </div>
                    
                    <div>
                        @if (Auth::id() == $task->user_id)
                            
                            {{-- タスク編集ページへのリンク --}}
                            {!! link_to_route('tasks.edit', 'edit', ['task' => $task->id], ['class' => 'btn btn-light']) !!}
   
                            
                            <!--{{-- 投稿編集ボタンのフォーム --}}-->
                            <!--{!! Form::open(['route' => ['tasks.edit', $task->id], 'method' => 'edit']) !!}-->
                            <!--    {!! Form::submit('Edit', ['class' => 'btn btn-danger btn-sm']) !!}-->
                            <!--{!! Form::close() !!}-->
                       
                        @endif
                    </div>
   
                    <div>
                        @if (Auth::id() == $task->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}
@endif