<?php
// Include config file
require_once "config.php";
session_start();
// Define variables and initialize with empty values
$name = $email = $error = "";
$name_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_check = $_SESSION["email"];
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter a email.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $email_err = "Please enter a valid email.";
    } else {
        $email = $input_email;
    }

    $image_name = $_FILES["img"]["name"];
    $image_size = $_FILES["img"]["size"];
    $image_tmp = $_FILES["img"]["tmp_name"];

    $target_dir = "img/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
    }
    $target_file = $target_dir . $image_name;

    $allowed = array("gif", "jpg", "jpeg", "png");
    $ext = pathinfo($image_name, PATHINFO_EXTENSION);

    if ($image_size < 200000 && (in_array($ext, $allowed))) {
        if(move_uploaded_file($image_tmp, $target_file)) {
            $sql = "UPDATE user SET img='$image_name' WHERE email='$email_check'";
            $conn->query($sql);
            header("location:profile.php");
        } 
    } else {
        $error = "Sorry! Something went wrong.";
    }
    // Close connection
    //$conn->close();
}
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="library/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<div class="container-fluid bg-light">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav pt-3 justify-content-between">
                    <li class="nav-item">
                        <p class="nav-link text-dark">Home</p>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="dropdown btn-group">
                                    <?php
                                    require "config.php";
                                    $email_check = $_SESSION["email"];
                                    $sql = "SELECT img FROM user WHERE email='$email_check'";
                                    if ($result = $conn->query($sql)) {
                                        if ($result) {
                                            while ($row = $result->fetch_assoc()) {
                                                $img = $row["img"];
                                            }                              
                                        }
                                    }
                                    ?>
                                <img name="image" class="img dropdown-toggle" data-bs-toggle="dropdown" src="img/<?php echo !empty($img)? $img : 'user.png' ?>" alt="User">
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php?id='$email'">Logout</a></li>
                            </ul>
                        </div>                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-3">
    <div class="wrapper w-50">
        <div class="row">
            <div class="col-md-12">
                <card class="card mt-3">
                    <div class="card-title p-2 bg-light rounded">
                        <h4 class="">My Profile Setting</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
                            <div class="mb-3">
                                <input type="file" id="upload-image" class="hidden">
                                <div class="me-5 d-inline">
                                    <?php
                                    require "config.php"; 
                                    $email_check = $_SESSION["email"];
                                    $sql = "SELECT img FROM user WHERE email='$email_check'";
                                    if ($result = $conn->query($sql)) {
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $img = $row["img"];
                                            }                              
                                        }
                                    }
                                    ?>
                                    <img id="profile" name="image" class="profile-img" src="img/<?php echo !empty($img)? $img : 'user.png' ?>" alt="">
                                </div>
                                <input onchange="updatePreview(event)" type="file" name="img" accept="image/*" id="actual-btn" hidden/>
                                <label class="upload-btn" for="actual-btn">Upload</label>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Name</label>
                                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" placeholder="name">
                                <span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Email</label>
                                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="name@example.com">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group mb-3 d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </card>
            </div>
            <div class="col-md-12 mt-3 <?php echo empty($error)? "d-none": "d-block"; ?>">
                <div class="alert alert-danger"><?php echo $error ?></div>
            </div>
        </div>
    </div>
</div>
<script>
function updatePreview(event) {
    $image = URL.createObjectURL(event.target.files[0]);
    $imagesrc = document.getElementById("profile");
    $imagesrc.src = $image; 
}
</script>