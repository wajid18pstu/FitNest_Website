<?php
// customer/payment.php
// Payment page for SSLCommerz integration (sandbox)

// You may want to check if the user is logged in here
// include('../session.php');
$page = "payment";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<!--Header-part-->
<div id="header">
  <h1><a href="pages/index.php">FitNest System</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<!-- Sidebar removed for payment page -->
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="pages/index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Payment</a> </div>
    <h1>Make Payment</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-money"></i></span>
            <h5>Payment Form</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="sslczPayBtn" method="POST" class="form-horizontal" action="sslcommerz_process.php" style="padding:20px;">
              <input type="hidden" name="store_id" value="fitne6860069633187">
              <input type="hidden" name="store_passwd" value="fitne6860069633187@ssl">
              <input type="hidden" name="tran_id" value="<?php echo uniqid('fitnest_'); ?>">
              <input type="hidden" name="currency" value="BDT">
              <div class="control-group">
                <label class="control-label" for="amount">Amount (BDT)</label>
                <div class="controls">
                  <input type="number" class="span11" id="amount" name="total_amount" required min="1">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cus_name">Name</label>
                <div class="controls">
                  <input type="text" class="span11" id="cus_name" name="cus_name" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cus_email">Email</label>
                <div class="controls">
                  <input type="email" class="span11" id="cus_email" name="cus_email" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cus_phone">Phone</label>
                <div class="controls">
                  <input type="text" class="span11" id="cus_phone" name="cus_phone" required>
                </div>
              </div>
              <input type="hidden" name="cus_add1" value="Dhaka, Bangladesh">
              <input type="hidden" name="cus_city" value="Dhaka">
              <input type="hidden" name="cus_postcode" value="1200">
              <input type="hidden" name="cus_country" value="Bangladesh">
              <input type="hidden" name="cus_state" value="Dhaka">
              <input type="hidden" name="cus_fax" value="">
              <input type="hidden" name="ship_name" value="FitNest Customer">
              <input type="hidden" name="ship_add1" value="Dhaka, Bangladesh">
              <input type="hidden" name="ship_city" value="Dhaka">
              <input type="hidden" name="ship_postcode" value="1200">
              <input type="hidden" name="ship_country" value="Bangladesh">
              <input type="hidden" name="ship_state" value="Dhaka">
              <input type="hidden" name="ship_phone" value="+8801812807586">
              <input type="hidden" name="success_url" value="http://localhost/FitNest/customer/payment_success.php">
              <input type="hidden" name="fail_url" value="http://localhost/FitNest/customer/payment_fail.php">
              <input type="hidden" name="cancel_url" value="http://localhost/FitNest/customer/payment_cancel.php">
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Pay Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/matrix.js"></script>
</body>
</html>
