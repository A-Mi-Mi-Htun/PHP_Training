<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed") . $conn->connect_error;
}

/**
 * SELECT FROM
 */
/*$sql = "SELECT id,
firstname, lastname FROM MyGuests";*/

/**
 * SELECT FROM WHERE
 */
/*$sql = "SELECT id,
firstname, lastname FROM MyGuests
WHERE lastname='Doe'";*/

/**
 * SELECT and ORDER data
 */
$sql = "SELECT id,
firstname, lastname FROM MyGuests
ORDER BY lastname";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . 
        $row["id"] . " - Name: " . 
        $row["firstname"] . " " . 
        $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>