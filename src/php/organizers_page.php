<?php
include 'db.php';

//if function to verify request method so organizers don't have to log in twice after updating status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = $_POST['password'];

  //if function to verify password in case first check on login fails
  if ($password == '45678') {
  $sql = "SELECT a.application_id, a.vendor_name, at.application_type, a.description, a.status, a.submission_date 
    FROM Applications1 a
    JOIN ApplicationType at ON a.application_type_id = at.application_type_id
    ORDER BY a.application_id ASC";

  $result = $connect->query($sql);
  } else {
    echo "Invalid password";
  }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
  $sql = "SELECT a.application_id, a.vendor_name, at.application_type, a.description, a.status, a.submission_date
    FROM Applications1 a
    JOIN ApplicationType at ON a.application_type_id = at.application_type_id
    ORDER BY a.application_id ASC";

  $result = $connect->query($sql);
}
?>

<!-- Refactor to change multiple statuses at once -->
<!DOCTYPE html>
<head>
  <title>Organizer Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body class="body">
  <header>
    <h2>Update Applications</h2>
  </header>
  <main>
    <table border='1' style='background: white; opacity:0.8; display:center; margin-left:auto; margin-right:auto;'>
      <?php 
        if ($result->num_rows > 0) {
          echo "
            <tr>
              <th>Application ID</th>
              <th>Vendor Name</th>
              <th>Application Type</th>
              <th>Description</th>
              <th>Date Submitted</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          ";
          while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
              <td style='padding:10px;'>". $row['application_id'] ."</td>
              <td style='padding:10px;'>". $row['vendor_name'] ."</td>
              <td style='padding:10px;'>". $row['application_type'] ."</td>
              <td style='padding:10px;'>". $row['description'] ."</td>
              <td style='padding:10px;'>". $row['submission_date'] ."</td>
              ";
              if ($row['status'] == 'Approved') {
                echo "<td style='color:green; padding:10px;'><b>". $row['status'] ."</b></td>";
              } elseif ($row['status'] == 'Rejected') {
                echo "<td style='color:red; padding:10px;'><b>". $row['status'] ."</b></td>";
              } elseif ($row['status'] == 'Waitlisted') {
                echo "<td style='color:purple; padding:10px;'><b>". $row['status'] ."</b></td>";
              } else {
                echo "<td style='color:black; padding:10px;'><b>". $row["status"] ."</b></td>";
              }
              echo "<td>
                <form style='padding:10px;' action='update_status.php' method='POST'>
                  <input type='hidden' name='application_id' value='". $row['application_id'] ."'>
                  <select style='text-align:center;' name='status'>
                    <option value='' disabled selected>Update Status</option>
                    <option value='Pending'>Pending</option>
                    <option value='Approved'>Approved</option>
                    <option value='Rejected'>Rejected</option>
                    <option value='Waitlisted'>Waitlisted</option>
                  </select>
                  <input type='submit' value='Update'>
                </form>
              </td>
            </tr>
          ";
          }
        } else {
          echo "<tr><th>There are no applications!</th><tr>";
        }
      ?>
    </table>
    <br>
    <section>
      <a href="../../index.html" class="login-link">Back to Homepage</a>
    </section>  
  </main>
  <footer>
    <p>Eventeny Engineering Project - Christa Oshodi</p>
  </footer>
</body>
