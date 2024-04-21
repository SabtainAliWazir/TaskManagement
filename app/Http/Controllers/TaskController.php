<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    function index(){
        $tasks = Task::latest()->paginate(5);

        return view('frontend.pages.task.index', compact('tasks'));
    }

    function store(Request $request){
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);
        
        
        return response()->json(['message' => 'Task created successfully', 'task' => $task ]);
    }
}