<?php
    require "../../config/db_connection.php";
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    
    if ($row) {
        // echo "User already exists";
        echo "<script>alert('User already exists');</script>";
        header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/register.html");
        exit();
    }

    $enc_pass = md5($pass);
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_pass')";
    $result = pg_query($conn, $query);

    if ($result) {
        // echo "User created successfully";
        echo "<script>alert('User created successfully');</script>";
        header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/login.html");
    } else {
        echo "Error creating user";
    }

    pg_close($conn);
?>