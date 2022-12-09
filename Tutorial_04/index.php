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
</body>

</html>