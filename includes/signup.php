<link rel="stylesheet" href="../css/signup-style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
header('location:thankyou.php');
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
header('location:thankyou.php');
}
}
?>
<!--Javascript for check email availabilty-->
<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data:'emailid='+$("#email").val(),
        type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
}

// Toggle password visibility
function togglePassword() {
    const passwordField = document.querySelector('input[name="password"]');
    const eyeIcon = document.querySelector('.toggle-password i');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}
</script>

<style>
:root {
    --primary-color: #6C63FF;
    --secondary-color: #F50057;
    --text-color: #3A3A3A;
    --light-text: #757575;
    --light-bg: #F9FAFC;
    --border-color: #E0E0E0;
    --success-color: #4CAF50;
    --white: #FFFFFF;
    --shadow: 0 8px 30px rgba(0,0,0,0.08);
    --transition: all 0.3s ease;
}

body {
    font-family: 'Poppins', sans-serif;
}

.modal-content {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow);
    border: none;
    position: relative;
}

.modal-header {
    border: none;
    padding: 0;
    position: absolute;
    right: 20px;
    top: 20px;
    z-index: 10;
}

.modal-body {
    padding: 0;
}

.signup-container {
    display: flex;
    flex-direction: row;
    min-height: 600px;
}

.signup-image {
    flex: 1;
    background-image: url('https://images.unsplash.com/photo-1568843240915-b512cc9b4415?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.signup-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(124, 117, 255, 0.7);
}

.signup-image-content {
    position: relative;
    color: white;
    text-align: center;
    padding: 0 30px;
}

.signup-image-content h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
}

.signup-image-content p {
    font-size: 16px;
    line-height: 1.6;
}

.signup-form {
    flex: 1;
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.signup-form h3 {
    color: var(--text-color);
    font-size: 28px;
    margin-bottom: 10px;
    font-weight: 700;
    text-align: center;
}

.signup-form p.subtitle {
    text-align: center;
    color: var(--light-text);
    margin-bottom: 30px;
}

.form-group {
    position: relative;
    margin-bottom: 24px;
}

.form-group i.input-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--light-text);
    font-size: 18px;
}

.form-group input {
    width: 100%;
    padding: 15px 15px 15px 45px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 15px;
    transition: var(--transition);
    color: var(--text-color);
    background-color: var(--white);
}

.form-group input:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
    outline: none;
}

.form-group input::placeholder {
    color: #B0B0B0;
}

.toggle-password {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: var(--light-text);
}

#user-availability-status {
    display: block;
    margin-top: 5px;
    font-size: 13px;
}

.status-available {
    color: var(--success-color);
}

.status-unavailable {
    color: var(--secondary-color);
}

.signup-btn {
    width: 100%;
    padding: 15px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 15px;
}

.signup-btn:hover {
    background-color: #5952DB;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
}

.terms-text {
    text-align: center;
    margin-top: 25px;
    color: var(--light-text);
    font-size: 14px;
}

.terms-text a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: var(--transition);
}

.terms-text a:hover {
    color: var(--secondary-color);
}

#loaderIcon {
    display: inline-block;
    margin-left: 10px;
}

/* Animation for form elements */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-group {
    animation: fadeInUp 0.4s ease forwards;
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.2s; }
.form-group:nth-child(3) { animation-delay: 0.3s; }
.form-group:nth-child(4) { animation-delay: 0.4s; }

/* Responsive adjustments */
@media (max-width: 992px) {
    .signup-image {
        display: none;
    }
    
    .signup-form {
        padding: 40px 30px;
    }
}
</style>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="signup-container">
                    <div class="signup-image">
                        <div class="signup-image-content">
                            <h2>Begin Your Journey</h2>
                            <p>Create an account to explore exotic destinations, book personalized travel experiences, and discover the world with Pearl Heritage Travels.</p>
                        </div>
                    </div>
                    <div class="signup-form">
                        <h3>Create your account</h3>
                        <p class="subtitle">Join our community of travelers</p>
                        
                        <form name="signup" method="post">
                            <div class="form-group">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" placeholder="Full Name" name="fname" autocomplete="off" required="">
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-mobile-alt input-icon"></i>
                                <input type="text" placeholder="Mobile Number" maxlength="10" name="mobilenumber" autocomplete="off" required="">
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" placeholder="Email Address" name="email" id="email" onBlur="checkAvailability()" autocomplete="off" required="">
                                <span id="user-availability-status"></span>
                                <span id="loaderIcon" style="display:none;"><i class="fas fa-spinner fa-spin"></i></span>
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" placeholder="Password" name="password" required="">
                                <span class="toggle-password" onclick="togglePassword()">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            
                            <button type="submit" name="submit" id="submit" class="signup-btn">Create Account</button>
                        </form>
                        
                        <p class="terms-text">By signing up, you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.php?type=privacy">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>