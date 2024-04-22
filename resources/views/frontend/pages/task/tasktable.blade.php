@foreach($tasks as $task)
<tr class="task-row" id = {{ $task->id }}>
    <td>{{ $task->title }}</td>
    <td>{{ $task->description }}</td>
    <td>   
        <select class="priority-select" data-task-id="{{ $task->id }}">
        <option value="low" {{ $task->priority == 1 ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ $task->priority == 2 ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ $task->priority == 3 ? 'selected' : '' }}>High</option>
    </select></td>
    <td>{{ $task->due_date }}</td>
    <td>
        {{ $task->completed ? 'completed' : 'incomplete' }}
    </td>
</tr>
@endforeach