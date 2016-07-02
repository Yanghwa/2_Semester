<?php
//get connect.php to connect to database
require "connect/connect.php";

$sql = "SELECT * FROM tblstudents";
//prepare the sql statement
$sth = $dbh->prepare($sql);
    //execute the sql statement
$sth->execute();

//store all the rows from database into students
$students = $sth->fetchAll();

//store all the row count from database into row_count
$row_count = $sth->rowCount();

//set the database connection to null, to end the connection
$dbh = null;

?>
<!DOCTYPE HTML>
<html lang="en">
<!--head region of the page-->
<head>
    <!--link to stylesheets-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link href="stylesheets/common.css" rel="stylesheet">
    <!--title of the page-->
    <title>students</title>
</head>
<body>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<div class="container">
    <!--include the header.php to get header of the page-->
    <?php include "header.php" ?>
    <!--if there is any error after the validation of the form it goes here-->
    <section>
        <!--if there is any student stored then only build the table-->
        <?php if ($row_count > 0): ?>
            <div>
                <!--heading of the page-->
                <h1>Students</h1>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student name</th>
                    <th>Student Id</th>
                    <th>Student Program</th>
                </tr>
                </thead>
                <tbody>
                <?php $number = 1 ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $number ?></td>
                        <td>
                            <?= $student["student_fname"] . " " . $student["student_lname"] ?>
                        </td>
                        <td><?= $student["student_id"] ?></td>
                        <td><?= $student["student_program"] ?></td>
                        <td>
                            <a href="update_student.php?studentid=<?= $student["id"] ?>&classid=<?= $student["class_id"] ?>"><i
                                    class="fa fa-pencil"></i>&nbsp;&nbsp;Update</a>
                        </td>
                        <td>
                            <a href="delete_student.php?studentid=<?= $student["id"] ?>&classid=<?= $student["class_id"] ?>"><i
                                    class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></td>
                        <?php $number++ ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <!--if there was no student then give the warning to the user-->
            <div class="alert alert-warning">
                <p>No student found.<a href="new_student.php">&nbsp;&nbsp;Add student</a></p>
            </div>
        <?php endif ?>
    </section>
</div>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"
        integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
</body>
</html>
