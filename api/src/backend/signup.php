<?php
    require "../../config/db_connection.php";
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $enc_pass = md5($pass);

    $query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_pass')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "User created successfully";
    } else {
        echo "Error creating user";
    }

    pg_close($conn);
?>