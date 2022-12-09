<?php
/**
 * Strict Declaration
 */
declare (strict_types = 1);

function add(int $x, int $y)
{
    return $x + $y;
}
//echo add(1.5, 2.5);
echo add(5, 2) . "<br>";

/**
 * Function with default values
 */
function example($one, $two = 6)
{
    $sum = $one + $two;
    echo "The sum is: $sum <br>";
}
example(10);
example(2, 5);

/**
 * Function with parameters
 */
function familyName($fname)
{
    echo "$fname Schwazenegger <br>";
}

familyName("Arnold");
familyName("Patrick");

/**
 * Function with return value
 */
function powerNumbers(int $x, int $y)
{
    $power = $x ** $y;
    return $power;
}

echo "The answer is: " . powerNumbers(3, 5);

/**
 * Recursive function
 */
function recursive($number)
{
    if ($number <= 10) {
        echo "$number <br>";
        recursive($number + 1);
    }
}
recursive(4);

/**
 * Dynamic function call
 */
function sayHello()
{
    echo "Hello <br>";
}
$example = "sayHello";
$example();
?>