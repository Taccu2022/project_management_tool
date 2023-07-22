<?php
session_start();
$user =  $_SESSION['User'];
$role = $_SESSION['Role'];
if(empty($_SESSION['User'])) {
  header("location:index.php");
} else { 
    
	$title = "Project Management System";
	$cssLink = 'admin.css';
	include('header.php');
	if($role=="Admin") { 
	  include('ADMIN/adminIndex.php');
	} elseif ($role=="Faculty") { 
	  include('FACULTY/facultyIndex.php');
	} else {
	  include('STUDENT/studentIndex.php');
	}
	include('footer.php');
} ?>