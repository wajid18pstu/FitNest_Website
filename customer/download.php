<?php
// download.php - Download page for FitNest apps
$page = 'download';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym System</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .widget-box.download-widget {
            max-width: 500px;
            margin: 40px auto;
        }
        .download-btn {
            margin: 15px 0;
            width: 80%;
            max-width: 300px;
            font-size: 18px;
        }
        .download-icon {
            font-size: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<!--Header-part-->
<div id="header"></div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<?php include 'includes/topheader.php'; ?>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar"></div>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="pages/index.php" title="Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Download</a></div>
    <h1>Download FitNest Apps</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box download-widget">
          <div class="widget-title"> <span class="icon"><i class="icon-download"></i></span>
            <h5>Get the FitNest App</h5>
          </div>
          <div class="widget-content" style="text-align:center;">
            <a href="https://github.com/wajid18pstu/FitNest_desktop_app/releases/download/FitNest_1_1/FitNest.Admin.exe" class="btn btn-primary download-btn" target="_blank">
                <i class="icon-desktop download-icon"></i> Download Desktop App
            </a>
            <br>
            <a href="https://github.com/wajid18pstu/FitNest_mobile_app/releases/download/FitNest_1_0/FitNest_1_0.apk" class="btn btn-success download-btn" target="_blank">
                <i class="icon-mobile-phone download-icon"></i> Download Mobile App
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
