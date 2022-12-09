<?php
session_start();

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<table class="table">
    <form method="post">
        <tr>
            <th colspan="2" class="title">Welcome back...</th>
        </tr>
        <tr>
            <td><label class="cmn" for="name">Name: </label></td>
            <td><input class="cmn input-txt" type="name" id="name" name="name" required></td>
        </tr>
        <tr>
            <td><label class="cmn" for="email">Email: </label></td>
            <td><input class="cmn input-txt" type="email" id="email" name="email" required></td>
        </tr>
        <tr>
            <td><label class="cmn" for="password">Password: </label></td>
            <td><input class="cmn input-txt" type="password" id="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2"><button class="cmn-btn" type="submit" name="submit">Login</button></td>
        </tr>
    </form>
</table>

</body>
</html>