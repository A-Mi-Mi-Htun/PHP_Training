<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 01</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <table class="table">
  <?php
    echo "<h1>Chessboard</h1>";
    
    $value = 0;
    $col = 0;

    while($col < 8)
    {
      $row = 0;
      echo "<tr>";
      $value = $col;

      while($row < 8)
      {
        if($value%2 == 0)
        {
          echo "<td class='white-td'></td>";
          $value++;
        }else
        {
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