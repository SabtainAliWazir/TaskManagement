@extends('frontend.layouts.layout')


@section('content')

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addTaskModal">
        Create Task
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add Task Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Task details form -->
                    <form id="taskForm">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="priority">Priority</label>
                          <select class="form-control" id="priority" name="priority" required>
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="dueDate">Due Date</label>
                          <input type="date" class="form-control" id="dueDate" name="due_date" required>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Create</button> --}}
                      </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="createTask">Create Task</button>
                </div>
               
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1">
        <!-- Task table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="taskList">
                <!-- Sample task row (replace with dynamic data) -->
                @foreach($tasks as $task)
                <tr id = {{ $task->id }}>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>Low</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        {{ $task->completed ? 'completed' : 'incomplete' }}
                    </td>
                </tr>
                @endforeach
                <!-- Additional rows for more tasks -->
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
    

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<script>
    $(document).ready(function() {
    let url = "{{ route('task.store') }}";
    
    $('#createTask').on('click', function() {
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#taskForm').serialize(),
            success: function(response) {
                // Handle success response
                $('#taskList').append(
                    '<tr id="taskRow' + response.task.id + '">' +
                        '<td>' + response.task.title + '</td>' +
                        '<td>' + response.task.description + '</td>' +
                        '<td>' + response.task.priority + '</td>' +
                        '<td>' + response.task.due_date + '</td>' +
                        '<td>' + (response.task.completed ? 'Completed' : 'Incomplete') + '</td>' +
                    '</tr>'
        );
                $('#title').val('');
                $('#description').val('');
                $('#priority').val('low');
                $('#dueDate').val('');
                $('#addTaskModal').removeClass('show');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                toastr.success(response.message); 
             
                // Assuming you're using Toastr for notifications
                
          
            },
            error: function(error) {
                // Handle error response
                console.error(error);
                toastr.error('An error occurred while creating the task.'); // Show error message
            }
        });
    });
});



</script>



