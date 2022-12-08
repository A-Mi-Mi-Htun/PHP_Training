<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Functions</title>
</head>
<body>
  <?php
    function familyName($fname)
    {
      echo "$fname Schwazenegger <br>";
    }

    familyName("Arnold");
    familyName("Patrick");

    function powerNumbers(int $x, int $y)
    {
      echo $x ** $y . "<br>";
    }

    powerNumbers(3,5);
    powerNumbers(5,8);
  ?>
</body>
</html>