<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $application_id = $_POST["application_id"];
    
  $sql = "SELECT * FROM Applications1 WHERE application_id= ?";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("i", $application_id);
  $stmt->execute();

  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
}
?>

<!-- Display application info and status. Included a conditional to change text color based on status -->
<!DOCTYPE html>
<head>
  <title>Application Status</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>
  <header>
    <h2>Application Status</h2>
  </header>
  <main>
    <section id="description">
      <?php
        if ($result->num_rows == 0) {
          echo 'No application found with that ID.';
        } else {
          echo '<u>Application ID #'. $application_id .'</u>';
          echo '<br>';
          echo '<br>';
          echo $row['vendor_name'];
          echo '<br>';
          echo $row['description'];
          echo '<br>';
          echo '<br>';
          if ($row['status'] == 'Approved') {
            echo 'Your application status is: <b style="color:green;">'.$row['status'].'</b>';
          } elseif ($row['status'] == 'Rejected') {
            echo 'Your application status is: <b style="color:red;">'.$row['status'].'</b>';
          } elseif ($row['status'] == 'Waitlisted') {
            echo 'Your application status is: <b style="color:purple;">'.$row['status'].'</b>';
          } else {
            echo 'Your application status is: <b style="color:black;">'.$row['status'].'</b>';
          }
        }
      ?>
      <br>
    </section>
    <section>
      <a href="../../index.html" class="login-link">Back to Homepage</a>
    </section>
  </main>
  <footer>
    <p>Eventeny Engineering Project - Christa Oshodi</p>
  </footer>
</body>
