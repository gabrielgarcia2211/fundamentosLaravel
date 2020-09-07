<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       $tasks = $request->user()->tasks()->orderBy('created_at', 'desc')->get();
       //Auth::user()
       return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title
        ]);

        return redirect('/tasks');

      
    }

    public function destroy(Request $request, $id)
    {
        
        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }

        //$this->authorize('verify', $task);

        $task->delete();
        Session::flash('data', 'Tarea Eliminada');
        return redirect('/tasks');

      
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }

        //$this->authorize('verify', $task);

        $task->title = $request->title;
        $task->save();
        return redirect('/tasks');
    }



    public function editView($id)
    {
        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }

        //$this->authorize('verify', $task);

        return view('tasks.edit', ['task' => $task]);
    }
}
