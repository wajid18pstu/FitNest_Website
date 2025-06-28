<?php
// customer/payment_fail.php
$page = "payment";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Failed</title>
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
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="pages/index.php" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Payment</a> </div>
    <h1>Payment Failed</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg-important"> <span class="icon"><i class="icon-remove"></i></span>
            <h5>Payment Failed</h5>
          </div>
          <div class="widget-content nopadding" style="padding:20px;">
            <div class="alert alert-danger">Sorry, your payment could not be processed. Please try again.</div>
            <a href="payment.php" class="btn btn-warning">Try Again</a>
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
