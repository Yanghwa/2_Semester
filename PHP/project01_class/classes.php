<?php
//get connect.php to connect to database
require "connect/connect.php";

//build the sql
$sql = "SELECT * FROM tblclasses";

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
	<title>Class List</title>
</head>
<body>
	<div class="container">
		<!--include the header.php to get header of the page-->
		<?php include "header.php" ?>
		<section>
			<!--if there is any class stored then only build the table-->
			<?php if ($row_count > 0): ?>
				<div>
					<!--heading of the page-->
					<h1>classes</h1>
				</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Class name</th>
							<th>Class hours</th>
							<th>Class teacher</th>
						</tr>
					</thead>
					<tbody>
						<?php $number = 1 ?>
						<?php foreach ($classes as $class): ?>
							<tr>
								<td><?= $number ?></td>
								<td>
									<a href="student.php?classid=<?= $class["id"] ?>"><?= $class["class_name"] ?></a>
								</td>
								<td><?= $class["class_hours"] ?></td>
								<td><?= $class["class_teacher_fname"] ." " .$class["class_teacher_lname"]?></td>
								<td>
									<a href="new_class.php?classid=<?= $class["id"] ?>"><i class="fa fa-pencil">
									</i>&nbsp;&nbsp;Update</a>
								</td>
								<td>
									<a href="delete_class.php?classid=<?= $class["id"] ?>"><i class="fa fa-trash">
									</i>&nbsp;&nbsp;Delete</a>
								</td>
								<?php $number++ ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else: ?>
				<!--if there was no class then give the warning to the user-->
				<div class="alert alert-warning">
					<p>No class found.<a href="new_class.php">&nbsp;&nbsp;Add class</a></p>
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
