<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management System</title>
  <link rel="icon" href='../images/logo1.png' type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/admin.css">
	<link rel="stylesheet" href="../styles/project.css">
</head>

<body>
  <!-- Your existing HTML code here -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="../images/logo1.png" alt="LOGO" height="40">
    </a>
    <span class="navbar-text"><?php print $role; echo ": "; print $user; ?></span>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="project.php">Project</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="skill.php">View Skill Matrix</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mail.php">Mail</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-logout active" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>