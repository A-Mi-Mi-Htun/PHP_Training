<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table class="table">
    <?php
        echo "<h1 class='title'>Chessboard</h1>";
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
    </table>
</body>
</html>
