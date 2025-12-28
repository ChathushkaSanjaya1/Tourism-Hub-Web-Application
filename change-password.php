<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {	
header('location:index.php');
}
else{
if(isset($_POST['submit5']))
    {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$email=$_SESSION['login'];
    $sql ="SELECT Password FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";	
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Change Password | PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
// ...existing code...
</script>
<style>
    :root {
        --primary-color: #6c63ff;
        --primary-light: #e8e7ff;
        --primary-dark: #4641b7;
        --secondary-color: #69c9bc;
        --secondary-light: #e4f7f5;
        --secondary-dark: #42968c;
        --text-color: #333333;
        --text-light: #666666;
        --bg-color: #f5f7fe;
        --white: #ffffff;
        --gray-100: #f8f9fa;
        --gray-200: #ebedf2;
        --gray-300: #dee2e6;
        --gray-400: #ced4da;
        --gray-500: #adb5bd;
        --gray-600: #6c757d;
        --gray-700: #495057;
        --gray-800: #343a40;
        --danger: #dc3545;
        --success: #28a745;
        --warning: #ffc107;
        --info: #17a2b8;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
        --shadow-md: 0 5px 15px rgba(0,0,0,0.08);
        --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
        --border-radius-sm: 6px;
        --border-radius: 10px;
        --border-radius-lg: 20px;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
        line-height: 1.6;
    }

    /* Split Password Section */
    .password-section {
        padding: 60px 0;
        min-height: 70vh;
        display: flex;
        align-items: center;
    }

    .split-container {
        max-width: 1100px;
        margin: 0 auto;
        background: var(--white);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        display: flex;
        flex-direction: row;
    }

    /* Left Side - Visual Guide */
    .split-visual {
        flex: 0 0 40%;
        background: linear-gradient(145deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        padding: 40px 30px;
        color: var(--white);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .split-visual::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .split-visual::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    .split-header {
        position: relative;
        z-index: 1;
    }

    .split-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .split-subtitle {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 25px;
        font-weight: 300;
    }

    /* Security Tips */
    .security-tips {
        background: rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius);
        padding: 20px;
        margin-top: 30px;
        position: relative;
        z-index: 1;
    }

    .security-tips h3 {
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .security-tips h3 i {
        margin-right: 10px;
    }

    .security-tips ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .security-tips li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        font-size: 0.9rem;
    }

    .security-tips li i {
        margin-right: 10px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.8rem;
    }

    .security-icon {
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .security-icon i {
        font-size: 3rem;
        color: var(--white);
    }

    /* Right Side - Form Content */
    .split-form {
        flex: 0 0 60%;
        padding: 40px;
        position: relative;
    }

    /* Form Progress */
    .form-progress {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
        position: relative;
    }

    .form-progress::after {
        content: '';
        position: absolute;
        top: 12px;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--gray-200);
        z-index: 0;
    }

    .progress-step {
        width: 25px;
        height: 25px;
        background: var(--white);
        border: 2px solid var(--gray-300);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--gray-600);
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .progress-step.active {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: var(--white);
    }

    .progress-step.completed {
        background: var(--success);
        border-color: var(--success);
        color: var(--white);
    }

    .progress-step i {
        font-size: 0.7rem;
    }

    .progress-text {
        position: absolute;
        top: 30px;
        font-size: 0.7rem;
        color: var(--gray-600);
        width: 80px;
        text-align: center;
        margin-left: -27px;
    }

    /* Alert Messages */
    .alert {
        padding: 15px;
        border-radius: var(--border-radius);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .alert-icon {
        flex: 0 0 30px;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alert-content {
        flex: 1;
        padding-left: 15px;
    }

    .alert-heading {
        font-weight: 600;
        margin-bottom: 3px;
        font-size: 0.9rem;
    }

    .alert-text {
        margin: 0;
        font-size: 0.85rem;
    }

    .alert-success {
        background-color: var(--secondary-light);
        border-left: 4px solid var(--secondary-color);
        color: var(--secondary-dark);
    }

    .alert-error {
        background-color: #fff2f2;
        border-left: 4px solid var(--danger);
        color: #b71c1c;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .form-label {
        display: block;
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 8px;
        color: var(--gray-700);
    }

    .form-control-wrapper {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        font-size: 0.95rem;
        border: 2px solid var(--gray-200);
        border-radius: var(--border-radius);
        background-color: var(--white);
        transition: all 0.3s ease;
        color: var(--gray-800);
        box-shadow: none;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.15);
        outline: none;
    }

    .form-control::placeholder {
        color: var(--gray-500);
    }

    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-500);
        transition: all 0.3s ease;
    }

    .input-with-icon .form-control {
        padding-left: 40px;
    }

    .form-control:focus + .input-icon {
        color: var(--primary-color);
    }

    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        padding: 0;
        color: var(--gray-500);
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    /* Password Strength */
    .password-strength {
        margin-top: 10px;
    }

    .strength-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .strength-label {
        font-size: 0.75rem;
        color: var(--gray-600);
    }

    .strength-meter {
        display: flex;
        width: 70%;
        gap: 5px;
    }

    .strength-segment {
        height: 4px;
        flex: 1;
        background-color: var(--gray-200);
        border-radius: 2px;
        transition: background-color 0.3s ease;
    }

    .password-strength-very-weak .segment-1 {
        background-color: var(--danger);
    }

    .password-strength-weak .segment-1,
    .password-strength-weak .segment-2 {
        background-color: var(--warning);
    }

    .password-strength-fair .segment-1,
    .password-strength-fair .segment-2,
    .password-strength-fair .segment-3 {
        background-color: var(--info);
    }

    .password-strength-good .segment-1,
    .password-strength-good .segment-2,
    .password-strength-good .segment-3,
    .password-strength-good .segment-4 {
        background-color: var(--success);
    }

    /* Form Requirements */
    .requirements-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }

    .requirement {
        font-size: 0.7rem;
        padding: 5px 10px;
        border-radius: 15px;
        background: var(--gray-100);
        display: flex;
        align-items: center;
        gap: 5px;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }

    .requirement i {
        font-size: 0.6rem;
    }

    .requirement.met {
        background: var(--secondary-light);
        border-color: var(--secondary-color);
        color: var(--secondary-dark);
    }

    .requirement.not-met {
        background: var(--white);
        border-color: var(--gray-300);
        color: var(--gray-600);
    }

    /* Password Match Error */
    .password-match-error {
        display: none;
        color: var(--danger);
        font-size: 0.8rem;
        margin-top: 5px;
        animation: shakeError 0.5s ease;
    }

    @keyframes shakeError {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    .password-match-error i {
        margin-right: 5px;
    }

    /* Button */
    .btn-container {
        margin-top: 30px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 25px;
        font-size: 1rem;
        font-weight: 500;
        border-radius: var(--border-radius);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        box-shadow: var(--shadow-sm);
        gap: 8px;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: var(--white);
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-block {
        width: 100%;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .split-container {
            flex-direction: column;
            max-width: 600px;
        }
        
        .split-visual, .split-form {
            flex: 0 0 auto;
        }
        
        .split-visual {
            padding: 30px;
        }
    }

    @media (max-width: 768px) {
        .password-section {
            padding: 40px 0;
        }
        
        .split-container {
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
        }
        
        .split-form {
            padding: 30px;
        }
        
        .split-title {
            font-size: 1.5rem;
        }
        
        .security-icon {
            width: 80px;
            height: 80px;
        }
        
        .security-icon i {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 576px) {
        .security-tips {
            display: none;
        }
        
        .split-visual {
            padding: 25px;
        }
        
        .split-form {
            padding: 25px;
        }
        
        .form-progress {
            margin-bottom: 30px;
        }
        
        .progress-text {
            font-size: 0.65rem;
            width: 60px;
            margin-left: -17px;
        }
    }
</style>
</head>
<body>
<!-- top-header -->
<?php include('includes/header.php');?>
<div class="banner-1">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> PEARL HERITAGE TRAVELS </h1>
    </div>
</div>

<!-- Split Password Section -->
<div class="password-section">
    <div class="container">
        <div class="split-container">
            <!-- Left Visual Side -->
            <div class="split-visual">
                <div class="split-header">
                    <div class="security-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h2 class="split-title">Password Security Center</h2>
                    <p class="split-subtitle">Update your password to keep your account secure</p>
                </div>
                
                <div class="security-tips">
                    <h3><i class="fas fa-lightbulb"></i> Security Tips</h3>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Use a unique password for each account</li>
                        <li><i class="fas fa-check-circle"></i> Combine uppercase, lowercase, numbers, and symbols</li>
                        <li><i class="fas fa-check-circle"></i> Avoid using personal information</li>
                        <li><i class="fas fa-check-circle"></i> Change passwords regularly</li>
                        <li><i class="fas fa-check-circle"></i> Consider using a password manager</li>
                    </ul>
                </div>
            </div>
            
            <!-- Right Form Side -->
            <div class="split-form">
                <!-- Form Progress -->
                <div class="form-progress">
                    <div class="progress-step active">
                        1
                        <div class="progress-text">Current</div>
                    </div>
                    <div class="progress-step">
                        2
                        <div class="progress-text">New</div>
                    </div>
                    <div class="progress-step">
                        3
                        <div class="progress-text">Confirm</div>
                    </div>
                    <div class="progress-step">
                        4
                        <div class="progress-text">Complete</div>
                    </div>
                </div>
                
                <!-- Alert Messages -->
                <?php if($error){?>
                <div class="alert alert-error">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="alert-content">
                        <h4 class="alert-heading">Error</h4>
                        <p class="alert-text"><?php echo htmlentities($error); ?></p>
                    </div>
                </div>
                <?php } else if($msg){?>
                <div class="alert alert-success">
                    <div class="alert-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="alert-content">
                        <h4 class="alert-heading">Success</h4>
                        <p class="alert-text"><?php echo htmlentities($msg); ?></p>
                    </div>
                </div>
                <?php }?>

                <!-- Password Form -->
                <form name="chngpwd" method="post" onSubmit="return valid();">
                    <div class="form-group">
                        <label class="form-label" for="currentPassword">Current Password</label>
                        <div class="form-control-wrapper input-with-icon">
                            <input type="password" name="password" class="form-control" id="currentPassword" placeholder="Enter your current password" required>
                            <i class="fas fa-lock input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('currentPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="newpassword">New Password</label>
                        <div class="form-control-wrapper input-with-icon">
                            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter new password" required onkeyup="updatePasswordRequirements(this.value)">
                            <i class="fas fa-key input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('newpassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        
                        <div class="password-strength">
                            <div class="strength-wrapper">
                                <div class="strength-meter">
                                    <div class="strength-segment segment-1"></div>
                                    <div class="strength-segment segment-2"></div>
                                    <div class="strength-segment segment-3"></div>
                                    <div class="strength-segment segment-4"></div>
                                </div>
                                <span class="strength-label">Weak</span>
                            </div>
                        </div>
                        
                        <div class="requirements-list">
                            <div class="requirement not-met" id="req-length">
                                <i class="fas fa-circle"></i> 8+ Characters
                            </div>
                            <div class="requirement not-met" id="req-case">
                                <i class="fas fa-circle"></i> Upper & Lowercase
                            </div>
                            <div class="requirement not-met" id="req-number">
                                <i class="fas fa-circle"></i> Number
                            </div>
                            <div class="requirement not-met" id="req-special">
                                <i class="fas fa-circle"></i> Special Character
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="confirmpassword">Confirm Password</label>
                        <div class="form-control-wrapper input-with-icon">
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm new password" required onkeyup="checkPasswordMatch()">
                            <i class="fas fa-check-circle input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('confirmpassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div id="password-match-error" class="password-match-error">
                            <i class="fas fa-exclamation-triangle"></i> Passwords do not match
                        </div>
                    </div>

                    <div class="btn-container">
                        <button type="submit" name="submit5" class="btn btn-primary btn-block">
                            <i class="fas fa-lock"></i> Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>
<!-- //signup -->
<!-- signin -->
<?php include('includes/signin.php');?>
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>

<!-- Additional JavaScript for enhanced functionality -->
<script>
    // Added function to toggle password visibility
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.querySelector("button[onclick*='" + inputId + "'] i");
        
        if (input.type === "password") {
            input.type = "text";
            icon.className = "fas fa-eye-slash";
        } else {
            input.type = "password";
            icon.className = "fas fa-eye";
        }
    }
    
    function updatePasswordRequirements(password) {
        // Check password strength as before
        checkPasswordStrength(password);
        
        // Update requirements visually
        document.getElementById('req-length').className = 
            password.length >= 8 ? 'requirement met' : 'requirement not-met';
        
        document.getElementById('req-case').className = 
            (password.match(/[a-z]/) && password.match(/[A-Z]/)) ? 'requirement met' : 'requirement not-met';
        
        document.getElementById('req-number').className = 
            password.match(/\d/) ? 'requirement met' : 'requirement not-met';
        
        document.getElementById('req-special').className = 
            password.match(/[^a-zA-Z\d]/) ? 'requirement met' : 'requirement not-met';
            
        // Update icons
        const requirements = document.querySelectorAll('.requirement');
        requirements.forEach(req => {
            const icon = req.querySelector('i');
            if (req.classList.contains('met')) {
                icon.className = 'fas fa-check-circle';
            } else {
                icon.className = 'fas fa-circle';
            }
        });
    }
    
    function checkPasswordStrength(password) {
        // Existing strength calculation
        var strength = 0;
        var feedback = "";
        
        if (password.length === 0) {
            document.querySelector('.strength-label').textContent = '';
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
        
        // Determine strength class and feedback
        switch (strength) {
            case 0:
                feedback = "Very Weak";
                strengthClass = "password-strength-very-weak";
                break;
            case 1:
                feedback = "Weak";
                strengthClass = "password-strength-weak";
                break;
            case 2:
                feedback = "Fair";
                strengthClass = "password-strength-fair";
                break;
            case 3:
            case 4:
                feedback = "Strong";
                strengthClass = "password-strength-good";
                break;
        }
        
        // Update DOM elements
        document.querySelector('.strength-label').textContent = feedback;
        document.querySelector('.strength-meter').className = 'strength-meter ' + strengthClass;
    }
    
    function checkPasswordMatch() {
        const newPassword = document.getElementById('newpassword').value;
        const confirmPassword = document.getElementById('confirmpassword').value;
        
        if (confirmPassword.length > 0) {
            if (newPassword !== confirmPassword) {
                document.getElementById('password-match-error').style.display = 'block';
            } else {
                document.getElementById('password-match-error').style.display = 'none';
            }
        }
    }
    
    // Update form progress steps based on form completion
    document.addEventListener('DOMContentLoaded', function() {
        const currentPasswordInput = document.getElementById('currentPassword');
        const newPasswordInput = document.getElementById('newpassword');
        const confirmPasswordInput = document.getElementById('confirmpassword');
        const progressSteps = document.querySelectorAll('.progress-step');
        
        function updateProgress() {
            // Reset all steps
            progressSteps.forEach(step => {
                step.classList.remove('active', 'completed');
            });
            
            // Step 1: Current password
            if (currentPasswordInput.value.length > 0) {
                progressSteps[0].classList.add('completed');
                progressSteps[1].classList.add('active');
            } else {
                progressSteps[0].classList.add('active');
            }
            
            // Step 2: New password
            if (newPasswordInput.value.length > 0) {
                if (currentPasswordInput.value.length > 0) {
                    progressSteps[1].classList.remove('active');
                    progressSteps[1].classList.add('completed');
                    progressSteps[2].classList.add('active');
                }
            }
            
            // Step 3: Confirm password
            if (confirmPasswordInput.value.length > 0) {
                if (newPasswordInput.value.length > 0) {
                    progressSteps[2].classList.remove('active');
                    progressSteps[2].classList.add('completed');
                    progressSteps[3].classList.add('active');
                }
            }
        }
        
        // Listen for input changes
        currentPasswordInput.addEventListener('input', updateProgress);
        newPasswordInput.addEventListener('input', updateProgress);
        confirmPasswordInput.addEventListener('input', updateProgress);
        
        // Initial update
        updateProgress();
    });
</script>

</body>
</html>
<?php } ?>