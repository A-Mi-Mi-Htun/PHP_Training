<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 02</title>
</head>
<body>
  <?php
    $row = 6;

    $space = 10;
    $x = 0;
    while($x < $row)
    {
      $y = 0;
      while($y < $space)
      {
        echo "&nbsp;";
        $y++;
      }
      
      $y = 0;
      while($y <= 2*$x){
        echo "*";
        $y++;
      }

      echo "</br>";
      $space -= 2;
      $x++;
    }

    $space = 2;
    $x = $row-1;
    while($x > 0)
    {
      $y = 0;
      while($y < $space)
      {
        echo "&nbsp;";
        $y++;
      }

      $y = 2;
      while($y <= 2*$x)
      {
        echo "*";
        $y++;
      }
      $x--;
      echo "</br>";
      $space += 2;
    }
  ?>
  
</body>
</html>