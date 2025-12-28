<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// Code for change password 
if(isset($_POST['submit']))
    {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
    $sql ="SELECT Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where UserName=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('success-notification').classList.add('show');
        setTimeout(function() {
            window.location.href = 'change-password.php';
        }, 2000);
    });
</script>";
}
else {
echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('error-notification').classList.add('show');
    });
</script>";   
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Change Password | Pearl Heritage Travels</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />

<script type="text/javascript">
function valid() {
    if(document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
        document.getElementById('password-match-error').style.display = 'block';
        document.chngpwd.confirmpassword.focus();
        return false;
    }
    document.getElementById('password-match-error').style.display = 'none';
    return true;
}

function checkPasswordStrength(password) {
    // Password strength variables
    var strength = 0;
    var feedback = "";
    var progressWidth = 0;
    var progressClass = "";
    
    if (password.length === 0) {
        document.querySelector('.strength-meter-bar').style.width = '0%';
        document.querySelector('.strength-text').textContent = '';
        document.querySelector('.strength-meter').className = 'strength-meter';
        return;
    }
    
    // Check length
    if (password.length >= 8) {
        strength += 1;
    }
    
    // Check for mixed case
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
        strength += 1;
    }
    
    // Check for numbers
    if (password.match(/\d/)) {
        strength += 1;
    }
    
    // Check for special characters
    if (password.match(/[^a-zA-Z\d]/)) {
        strength += 1;
    }
    
    // Determine strength feedback and progress width
    switch (strength) {
        case 0:
            feedback = "Very Weak";
            progressWidth = 20;
            progressClass = "strength-very-weak";
            break;
        case 1:
            feedback = "Weak";
            progressWidth = 40;
            progressClass = "strength-weak";
            break;
        case 2:
            feedback = "Fair";
            progressWidth = 60;
            progressClass = "strength-fair";
            break;
        case 3:
            feedback = "Good";
            progressWidth = 80;
            progressClass = "strength-good";
            break;
        case 4:
            feedback = "Strong";
            progressWidth = 100;
            progressClass = "strength-strong";
            break;
    }
    
    // Update DOM elements
    document.querySelector('.strength-meter-bar').style.width = progressWidth + '%';
    document.querySelector('.strength-text').textContent = feedback;
    document.querySelector('.strength-meter').className = 'strength-meter ' + progressClass;
}

function togglePasswordVisibility(inputId) {
    var input = document.getElementById(inputId);
    var icon = document.querySelector('[data-toggle="' + inputId + '"] i');
    
    if (input.type === "password") {
        input.type = "text";
        icon.className = "fa fa-eye-slash";
    } else {
        input.type = "password";
        icon.className = "fa fa-eye";
    }
}
</script>

<style>
    :root {
        --primary: #4F46E5;
        --primary-hover: #4338CA;
        --primary-light: #EEF2FF;
        --secondary: #10B981;
        --secondary-hover: #059669;
        --secondary-light: #ECFDF5;
        --danger: #EF4444;
        --danger-light: #FEF2F2;
        --warning: #F59E0B;
        --warning-light: #FFFBEB;
        --gray-50: #F9FAFB;
        --gray-100: #F3F4F6;
        --gray-200: #E5E7EB;
        --gray-300: #D1D5DB;
        --gray-400: #9CA3AF;
        --gray-500: #6B7280;
        --gray-600: #4B5563;
        --gray-700: #374151;
        --gray-800: #1F2937;
        --gray-900: #111827;
        --white: #FFFFFF;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --transition: all 0.3s ease;
        --radius-sm: 0.125rem;
        --radius: 0.25rem;
        --radius-md: 0.375rem;
        --radius-lg: 0.5rem;
        --radius-xl: 0.75rem;
        --radius-2xl: 1rem;
        --radius-3xl: 1.5rem;
        --radius-full: 9999px;
    }

    body {
        font-family: 'Nunito', sans-serif;
        background-color: var(--gray-50);
        color: var(--gray-700);
        line-height: 1.5;
    }

    /* Layout Containers */
    .password-container {
        max-width: 850px;
        margin: 0 auto;
        padding: 2rem 1.5rem;
    }

    .page-header {
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 1.5rem;
        color: var(--gray-900);
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        color: var(--gray-500);
        font-size: 0.95rem;
    }

    /* Card Component */
    .card {
        background-color: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        margin-bottom: 1.5rem;
        border: 1px solid var(--gray-200);
    }

    .card-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--gray-200);
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: var(--white);
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--gray-900);
        margin: 0;
        display: flex;
        align-items: center;
    }

    .card-title i {
        margin-right: 0.75rem;
        color: var(--primary);
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-footer {
        padding: 1.25rem 1.5rem;
        border-top: 1px solid var(--gray-200);
        background-color: var(--gray-50);
    }

    /* Password Requirements Card */
    .requirements-card {
        background-color: var(--primary-light);
        border-radius: var(--radius);
        border-left: 4px solid var(--primary);
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
    }

    .requirements-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }

    .requirements-title i {
        margin-right: 0.5rem;
    }

    .requirements-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.5rem;
        margin: 0;
        padding: 0;
    }

    .requirements-list li {
        list-style: none;
        font-size: 0.85rem;
        color: var(--gray-600);
        display: flex;
        align-items: center;
    }

    .requirements-list li i {
        color: var(--primary);
        margin-right: 0.5rem;
        font-size: 0.8rem;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        font-size: 0.875rem;
        color: var(--gray-700);
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        line-height: 1.5;
        color: var(--gray-700);
        background-color: var(--white);
        background-clip: padding-box;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius);
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--primary);
        outline: 0;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
    }

    .form-control::placeholder {
        color: var(--gray-400);
    }

    .input-group {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
    }

    .input-with-icon {
        padding-left: 2.5rem;
    }

    .password-toggle {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
        color: var(--gray-400);
        transition: var(--transition);
    }

    .password-toggle:hover {
        color: var(--primary);
    }

    /* Password Strength Meter */
    .strength-meter-container {
        margin-top: 0.75rem;
    }

    .strength-meter {
        height: 4px;
        background-color: var(--gray-200);
        border-radius: var(--radius-full);
        overflow: hidden;
    }

    .strength-meter-bar {
        height: 100%;
        width: 0;
        transition: width 0.3s ease;
    }

    .strength-feedback {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 0.375rem;
    }

    .strength-label {
        font-size: 0.75rem;
        color: var(--gray-500);
    }

    .strength-text {
        font-size: 0.75rem;
        font-weight: 600;
    }

    .strength-very-weak .strength-meter-bar {
        background-color: var(--danger);
    }

    .strength-weak .strength-meter-bar {
        background-color: var(--warning);
    }

    .strength-fair .strength-meter-bar {
        background-color: var(--warning);
    }

    .strength-good .strength-meter-bar {
        background-color: var(--secondary);
    }

    .strength-strong .strength-meter-bar {
        background-color: var(--secondary);
    }

    .strength-very-weak .strength-text {
        color: var(--danger);
    }

    .strength-weak .strength-text {
        color: var(--warning);
    }

    .strength-fair .strength-text {
        color: var(--warning);
    }

    .strength-good .strength-text {
        color: var(--secondary);
    }

    .strength-strong .strength-text {
        color: var(--secondary);
    }

    /* Password Error */
    #password-match-error {
        display: none;
        color: var(--danger);
        font-size: 0.75rem;
        margin-top: 0.375rem;
    }

    /* Button Styles */
    .btn {
        display: inline-block;
        font-weight: 600;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: var(--radius);
        transition: var(--transition);
        cursor: pointer;
    }

    .btn-primary {
        color: var(--white);
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .btn-primary:hover {
        background-color: var(--primary-hover);
        border-color: var(--primary-hover);
    }

    .btn-outline {
        color: var(--gray-600);
        background-color: transparent;
        border-color: var(--gray-300);
    }

    .btn-outline:hover {
        color: var(--gray-800);
        background-color: var(--gray-100);
        border-color: var(--gray-400);
    }

    .btn i {
        margin-right: 0.5rem;
    }

    .btn-group {
        display: flex;
        gap: 0.75rem;
    }

    /* Notifications */
    .notification {
        position: fixed;
        top: 1.5rem;
        right: 1.5rem;
        padding: 0.875rem 1.25rem;
        border-radius: var(--radius);
        box-shadow: var(--shadow-lg);
        display: flex;
        align-items: center;
        transform: translateX(calc(100% + 1.5rem));
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 1000;
        max-width: 350px;
    }

    .notification.show {
        transform: translateX(0);
    }

    .notification i {
        margin-right: 0.75rem;
    }

    #success-notification {
        background-color: var(--secondary-light);
        border-left: 4px solid var(--secondary);
        color: var(--gray-800);
    }

    #success-notification i {
        color: var(--secondary);
    }

    #error-notification {
        background-color: var(--danger-light);
        border-left: 4px solid var(--danger);
        color: var(--gray-800);
    }

    #error-notification i {
        color: var(--danger);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .password-container {
            padding: 1.5rem 1rem;
        }

        .requirements-list {
            grid-template-columns: 1fr;
        }

        .btn-group {
            flex-direction: column;
        }

        .card-header,
        .card-body,
        .card-footer {
            padding: 1.25rem;
        }
    }

    /* Custom Elements */
    .two-column-layout {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .section-divider {
        color: var(--gray-400);
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
    }

    .section-divider:before,
    .section-divider:after {
        content: "";
        flex: 1;
        border-bottom: 1px solid var(--gray-200);
    }

    .section-divider:before {
        margin-right: 0.75rem;
    }

    .section-divider:after {
        margin-left: 0.75rem;
    }

    /* Profile Security Guide */
    .security-alert {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        background-color: var(--warning-light);
        border-radius: var(--radius);
        margin-top: 2rem;
    }

    .security-alert-icon {
        padding: 0.5rem;
        background-color: var(--warning);
        border-radius: var(--radius);
        color: white;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .security-alert-content h4 {
        font-size: 0.95rem;
        color: var(--gray-800);
        margin: 0 0 0.5rem 0;
    }

    .security-alert-content p {
        font-size: 0.85rem;
        color: var(--gray-600);
        margin: 0;
    }

    /* Animation effects */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out forwards;
    }
</style>

</head> 
<body>
   <div id="success-notification" class="notification">
       <i class="fa fa-check-circle"></i> Password updated successfully
   </div>
   
   <div id="error-notification" class="notification">
       <i class="fa fa-exclamation-circle"></i> Current password is incorrect
   </div>

   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
       <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
                            
                     <div class="clearfix"> </div>	
                </div>
<!--heder end here-->
    <div class="password-container">
        <div class="page-header animate-fadeIn">
            <h1 class="page-title">Change Password</h1>
            <p class="page-subtitle">Update your password to keep your account secure</p>
        </div>

        <div class="card animate-fadeIn" style="animation-delay: 0.1s;">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fa fa-lock"></i> Password Management
                </h2>
            </div>
            
            <div class="card-body">
                <div class="requirements-card">
                    <h3 class="requirements-title"><i class="fa fa-shield"></i> Password Requirements</h3>
                    <ul class="requirements-list">
                        <li><i class="fa fa-check-circle"></i> Minimum 8 characters</li>
                        <li><i class="fa fa-check-circle"></i> Uppercase & lowercase letters</li>
                        <li><i class="fa fa-check-circle"></i> At least one number</li>
                        <li><i class="fa fa-check-circle"></i> At least one special character</li>
                    </ul>
                </div>
                
                <form name="chngpwd" method="post" onSubmit="return valid();">
                    <div class="two-column-layout">
                        <div class="form-group">
                            <label class="form-label" for="currentPassword">Current Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control input-with-icon" id="currentPassword" placeholder="Enter your current password" required>
                                <i class="fa fa-lock input-icon"></i>
                                <button type="button" class="password-toggle" data-toggle="currentPassword" onclick="togglePasswordVisibility('currentPassword')">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div>
                            <div class="form-group">
                                <label class="form-label" for="newpassword">New Password</label>
                                <div class="input-group">
                                    <input type="password" name="newpassword" class="form-control input-with-icon" id="newpassword" placeholder="Enter new password" required onkeyup="checkPasswordStrength(this.value)">
                                    <i class="fa fa-key input-icon"></i>
                                    <button type="button" class="password-toggle" data-toggle="newpassword" onclick="togglePasswordVisibility('newpassword')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <div class="strength-meter-container">
                                    <div class="strength-meter">
                                        <div class="strength-meter-bar"></div>
                                    </div>
                                    <div class="strength-feedback">
                                        <span class="strength-label">Password Strength</span>
                                        <span class="strength-text"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="confirmpassword">Confirm New Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirmpassword" class="form-control input-with-icon" id="confirmpassword" placeholder="Confirm your new password" required>
                                    <i class="fa fa-key input-icon"></i>
                                    <button type="button" class="password-toggle" data-toggle="confirmpassword" onclick="togglePasswordVisibility('confirmpassword')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <div id="password-match-error">
                                    <i class="fa fa-exclamation-triangle"></i> Passwords do not match
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section-divider">Password Security Tips</div>
                    
                    <div class="security-alert">
                        <div class="security-alert-icon">
                            <i class="fa fa-lightbulb-o"></i>
                        </div>
                        <div class="security-alert-content">
                            <h4>Creating Strong & Memorable Passwords</h4>
                            <p>Try using a phrase or sentence that's meaningful to you, substitute letters with numbers and special characters, and use different passwords for different accounts.</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="btn-group">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Update Password
                        </button>
                        <button type="reset" class="btn btn-outline">
                            <i class="fa fa-refresh"></i> Reset Form
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--inner block start here-->
    <div class="inner-block"></div>
    <!--inner block end here-->
    
    <!--copy rights start here-->
    <?php include('includes/footer.php');?>
    <!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
    <!--/sidebar-menu-->
        <?php include('includes/sidebarmenu.php');?>
                  <div class="clearfix"></div>		
                </div>
                <script>
                var toggle = true;
                            
                $(".sidebar-icon").click(function() {                
                  if (toggle)
                  {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position":"absolute"});
                  }
                  else
                  {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function() {
                      $("#menu span").css({"position":"relative"});
                    }, 400);
                  }
                                
                                toggle = !toggle;
                            });
                </script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/bootstrap.min.js"></script>
   
</body>
</html>
<?php } ?>