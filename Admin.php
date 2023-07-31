<?php
// Start the session
session_start();

// Check if the user is logged in
if (empty($_SESSION['User'])) {
  header("location: index.php");
} else {
  // Check if the last activity timestamp is set in the session
  if (isset($_SESSION['last_activity'])) {
    // Calculate the time difference between the current time and the last activity time
    $current_time = time();
    $last_activity_time = $_SESSION['last_activity'];
    $time_difference = $current_time - $last_activity_time;

    // Check if the time difference is greater than 15 minutes (900 seconds)
    if ($time_difference > 90) {
      // If the session has been inactive for more than 15 minutes, destroy the session and redirect to the login page
      session_unset();
      session_destroy();
      header("location: index.php");
      exit();
    }
  }

  // Update the last activity timestamp in the session with the current time
  $_SESSION['last_activity'] = time();

	$role = $_SESSION['Role'];
	$user = $_SESSION['User'];

  // Rest of your code goes here
  $title = "Project Management System";
  $cssLink = 'styles/admin.css';
  include('header.php');
  if ($role == "Admin") {
    include('ADMIN/adminIndex.php');
  } elseif ($role == "Faculty") {
    include('FACULTY/facultyIndex.php');
  } else {
    include('STUDENT/studentIndex.php');
  }
	?>
	<!-- <script>
  	// Reload the page after 15 minutes (900000 milliseconds) of inactivity
  	setTimeout(function() {
  	  window.location.reload();
  	}, 901);
	</script> -->
	<?php
  include('footer.php');
}
?>
