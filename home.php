<?php   // Start the session
            session_start();
            // Check if the username is set in the session
if(isset($_SESSION['username']) && isset($_SESSION['department_name']) && isset($_SESSION['Position_name'])) {
    // If username is set, retrieve and display it
    $username = $_SESSION['username'];
    $department_name=$_SESSION['department_name'];
    $position_name=$_SESSION['Position_name'];
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="x-icon" href="KCBLLOGO.PNG">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>System Access Form</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  </head>
  <body>
    <div class="grid-container">
  <div class="grid-item alerts">
    <h2>REQUEST's</h2>
    <p>Closed: </p>
    <p>Open: </p>
    <p>Pending: </p>
  </div>
  <div class="grid-item">
    <h2>IMPREST's</h2>
    <p>Closed: </p>
    <p>Open: </p>
    <p>Pending: </p>
  </div>
  <div class="grid-item">
    <h2>MEMO's</h2>
    <p>Closed: </p>
    <p>Open: </p>
    <p>Pending: </p>
  </div>
  <div class="grid-item">
    <h2>INCIDENCTS</h2>
    <p>Closed: </p>
    <p>Open: </p>
    <p>Pending: </p>
  </div>
  <div class="grid-item">
    <h2>SYSTEM ACCESS</h2>
   <p>Closed: </p>
    <p>Open: </p>
    <p>Pending: </p>
  </div>
</div>
</body>
</html>