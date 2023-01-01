<?php
include "config.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("location:forget_password.php");
}

$email = $_SESSION['email'];
$notMatchPsw = "";
$emptyPsw = "";
$emptyConfirmPsw = "";

if (isset($_POST['confirm'])) {

    if ($_POST['password'] == null || $_POST['confirm_password'] == null) {
        if ($_POST['password'] == null) {
            $emptyPsw = "Enter your Password!!!";
        }
        if ($_POST['confirm_password'] == null) {
            $emptyconfirmPsw = "Confirm your Password!!!";
        }
    } elseif (isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            $notMatchPsw = "Password And Confirm Password Do Not Match!!!";
        } else {
            $sql = "UPDATE user SET password='$password' where email='$email'";
            $result = $conn->query($sql);
            echo "<script>alert('Reset Password Successfully.');
      window.location.href = 'login.php';</script>";
        }
    }
}
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<div class="container-fluid">
  <div class="wrapper w-50">
    <div class="row">
      <div class="col-md-12">
        <card class="card mt-3">
          <div class="card-title p-2 bg-light rounded">
            <h4 class="">Forget Password</h4>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="card-body">

              <div class="form-group mb-3">
                <label class="mb-2">Email</label>
                <input type="text" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $email; ?>" disabled />
              </div>
              <div class="form-group mb-3">
                <label>Password</label><br>
                <input type="password" name="password" class="form-control" placeholder="*********" />
                <small class="text-danger"><?php echo $emptyPsw; ?></small>
              </div>
              <div class="form-group mb-3">
                <label>Confirm Password</label><br>
                <input type="password" name="confirm_password" class="form-control" placeholder="*********" />
                <small class="text-danger"><?php echo $notMatchPsw; ?></small>
                <small class="text-danger"><?php echo $emptyConfirmPsw; ?></small>
              </div>
            </div>

            <div class="pe-3 ps-3 pt-3 bg-light d-flex justify-content-end">
              <div class="form-group mb-3">
                <input type="submit" name="confirm" class="btn btn-primary" value="Confirm">
              </div>
            </div>
          </form>
        </card>
      </div>
    </div>
  </div>
</div>