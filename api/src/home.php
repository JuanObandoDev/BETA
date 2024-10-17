<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Please login first');</script>";
        header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./styles/home_style.css">
</head>
<body>
    <center><h1>Welcome!</h1></center>
    <div class="content">
        <p>This is your homepage. You are successfully logged in.</p>
        <a href="./logout.php">Logout</a>
    </div>
</body>
</html>
