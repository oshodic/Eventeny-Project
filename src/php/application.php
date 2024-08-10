<?php
include('db.php');

//Using conditionals when connecting to db to handle future refactoring in case different request methods need to be used
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $vendor_name = $_POST['vendor_name'];
  $application_type_id = $_POST['application_type_id'];
  $description = $_POST['description'];

  $sql = "INSERT INTO Applications1 (vendor_name, application_type_id, description, status) VALUES (?, ?, ?, 'Pending')";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("sis", $vendor_name, $application_type_id, $description);
  $stmt->execute();
  $application_id = $stmt->insert_id;
}
?>

<!-- Display the Vendors info and confirm submission.
Would like to refactor to add error handling in case submission fails -->
<!DOCTYPE html>
<head>
  <title>Application Submitted</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body class="body">
  <header>
    <h2>Application Status</h2>
  </header>
  <main>
    <section id="description">
      <b style="color:green;">Application submitted successfully!</b>
      <br>
      <br>
      <?php echo "<u>". $vendor_name ."</u>"; ?>
      <br>
      <?php echo $description ?>
      <br>
      <h3><b>Your application ID is: <?php echo $application_id; ?></b></h3>
      Use your application ID to <a href='../html/check_status.html'>check the status</a> of your application.
      <br>
      <br>
    </section>
    <br>
    <section>
        <a href="../../index.html" class="login-link">Back to Homepage</a>
    </section>
  </main>
  <footer>
    <p>Eventeny Engineering Project - Christa Oshodi</p>
  </footer>
</body>
