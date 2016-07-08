<?php
//check if we can get teamid
if (isset($_GET["classid"])) {

    //get connect.php to connect to database
    require "connect/connect.php";

    //build the sql
    $sql = "SELECT * FROM tblclasses WHERE id=:id";

    //prepare the sql statement
    $sth = $dbh->prepare($sql);

    //bind parameters
    $sth->bindParam(":id", $_GET["classid"], PDO::PARAM_INT);

    //execute the sql statement
    $sth->execute();

    //store the row from database into team
    $class = $sth->fetch();

    //set the database connection to null, to end the connection
    $dbh = null;
} else {
	//start the session to get session variables
	session_start();

	//store the session array into variables
	extract($_SESSION);

	//unset the session variables
	session_unset();
}
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
	<title>Add new Class</title>
</head>
<body>
	<div class="container">
		<!--include the header.php to get header of the page-->
		<?php include "header.php" ?>
		<?php if (isset($errorClass)): ?>
			<div class="alert alert-danger">
				<?= $errorClass; ?>
			</div>
		<?php endif; ?>
		<div>
			<!--heading of the page-->
			<h1>Please provide the information below to add a new class to the list</h1>
		</div>
		<!--input form for the page-->
		<form class="form-horizontal" method="post" action="<?php if (empty($_GET['classid'])): echo "add_class.php";else :  echo "edit_class.php"; endif; ?>">
			<fieldset>
				<legend>Class Information</legend>
				<div class="form-group <?php if (isset($errClassName)): echo "has-error has-feedback"; endif; ?>">
					<label class="col-sm-2 control-label" for="class_name">Class Name</label>
					<div class="col-sm-4">
						<input class="form-control input-sm" type="text" name="class_name" max="30" required
						pattern="[A-Za-z\s]{3,30}" placeholder="Class's name" title="Please enter correct class name"
						<?php if (isset($class['class_name'])): echo "value=" . $class['class_name']; endif; ?>>
					</div>
					<!--if the error is in the class name then it goes here-->
					<?php if (isset($errClassName)): ?>
					<div class="text-danger"><?= $errClassName ?></div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="class_hours">Class Hours</label>
					<div class="col-sm-4">
						<input class="form-control input-sm" type="number" name="class_hours" min='0' step='1' max="24"
						placeholder="Class's Hours" title="How many hours does this class do?"
						<?php if (isset($class['class_hours'])): echo "value=" . $class['class_hours']; endif; ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="class_teacher_fname">Teacher's First Name</label>
					<div class="col-sm-4">
						<input class="form-control input-sm" type="text" name="class_teacher_fname" max="15"
						pattern="[A-Za-z\s]{3,15}" placeholder="Class Teacher's first name"
						title="Please provide correct teacher first name"
						<?php if (isset($class['class_teacher_fname'])): echo "value=" . $class['class_teacher_fname']; endif; ?>>
					</div>
					<div class="col-sm-4">
                        <input class="form-control input-sm" type="text" name="class_teacher_lname" max="15"
                               pattern="[A-Za-z\s]{3,15}" placeholder="Class Teacher's last name"
                               title="Please provide correct teacher last name"
                            <?php if (isset($class['class_teacher_lname'])): echo "value=" . $class['class_teacher_lname']; endif; ?>>
                    </div>
				</div>
				<div class="input-group col-sm-offset-2">
					<input type="hidden" name="id" value="<?php if (!empty($_GET['classid'])) : echo $class["id"] ;endif; ?>">
					<button class="btn btn-primary"><i class=<?php if (empty($_GET['classid'])): echo "fa fa-plus";else:echo "fa fa-pencil";endif; ?>></i>&nbsp;&nbsp;<?php if (empty($_GET['classid'])): echo "Add Class";else : echo "Update Class";endif;?></button>
				</div>
			</fieldset>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"
	integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
	integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
	crossorigin="anonymous"></script>
</body>
</html>
