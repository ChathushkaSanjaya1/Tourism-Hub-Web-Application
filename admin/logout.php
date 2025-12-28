<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy session cookie if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 3600, // Set expiration time in the past
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Unset specific session variables
unset($_SESSION['alogin']);

// Destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signing Out - Pearl Heritage Travels</title>
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
            --dark: #1f2937;
            --light: #ffffff;
            --light-gray: #f8f9fa;
            --mid-gray: #d1d5db;
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
            background: linear-gradient(135deg, #f6f8fc, #e9f0ff);
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

        .logout-wrapper {
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

        .logout-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            width: 90%;
            max-width: 480px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: translateY(30px);
            opacity: 0;
            overflow: hidden;
            position: relative;
        }

        .logout-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--secondary), var(--primary), transparent);
            animation: loading 2s linear infinite;
        }

        @keyframes loading {
            0% { left: -100%; }
            100% { left: 100%; }
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
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: white;
            font-weight: 600;
            font-size: 24px;
            box-shadow: 0 10px 20px rgba(58, 134, 255, 0.2);
        }

        .brand-name {
            font-weight: 700;
            font-size: 22px;
            color: var(--dark);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .logout-message {
            font-size: 18px;
            color: var(--dark);
            margin: 20px 0;
            font-weight: 500;
        }

        .logout-status {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 30px;
        }

        .circle-loader {
            position: relative;
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
        }

        .circle-loader .circle {
            position: absolute;
            border-radius: 50%;
            border: 3px solid transparent;
        }

        .circle-loader .circle-1 {
            width: 60px;
            height: 60px;
            border-top-color: var(--secondary);
        }

        .circle-loader .circle-2 {
            width: 45px;
            height: 45px;
            top: 7.5px;
            left: 7.5px;
            border-right-color: var(--primary);
        }

        .circle-loader .circle-3 {
            width: 30px;
            height: 30px;
            top: 15px;
            left: 15px;
            border-bottom-color: var(--accent);
        }

        .checkmark {
            display: none;
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background-color: var(--secondary);
            color: white;
            font-size: 32px;
            line-height: 60px;
            text-align: center;
            transform: scale(0);
        }

        .login-link {
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            font-weight: 500;
            padding: 12px 24px;
            border-radius: 12px;
            margin-top: 20px;
            transition: all 0.3s ease;
            transform: translateY(20px);
            opacity: 0;
        }

        .login-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(58, 134, 255, 0.2);
        }
        
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background-color: var(--secondary);
            border-radius: 50%;
            opacity: 0;
        }

        @media (max-width: 576px) {
            .logout-card {
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
            
            .logout-message {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div id="three-background"></div>
    
    <div class="logout-wrapper">
        <div class="logout-card">
            <div class="brand">
                <div class="logo">PH</div>
                <h1 class="brand-name">Pearl Heritage Travels</h1>
            </div>
            
            <h2 class="logout-message">Signing Out</h2>
            <p class="logout-status">Securely logging you out of your account...</p>
            
            <div class="circle-loader">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
            </div>
            
            <div class="checkmark">✓</div>
            
            <a href="index.php" class="login-link">Return to Login</a>
            
            <div class="particles"></div>
        </div>
    </div>

    <script>
        // Three.js Background Animation
        const createBackground = () => {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            
            const renderer = new THREE.WebGLRenderer({ alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.getElementById('three-background').appendChild(renderer.domElement);
            
            // Create particles
            const particleGeometry = new THREE.BufferGeometry();
            const particleCount = 500;
            
            const positions = new Float32Array(particleCount * 3);
            const sizes = new Float32Array(particleCount);
            
            for (let i = 0; i < particleCount * 3; i += 3) {
                // Random positions
                positions[i] = (Math.random() - 0.5) * 35;
                positions[i + 1] = (Math.random() - 0.5) * 35;
                positions[i + 2] = (Math.random() - 0.5) * 35;
                
                // Random sizes
                sizes[i / 3] = Math.random() * 0.5 + 0.1;
            }
            
            particleGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            particleGeometry.setAttribute('size', new THREE.BufferAttribute(sizes, 1));
            
            const particleMaterial = new THREE.PointsMaterial({
                color: 0x64ffda,
                size: 0.5,
                transparent: true,
                opacity: 0.8,
                sizeAttenuation: true
            });
            
            const particles = new THREE.Points(particleGeometry, particleMaterial);
            scene.add(particles);
            
            camera.position.z = 15;
            
            // Add soft ambient light
            const ambientLight = new THREE.AmbientLight(0x64ffda, 0.5);
            scene.add(ambientLight);
            
            // Animation
            function animate() {
                requestAnimationFrame(animate);
                
                particles.rotation.x += 0.0005;
                particles.rotation.y += 0.001;
                
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
        
        // Create GSAP animations
        const createAnimations = () => {
            const tl = gsap.timeline();
            
            // Animate card appearance
            tl.to('.logout-card', {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power3.out"
            });
            
            // Animate circle loader
            gsap.to('.circle-1', {
                rotation: 360,
                duration: 2,
                repeat: -1,
                ease: "linear",
                transformOrigin: "center"
            });
            
            gsap.to('.circle-2', {
                rotation: -360,
                duration: 2.5,
                repeat: -1,
                ease: "linear",
                transformOrigin: "center"
            });
            
            gsap.to('.circle-3', {
                rotation: 360,
                duration: 1.5,
                repeat: -1,
                ease: "linear",
                transformOrigin: "center"
            });
            
            // After 2 seconds, show completion
            setTimeout(() => {
                gsap.to('.circle-loader', {
                    opacity: 0,
                    scale: 0.5,
                    duration: 0.3,
                    onComplete: () => {
                        document.querySelector('.circle-loader').style.display = 'none';
                        document.querySelector('.checkmark').style.display = 'block';
                        
                        gsap.to('.checkmark', {
                            scale: 1,
                            duration: 0.5,
                            ease: "elastic.out(1, 0.5)"
                        });
                        
                        document.querySelector('.logout-status').textContent = "You've been successfully signed out!";
                        createParticleEffect();
                    }
                });
                
                // Show login button
                gsap.to('.login-link', {
                    y: 0,
                    opacity: 1,
                    duration: 0.5,
                    delay: 0.3,
                    ease: "power3.out"
                });
                
            }, 2000);
        };
        
        // Create celebration particles
        const createParticleEffect = () => {
            const container = document.querySelector('.particles');
            
            for (let i = 0; i < 60; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size between 4px and 8px
                const size = Math.random() * 4 + 4;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random colors
                const colors = ['#64ffda', '#3a86ff', '#ff6b6b', '#fcbf49'];
                particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                
                // Position at center of card
                particle.style.top = '50%';
                particle.style.left = '50%';
                
                container.appendChild(particle);
                
                // Animate each particle
                gsap.to(particle, {
                    top: `${Math.random() * 100}%`,
                    left: `${Math.random() * 100}%`,
                    opacity: Math.random() * 0.5 + 0.5,
                    duration: Math.random() * 1 + 1,
                    delay: Math.random() * 0.3,
                    ease: "power1.out",
                    onComplete: () => {
                        gsap.to(particle, {
                            opacity: 0,
                            duration: 0.5,
                            delay: Math.random() * 0.5
                        });
                    }
                });
            }
        };
        
        // Initialize everything when page loads
        window.addEventListener('DOMContentLoaded', () => {
            createBackground();
            createAnimations();
            
            // Redirect to login after 4 seconds
            setTimeout(() => {
                window.location.href = "index.php";
            }, 4000);
        });
    </script>
</body>
</html>