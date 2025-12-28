<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $newpassword = md5($_POST['newpassword']);
    $sql = "SELECT EmailId FROM admin WHERE EmailId=:email and MobileNumber=:mobile";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $con = "update admin set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
        $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $chngpwd1->execute();

        echo "<script>alert('Your Password successfully changed');</script>";
    } else {
        echo "<script>alert('Email ID or Mobile number is invalid');</script>";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Forgot Password - Pearl Heritage Travels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.152.2/three.min.js"></script>
    <style>
        :root {
            --primary: #3a86ff;
            --primary-dark: #2667cc;
            --secondary: #64ffda;
            --accent: #ff6b6b;
            --dark: #333333;
            --light: #ffffff;
            --light-gray: #f8f9fa;
            --mid-gray: #d1d5db;
            --background: #f0f4ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            height: 100vh;
            background: var(--background);
            color: var(--dark);
        }

        #three-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .forgot-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        .forgot-card {
            background: var(--light);
            border-radius: 24px;
            padding: 40px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            transform: translateY(30px);
            opacity: 0;
            overflow: hidden;
            position: relative;
        }

        .card-content {
            position: relative;
            z-index: 1;
        }

        .brand {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            border-radius: 16px;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: white;
            font-weight: 600;
            font-size: 24px;
            box-shadow: 0 4px 10px rgba(58, 134, 255, 0.2);
        }

        .brand-name {
            font-weight: 700;
            font-size: 22px;
            color: var(--dark);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .page-title {
            font-size: 18px;
            color: var(--dark);
            margin: 20px 0;
            font-weight: 500;
        }

        .form-group {
            position: relative;
            margin-bottom: 24px;
            text-align: left;
        }

        .form-label {
            display: block;
            font-size: 14px;
            color: var(--dark);
            margin-bottom: 8px;
            font-weight: 500;
            opacity: 0.8;
        }

        .form-control {
            width: 100%;
            background: var(--light);
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px;
            font-size: 15px;
            color: var(--dark);
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(58, 134, 255, 0.1);
        }

        .form-control::placeholder {
            color: #a0aec0;
        }

        .input-icon {
            position: absolute;
            top: 42px;
            right: 15px;
            color: #a0aec0;
            transition: all 0.3s;
        }

        .form-control:focus + .input-icon {
            color: var(--primary);
        }

        .password-toggle {
            position: absolute;
            top: 42px;
            right: 15px;
            background: transparent;
            border: none;
            color: #a0aec0;
            cursor: pointer;
            z-index: 10;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .btn-reset {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            background: var(--primary);
            color: white;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .btn-reset:hover {
            background: var(--primary-dark);
        }

        .btn-reset:active {
            transform: scale(0.98);
        }

        .back-link {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 24px;
            font-size: 14px;
            color: var(--primary);
            text-decoration: none;
            transition: all 0.2s;
        }

        .back-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .back-link i {
            margin-right: 8px;
        }

        /* Loading spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -10px;
            margin-left: -10px;
        }

        .spinner-circle {
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-top-color: white;
            border-radius: 50%;
            width: 100%;
            height: 100%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .btn-reset.loading .spinner {
            display: block;
        }

        .btn-reset.loading span {
            visibility: hidden;
        }

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            height: 5px;
            border-radius: 3px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .password-strength-text {
            font-size: 12px;
            margin-top: 5px;
            text-align: right;
        }

        .weak { background-color: #ef4444; width: 25%; }
        .medium { background-color: #f59e0b; width: 50%; }
        .good { background-color: #10b981; width: 75%; }
        .strong { background-color: #059669; width: 100%; }

        @media (max-width: 576px) {
            .forgot-card {
                padding: 30px 20px;
            }
            
            .logo {
                width: 60px;
                height: 60px;
                font-size: 20px;
            }
            
            .brand-name {
                font-size: 20px;
            }
            
            .page-title {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div id="three-background"></div>
    
    <div class="forgot-wrapper">
        <div class="forgot-card">
            <div class="card-content">
                <div class="brand">
                    <h1 class="brand-name">Pearl Heritage Travels</h1>
                </div>
                
                <h2 class="page-title">Reset Your Password</h2>
                
                <form name="chngpwd" method="post" onsubmit="return valid();" id="reset-form">
                    <div class="form-group">
                        <label class="form-label">Email ID</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your registered email" required>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter your registered mobile number" maxlength="10" required>
                        <div class="input-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Enter new password" required onkeyup="checkPasswordStrength()">
                        <button type="button" class="password-toggle" onclick="togglePassword('newpassword', 'new-password-icon')">
                            <i id="new-password-icon" class="fas fa-eye"></i>
                        </button>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="password-strength-bar"></div>
                        </div>
                        <div class="password-strength-text" id="password-strength-text"></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Confirm new password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('confirmpassword', 'confirm-password-icon')">
                            <i id="confirm-password-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    
                    <button type="submit" name="submit" class="btn-reset" id="reset-btn">
                        <span>Reset Password</span>
                        <div class="spinner">
                            <div class="spinner-circle"></div>
                        </div>
                    </button>
                </form>
                
                <a href="index.php" class="back-link">
                    <i class="fas fa-arrow-left"></i> Back to Login
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
        // Three.js Background Animation - Square Particles (matching login page)
        const createBackground = () => {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            
            const renderer = new THREE.WebGLRenderer({ alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.getElementById('three-background').appendChild(renderer.domElement);
            
            // Create square particles
            const particles = [];
            const total = 150;
            
            for (let i = 0; i < total; i++) {
                // Create square geometry
                const size = Math.random() * 20 + 5;
                const geometry = new THREE.PlaneGeometry(size, size);
                
                // Create material with random transparency
                const material = new THREE.MeshBasicMaterial({
                    color: 0x64ffda,
                    transparent: true,
                    opacity: Math.random() * 0.2 + 0.05
                });
                
                const square = new THREE.Mesh(geometry, material);
                
                // Random position
                square.position.x = (Math.random() - 0.5) * 100;
                square.position.y = (Math.random() - 0.5) * 100;
                square.position.z = (Math.random() - 0.5) * 50;
                
                // Random rotation
                square.rotation.x = Math.random() * Math.PI;
                square.rotation.y = Math.random() * Math.PI;
                
                scene.add(square);
                particles.push({
                    mesh: square,
                    speed: Math.random() * 0.02 + 0.005,
                    rotSpeed: Math.random() * 0.01 - 0.005
                });
            }
            
            camera.position.z = 30;
            
            // Animation function
            function animate() {
                requestAnimationFrame(animate);
                
                // Animate each square
                particles.forEach(p => {
                    p.mesh.position.y -= p.speed;
                    p.mesh.rotation.z += p.rotSpeed;
                    
                    // Reset position if out of view
                    if (p.mesh.position.y < -50) {
                        p.mesh.position.y = 50;
                        p.mesh.position.x = (Math.random() - 0.5) * 100;
                    }
                });
                
                renderer.render(scene, camera);
            }
            
            // Handle window resize
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
            
            animate();
        };
        
        // GSAP animations
        const createAnimations = () => {
            gsap.to('.forgot-card', {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power3.out"
            });
        };
        
        // Toggle password visibility
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
        
        // Password validation
        function valid() {
            const newPassword = document.getElementById('newpassword').value;
            const confirmPassword = document.getElementById('confirmpassword').value;
            
            if (newPassword !== confirmPassword) {
                alert("New Password and Confirm Password do not match!");
                return false;
            }
            
            document.getElementById('reset-btn').classList.add('loading');
            return true;
        }
        
        // Password strength checker
        function checkPasswordStrength() {
            const password = document.getElementById('newpassword').value;
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            
            // Remove all classes
            strengthBar.className = 'password-strength-bar';
            
            // Check strength
            if (password.length === 0) {
                strengthBar.style.width = '0';
                strengthText.textContent = '';
                return;
            }
            
            let strength = 0;
            
            // Length check
            if (password.length >= 8) strength += 1;
            
            // Uppercase check
            if (/[A-Z]/.test(password)) strength += 1;
            
            // Lowercase check
            if (/[a-z]/.test(password)) strength += 1;
            
            // Number check
            if (/[0-9]/.test(password)) strength += 1;
            
            // Special character check
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            switch(strength) {
                case 0:
                case 1:
                    strengthBar.classList.add('weak');
                    strengthText.textContent = 'Weak';
                    strengthText.style.color = '#ef4444';
                    break;
                case 2:
                    strengthBar.classList.add('medium');
                    strengthText.textContent = 'Medium';
                    strengthText.style.color = '#f59e0b';
                    break;
                case 3:
                case 4:
                    strengthBar.classList.add('good');
                    strengthText.textContent = 'Good';
                    strengthText.style.color = '#10b981';
                    break;
                case 5:
                    strengthBar.classList.add('strong');
                    strengthText.textContent = 'Strong';
                    strengthText.style.color = '#059669';
                    break;
            }
        }
        
        // Initialize everything when page loads
        window.addEventListener('DOMContentLoaded', () => {
            createBackground();
            createAnimations();
        });
    </script>
</body>
</html>