
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">
              <img src="images/logo1.png" alt="LOGO" height="40">
          </a>
          <span class="navbar-text"><?php print $role; echo ": "; print $user; ?></span>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="FACULTY/skill.php">Skill Matrix</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="FACULTY/view.php">View</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="FACULTY/mail.php">Mail</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="FACULTY/meeting.php">Meeting</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="FACULTY/report.php">Reprots</a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-logout active" href="logout.php">Logout</a>
                  </li>
              </ul>
          </div>
      </nav>
