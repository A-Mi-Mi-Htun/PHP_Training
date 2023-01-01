<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment_01</title>
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
    <div class="container-fluid w-75">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 mt-3">
                @if (session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif
                @include('common.errors')
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/create') }}" class="btn btn-primary">Create</a>
                    <div class="">
                        <a href="{{ url('/import') }}" class="btn btn-primary">Import</a>
                        <a href="{{ url('/export') }}" class="btn btn-primary">Export</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-1">Student Lists</h5>
                        <form action="{{ url('/search') }}" method="POST">
                            @csrf
                            <div class="form-group d-flex">
                                <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                                <button id="button-addon2" type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Major</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th colspan="2">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($students as $row)
                                    <tr>
                                        <td class="table-text col-sm-6">
                                            <div>{{ $row->id }}</div>
                                        </td>
                                        <td class="table-text col-sm-6">
                                            <div>{{ $row->name }}</div>
                                        </td>
                                        <td class="table-text col-sm-6">
                                            <div>{{ $row->major->name }}</div>
                                        </td>
                                        <td class="table-text col-sm-6">
                                            <div>{{ $row->phone }}</div>
                                        </td>
                                        <td class="table-text col-sm-6">
                                            <div>{{ $row->email }}</div>
                                        </td>
                                        <td class="table-text col-sm-6">
                                            <div>{{ $row->address }}</div>
                                        </td>
                                        <td class="table-text col-sm-6">
                                            <a href="{{ url('/edit/'.$row->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        </td>
                                        <td class="table-text col-sm-6">
                                            <form action="{{ url('/delete/'.$row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                    Delete
                                                </button>
                                                <input type="hidden" name="_method" value="DELETE">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>