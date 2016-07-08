<?php
//store the post array into variables
extract($_POST);

//start the session to store variables
session_start();

//set the validation to true
$validated = true;

//validate and sanitize the class name
if (empty($class_name)) {
    $_SESSION["errClassName"] = "Please enter the correct Class name";
    $validated = false;
} else {
    $class_name = filter_var($class_name, FILTER_SANITIZE_STRING);
}

//if there is any error redirect to form page and show the errors and populate the user's data
if ($validated == false) {
    $_SESSION["errorClass"] = "Class could not be added due to the following error(s)";
    $_SESSION = array_merge($_SESSION, $_POST);
    header("Location: new_class.php");
} else {
    //get connect.php to connect to database
    require "connect/connect.php";

    //build the sql
    $sql = "INSERT INTO tblclasses(class_name, class_hours, class_teacher_fname, class_teacher_lname) VALUES (:class_name, :class_hours, :class_teacher_fname, :class_teacher_lname)";

    //prepare the sql statement
    $sth = $dbh->prepare($sql);

    //bind parameters
    $sth->bindParam(':class_name', $class_name, PDO::PARAM_STR, 30);
    $sth->bindParam(':class_hours', $class_hours, PDO::PARAM_INT);
    $sth->bindParam(':class_teacher_fname', $class_teacher_fname, PDO::PARAM_STR, 15);
	$sth->bindParam(':class_teacher_lname', $class_teacher_lname, PDO::PARAM_STR, 15);

    //execute the sql statement
    $sth->execute();

    //set the database connection to null, to end the connection
    $dbh = null;

    //redirect to teams page to show the added class
    header("Location: classes.php");
	exit;
}
