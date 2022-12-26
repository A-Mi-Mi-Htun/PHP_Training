@extends('layouts.app')

@section('content')

<div class="card pb-3 mt-5 mb-3">
    @include('common.errors')

    <form method="POST" class="card-body">
        @csrf

        <div class="form-group">
            <h3 class="card-title col-sm-12">Task</h3>

            <div class="d-flex">
                <div class="col-sm-8 me-3">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
    
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
    
@endsection