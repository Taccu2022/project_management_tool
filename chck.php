<?php
$sessionExpiration = 900; // 15 minutes in seconds
session_start();

if (!empty($_SESSION['User'])) {
  header("location: Admin.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = $_POST['id'];
  $pass = $_POST['pass'];
  $role = $_POST['role'];

  // Database credentials
  $host = "localhost";
  $user = "root";
  $password = "";
  $dbase = "pmas";

  try {
    // Create a new PDO instance
    $string = "mysql:host=$host;dbname=$dbase";
    $conn = new PDO($string, $user, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($role == "Admin") {
      $sql = "SELECT * FROM admin WHERE ID='".$id."' AND password='".$pass."'";
    } else if ($role == "Faculty") {
      $sql = "SELECT * FROM faculty WHERE f_id='".$id."' AND password='".$pass."'";
    } else {
      $sql = "SELECT * FROM student WHERE s_id='".$id."' AND password='".$pass."'";
    }

    $pd = $conn->prepare($sql);
    $pd->execute();

    $row = $pd->fetch(PDO::FETCH_ASSOC);

    // Check if the login is successful
    if ($row) {
      $user = isset($row['name']) ? $row['name'] : $id;
      $_SESSION['User'] = $user;
      $_SESSION['Role'] = $role;

      // Set the last activity timestamp in the session
      $_SESSION['last_activity'] = time();

      // Redirect to the appropriate dashboard page (Admin, Faculty, Student)
      header("location: Admin.php");
      exit();
    } else {
      $status = "Username or password is incorrect";
      header("location: index.php?status=" . urlencode($status));
      exit();
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
?>
