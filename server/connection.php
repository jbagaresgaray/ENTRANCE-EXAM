<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'learning';
    
    $con = mysqli_connect($host,$user,$pass,$db);
    $limit = 10;
    $adjacent = 3;

    date_default_timezone_set('Asia/Manila');
?> 