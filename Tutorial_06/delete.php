<?php 
if (isset($_GET["id"])){
    unlink($_GET["id"]);
    header("location:index.php");
}
?>