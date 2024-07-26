@extends('layouts.app')

@section('content')
    <div class="panel-body panel-primary p-sm-5">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label ">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="offset-3 mt-3">
                    <button type="submit" class="btn btn-success">add task</button>
                </div>
            </div>
        </form>
    </div>

    <div class="panel panel-content p-sm-5">
        <div class="panel-heading">
            <h3>Current Tasks</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td class="table-text table-striped">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">no data available</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
