<?php
session_start();
$user = $_SESSION['User'];
$role = $_SESSION['Role'];

// Include the connection.php file (if required)
// include 'connection.php';

// Handling the project proposal file upload
if (isset($_POST['bppf'])) {
  if (isset($_FILES['ppf'])) {
    $file = $_FILES['ppf'];
    // File properties
    $file_name = $file['name'];
    $file_temp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    // Work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('docx', 'doc', 'txt', 'pdf');

    if (in_array($file_ext, $allowed)) {
      if ($file_error === 0) {
        if ($file_size <= 9999999999) {
          $file_name_new = uniqid('', true) . '.' . $file_ext;
          $file_destination = '../ppf/' . $file_name_new;
          if (move_uploaded_file($file_temp, $file_destination)) {
            // File uploaded successfully, now update the database or perform other actions
            // Example: update project table with the uploaded file name for project proposal
            
            include '../connection.php';
            $sql = "UPDATE project SET ppf='$file_name_new' WHERE s_id='$user'";
            mysqli_query($conn, $sql);
            $conn->close();

            $status = "Project proposal uploaded successfully";
            header("location: project.php?status=" . urlencode($status));
            exit();
          }
        }
      }
    }
  }
}

// Handling the project specification file upload
if (isset($_POST['bpsf'])) {
  if (isset($_FILES['psf'])) {
    $file = $_FILES['psf'];
    // File properties
    $file_name = $file['name'];
    $file_temp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    // Work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('docx', 'doc', 'txt', 'pdf');

    if (in_array($file_ext, $allowed)) {
      if ($file_error === 0) {
        if ($file_size <= 9999999999) {
          $file_name_new = uniqid('', true) . '.' . $file_ext;
          $file_destination = '../psf/' . $file_name_new;
          if (move_uploaded_file($file_temp, $file_destination)) {
            // File uploaded successfully, now update the database or perform other actions
            // Example: update project table with the uploaded file name for project specification
            
            include '../connection.php';
            $sql = "UPDATE project SET psf='$file_name_new' WHERE s_id='$user'";
            mysqli_query($conn, $sql);
            $conn->close();
            
            header('Location: project.php');
            exit();
          }
        }
      }
    }
  }
}

if(empty($_SESSION['User']))
{
  header("location: ../index.php");
} else {
  if($role=="Student") {
    include('s_header.php');
?>

<div class="form-container">
  <form method="post" action="project.php" enctype="multipart/form-data">
    <table>
      <tr>
        <td>&nbsp;</td>
        <td>
          <div class="form-group">
            <br />
            <h3 class="text-center mb-4">Project Proposal</h3><br />
            <input type="file" name="ppf"/><br /><br />
            <input type="submit" name="bppf" value="Upload" class="btn btn-primary"/><br /><br />
          </div>
        </td>
      </tr>
    </table>
  </form>
  <form method="post" action="project.php" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <div class="form-group">
            <br />
            <h3>Project Specification</h3><br />
            <input type="file" name="psf" /><br /><br />
            <input type="submit" name="bpsf" value="Upload" /><br /><br />
          </div>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php
          if (isset($_GET['status'])) {
            $status = htmlspecialchars($_GET['status']);
            echo '<p class="form-group" style="color: green;">' . $status . '</p>';
          }
          ?>
        </td>
      </tr>
    </table>
  </form>
</div>
  <br /><br />
  <div class="feedback-container">
    <form method="post" action="project.php">
      <?php
      if (isset($_POST['feedback'])) {
        include '../connection.php';
        $sql1 = "SELECT * FROM project WHERE s_id = '$user' ";
        $rec = mysqli_query($conn, $sql1);
        while ($std = mysqli_fetch_assoc($rec)) {
      ?>
        <textarea name="feedback" rows="5" cols="30" readonly="readonly" placeholder="FEEDBACK"><?php echo $std['remark']; ?> </textarea>
      <?php
        }
      }
      ?>
      <br />
      <input type="submit" name="feedback" value="Get Feedback" /><br /><br />
    </form>
  </div>


<?php  
    include('../footer.php');
  } else {
    header('Location: ../Admin.php');
  }
}
?>
