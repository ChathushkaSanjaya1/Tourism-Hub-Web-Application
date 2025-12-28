<?php
session_start();
if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<link rel="stylesheet" href="../css/signup-style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!--Javascript for password visibility toggle-->
<script>
function togglePassword() {
    const passwordField = document.querySelector('#password');
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

.signin-container {
    display: flex;
    flex-direction: row;
    min-height: 550px;
}

.signin-image {
    flex: 1;
    background-image: url('https://images.unsplash.com/photo-1568843240915-b512cc9b4415?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.signin-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(124, 117, 255, 0.7);
}

.signin-image-content {
    position: relative;
    color: white;
    text-align: center;
    padding: 0 30px;
}

.signin-image-content h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
}

.signin-image-content p {
    font-size: 16px;
    line-height: 1.6;
}

.signin-form {
    flex: 1;
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.signin-form h3 {
    color: var(--text-color);
    font-size: 28px;
    margin-bottom: 10px;
    font-weight: 700;
    text-align: center;
}

.signin-form p.subtitle {
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

.forgot-password {
    text-align: right;
    margin-bottom: 20px;
}

.forgot-password a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: var(--transition);
    font-size: 14px;
}

.forgot-password a:hover {
    color: var(--secondary-color);
}

.signin-btn {
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

.signin-btn:hover {
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

/* Responsive adjustments */
@media (max-width: 992px) {
    .signin-image {
        display: none;
    }
    
    .signin-form {
        padding: 40px 30px;
    }
}
</style>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="signin-container">
                    <div class="signin-image">
                        <div class="signin-image-content">
                            <h2>Welcome Back</h2>
                            <p>Sign in to explore exotic destinations, access your bookings, and continue your journey with Pearl Heritage Travels.</p>
                        </div>
                    </div>
                    <div class="signin-form">
                        <h3>Sign in to your account</h3>
                        <p class="subtitle">Continue your travel journey</p>
                        
                        <form method="post">
                            <div class="form-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="text" name="email" id="email" placeholder="Enter your Email" required="">
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password" id="password" placeholder="Password" required="">
                                <span class="toggle-password" onclick="togglePassword()">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            
                            <div class="forgot-password">
                                <a href="forgot-password.php">Forgot password?</a>
                            </div>
                            
                            <button type="submit" name="signin" class="signin-btn">Sign In</button>
                        </form>
                        
                        <p class="terms-text">By logging in you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.php?type=privacy">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>