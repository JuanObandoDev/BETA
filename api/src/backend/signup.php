<?php
    require "../../config/db_connection.php";
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "INSERT INTO users (email, password) VALUES ('$email', '$pass')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "User created successfully";
    } else {
        echo "Error creating user";
    }

    pg_close($conn);
?>