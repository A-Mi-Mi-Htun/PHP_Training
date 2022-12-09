<?php
echo "<h1>Chessboard</h1>";
$col = 0;

while ($col < 8) {
    $row = 0;
    echo "<tr>";
    $value = $col;

    while ($row < 8) {
        if (($value % 2) == 0) {
            echo "<td class='white-td'></td>";
            $value++;
        } else {
            echo "<td class='black-td'></td>";
            $value++;
        }
        $row++;
    }
    echo "</tr>";
    $col++;
}
?>