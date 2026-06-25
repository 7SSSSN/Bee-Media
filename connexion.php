<?php
    $host = "localhost";
    $dbname = "si";
    $user = "root";
    $pass = "Hassan2006";


    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 

    catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
    
?>