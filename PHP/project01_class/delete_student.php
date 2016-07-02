<?php
//delete the student by getting his id
if (isset($_GET["studentid"])) {
    //get connect.php to connect to database
    require "connect/connect.php";

    //build the sql
    $sql = "DELETE FROM tblstudents WHERE id =:id";

    //prepare the sql statement
    $sth = $dbh->prepare($sql);

    //bind parameters
    $sth->bindParam(':id', $_GET["studentid"], PDO::PARAM_INT);

    //execute the sql statement
    $sth->execute();

    //set the database connection to null, to end the connection
    $dbh = null;
}
//redirect to students page to show the remaining students
header("Location: student.php?classid=".$_GET["classid"]);
