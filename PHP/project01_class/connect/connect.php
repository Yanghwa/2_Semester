<?php
//connect to DB
$host =  "hostname";
$username = "username";
$password = "password";
$dbname = "dbname";

//try the connection and catch exception if any and display the message
try {
    $dbh = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    Echo "Connection failed:" . $e->getMessage();
}
