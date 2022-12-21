@extends('layouts.app')

@section('content')

<div class="panel-body w-50 p-3">
    @include('common.errors')

    {{--<h1>{{ $tasks->id }}</h1>--}}

    <form method="POST" class="row">
        @csrf

        <div class="form-group">
            <label for="task" class="col-sm-3 form-label">Task</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="col-sm-offset-3 col-sm-6">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
    
@endsection