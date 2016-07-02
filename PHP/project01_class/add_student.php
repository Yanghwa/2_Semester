<?php

//store the post array into variables
extract($_POST);

//start the session to store variables
session_start();

//set the validation to true
$validated = true;

//validate and sanitize the class id
if ($class_id == "selectclass") {
    $_SESSION["errClassId"] = "Please select a class";
    $validated = false;
} else {
    $class_id = filter_var($class_id, FILTER_VALIDATE_INT);
}

//validate and sanitize the student first name and last name
if (empty($student_fname) || empty($student_lname)) {
    $_SESSION["errStudentName"] = "Please enter the correct student name";
    $validated = false;
} else {
    $student_fname = filter_var($student_fname, FILTER_SANITIZE_STRING);
    $student_lname = filter_var($student_lname, FILTER_SANITIZE_STRING);
}

//validate and sanitize the student id
if (empty($student_id)) {
	$_SESSION["errStudentId"] = "Please enter the correct student id";
    $validated = false;
} else{
    $student_id = filter_var($student_id, FILTER_VALIDATE_INT);
}

//if there is any error redirect to form page and show the errors and populate the student's data
if ($validated == false) {
    $_SESSION["errorStudent"] = "Student could not be added due to following error(s)";
    $_SESSION = array_merge($_SESSION, $_POST);
    header("Location: new_student.php");
} else {
    //get connect.php to connect to database
    require "connect/connect.php";

    //build the sql
    $sql = "INSERT INTO tblstudents(student_fname, student_lname, student_id, student_program, class_id)
 VALUES (:student_fname, :student_lname, :student_id, :student_program, :class_id)";

    //prepare the sql statement
    $sth = $dbh->prepare($sql);

    //bind parameters
    $sth->bindParam(':student_fname', $student_fname, PDO::PARAM_STR, 15);
    $sth->bindParam(':student_lname', $student_lname, PDO::PARAM_STR, 15);
    $sth->bindParam(':student_id', $student_id, PDO::PARAM_INT);
	$sth->bindParam(':student_program', $student_program, PDO::PARAM_STR, 15);
    $sth->bindParam(':class_id', $class_id, PDO::PARAM_INT);

    //execute the sql statement
    $sth->execute();

    //set the database connection to null, to end the connection
    $dbh = null;

    //redirect to students page to show the added students
    header("Location: students.php?classid=" . $class_id);
}
