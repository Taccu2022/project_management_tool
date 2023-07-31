<?php
$sessionExpiration = 900; // 15 minutes in seconds
session_start();

// Check if the user is already logged in
if (!empty($_SESSION['User'])) {
  header("location: Admin.php");
  exit();
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$id = $_POST['id'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];

	include 'connection.php';

	if ($role == "Admin") {
	  $sql = "SELECT * FROM admin WHERE ID='$id' AND password='$pass'";
	} else if ($role == "Faculty") {
	  $sql = "SELECT * FROM faculty WHERE f_id='$id' AND password='$pass'";
	} else {
	  $sql = "SELECT * FROM student WHERE s_id='$id' AND password='$pass'";
	}
	// $sql = "SELECT * FROM $role WHERE ID='$id' AND password='$pass'";

	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	$row = mysqli_fetch_assoc($res);

	if ($count == 1) {
	  $user = isset($row['name']) ? $row['name'] : $id;
	  $_SESSION['User'] = $user;
	  $_SESSION['Role'] = $role;
		// Set the last activity timestamp in the session
		$_SESSION['last_activity'] = time();
	  ob_start(); // Start output buffering
	  header("location: Admin.php");
	  ob_end_flush(); // Flush output buffer and send the header
	  exit();
	} else {
	  $status = "username password Incorrect";
	  header("location: index.php?status=" . urlencode($status));
	  exit();
	}
}
?>
