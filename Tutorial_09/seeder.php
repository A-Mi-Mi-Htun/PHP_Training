<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed") . $conn->connect_error;
}

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Four', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '0', '2022-12-14 12:30:23');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Five', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '1', '2022-09-13 10:40:23');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Six', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '0', '2022-12-14 06:00:23');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Seven', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '1', '2022-11-12 08:10:03');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Eight', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '1', '2022-11-11 12:30:23');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Four', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '0', '2022-08-10 01:00:23');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Nine', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '0', '2022-12-09 02:30:23');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Ten', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '1', '2022-10-08 04:30:23');";

$sql .= "INSERT INTO Posts (
    title, content, is_published, created_datetime) VALUES (
    'Title Eleven', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, neque recusandae! Eveniet dolor aut sapiente, quos recusandae maxime, autem a accusantium iure illum impedit hic, quisquam reprehenderit nobis tempora beatae!', '0', '2022-10-08 12:30:23');";

if ($conn->multi_query($sql) === TRUE) {
    echo "Multiple records inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>