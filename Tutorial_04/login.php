<?php
session_start();

$name = $email = "";
$name_err = $email_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter a email.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email.";
    } else {
        $email = $input_email;
    }
}

if(isset($_POST["submit"]) && !empty($_POST["email"]) && !empty($_POST["email"])) {

    if($_POST["email"] == "amimihtun4@gmail.com" && $_POST["password"]) {
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["valid"] = "true";

        header("location:index.php");
    } else {
        header("location:login.php");
    }
} 
?>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<table class="table-four">
    <form method="post">
        <tr>
            <th colspan="2" class="title">Welcome back...</th>
        </tr>
        <tr>
            <td><label class="cmn" for="name">Name: </label></td>
            <td>
                <input class="cmn input-txt" type="name" id="name" name="name" value="<?php echo $name; ?>">
                <p class="message"><?php echo $name_err; ?></p>
            </td>
        </tr>
        <tr>
            <td><label class="cmn" for="email">Email: </label></td>
            <td>
                <input class="cmn input-txt" type="email" id="email" name="email" value="<?php echo $email; ?>">
                <p class="message"><?php echo $email_err; ?></p>
            </td>
        </tr>
        <tr>
            <td><label class="cmn" for="password">Password: </label></td>
            <td><input class="cmn input-txt" type="password" id="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><button class="cmn-btn" type="submit" name="submit">Login</button></td>
        </tr>
    </form>
</table>