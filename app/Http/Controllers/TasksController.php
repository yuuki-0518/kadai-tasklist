<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    
    public function index()
    {
         $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'tasks' => $tasks,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
        
    }

   
    public function create()
    {
        $task = new Task;

        // メッセージ作成ビューを表示
        return view('tasks.create', [
            'task' => $task,
        ]);
    }

   
    public function store(Request $request)
    {
        
        // バリデーション
        $request->validate([
            'status' => 'required|max:10',  
            'content' => 'required|max:255',
        ]);
        
         // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->tasks()->create([
            'status' =>$request->status,
            'content' => $request->content,
        ]);
        
         // トップページへリダイレクトさせる
        return redirect('/');
        
      
    }

   
    public function show($id)
    {
       
          // idの値で投稿を検索して取得
        $task = \App\Task::findOrFail($id);
        
         // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を表示
        if (\Auth::id() !== $task->user_id) {
            return redirect('/');
        }
       
        // $task = Task::orderBy('id', 'desc')->paginate(25);

        return view('tasks.show', [
            'task' => $task,
        ]);
    
    }
        
        
    public function edit($id)
    {
    
     $task = \App\Task::findOrFail($id);
     if (\Auth::id() !== $task->user_id) {
         return redirect('/');
     }
     
     return view('tasks.edit', [
           'task' => $task,
     ]);

    }

  
    public function update(Request $request, $id)
    {
        
        // バリデーション
        $request->validate([
            'status' => 'required|max:10', 
            'content' => 'required|max:255',
        ]);
        
          // idの値で投稿を検索して取得
        $task = \App\Task::findOrFail($id);
        
         // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を更新
        if (\Auth::id() !== $task->user_id) {
        // トップページへリダイレクトさせる
        return redirect('/');
        }
    
        // メッセージを更新
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        
        return redirect('/');
       

    }

   
    public function destroy($id)
    {
        
         // idの値で投稿を検索して取得
        $task = \App\Task::findOrFail($id);
        
         // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }
        
        return redirect('/');

      
    }
}
