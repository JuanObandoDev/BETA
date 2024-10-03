<?php
    /*
    * PostgreSQL Database connection
    * Developer: Juan Obando
    */
    require dirname(__DIR__, 2) . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
    $dotenv->load();

    $servername = $_ENV['SERVER'];
    $port = $_ENV['PORT'];
    $username = $_ENV['USERNAME'];
    $password = $_ENV['PASSWORD'];
    $dbname = $_ENV['DB_NAME'];

    $data = "
        host=$servername
        port=$port 
        dbname=$dbname 
        user=$username
        password=$password
        ";

    $conn = pg_connect($data);

    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    } else {
        // echo "Connected successfully";
    }

    // pg_close($conn);
?>