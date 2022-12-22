<?php
require_once "config.php";

if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM Posts WHERE id = $id";
    $conn->query($sql);
    header("location: index.php");
}
?>

