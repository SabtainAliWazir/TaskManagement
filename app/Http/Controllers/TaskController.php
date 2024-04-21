<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    function index(){
        $tasks = Task::all();
        dd($tasks);
        return view('frontend.pages.task.index', compact('tasks'));
    }
}