<?php
// admin/notifications.php
$page = "notifications";
include 'includes/topheader.php';
include 'includes/sidebar.php';
include '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Notifications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../customer/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../customer/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../customer/css/matrix-style.css" />
    <link rel="stylesheet" href="../customer/css/matrix-media.css" />
    <link href="../customer/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="header">
  <h1><a href="index.php">FitNest System</a></h1>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Notifications</a> </div>
    <h1>Payment Notifications</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span10">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-bell"></i></span>
            <h5>Recent Successful Payments</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Amount (BDT)</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $result = mysqli_query($con, "SELECT * FROM payment_notifications ORDER BY created_at DESC");
              while($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<td>' . htmlspecialchars($row['cus_name']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['cus_email']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['cus_phone']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['amount']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                  echo '<td><a href="payment.php?name=' . urlencode($row['cus_name']) . '&email=' . urlencode($row['cus_email']) . '&phone=' . urlencode($row['cus_phone']) . '" class="btn btn-success btn-mini">Make Payment</a> ';
                  echo '<a href="delete_notification.php?id=' . $row['id'] . '" class="btn btn-info btn-mini" title="Mark as Done" style="margin-left:5px;">Done</a></td>';
                  echo '</tr>';
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../customer/js/jquery.min.js"></script>
<script src="../customer/js/bootstrap.min.js"></script>
<script src="../customer/js/matrix.js"></script>
</body>
</html>
