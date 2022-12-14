<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<table class="table-four">
    <?php
        session_start();
        if($_SESSION["valid"] == "true") {
            echo "<tr>";
            echo "<td><h3 class='title'>" . $_SESSION["name"] . "!</h3> 
            <p class='sub-txt'> You are successfully login.</p></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td><button class='cmn-btn'><a style='text-decoration:none;' href='logout.php'>Logout</a></button></td>";
            echo "</tr>";
        } else {
            header("location:login.php");
        }
        ?>
</table>