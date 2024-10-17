<?php
    require "../../config/db_connection.php";
    session_start();

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $enc_pass = md5($pass);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);

    if ($row) {
        if ($row['password'] == $enc_pass) {
            $_SESSION['email'] = $email;
            echo "<script>alert('User logged in successfully');</script>";
            header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/home.php");
        } else {
            echo "<script>alert('Incorrect password');</script>";
            header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/login.html");
        }
    } else {
        echo "<script>alert('User does not exist');</script>";
        header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/login.html");
    }
?>
