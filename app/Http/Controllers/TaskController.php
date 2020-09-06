<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
