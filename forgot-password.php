<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit50']))
    {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
    $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Email id or Mobile no is invalid";	
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
    <script>
         new WOW().init();
    </script>
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
<style>
body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f8f9fa;
}

.privacy {
    padding: 60px 0;
    position: relative;
    min-height: 70vh;
    display: flex;
    align-items: center;
}

.privacy-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 30px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    animation: fadeIn 0.8s ease;
}

.form-heading {
    text-align: center;
    margin-bottom: 30px;
    position: relative;
}

.form-heading h3 {
    color: #333;
    font-size: 28px;
    font-weight: 600;
    margin: 0 0 10px 0;
}

.form-heading p {
    color: #777;
    font-size: 14px;
    margin: 0;
}

.form-heading:after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #4CAF50, #8BC34A);
    margin: 15px auto 0;
    border-radius: 20px;
}

.form-group {
    margin-bottom: 25px;
    position: relative;
}

.form-group input {
    width: 100%;
    padding: 15px 20px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
    background: #f9f9f9;
    transition: all 0.3s;
    box-sizing: border-box;
}

.form-group input:focus {
    border-color: #4CAF50;
    background: #fff;
    box-shadow: 0 0 8px rgba(76, 175, 80, 0.2);
    outline: none;
}

.form-group label {
    display: block;
    color: #555;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 15px;
}

.form-group .input-icon {
    position: absolute;
    left: 15px;
    top: 47px;
    color: #aaa;
    font-size: 16px;
}

.form-group input {
    padding-left: 20px;
}

.btn-reset {
    width: 100%;
    padding: 15px;
    background: linear-gradient(90deg,rgb(76, 168, 175),rgb(74, 195, 179));
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 4px 15px rgba(76, 175, 80, 0.2);
    margin-top: 10px;
}

.btn-reset:hover {
    background: linear-gradient(90deg, #43A047, #7CB342);
    box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
    transform: translateY(-2px);
}

.btn-reset:active {
    transform: translateY(1px);
}

.login-link {
    text-align: center;
    margin-top: 25px;
}

.login-link a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
}

.login-link a:hover {
    color: #2E7D32;
    text-decoration: underline;
}

/* Alert styles */
.alert {
    padding: 15px;
    margin-bottom: 25px;
    border-radius: 8px;
    position: relative;
    border-left: 4px solid;
    font-size: 14px;
    display: flex;
    align-items: center;
}

.alert-danger {
    background-color: #FFF5F5;
    border-left-color: #FF5252;
    color: #D32F2F;
}

.alert-success {
    background-color: #F1FBF7;
    border-left-color: #4CAF50;
    color: #388E3C;
}

.alert i {
    font-size: 20px;
    margin-right: 10px;
}

/* Password field with toggle */
.password-field {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
    font-size: 16px;
    z-index: 1;
}

/* Password strength meter */
.password-strength {
    height: 5px;
    width: 100%;
    background: #e0e0e0;
    margin-top: 10px;
    border-radius: 5px;
    overflow: hidden;
}

.password-strength-meter {
    height: 100%;
    width: 0%;
    transition: width 0.3s, background 0.3s;
}

.strength-text {
    font-size: 12px;
    margin-top: 5px;
    color: #777;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive styles */
@media (max-width: 576px) {
    .privacy-container {
        margin: 0 15px;
    }
}

.banner-1 {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://www.state.gov/wp-content/uploads/2019/04/Sri-Lanka-2132x1406-2.jpg');
    background-size: cover;
    background-position: center;
    color: white;
}
</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1 ">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">PEARL HERITAGE TRAVELS</h1>
    </div>
</div>
<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
    <div class="container privacy-container">
        <div class="form-heading">
            <h3>Recover Password</h3>
            <p>Fill in your details to reset your password</p>
        </div>
        
        <?php if($error){?>
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-circle"></i>
                <div>
                    <strong>Error!</strong>
                    <p><?php echo htmlentities($error); ?></p>
                </div>
            </div>
        <?php } else if($msg){?>
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                <div>
                    <strong>Success!</strong>
                    <p><?php echo htmlentities($msg); ?></p>
                </div>
            </div>
        <?php }?>
        
        <form name="chngpwd" method="post" onSubmit="return valid();">
            <div class="form-group">
                <label for="email"><i class="fa fa-envelope"></i> Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter your registered email" required="">
            </div>
            
            <div class="form-group">
                <label for="mobile"><i class="fa fa-phone"></i> Mobile Number</label>
                <input type="text" name="mobile" id="mobile" placeholder="Enter your registered mobile number" required="">
            </div>
            
            <div class="form-group">
                <label for="newpassword"><i class="fa fa-lock"></i> New Password</label>
                <div class="password-field">
                    <input type="password" name="newpassword" id="newpassword" placeholder="Create a new password" required="">
                    <span class="toggle-password" onclick="togglePasswordVisibility('newpassword')">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <div class="password-strength">
                    <div class="password-strength-meter" id="password-meter"></div>
                </div>
                <div class="strength-text" id="password-strength-text">Password strength: Too weak</div>
            </div>
            
            <div class="form-group">
                <label for="confirmpassword"><i class="fa fa-lock"></i> Confirm Password</label>
                <div class="password-field">
                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm your new password" required="">
                    <span class="toggle-password" onclick="togglePasswordVisibility('confirmpassword')">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
            
            <button type="submit" name="submit50" class="btn-reset">Reset Password</button>
            
            <div class="login-link">
                Remember your password? <a href="#" data-toggle="modal" data-target="#myModal4">Log In</a>
            </div>
        </form>
    </div>
</div>
<!--- /privacy ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signup -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>

<script>
// Toggle password visibility
function togglePasswordVisibility(fieldId) {
    var passwordField = document.getElementById(fieldId);
    var toggleIcon = passwordField.nextElementSibling.querySelector('i');
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Password strength meter
document.getElementById('newpassword').addEventListener('input', function() {
    var password = this.value;
    var meter = document.getElementById('password-meter');
    var strengthText = document.getElementById('password-strength-text');
    var strength = 0;
    
    // Check length
    if (password.length > 0) {
        if (password.length >= 8) strength += 25;
        
        // Check for uppercase letters
        if (/[A-Z]/.test(password)) strength += 25;
        
        // Check for lowercase letters
        if (/[a-z]/.test(password)) strength += 25;
        
        // Check for numbers and special characters
        if (/[0-9]/.test(password) || /[^A-Za-z0-9]/.test(password)) strength += 25;
    }
    
    // Update meter
    meter.style.width = strength + '%';
    
    // Update text and color
    if (strength === 0) {
        meter.style.background = '#e0e0e0';
        strengthText.textContent = 'Password strength: Enter a password';
    } else if (strength <= 25) {
        meter.style.background = '#f44336';
        strengthText.textContent = 'Password strength: Too weak';
    } else if (strength <= 50) {
        meter.style.background = '#ff9800';
        strengthText.textContent = 'Password strength: Weak';
    } else if (strength <= 75) {
        meter.style.background = '#2196f3';
        strengthText.textContent = 'Password strength: Good';
    } else {
        meter.style.background = '#4caf50';
        strengthText.textContent = 'Password strength: Strong';
    }
});
</script>
</body>
</html>