@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">New Task</div>

                <div class="panel-body">
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="task-priority" class="col-sm-12">Priority</label>
                            <div class="col-sm-12">
                                <input type="text" name="priority" id="task-priority" class="form-control"
                                    value="{{ old('priority') }}">
                            </div>

                            <label for="task-name" class="col-sm-12">Task</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" id="task-name" class="form-control"
                                    value="{{ old('task') }}">
                            </div>

                            <label for="task-project" class="col-sm-12">Project Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="project" id="task-project" class="form-control"
                                    value="{{ old('project') }}">
                            </div>

                            <label for="task-due-date" class="col-sm-12">Due Date</label>
                            <div class="col-sm-12">
                                <input type="text" name="duedate" id="task-due-date" class="form-control"
                                    value="{{ old('duedate') }}">
                            </div>

                            <label for="task-due-date" class="col-sm-12">Assigned to</label>
                            <div class="col-sm-12">
                                <input type="text" name="assignedto" id="task-assigned-to" class="form-control"
                                    value="{{ old('assignedto') }}">
                            </div>

                            <label for="task-due-date" class="col-sm-12">Assigned by</label>
                            <div class="col-sm-12">
                                <input type="text" name="assignedby" id="task-assigned-by" class="form-control"
                                    value="{{ old('assignedby') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Priority</th>
                                <th>Task</th>
                                <th>Project Name</th>
                                <th>Due Date</th>
                                <th>Assigned To</th>
                                <th>Assigned By</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->priority }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->project }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->duedate }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->assignedto }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->assignedby }}</div>
                                        </td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('task/' . $task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
