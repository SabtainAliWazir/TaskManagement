<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index(Request $request){
       
        $tasks = Task::latest()->paginate(5);

        return view('frontend.pages.task.index', compact('tasks'));
    }

    function store(TaskRequest $request){
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);
        
        return response()->json(['message' => 'Task created successfully', 'task' => $task ]);
    }

    public function updatePriority(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        
       // Map priority levels to integer values
        $priorityMap = [
            'low' => 1,
            'medium' => 2,
            'high' => 3,
        ];

        // Get the priority value from the request
        $priority = $request->input('priority');

        // Convert priority level to integer value
        $priorityValue = $priorityMap[$priority];

        // Update the task with the converted priority value
        $task->priority = $priorityValue;
        $task->save();

        return response()->json(['message' => 'Task priority updated successfully', 'task' => $task]);
    }
    public function sortByPriority()
    {
        $tasks = Task::orderBy('priority', 'desc')->paginate(5);
        if(request()->has('page')){
            return view('frontend.pages.task.index', compact('tasks'));
        }
       
        // Render the partial view containing the new data
        $data = view('frontend.pages.task.tasktable', ['tasks' => $tasks])->render();
        $pagination = view('frontend.pages.task.paginationlinks', ['tasks' => $tasks])->render();

        return response()->json(['tasks' => $data, 'page' => $pagination]);
    }
}