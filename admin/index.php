<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Admin Sign In - Pearl Heritage Travels</title>
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

        .login-wrapper {
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

        .login-card {
            background: var(--light);
            border-radius: 24px;
            padding: 40px;
            width: 90%;
            max-width: 420px;
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



        .brand-name {
            font-weight: 700;
            font-size: 22px;
            color: var(--dark);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .login-title {
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

        .btn-login {
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

        .btn-login:hover {
            background: var(--primary-dark);
        }

        .btn-login span {
            position: relative;
            z-index: 1;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 24px;
            font-size: 14px;
        }

        .links a {
            color: var(--primary);
            text-decoration: none;
            transition: all 0.2s;
        }

        .links a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
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

        .btn-login.loading .spinner {
            display: block;
        }

        .btn-login.loading span {
            visibility: hidden;
        }

        @media (max-width: 576px) {
            .login-card {
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
            
            .login-title {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div id="three-background"></div>
    
    <div class="login-wrapper">
        <div class="login-card">
            <div class="card-content">
                <div class="brand">
                    
                    <h1 class="brand-name">Pearl Heritage Travels</h1>
                </div>
                
                <h2 class="login-title">Admin Login</h2>
                
                <form method="post" id="login-form">
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                        <div class="input-icon">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i id="password-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    
                    <button type="submit" name="login" class="btn-login" id="login-btn">
                        <span>Sign In</span>
                        <div class="spinner">
                            <div class="spinner-circle"></div>
                        </div>
                    </button>
                </form>
                
                <div class="links">
                    <a href="forgot-password.php">Forgot Password?</a>
                    <a href="../index.php">Back to Home</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
        // Three.js Background Animation - Square Particles
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
            gsap.to('.login-card', {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power3.out"
            });
        };
        
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
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
        
        // Form submission with loading state
        document.getElementById('login-form').addEventListener('submit', function(e) {
            const loginBtn = document.getElementById('login-btn');
            loginBtn.classList.add('loading');
        });
        
        // Initialize everything when page loads
        window.addEventListener('DOMContentLoaded', () => {
            createBackground();
            createAnimations();
        });
    </script>
</body>
</html>