<?php
    function saveDataOnServer($email, $password){
        $SUPABASE_URL = "https://fhrdjapdbgsyitshijoz.supabase.co"; 
        $SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZocmRqYXBkYmdzeWl0c2hpam96Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzAzODg2OTIsImV4cCI6MjA0NTk2NDY5Mn0.8f8OD4tUNgj24sTw4AWF8nB5-bSdqIiLWeV6-PefD9E";
        
        $url = "$SUPABASE_URL/rest/v1/users";
        $data = [
            "email" => $email,
            "password" => $password
        ];
        $options = [
            'http' => [
                'header' => [
                    "Content-Type: application/json",
                    "Authorization: Bearer $SUPABASE_KEY",
                    "apikey: $SUPABASE_KEY",
                ],
                'method' => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, true, $context);
        // $response_data = json_decode($response, true);

        if ($response === false){
            echo "Error: Unable to save data on server";
            exit;
        }
        echo "user has been created successfully"; //. json_encode($response_data);
    }

    require "../../config/db_connection.php";
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    
    if ($row) {
        echo "<script>alert('User already exists');</script>";
        header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/register.html");
        exit();
    }

    $enc_pass = md5($pass);
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_pass')";
    $result = pg_query($conn, $query);

    if ($result) {
        saveDataOnServer($email, $enc_pass);
        echo "<script>alert('User created successfully');</script>";
        header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/login.html");
    } else {
        echo "Error creating user";
    }

    pg_close($conn);
?>