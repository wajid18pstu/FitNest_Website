<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:../index.php');
    exit();
}
include "dbcon.php";

// Approve member if requested
if (isset($_GET['approve_id'])) {
    $id = intval($_GET['approve_id']);
    mysqli_query($con, "UPDATE members SET status='Active' WHERE user_id=$id");
    header('Location: member-approved.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pending Members - Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../font-awesome/css/all.css" rel="stylesheet" />
</head>
<body>
<div id="header">
  <h1><a href="dashboard.html">FitNest Admin</a></h1>
</div>
<?php include 'includes/topheader.php'?>
<?php $page='pending-members'; include 'includes/sidebar.php'?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" class="tip-bottom"><i class="fa fa-home"></i> Home</a> <a href="#" class="current">Pending Members</a> </div>
    <h1>Pending Member Approvals</h1>
  </div>
  <div class="container-fluid">
    <?php if(isset($_GET['approved'])): ?>
      <div class="alert alert-success">Member approved successfully!</div>
    <?php endif; ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fas fa-users"></i></span>
            <h5>Pending Members</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Contact</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($con, "SELECT * FROM members WHERE status='Pending'");
                if(mysqli_num_rows($result) == 0) {
                  echo '<tr><td colspan="4" style="text-align:center;">No pending members.</td></tr>';
                }
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                    <td>".htmlspecialchars($row['fullname'])."</td>
                    <td>".htmlspecialchars($row['username'])."</td>
                    <td>".htmlspecialchars($row['contact'])."</td>
                    <td><a href='pending-members.php?approve_id=".$row['user_id']."' class='btn btn-success btn-mini'>Approve</a></td>
                  </tr>";
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
</body>
</html>
