<?php
session_start();
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

$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$row = mysqli_fetch_assoc($res);

if ($count == 1) {
    if (isset($row['name'])) {
        $user = $row['name'];
    } else {
        $user = $id;
    }
    $_SESSION['User'] = $user;
    $_SESSION['Role'] = $role;
    ob_start(); // Start output buffering
    header("location: Admin.php");
    ob_end_flush(); // Flush output buffer and send the header
    exit();
} else {
    $status = "username password Incorrect";
    header("location: Index.php?status=" . urlencode($status));
    exit();
}
?>
