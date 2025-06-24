<?php session_start();
include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Gym System Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    
    <body>
    
    <div id="loginbox">            
        <form id="loginform" class="form-vertical" method="POST" action="#">
            <div class="control-group normal_text"> <h3><img src="../img/icontest3.png" alt="Logo" style="max-height:200px;width:auto;display:block;margin:0 auto;" /></h3></div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="user" placeholder="Username" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="Password" required />
                    </div>
                </div>
            </div>
            <div class="form-actions text-center" style="margin:0; padding:0; border:none; background:none; box-shadow:none;">
                <button type="submit" name="login" class="btn btn-success btn-large" style="width:86%;margin-bottom:0;">Customer Login</button>
                <a href="#" class="flip-link btn btn-info btn-large" id="to-recover" style="width:86%;font-size:18px; margin-top:8px;">Join Now!</a>
            </div>
            <div class="g">
                <a href="../index.php"><h6>Go Back</h6></a>
            </div>
            
            <?php
            if (isset($_POST['login']))
                {
                    $username = mysqli_real_escape_string($con, $_POST['user']);
                    $password = mysqli_real_escape_string($con, $_POST['pass']);

                    $password = md5($password);
                    
                    $query 		= mysqli_query($con, "SELECT * FROM members WHERE  password='$password' and username='$username' and status='Active'");
                    $row		= mysqli_fetch_array($query);
                    $num_row 	= mysqli_num_rows($query);
                    
                    if ($num_row > 0) 
                        {			
                            $_SESSION['user_id']=$row['user_id'];
                            header('location:pages/index.php');
                            
                        }
                    else
                        {
                            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                            Invalid Username/Password or Account has been Expired!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                        }
                }
        ?>
        </form>
        <form id="recoverform" action="../customer/pages/register-cust.php" method="POST" class="form-vertical" style="display:none;">
            <p class="normal_text">Enter your details below and we will send your details for further activation process.</p>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-pencil"></i></span><input type="text" name="fullname" placeholder="Fullname" required />
                </div>
            </div>
            <br>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="text" name="username" placeholder="@username" required />
                </div>
            </div>
            <br>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="password" name="password" placeholder="Password" required />
                </div>
            </div>
            <br>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="number" name="contact" placeholder="+8801812807586" required />
                </div>
            </div>
            <br>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="text" name="address" placeholder="Address" required />
                </div>
            </div>
            <br>
            <div class="controls">
                <div class="main_input_box">
                    <select name="gender" required id="select">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="controls">
                <div class="main_input_box">
                    <select name="plan" required id="select">
                        <option selected disabled>Select Plans</option>
                        <option value="1">One Month</option>
                        <option value="3">Three Month</option>
                        <option value="6">Six Month</option>
                        <option value="12">One Year</option>
                    </select>
                </div>
            </div>
            <br>
            <!-- BMI Calculator Section START -->
            <div class="controls" id="bmi-calc-section" style="margin-bottom:14px;">
                <div class="main_input_box" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                    <span class="add-on bg_lo"><i class="icon-bar-chart"></i></span>
                    <input type="number" step="any" min="1" id="weight" name="weight" placeholder="Weight" required style="width: 90px; display:inline-block;">
                    <select id="weight_unit" style="width: 70px; display:inline-block; margin-left:2px;">
                        <option value="kg">kg</option>
                        <option value="lbs">lbs</option>
                    </select>
                </div>
            </div>
            <div class="controls" style="margin-bottom:14px;">
                <div class="main_input_box" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                    <span class="add-on bg_lo"><i class="icon-bar-chart"></i></span>
                    <input type="number" step="any" min="0" id="height_ft" placeholder="Feet" required style="width: 70px; display:inline-block;">
                    <input type="number" step="any" min="0" id="height_in" placeholder="Inch" required style="width: 70px; display:inline-block; margin-left:2px;">
                </div>
            </div>
            <div class="controls" style="margin-bottom:14px;">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-bar-chart"></i></span>
                    <input type="text" id="bmi_result" placeholder="BMI" readonly style="width: 45%; display:inline-block;">
                    <span id="bmi_category" class="help-block blue" style="display:inline-block; margin-left:8px;"></span>
                </div>
            </div>
            <div class="form-actions text-center" style="margin-bottom:24px;">
                <button type="button" class="btn btn-info" onclick="calculateBMI()">Calculate BMI</button>
            </div>
            <!-- BMI Calculator Section END -->
            <div class="controls" style="margin-bottom:32px;">
                <div class="main_input_box">
                    <select name="services" required id="select">
                        <option selected disabled>Select Service</option>
                        <option value="Fitness">Fitness</option>
                        <option value="Sauna">Sauna</option>
                        <option value="Cardio">Cardio</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                <span class="pull-right"><button class="btn btn-info" type="SUBMIT">Submit Details</button></span>
            </div>
        </form>
    </div>           
            
            
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>

<style>
#loginbox {
  margin: 100px auto 0 auto !important;
  padding: 1px 18px !important;
  max-width: 380px;
  min-height: unset !important;
  height: auto !important;
  box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
#loginbox h3 img {
  max-height: 150px !important;
  width: auto;
  display: block;
  margin: 0 auto;
  margin-bottom: 2px;
}
.control-group {
  margin-bottom: 5px !important;
}
#loginbox .main_input_box {
  background: none !important;
  border: none !important;
  box-shadow: none !important;
  padding: 0 !important;
  margin-bottom: 0 !important;
}
#loginbox .main_input_box input {
  background: #fff !important;
  padding: 8px 10px !important;
  height: 22px !important;
}
#loginbox .form-actions {
  background: none !important;
  border: none !important;
  box-shadow: none !important;
  margin: 0 !important;
  padding: 0 !important;
}
.form-actions {
  margin-top: 8px !important;
  margin-bottom: 0 !important;
  padding: 0 !important;
}
.btn-large {
  padding: 8px 0 !important;
  font-size: 16px !important;
}
.pull-left, .pull-right {
  margin-top: 10px !important;
}
.alert {
  margin: 10px 0 !important;
  padding: 8px 12px !important;
  font-size: 14px !important;
}
</style>
<script>
            // Show BMI calculator when Join Now is clicked
            document.getElementById('to-recover').addEventListener('click', function() {
                document.getElementById('recoverform').style.display = '';
                setTimeout(function() {
                    document.getElementById('bmi-calc-section').scrollIntoView({behavior: 'smooth'});
                }, 200);
            });
            function calculateBMI() {
                var weight = parseFloat(document.getElementById('weight').value);
                var weightUnit = document.getElementById('weight_unit').value;
                var heightFt = parseFloat(document.getElementById('height_ft').value);
                var heightIn = parseFloat(document.getElementById('height_in').value);
                var bmiResult = document.getElementById('bmi_result');
                var bmiCategory = document.getElementById('bmi_category');
                var planSelect = document.querySelector('select[name="services"]');
                if (isNaN(weight) || isNaN(heightFt) || isNaN(heightIn) || (heightFt === 0 && heightIn === 0)) {
                    bmiResult.value = '';
                    bmiCategory.innerHTML = '';
                    return;
                }
                if (weightUnit === 'lbs') {
                    weight = weight * 0.453592;
                }
                var totalHeightInInches = (heightFt * 12) + heightIn;
                var heightM = totalHeightInInches * 0.0254;
                var bmi = weight / (heightM * heightM);
                bmiResult.value = bmi.toFixed(2);
                var suggestion = '';
                if (bmi < 18.5) {
                    bmiCategory.innerHTML = 'Underweight (Suggested plan: Fitness)';
                    planSelect.value = 'Fitness';
                } else if (bmi >= 18.5 && bmi < 24.9) {
                    bmiCategory.innerHTML = 'Normal weight (Suggested plan: Sauna)';
                    planSelect.value = 'Sauna';
                } else if (bmi >= 25 && bmi < 29.9) {
                    bmiCategory.innerHTML = 'Overweight (Suggested plan: Cardio)';
                    planSelect.value = 'Cardio';
                } else {
                    bmiCategory.innerHTML = 'Obesity (Suggested plan: Cardio)';
                    planSelect.value = 'Cardio';
                }
            }
            </script>
