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

<table>
    <form method="post">
        <tr>
            <td><label for="name">name: </label></td>
            <td><input type="name" id="name" name="name"></td>
        </tr>
        <tr>
            <td><label for="email">email: </label></td>
            <td><input type="email" id="email" name="email"></td>
        </tr>
        <tr>
            <td><label for="password">password: </label></td>
            <td><input type="password" id="password" name="password"></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="2"><input type="submit" value="Login" name="submit"></td>
        </tr>
    </form>
</table>
