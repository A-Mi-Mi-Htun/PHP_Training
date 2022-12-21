@extends('layouts.app')

@section('content')

<div class="panel-body w-75 pt-3 pb-3">
    @include('common.errors')

    <form action="{{ url('task') }}" method="POST" class="row">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="task" class="col-sm-3 form-label">Task</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus me-3"></i>Add Task
                </button>
            </div>
        </div>
    </form>
</div>

@if (count($tasks) > 0)

<div class="panel w-75">
    <div class="panel-heading">
        Current Tasks
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table w-75">
            <thead>
                <th colspan="3">Task</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td class="col-sm-3">
                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-3"></i>Delete
                                </button>

                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                        <td class="col-sm-3">
                            <a href="{{ url('task/edit/'.$task->id) }}" class="btn btn-success"><i class="fa fa-edit me-3"></i>Edit</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</div>
    
@endif
    
@endsection