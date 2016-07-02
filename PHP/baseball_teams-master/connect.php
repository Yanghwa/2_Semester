<?php
//connect to DB
$host =  "us-cdbr-azure-southcentral-e.cloudapp.net";
$username = "b3446186faf479";
$password = "96493ba4";
$dbname = "acsm_6461d0db74681f2";

//try the connection and catch exception if any and display the message
try {
    $dbh = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    Echo "Connection failed:" . $e->getMessage();
}
