<link rel="stylesheet" href="css/style.css">
<?php
echo "<h1 class='title'>Diamond Pattern</h1>";
echo "<div class='table-star'>";
$row = 6;

$space = 10;
$x = 0;
while ($x < $row) {
    $y = 0;
    while ($y < $space) {
        echo "&nbsp;";
        $y++;
    }

    $y = 0;
    while ($y <= ($x * 2)) {
        echo "*";
        $y++;
    }

    echo "</br>";
    $space -= 2;
    $x++;
}

$space = 2;
$x = ($row - 1);
while ($x > 0) {
    $y = 0;
    while ($y < $space) {
        echo "&nbsp;";
        $y++;
    }

    $y = 2;
    while ($y <= ($x * 2)) {
        echo "*";
        $y++;
    }
    $x--;
    echo "</br>";
    $space += 2;
}
echo "</div>";
?>
