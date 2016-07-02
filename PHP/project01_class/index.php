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
<div class="container">
    <!--include the header.php to get header of the page-->
    <?php include "header.php" ?>
    <!--if there is any error after the validation of the form it goes here-->
    <section>
        <center>
            <!--heading of the page-->
            <fieldset>
                <legend>Here is class to students list</legend>

                <div>
                    <h4>
                        You can add, update or delete a class.
                    </h4>
                </div>
                <div>
                    <h4>
                        You can add, update or delete a student within a class.
                    </h4>
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>
                    <h5><a href="new_class.php">New Class</a></h4>
                </div>
                <div>
                    <h5><a href="new_student.php">New Student</a></h4>
                </div>
                <div>
                    <h5><a href="classes.php">View All Classes</a></h4>
                </div>
                <div>
                    <h5><a href="students.php">View All Students</a></h4>
                </div>
            </center>
        </fieldset>
    </section>
</div>
</html>
