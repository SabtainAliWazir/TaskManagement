@extends('frontend.layouts.layout')


@section('content')
<div class="col-md-10 offset-md-1">
    <!-- Task table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample task row (replace with dynamic data) -->
            @foreach($tasks as $task)
            <tr>
                <td>{$task->title}</td>
                <td>{$task->description}</td>
                <td>Low</td>
                <td>{$task->due_date}</td>
                <td>
                    <!-- Button group for edit, show, and delete buttons -->
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-info">Show</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
            <!-- Additional rows for more tasks -->
        </tbody>
    </table>
</div>

@endsection