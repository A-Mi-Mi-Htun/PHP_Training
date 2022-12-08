<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Types</title>
</head>
<body>
  <?php
    /*String*/
    $stringOne = "Hello World";
    $stringTwo = "Mingalarpar";
    echo $stringOne;
    echo "</br>";
    echo $stringTwo;

    echo "</br>";

    /*Integer*/
    $integer = 1234;
    echo var_dump($integer);

    echo "</br>";

    /*Float*/
    $float = 45.678;
    echo var_dump($float);

    echo "</br>";

    /*Boolean*/
    $booleanOne = "true";
    $booleanTwo = "false";

    echo "</br>";

    /*Array and Sorting Array*/
    $flowers = array("camellia","daffodil","rose");
    echo var_dump($flowers);
    echo "</br>";

    $numbers = array(3,56,12,8,0);
    //echo(sort($numbers));
    //echo "</br>";

    //echo(rsort($numbers));
    //echo "</br>";

    $age = array("Sam"=>"32","Ben"=>"5","William"=>"6");
    echo(asort($age));
    echo "</br>";

    echo(ksort($age));
    echo "</br>";

    echo(arsort($age));
    echo "</br>";

//    echo(krsort($age));
//    echo "</br>";

    /*Object*/
    class Flower
    {
      public $color;
      public $price;

      public function __construct($color,$price)
      {
        $this->color = $color;
        $this->price = $price;
      }
      public function message()
      {
        return "The color of the rose is " . $this->color . " and the price is $" . $this->price;
      }
    }
    $myFlower = new Flower("red",3.78);
    echo $myFlower->message();

    echo "</br>";

    /*NULL*/
    $x = "Hello";
    $x = NULL;
    echo var_dump($x);

    echo "</br>";

    /*Math*/
    echo(pi());
    echo "</br>";

    echo(min(0,20,500,-23));
    echo "</br>";

    echo(max(43,12,-56,-800));
    echo "</br>";

    echo(abs(-5.23));
    echo "</br>";

    echo(sqrt(84));
    echo "</br>";

    echo(round(0.6));
    echo "</br>";

    echo(rand());
    echo "</br>";

    /*Constant*/
    define("GREETING", "Welcome to PHP Basic");
    echo GREETING;
    echo "</br>";

  ?>
</body>
</html>