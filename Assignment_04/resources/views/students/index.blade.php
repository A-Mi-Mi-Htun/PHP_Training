<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment_04</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-8 mt-3">
                <span id="successMsg"></span>
                <a href="{{ url('/') }}" onclick="studentPage()" class="btn btn-primary">Student</a>
                <button type="button" onclick="majorPage()" class="btn btn-primary">Major</button>
            </div>
            <div class="col-sm-8 mt-3" id="major">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-1">Student Lists</h5>
                        <button type="button" class="btn btn-primary d-inline-block" data-bs-toggle="modal"
                            data-bs-target="#createStudent">Create</button>
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
                            <tbody id="tableBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Student --}}
    <div class="modal fade" id="createStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="createStudentForm">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name" class="col-12 control-label mb-2">Name</label>
                            <div class="col-12">
                                <input type="text" name="name" id="name" class="form-control">
                                <span id="msgName" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="col-12 control-label mb-2">Email</label>
                            <div class="col-12">
                                <input type="email" name="email" id="email" class="form-control">
                                <span id="msgEmail" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="col-12 control-label mb-2">Phone</label>
                            <div class="col-12">
                                <input type="number" name="phone" id="phone" class="form-control">
                                <span id="msgPhone" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="col-12 control-label mb-2">Address</label>
                            <div class="col-12">
                                <input type="text" name="address" id="address" class="form-control">
                                <span id="msgAddress" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="major" class="col-12 control-label mb-2">Major</label>
                            <div class="col-12">
                                <select name="major" id="major" class="form-control">
                                    <option value="" selected disabled>Select Major</option>
                                    @foreach (App\Models\Major::all() as $major)
                                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                </select>
                                <span id="msgMajor" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Student --}}
    <div class="modal fade" id="editStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="editStudentForm">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name" class="col-12 control-label mb-2">Name</label>
                            <div class="col-12">
                                <input type="text" name="name" id="name" class="form-control">
                                <span id="msg" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="col-12 control-label mb-2">Email</label>
                            <div class="col-12">
                                <input type="email" name="email" id="email" class="form-control">
                                <span id="msg" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="col-12 control-label mb-2">Phone</label>
                            <div class="col-12">
                                <input type="text" name="phone" id="phone" class="form-control">
                                <span id="msg" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="col-12 control-label mb-2">Address</label>
                            <div class="col-12">
                                <input type="text" name="address" id="address" class="form-control">
                                <span id="msg" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="major" class="col-12 control-label mb-2">Major</label>
                            <div class="col-12">
                                <select name="major" id="major" class="form-control">
                                    <option value="" selected disabled>Select Major</option>
                                    @foreach (App\Models\Major::all() as $major)
                                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Major --}}
    <div class="modal fade" id="editMajor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Major</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="editMajorForm">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name" class="col-12 control-label mb-2">Name</label>
                            <div class="col-12">
                                <input type="text" name="name" id="name" class="form-control">
                                <span id="msg" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Create Major --}}
    <div class="modal fade" id="createMajor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Major</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="createMajorForm">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name" class="col-12 control-label mb-2">Name</label>
                            <div class="col-12">
                                <input type="text" name="name" id="name" class="form-control">
                                <span id="msgName" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        //STUDENT
        let tableBody = document.getElementById('tableBody');
        let major = document.getElementById('major');
        let nameList = document.getElementsByClassName('nameList');
        let majorList = document.getElementsByClassName('majorList');
        let phoneList = document.getElementsByClassName('phoneList');
        let emailList = document.getElementsByClassName('emailList');
        let addressList = document.getElementsByClassName('addressList');
        let idList = document.getElementsByClassName('idList');
        let editList = document.getElementsByClassName('editList');
        let deleteList = document.getElementsByClassName('deleteList');
        let btnList = document.getElementsByClassName('btnList');

        //GET
        axios.get('/api/students/')
            .then(response => {
                response.data.forEach(function(item) {
                    console.log(item);
                    displayStudent(item);
                });
                //console.log(response);
            })
            .catch(error => console.log(error));

        //POST
        let createStudent = document.forms['createStudentForm'];
        let createName = createStudent['name'];
        let createPhone = createStudent['phone'];
        let createEmail = createStudent['email'];
        let createAddress = createStudent['address'];
        let createMajor = createStudent['major'];

        createStudentForm.onsubmit = function(e) {
            e.preventDefault();
            console.log(createName.value);
            axios.post('/api/students', {
                    name: createName.value,
                    phone: createPhone.value,
                    email: createEmail.value,
                    address: createAddress.value,
                    major: createMajor.value
                })
                .then(response => {
                    console.log(response);
                    if (response.data.msg == "Data Created Successfully") {
                        var student = response.data.createStudent;

                        tableBody.innerHTML += '<tr>' +
                            '<td class="idList">' + student.id + '</td>' +
                            '<td class="nameList">' + student.name + '</td>' +
                            '<td class="majorList">' + response.data.major.name + '</td>' +
                            '<td class="phoneList">' + student.phone + '</td>' +
                            '<td class="emailList">' + student.email + '</td>' +
                            '<td class="addressList">' + student.address + '</td>' +
                            '<td class="btnList">' +
                            '<button onclick="editStudentBtn(' + student.id +
                            ')" type="button" class="btn btn-sm btn-success me-1" data-bs-toggle="modal" data-bs-target="#editStudent">Edit</button>' +
                            '<button onclick="deleteStudentBtn(' + student.id +
                            ')" class="btn btn-sm btn-danger me-1">Delete</button>' +
                            '</td>' +
                            '</tr>';
                        alertMsg(response.data.msg);
                        createStudent.reset();
                        $("#createStudent").modal("hide");
                    } else {
                        document.getElementById('msgName').innerHTML = (createName.value == '') ?
                            '<i class="text-danger">' + response.data.msg.name + '</i>' : '';

                        document.getElementById('msgEmail').innerHTML = (createEmail.value == '') ?
                            '<i class="text-danger">' + response.data.msg.email + '</i>' : '';

                        document.getElementById('msgPhone').innerHTML = (createPhone.value == '') ?
                            '<i class="text-danger">' + response.data.msg.phone + '</i>' : '';

                        document.getElementById('msgAddress').innerHTML = (createAddress.value == '') ?
                            '<i class="text-danger">' + response.data.msg.address + '</i>' : '';

                        document.getElementById('msgMajor').innerHTML = (createMajor.value == '') ?
                            '<i class="text-danger">' + response.data.msg.major + '</i>' : '';
                    }
                })
                .catch(error => {
                    console.log(error.response);
                });
        }

        //EDIT AND UPDATE
        let editStudent = document.forms['editStudentForm'];
        let editName = editStudent['name'];
        let editPhone = editStudent['phone'];
        let editEmail = editStudent['email'];
        let editAddress = editStudent['address'];
        let editMajor = editStudent['major'];
        let studentId;
        let oldName, oldMajor, oldPhone, oldEmail, oldAddress;

        //EDIT
        function editStudentBtn(id) {
            studentId = id;
            console.log(studentId);
            axios.get('/api/students/' + studentId)
                .then(response => {
                    console.log(response.data.major_id, response.data.name);
                    oldName = editName.value = response.data.name;
                    oldPhone = editPhone.value = response.data.phone;
                    oldEmail = editEmail.value = response.data.email;
                    oldAddress = editAddress.value = response.data.address;
                    oldMajor = editMajor.value = response.data.major_id;
                })
                .catch(error => console.log(error));
        }

        //UPDATE
        editStudentForm.onsubmit = function(e) {
            e.preventDefault();
            //console.log(studentId);
            axios.put('/api/students/' + studentId, {
                    name: editName.value,
                    phone: editPhone.value,
                    email: editEmail.value,
                    address: editAddress.value,
                    major: editMajor.value
                })
                .then(response => {
                    console.log(response);
                    alertMsg(response.data.msg);
                    for (let i = 0; i < nameList.length; i++) {
                        if (nameList[i].innerHTML == oldName) {
                            nameList[i].innerHTML = editName.value;
                            emailList[i].innerHTML = editEmail.value;
                            majorList[i].innerHTML = response.data.major.name;
                            phoneList[i].innerHTML = editPhone.value;
                            addressList[i].innerHTML = editAddress.value;
                        }
                    }
                    $("#editStudent").modal("hide");
                })
                .catch(error => console.log(error));
        }

        //DELETE
        function deleteStudentBtn(id) {
            studentId = id;
            //console.log(studentId);
            if (confirm('Are you sure to delete?')) {
                axios.delete('/api/students/' + studentId)
                    .then(response => {
                        console.log(response.data.deleteStudent.name);
                        alertMsg(response.data.msg);
                        for (let i = 0; i < nameList.length; i++) {
                            if (nameList[i].innerHTML == response.data.deleteStudent.name) {
                                idList[i].style.display = nameList[i].style.display = phoneList[i].style.display =
                                    emailList[i].style.display = addressList[i].style.display = majorList[i].style
                                    .display = btnList[i].style.display = "none";
                            }
                        }
                    })
                    .catch(error => console.log(error));
            }
        }

        //MAJOR
        function majorPage() {
            //GET
            axios.get('/api/majors/')
                .then(response => {
                    major.innerHTML = '<div class="card">' +
                        '<div class="card-header d-flex justify-content-between">' +
                        '<h5 class="mt-1">Major Lists</h5>' +
                        '<button type="button" class="btn btn-primary d-inline-block" data-bs-toggle="modal" data-bs-target="#createMajor">Create</button>' +
                        '</div>' +
                        '<div class="card-body">' +
                        '<table class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th>ID</th>' +
                        '<th>Major</th>' +
                        '<th>Action</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody id="majorBody">' +
                        '</tbody>' +
                        '</table>' +
                        '</div>' +
                        '</div>';
                    response.data.forEach(function(item) {
                        //console.log(item);
                        displayMajor(item);
                    });
                    //console.log(response);
                })
                .catch(error => console.log(error));

        }

        //POST MAJOR
        let newMajor = document.forms['createMajorForm'];
        let majorName = newMajor['name'];

        newMajor.onsubmit = function(e) {
            e.preventDefault();
            //console.log(majorName.value);
            axios.post('/api/majors', {
                    name: majorName.value,
                })
                .then(response => {
                    console.log(response);
                    if (response.data.msg == "Data Created successfully") {
                        alertMsg(response.data.msg);
                        displayMajor(response.data.createMajor);
                        newMajor.reset();
                        $("#createMajor").modal("hide");
                    } else {

                        document.getElementById('msgName').innerHTML = (majorName.value == '') ?
                            '<i class="text-danger">' + response.data.msg.name + '</i>' : '';
                    }
                })
                .catch(error => {
                    console.log(error.response);
                });
        }

        //EDIT AND UPDATE MAJOR
        let editNewMajor = document.forms['editMajorForm'];
        let editMajorName = editNewMajor['name'];
        let majorId;
        let oldMajorName;

        //EDIT
        function editMajorBtn(id) {
            majorId = id;
            console.log(majorId.editMajorName);
            axios.get('/api/majors/' + majorId)
                .then(response => {
                    oldMajorName = editMajorName.value = response.data.name;
                })
                .catch(error => console.log(error));
        }

        //UPDATE
        editMajorForm.onsubmit = function(e) {
            e.preventDefault();
            //console.log(majorId);
            axios.put('/api/majors/' + majorId, {
                    name: editMajorName.value,
                })
                .then(response => {
                    //console.log(response);
                    alertMsg(response.data.msg);
                    for (let i = 0; i < nameList.length; i++) {
                        if (nameList[i].innerHTML == oldMajorName) {
                            nameList[i].innerHTML = editMajorName.value;
                        }
                    }
                    $("#editMajor").modal("hide");
                })
                .catch(error => console.log(error));
        }

        //DELETE
        function deleteMajorBtn(id) {
            majorId = id;
            //console.log(majorId);
            if (confirm('Are you sure to delete?')) {
                axios.delete('/api/majors/' + majorId)
                    .then(response => {
                        //console.log(response.data.deleteMajor.name);
                        alertMsg(response.data.msg);
                        for (let i = 0; i < nameList.length; i++) {
                            if (nameList[i].innerHTML == response.data.deleteMajor.name) {
                                idList[i].style.display = nameList[i].style.display = btnList[i].style.display = "none";
                            }
                        }
                    })
                    .catch(error => console.log(error));
            }
        }

        function displayStudent(student) {
            tableBody.innerHTML += '<tr>' +
                '<td class="idList">' +
                student.id +
                '</td>' +
                '<td class="nameList">' +
                student.name +
                '</td>' +
                '<td class="majorList">' +
                student.major.name +
                '</td>' +
                '<td class="phoneList">' +
                student.phone +
                '</td>' +
                '<td class="emailList">' +
                student.email +
                '</td>' +
                '<td class="addressList">' +
                student.address +
                '</td>' +
                '<td class="btnList">' +
                '<button onclick="editStudentBtn(' + student.id +
                ')" type="button" class="btn btn-sm btn-success me-3" data-bs-toggle="modal" data-bs-target="#editStudent">Edit</button>' +
                '<button onclick="deleteStudentBtn(' + student.id + ')" class="btn btn-sm btn-danger">Delete</button>' +
                '</td>' +
                '</tr>';
        }

        function displayMajor(data) {
            majorBody.innerHTML += '<tr>' +
                '<td class="idList">' +
                data.id +
                '</td>' +
                '<td class="nameList">' +
                data.name +
                '</td>' +
                '<td class="btnList">' +
                '<button onclick="editMajorBtn(' + data.id +
                ')" type="button" class="btn btn-sm btn-success me-3" data-bs-toggle="modal" data-bs-target="#editMajor">Edit</button>' +
                '<button onclick="deleteMajorBtn(' + data.id + ')" class="btn btn-sm btn-danger">Delete</button>' +
                '</td>' +
                '</tr>';
        }

        function alertMsg(msg) {
            document.getElementById('successMsg').innerHTML =
                '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>' + msg + '</strong>' +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    </script>

</body>

</html>
