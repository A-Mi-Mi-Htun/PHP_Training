<?php
// Include config file
require_once "config.php";
session_start();
error_reporting(0);

// Define variables and initialize with empty values
$id = NULL;
$email = $password = $error = $email_check = $password_check = "";
$email_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter a email.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $email_err = "Please enter a valid email.";
    } else {
        $email = $input_email;
    }

    $input_password = ($_POST["password"]);
    if (empty($input_password)) {
        $password_err = "Please enter a password.";
    } elseif (strlen($input_password) < 8) {
        $password_err = "Password should be at least 8 characters.";
    } else {
        $password = $input_password;
    }

    // Processing form data when form is submitted
    $sql = "SELECT * FROM user WHERE email='$email'";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $email_check = $row["email"];
                $password_check = $row["password"];
                $id = $row["id"];
            }
        }
    }

    if ($email_check == $_POST["email"] && $password_check == $_POST["password"] && !empty($email) && !empty($password)) {
        $_SESSION["email"] = $email_check;
        $_SESSION["password"] = $password_check;
        $_SESSION["valid"] = 'true';
        echo "<script>alert('Login Successfully.');
        window.location.href = 'index.php';</script>";
    } elseif (empty($email) && empty($password)) {
        $error = "Please fill out name session and password session to login.";
    } else {
        $error = "Sorry! You are not an authorized user. Please, try again.";
    }
}

// Close connection
$conn->close();
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<div class="container-fluid bg-light">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav pt-3 pb-3 justify-content-between">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-dark text-decoration-none">Home</a>
                    </li>
                    <?php
                    $email = $_SESSION["email"];
                    if (empty($email)) { ?>
                    <li class="nav-item">
                        <div class="">
                            <a href="login.php" class="btn btn-primary">Login</a>
                            <a href="register.php" class="btn btn-primary">Register</a>
                        </div>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item dropdown">
                        <div class="dropdown btn-group">
                                <?php
                                    require "config.php";
                                    $sql = "SELECT img FROM user WHERE email='$email'";
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
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="wrapper w-50">
        <div class="row">
            <div class="col-md-12">
                <card class="card mt-3">
                    <div class="card-title p-2 bg-light rounded">
                        <h4 class="">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group mb-3">
                                <label class="mb-2">Email</label>
                                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="name@example.com">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group mb-1">
                                <label class="mb-2">Password</label>
                                <input type="password" name="password" min="8" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="password">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group mb-3">
                                <a href="forget_password.php?id=<?php echo $id; ?>" class="text-decoration-none">forget password?</a>
                            </div>
                            <div class="form-group mb-3 d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>
                            <div class="form-group text-center">
                                Not a member? <a href="register.php" class="text-decoration-none">Sign Up</a>
                            </div>
                        </form>
                    </div>
                </card>
            </div>
            <div class="col-md-12 mt-3 <?php echo empty($error) ? "d-none" : "d-block"; ?>">
                <div class="alert alert-danger"><?php echo $error ?></div>
            </div>
        </div>
    </div>
</div>