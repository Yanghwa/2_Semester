<?php
//delete the team by getting team id
if (isset($_GET["classid"])) {
    //get connect.php to connect to database
    require "connect/connect.php";

    //build the sql
    $sql = "DELETE FROM tblclasses WHERE id =:id";

    //prepare the sql statement
    $sth = $dbh->prepare($sql);

    //bind parameters
    $sth->bindParam(':id', $_GET["classid"], PDO::PARAM_INT);

    //execute the sql statement
    $sth->execute();

    //set the database connection to null, to end the connection
    $dbh = null;
}
//redirect to classes page to show the remaining classes
header("Location: classes.php");
