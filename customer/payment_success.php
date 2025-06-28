<?php
// customer/payment_success.php
$page = "payment";
include 'includes/topheader.php';
include '../dbcon.php';

// Save payment notification if redirected from SSLCommerz with success
if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    $cus_name = isset($_POST['cus_name']) ? $_POST['cus_name'] : (isset($_GET['cus_name']) ? $_GET['cus_name'] : '');
    $cus_email = isset($_POST['cus_email']) ? $_POST['cus_email'] : (isset($_GET['cus_email']) ? $_GET['cus_email'] : '');
    $cus_phone = isset($_POST['cus_phone']) ? $_POST['cus_phone'] : (isset($_GET['cus_phone']) ? $_GET['cus_phone'] : '');
    $amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : (isset($_GET['total_amount']) ? $_GET['total_amount'] : '');
    if ($cus_name && $cus_email && $cus_phone && $amount) {
        $stmt = $con->prepare("INSERT INTO payment_notifications (cus_name, cus_email, cus_phone, amount, status) VALUES (?, ?, ?, ?, 'success')");
        $stmt->bind_param("sssd", $cus_name, $cus_email, $cus_phone, $amount);
        $stmt->execute();
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="header">
  <h1><a href="pages/index.php">FitNest System</a></h1>
</div>
<?php include 'includes/topheader.php'?>
<!-- Sidebar removed for payment success page -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="pages/index.php" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Payment</a> </div>
    <h1>Payment Success</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg-success"> <span class="icon"><i class="icon-check"></i></span>
            <h5>Payment Successful</h5>
          </div>
          <div class="widget-content nopadding" style="padding:20px;">
            <div class="alert alert-success">Your payment was successful. Thank you!</div>
            <a href="pages/index.php" class="btn btn-primary">Back to Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/matrix.js"></script>
</body>
</html>
