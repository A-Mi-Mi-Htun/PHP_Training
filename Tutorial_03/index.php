<?php 
    $date = $_POST["birth_date"]; 
    $currentDate = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($currentDate));
    echo "Your age is: " . $diff->format("%y") . " years " . $diff->format("%m") . " months " . $diff->format("%d") . " days.";
?>