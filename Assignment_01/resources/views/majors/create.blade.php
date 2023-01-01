<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment_01</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav pt-3 pb-3 justify-content-around">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-dark text-decoration-none">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex">
                            <a href="{{ url('/') }}" class="nav-link text-dark text-decoration-none">Students</a>
                            <a href="{{ url('/majors/') }}" class="nav-link text-dark text-decoration-none">Majors</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-6 mt-3">
                @if (session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif
                @include('common.errors')
                <div class="card">
                    <h5 class="card-header">Major Register</h5>
                    <div class="card-body">
                        <form action="{{ url('/majors/create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-12 control-label mb-2">Major Name</label>
                                <div class="col-12">
                                    <input type="text" name="name" id="name" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>  
                <div class="card mt-3">
                    <h5 class="card-header">
                        Major Lists
                    </h5>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Major</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($majors as $major)
                                <tr>
                                    <td>{{ $major->id }}</td>
                                    <td>{{ $major->name }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ url('/majors/edit/'.$major->id) }}" class="btn btn-success btn-sm d-inline">Edit</a>
                                        <form action="{{ url('/majors/delete/'.$major->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick='return confirm("Are you sure to delete?")'>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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