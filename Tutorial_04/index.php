<?php
session_start();
if($_SESSION["valid"] == "true") {
    echo "<h2>Welcome " . $_SESSION["name"] . "</h2>";
    echo "<button><a style='text-decoration:none;' href='logout.php'>Logout</a></button>";
} else {
    header("location:login.php");
}
?>