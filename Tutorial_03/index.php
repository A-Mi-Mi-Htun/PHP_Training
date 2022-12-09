<?php
if (isset($_POST["submit"])) {
    $date = $_POST["birth_date"];
    $currentDate = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($currentDate));
    echo "Your age is: " . $diff->format("%y") . " years " . $diff->format("%m") . " months " . $diff->format("%d") . " days.";
}
?>

<table>
    <form method="post">
        <tr>
            <td><label for="birth_date">Date of Birth</label></td>
            <td><input type="date" id="birth_date" name="birth_date"></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="2"><input type="submit" name="submit" value="Calculate"></td>
        </tr>
    </form>
</table>