<?php 
    $name = $_POST["name"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];

    if($email == "amimihtun4@gmail.com" and $password == "1234")
    {
        session_start();
        $_SESSION["session_id"] = session_id();
        echo "<h2>Welcome $name</h2>
            <button><a style='text-decoration:none;' href='main.html'>Logout</a></button>";
        echo "";
    } else 
    {
        echo "<h2 style='text-align:center'>Sorry! Please Try again</h2>";
    }
?>