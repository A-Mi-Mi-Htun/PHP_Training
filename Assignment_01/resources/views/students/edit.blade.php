<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment_01</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="container-fluid w-50">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Edit Student</h5>
                    <div class="card-body">
                        @if (session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                        @endif
                        @include('common.errors')
                        <form action="{{ url('/update/'.$student->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-12 control-label">Name</label>
                                <div class="col-12">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-12 control-label">Email</label>
                                <div class="col-12">
                                    <input type="email" name="email" id="name" class="form-control" value="{{ $student->email }}">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-12 control-label">Phone</label>
                                <div class="col-12">
                                    <input type="number" name="phone" id="phone" class="form-control" value="{{ $student->phone }}">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-12 control-label">Address</label>
                                <div class="col-12">
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="major" class="col-12 control-label">Major</label>
                                <div class="col-12">
                                    <select name="major" id="major" class="form-control">
                                        <option value="" disabled>Select Major</option>
                                        @foreach(App\Models\Major::all() as $major)
                                        <option value="{{ $major->id }}" @if($major->id == $student->major_id) selected @endif>{{ $major->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <a href="{{ url('/') }}" class="btn btn-secondary me-3">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>     
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>