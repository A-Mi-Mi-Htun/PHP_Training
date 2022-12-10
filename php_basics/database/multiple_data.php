<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed") . $conn->connect_error;
}

$sql = "INSERT INTO MyGuests (
    firstname, lastname, email) VALUES (
    'John', 'Doe', 'john@example.com');";

$sql .= "INSERT INTO MyGuests (
    firstname, lastname, email) VALUES (
    'Mary', 'Moe', 'mary@example.com');";

$sql .= "INSERT INTO MyGuests (
    firstname, lastname, email) VALUES (
    'Julie', 'Dooley', 'julie@example.com');";

if ($conn->multi_query($sql) === TRUE) {
    echo "Multiple records inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>