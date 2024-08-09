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
            <br>
            <br>";
            if ($status == 'Approved') {
              echo '<b style="color:green;">'.$status.'</b>';
            } elseif ($status == 'Rejected') {
              echo '<b style="color:red;">'.$status.'</b>';
            } elseif ($status == 'Waitlisted') {
              echo '<b style="color:purple;">'.$status.'</b>';
            } else {
              echo '<b style="color:black;">'.$status.'</b>';
            }
          ?>
        </p>
    </section>
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
