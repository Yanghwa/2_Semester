<?php
//start the session to get session variables
session_start();

//store the session array into variables
extract($_SESSION);

//unset the session variables
session_unset();

//get connect.php to connect to database
require "connect/connect.php";

//build the sql
$sql = "SELECT id, class_name FROM tblclasses";

//prepare the sql statement
$sth = $dbh->prepare($sql);

//execute the sql statement
$sth->execute();

//store all the rows from database into classes
$classes = $sth->fetchAll();

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
	<title>Class-Student</title>
</head>
<body>
	<div class="container">
	    <!--include the header.php to get header of the page-->
	    <?php include "header.php" ?>
		<!--if there is any class stored then allow the user to add new student-->
    	<?php if ($row_count > 0): ?>
        <!--if there is any error after the validation of the form it goes here-->
        <?php if (isset($errorStudent)): ?>
            <div class="alert alert-danger">
                <?= $errorStudent; ?>
            </div>
        <?php endif; ?>
        <div>
            <!--heading of the page-->
            <h1>Please provide the information below to add a new student to the list</h1>
        </div>
        <!--input form for the page-->
        <form class="form-horizontal" method="post" action="add_student.php">
            <fieldset>
                <legend>Student Information</legend>
                <div class="form-group <?php if (isset($errClassId)): echo "has-error has-feedback"; endif; ?>">
                    <label class="col-sm-2 control-label" for="class_id">Class</label>
                    <div class="input-group">
                        <select name="class_id" class="form-control col-sm-3 col-sm-offset-1" required>
                            <option value="selectclass" selected>----Select Class----</option>
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?= $class["id"] ?>"
                                    <?php if (isset($class_id) && $class["id"] == $class_id): ?>
                                        <?= "selected"; ?>
                                    <?php endif; ?>>
                                    <?= $class["class_name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!--if the error is in the selection of class then it goes here-->
                    <?php if (isset($errClassId)): ?>
                        <div class="text-danger"><?= $errClassId ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php if (isset($errClassName)): echo "has-error has-feedback"; endif; ?>">
                    <label class="col-sm-2 control-label" for="student_fname">Student Name</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" type="text" name="student_fname" max="15" required
                               pattern="[A-Za-z\s]{3,15}" placeholder="Student's first name"
                               title="Please provide correct first name"
                            <?php if (isset($student_fname)): echo "value=" . $student_fname; endif; ?>>
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" type="text" name="student_lname" max="15" required
                               pattern="[A-Za-z\s]{3,15}" placeholder="Student's last name"
                               title="Please provide correct last name"
                            <?php if (isset($student_lname)): echo "value=" . $student_lname; endif; ?>>
                    </div>
				</div>
				<div class="form-group <?php if (isset($errStudentId)): echo "has-error has-feedback"; endif; ?>">
					<label class="col-sm-2 control-label" for="student_id">Student ID</label>
					<div class="col-sm-4">
						<input class="form-control input-sm" type="number" name="student_id" required
						placeholder="Student's ID" title="Please provide student id"
						<?php if (isset($student_id)): echo "value=" . $student_id; endif; ?>>
					</div>
				</div>

				<div class="form-group">
                    <label class="col-sm-2 control-label" for="student_program">Student Program</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" type="text" name="student_program" max="15"
                               pattern="[A-Za-z\s]{3,15}" placeholder="Student's Program"
                               title="Please provide correct Program">
                    </div>
				</div>
					<!--if the error is in the student id then it goes here-->
				<?php if (isset($errStudentId)): ?>
				<div class="text-danger"><?= $errStudentId ?></div>
				<?php endif; ?>
				<!--if the error is in the input of student name then it goes here-->
				<?php if (isset($errStudentName)): ?>
					<div class="text-danger"><?= $errStudentName ?></div>
				<?php endif; ?>
				<?php if (isset($errStudentId)): ?>
					<div class="text-danger"><?= $errStudentId ?></div>
				<?php endif; ?>
                <div class="input-group col-sm-offset-2">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Student</button>
                </div>
            </fieldset>
        </form>
    <?php else: ?>
        <div class="alert alert-warning">
            <p>No Class found.<a href="new_class.php">&nbsp;&nbsp;Add Class</a></p>
        </div>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"
        integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
</body>
</html>
