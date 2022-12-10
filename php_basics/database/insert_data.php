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
    'John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record inserted successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>