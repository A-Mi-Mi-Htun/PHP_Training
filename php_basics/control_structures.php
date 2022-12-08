<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Structures</title>
</head>
<body>
  <?php
    $age =  20;
    /*if...*/
    if($age < 18)
    {
      echo "You are teenager";
    }

    /*if...elseif*/
    if($age < 18)
    {
      echo "You are teenager";
    }elseif($age > 25)
    {
      echo "You age adult";
    }

    /*If...elseif...else*/
    if($age < 18)
    {
      echo "You are teenager";
    }elseif($age > 25)
    {
      echo "You age adult";
    }else
    {
      echo "You are young";
    }

    echo "</br>";

    /*for...*/
    for($i = 0; $i < 5; $i++)
    {
      echo "*";
    }

    echo "</br>";

    /*while...*/
    $x = 0;
    while($x < 5)
    {
      echo "a";
      $x++;
    }

    echo "</br>";

    /*do...while...*/
    $x = 0;
    do
    {
      echo "b";
      $x++;
    }while($x < 5);

    echo "</br>";

    /*foreach...*/
    $colors = array("red","green","blue");

    foreach($colors as $color)
    {
      echo "$color <br>";
    }

    /*switch...*/
    $fruit = "dragon fruit";

    switch($fruit)
    {
      case "apple" : echo "Your favourite fruit is apple."; 
      break;
      case "orange" : echo "Your favourite fruit is orange."; 
      break;
      case "grapes" : echo "Your favourite fruit is grapes."; 
      break;
      default : echo "Your favourite fruit is dragon fruit."; 
      break;
    }

    echo "</br>";

    /*break & continue*/
    for($x = 0; $x < 10; $x++)
    {
      if($x == 4)
      {
        break;
      }
      echo "The number is: $x <br>";
    }

    echo "</br>";

    for($x = 0; $x < 10; $x++)
    {
      if($x == 4)
      {
        continue;
      }
      echo "The number is: $x <br>";
    }



  ?>
</body>
</html>