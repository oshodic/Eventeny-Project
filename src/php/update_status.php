<?php

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $application_id = $_POST["application_id"];
  $status = $_POST["status"];
    
  $sql = "UPDATE Applications1 SET status= ? WHERE application_id= ? ";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("si", $status, $application_id);
  $stmt->execute();

  $connect->close();
}
?>

<!-- Confirm status update and conditional to change text color depending on status -->
<!-- Would like to refactor to loop through app ids and display all updated statuses. 
      - TODO after organizers_page refactor -->
<!DOCTYPE html>
<head>
  <title>Application Status Updated</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body class="body">
    <header>
      <h2>Application Status Updated</h2>
    </header>
    <main>
      <section id="description">
        <p>
          You have updated the status of Application ID 
          <?php echo "#$application_id to:
            <br>";
            if ($status == 'Approved') {
              echo '<h3 style="color:green;">'.$status.'</h3>';
            } elseif ($status == 'Rejected') {
              echo '<h3 style="color:red;">'.$status.'</h3>';
            } elseif ($status == 'Waitlisted') {
              echo '<h3 style="color:purple;">'.$status.'</h3>';
            } else {
              echo '<h3 style="color:black;">'.$status.'</h3>';
            }
          ?>
        </p>
    </section>
    <br>
    <section>
      <a href="../../index.html" class="login-link">Back to Homepage</a>
      <a href="organizers_page.php" class="login-link">Back to Organizers Page</a>
    </section>
  </main>
  <footer>
    <p>Eventeny Engineering Project - Christa Oshodi</p>
  </footer>
</body>
</html>
