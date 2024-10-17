<?php
    session_start();
    session_destroy();
    echo "<script>alert('You have been logged out');</script>";
    header("refresh:0, url=http://127.0.0.1/ProgramacionAvanzada/api/src/login.html");
    exit();
?>
