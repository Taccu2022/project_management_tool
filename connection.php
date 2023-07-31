<?php
$dbhost ='localhost';
$dbuser = 'root';
$dbpass = '';
$db='pmas';

$conn= mysqli_connect($dbhost,$dbuser,$dbpass);
if($conn->connect_error){
    die("Connection failed : " . $conn->connect_error);
}
mysqli_select_db($conn, $db); 



//   // Database credentials
//   $host = "localhost";
//   $user = "root";
//   $password = "";
//   $dbase = "pmas";
//   $conn = "";

//   try {
//     // Create a new PDO instance
//     $string = "mysql:host=$host;dbname=$dbase";
//     $conn = new PDO($string, $user, $password);
//   } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//   }
               
?>