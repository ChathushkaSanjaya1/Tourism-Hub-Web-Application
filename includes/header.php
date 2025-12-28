<style>
    /* Modern Header Design */
:root {
    /* Primary Colors - Ocean Blues */
    --primary: #006C8E;         /* Deep Ocean Blue */
    --primary-light: #5CBFE2;   /* Bright Sky Blue */
    --primary-dark: #004D66;    /* Deep Sea Blue */
    
    /* Accent Colors - Coral & Sand */
    --accent: #FF7D45;          /* Vibrant Coral */
    --accent-light: #FFA980;    /* Soft Coral */
    --accent-dark: #E55C24;     /* Deep Coral */
    
    /* Neutral Colors - Beach Sand */
    --neutral: #F8F6F2;         /* Pale Sand */
    --neutral-dark: #E8E2D7;    /* Warm Sand */
    
    /* Text Colors */
    --text:rgb(38, 50, 58);            /* Deep Charcoal Blue */
    --text-light: #5D6E7A;      /* Slate Blue Grey */
    
    /* Constants */
    --white: #FFFFFF;
    --shadow: 0 5px 15px rgba(0, 108, 142, 0.1);
    --transition: all 0.3s ease;
}
    /* Reset some default browser styles */
    .modern-header * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Top Header Bar */
    .modern-topbar {
        background-color: var(--primary-dark);
        color: rgba(255, 255, 255, 0.9);
        padding: 8px 0;
        font-size: 0.9rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .modern-topbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .topbar-left, .topbar-right {
        display: flex;
        align-items: center;
    }

    .topbar-left ul, .topbar-right ul {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .topbar-left li {
        margin-right: 20px;
    }

    .topbar-right li {
        margin-left: 25px;
        position: relative;
    }

    .topbar-right li:not(:first-child)::before {
        content: '|';
        position: absolute;
        left: -15px;
        opacity: 0.9;
    }

    .modern-topbar a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: var(--transition);
        display: flex;
        align-items: center;
    }

    .modern-topbar a:hover {
        color: var(--accent-light);
    }

    .modern-topbar i {
        margin-right: 10px;
    }

    .welcome-text {
        font-weight: 600;
        color: var(--accent-light);
        margin-right: 5px;
    }

    /* Main Header */
    .modern-main-header {
        background-color: var(--primary);
        padding: 20px 0;
        box-shadow: var(--shadow);
        position: relative;
    }

    .main-header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .modern-logo {
        display: flex;
        align-items: center;
    }

    .modern-logo a {
        font-size: 1.8rem;
        font-weight: 700;
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .logo-primary {
        color: white;
    }

    .logo-secondary {
        color: var(--accent-light);
        margin-left: 5px;
    }

    .secure-badge {
        display: flex;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.1);
        padding: 8px 15px;
        border-radius: 20px;
        transition: var(--transition);
    }

    .secure-badge i {
        color: var(--accent);
        margin-right: 8px;
        font-size: 1.2rem;
    }

    .secure-text {
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

	.modern-topbar .nav-icon-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    margin-right: 8px;
}

.modern-topbar i.fa {
    font-size: 17px; 
    width: 16px;
    height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.modern-topbar i.fa-home {
    font-size: 18px; 
}

.modern-topbar i.fa-ticket {
    position: relative;
    top: -1px; 
}

.topbar-left li a, .topbar-right li a {
    display: flex;
    align-items: center;
    padding: 5px 0;
}

    /* Navigation */
    .modern-navbar {
        background-color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .nav-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: block;
        font-size: 1rem;
        font-weight: 500;
        color: var(--text);
        text-decoration: none;
        padding: 20px 15px;
        transition: var(--transition);
    }

    .nav-link:hover {
        color: var(--primary);
    }

    .nav-link.active {
        color: var(--primary);
        font-weight: 600;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 15px;
        right: 15px;
        height: 3px;
        background: var(--primary);
        border-radius: 3px 3px 0 0;
    }

    .nav-help {
        background-color: var(--accent-light);
        color: var(--primary-dark);
        border-radius: 4px;
        padding: 8px 12px;
        margin-left: 5px;
        transition: var(--transition);
    }

    .nav-help:hover {
        background-color: var(--accent);
        color: var(--primary-dark);
    }

    /* Mobile Toggle Button */
    .menu-toggle {
        display: none;
        background: transparent;
        border: none;
        color: var(--text);
        font-size: 1.5rem;
        cursor: pointer;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .topbar-left li.hide-mobile {
            display: none;
        }

        .modern-main-header {
            padding: 15px 0;
        }

        .modern-logo a {
            font-size: 1.5rem;
        }

        .secure-badge {
            padding: 6px 12px;
        }

        .menu-toggle {
            display: block;
        }

        .nav-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            flex-direction: column;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            z-index: 1000;
        }

        .nav-menu.show {
            max-height: 500px;
        }

        .nav-item {
            width: 100%;
            border-bottom: 1px solid var(--neutral-dark);
        }

        .nav-link {
            padding: 15px 20px;
        }

        .nav-link.active::after {
            display: none;
        }

        .nav-link.active {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }
    }

    @media (max-width: 576px) {
        .modern-topbar {
            padding: 5px 0;
        }

        .topbar-left, .topbar-right {
            font-size: 0.8rem;
        }

        .topbar-left li {
            margin-right: 10px;
        }

        .secure-text {
            font-size: 0.8rem;
        }
    }

    /* Animations */
    @keyframes slideInDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .slide-in {
        animation: slideInDown 0.3s forwards;
    }
</style>

<div class="modern-header">
    <!-- Top Bar -->
    <?php if($_SESSION['login']) { ?>
    <div class="modern-topbar">
        <div class="modern-topbar-container">
            <div class="topbar-left">
                <ul>
                    <li><a href="index.php"><span class="nav-icon-container"><i class="fa fa-home"></i></span> Home</a></li>
                    <li><a href="profile.php"><span class="nav-icon-container"><i class="fa fa-user"></i></span> My Profile</a></li>
                    <li><a href="tour-history.php"><span class="nav-icon-container"><i class="fa fa-suitcase"></i></span> My Tours</a></li>
                    <li><a href="issuetickets.php"><span class="nav-icon-container"><i class="fa fa-ticket"></i></span> My Tickets</a></li>
                </ul>
            </div>
            <div class="topbar-right">
                <ul>
                    <li><span class="welcome-text">Welcome</span> <?php echo htmlentities($_SESSION['login']);?></li>
                    <li><a href="change-password.php"><i class="fa fa-key"></i> Change Password</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="modern-topbar">
        <div class="modern-topbar-container">
            <div class="topbar-left">
                <ul>
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="hide-mobile"><a href="package-list.php"><i class="fa fa-map"></i> Tour Packages</a></li>
                    <li class="hide-mobile"><a href="enquiry.php"><i class="fa fa-question-circle"></i> Enquiry</a></li>
                </ul>
            </div>
            <div class="topbar-right">
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i> Sign Up</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal4"><i class="fa fa-sign-in"></i> Sign In</a></li>
                    <li><a href="admin/index.php"><i class="fa fa-lock"></i> Admin</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Main Header with Logo -->
    <div class="modern-main-header">
        <div class="main-header-container">
            <div class="modern-logo">
                <a href="index.php">
                    <span class="logo-primary">Pearl</span>
                    <span class="logo-secondary">Heritage Travels</span>
                </a>
            </div>
            <div class="secure-badge">
                <i class="fa fa-shield"></i>
                <span class="secure-text">SAFE & SECURE</span>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="modern-navbar">
        <div class="navbar-container">
            <button class="menu-toggle" id="menuToggle">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="package-list.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'package-list.php') ? 'active' : ''; ?>">Tour Packages</a>
                </li>
                <li class="nav-item">
                    <a href="page.php?type=aboutus" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'page.php' && $_GET['type'] == 'aboutus') ? 'active' : ''; ?>">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="page.php?type=contact" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'page.php' && $_GET['type'] == 'contact') ? 'active' : ''; ?>">Contact</a>
                </li>
                <?php if($_SESSION['login']) { ?>
                <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#myModal3" class="nav-link nav-help">Need Help? <i class="fa fa-question-circle"></i></a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a href="enquiry.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'enquiry.php') ? 'active' : ''; ?>">Enquiry</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="page.php?type=privacy" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'page.php' && $_GET['type'] == 'privacy') ? 'active' : ''; ?>">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a href="page.php?type=terms" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'page.php' && $_GET['type'] == 'terms') ? 'active' : ''; ?>">Terms of Use</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    // Mobile menu toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');
        
        if(menuToggle && navMenu) {
            menuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('show');
                
                // Change icon based on menu state
                const icon = menuToggle.querySelector('i');
                if(navMenu.classList.contains('show')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideMenu = navMenu.contains(event.target);
                const isClickMenuToggle = menuToggle.contains(event.target);
                
                if(!isClickInsideMenu && !isClickMenuToggle && navMenu.classList.contains('show')) {
                    navMenu.classList.remove('show');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        }
        
        // Add slide-in animation to elements
        const animatedElements = document.querySelectorAll('.modern-logo, .secure-badge, .nav-menu');
        animatedElements.forEach(element => {
            element.classList.add('slide-in');
        });
    });
</script>