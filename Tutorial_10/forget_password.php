<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "config.php";

require 'library/vendor/autoload.php';

require 'library/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'library/vendor/phpmailer/phpmailer/src/SMTP.php';
require 'library/vendor/phpmailer/phpmailer/src/Exception.php';

$email = "";
$errEmail = "";

if (isset($_POST["send"])) {
    if ($_POST['email'] == null) {
        $errEmail = "Please Enter Your Email!!!";
    } elseif (((!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))) {
        $errEmail = "Invalid Email Format!!!";
    } elseif (((!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))) {
        $email = $_POST['email'];
        $sql = "select email from user where email=?";
        $res = $conn->prepare($sql);
        $res->execute([$email]);
        $data = $res->fetch();
        if ($data > 0) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'amimihtun4@gmail.com';
                $mail->Password   = 'jobkejnahdmtnpgx';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('amimihtun4@gmail.com');
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);
                $mail->Subject = "Reset Password";
                $mail->Body = "To reset your password. Click <a href='http://localhost/PHP_Training/Tutorial_10/reset_password.php'>Here!</a>";
                $mail->send();
                echo "<div class='alert alert-success' role='alert'><h6>Email has sent successfully!!!</h6></div>";
                session_start();
                $_SESSION['email'] = $_POST["email"];
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'><h6>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</h6></div>";
            }
        } else {
            $errEmail = "Your Email Does Not Match With Any User!!!";
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
                                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="name@example.com">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                        </div>
                        <div class="pe-3 ps-3 pt-3 bg-light d-flex justify-content-between">
                            <div class="form-group mb-3">
                                <a href="login.php" class="text-decoration-none">Login</a>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" name="send" class="btn btn-primary" value="Send">
                            </div>
                        </div>
                    </form>
                </card>
            </div>
        </div>
    </div>
</div>