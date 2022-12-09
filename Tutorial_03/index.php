<?php
if (isset($_POST["submit"])) {
    $date = $_POST["birth_date"];
    $currentDate = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($currentDate));
    $msg = "Your age is: " . $diff->format("%y") . " years " . $diff->format("%m") . " months " . $diff->format("%d") . " days.";
    echo "<h4 class='msg'> $msg </h4>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_03</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table class="table">
        <form method="post">
            <tr>
                <th colspan="2"><h2 class="title">Age Calculator</h2></th>
            </tr>
            <tr>
                <td><label class="cmn" for="birth_date">Date of Birth: </label></td>
                <td><input class="cmn input-txt" type="date" id="birth_date" name="birth_date"></td>
            </tr>
            <tr>
                <td colspan="2"><button class="calculate" type="submit" name="submit">Calculate</button></td>
            </tr>
        </form>
    </table>
</body>

</html>