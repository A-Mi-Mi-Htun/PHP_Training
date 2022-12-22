<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed") . $conn->connect_error;
}

$link = "CREATE TABLE IF NOT EXISTS User (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    img VARCHAR(255) NULL,
    address TEXT NOT NULL,
    created_datetime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_datetime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )";

//$reset = "CREATE TABLE IF NOT EXISTS pass_reset (
//    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    email VARCHAR(255) NOT NULL,
//    token VARCHAR(255) NOT NULL
//    )";

//if ($conn->query($reset) === TRUE) {
//    echo "Table reset created successfully";
//} else {
//    echo "Error creating database: " . $conn->error;
//}
//
//$conn->close();