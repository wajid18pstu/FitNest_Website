<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Member Approved - Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../font-awesome/css/all.css" rel="stylesheet" />
    <style>
        .success-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            text-align: center;
        }
        .success-container .fa-check-circle {
            color: #28a745;
            font-size: 60px;
            margin-bottom: 20px;
        }
        .success-container h2 {
            color: #28a745;
            margin-bottom: 15px;
        }
        .success-container .btn {
            margin-top: 25px;
        }
    </style>
</head>
<body>
<div class="success-container">
    <i class="fas fa-check-circle"></i>
    <h2>Member Approved Successfully!</h2>
    <p>The member has been activated and can now access the gym system.</p>
    <a href="pending-members.php" class="btn btn-success"><i class="fas fa-arrow-left"></i> Back to Pending Members</a>
</div>
</body>
</html>
