<?php

/* VALIDATION */
session_start();

/* Step 1 - Create a flag variable to monitor validation state and an error message variable to hold the error messages */
$validated = true;
/* Step 2 - Assign the variable from the $_POST associative array */
extract($_POST);
/* Step 3 - Check if the required fields (user_id) are empty */
if(empty($user_id)) {
    /* Step 4 - Check the state of the validation flag and redirect the user with an error message if needed */
    /* HINT: don't forget to exit */
    $_SESSION["fail"] = "User id is empty";
    $validated = false;
    session_write_close();
    header('Location:users.php');
    exit;
}
    /* Step 5 - Connect to the database */
    $host =  "hostname";
	$username = "username";
	$password = "password";
	$dbname = "dbname";

    try {
        $dbh = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        Echo "Connection failed:" . $e->getMessage();
    }

    /* Step 6 - Build a SQL string to delete the record in the table term1_users based on the user_id */
    $sql = "DELETE FROM term1_users WHERE id=:user_id";
    /* Step 7 - Prepare the SQL statement */
    $sth = $dbh->prepare($sql);
    /* Step 8 - Bind the values to the placeholders in the SQL statment */
    $sth->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    /* Step 9 - Execute the SQL statement */
    $sth->execute();
    /* Step 10 - Close the connection */
    $dbh=null;
    /* Step 11 - Redirect the user to the confirmed.php page with a success message */
    /* HINT: don't forget to exit */

    session_write_close();
    Echo "Success to delete the user";
    header('Location:confirmed.php');
    exit;
