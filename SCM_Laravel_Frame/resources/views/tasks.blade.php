@extends('layouts.app')

@section('content')

<div class="card pb-3 mt-5 mb-3">
    @include('common.errors')

    <form action="{{ url('/store') }}" method="POST" class="card-body">
        {{ csrf_field() }}

        <div class="form-group">
            <h3 class="card-title col-sm-12">Task</h3>

            <div class="d-flex">
                <div class="col-sm-8 me-3">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
    
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-3"></i>Add Task
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-body">
        <h3 class="card-title">
            Current Tasks
        </h3>
        <table class="table task-table">
            <thead>
                <th colspan="3">Task</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="table-text col-sm-6">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td class="col-sm-3">
                            <form action="{{ url('/tasks/delete/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="fa fa-trash me-2"></i>Delete
                                </button>

                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                        <td class="col-sm-3">
                            <a href="{{ url('/tasks/edit/'.$task->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit me-2"></i>Edit</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</div>
    
@endsection