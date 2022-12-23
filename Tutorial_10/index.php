<?php 
error_reporting(0);

$email = ""; ?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="library/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<div class="container-fluid bg-light">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav pt-3 pb-3 justify-content-between">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-dark text-decoration-none">Home</a>
                    </li>
                    <?php
                    session_start();
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
<div class="container">
    <div class="wrapper">
        <div class="row d-flex align-items-center text-center height">
            <div class="col-md-12">
                <h2>Welcome To My Website</h2>
            </div>
        </div>
    </div>
</div>