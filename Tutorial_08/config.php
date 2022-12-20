<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed") . $conn->connect_error;
}

$link = "CREATE TABLE IF NOT EXISTS Posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NULL,
    is_published BOOLEAN NOT NULL,
    created_datetime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_datetime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )";

//if ($conn->query($link) === TRUE) {
//    echo "Table Posts created successfully";
//} else {
//    echo "Error creating database: " . $conn->error;
//}

//$conn->close();