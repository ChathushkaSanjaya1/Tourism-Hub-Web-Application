<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['submit6']))
    {
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_SESSION['login'];

$sql="update tblusers set FullName=:name,MobileNumber=:mobileno where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>My Profile | PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
     new WOW().init();
</script>

<style>
    :root {
        /* Main colors */
        --primary: #4E6BFF;
        --primary-light: #96A5FF;
        --primary-dark: #3B50C2;
        --secondary: #FF7D54;
        --secondary-light: #FFB799;
        --secondary-dark: #E26743;
        
        /* Neutral colors */
        --bg-light: #F0F4FF;
        --bg-dark: #151C39;
        --text-light: #F8FAFF;
        --text-dark: #1F293D;
        --text-muted: #8E95A9;
        
        /* UI colors */
        --success: #25D366;
        --info: #38B6FF;
        --warning: #FFC107;
        --danger: #FF4757;
        --light: #FFFFFF;
        --dark: #0A1128;
        
        /* Effects */
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.15);
        --shadow-inset: inset 0 2px 6px rgba(0, 0, 0, 0.08);
        --shadow-primary: 0 8px 20px rgba(78, 107, 255, 0.3);
        --shadow-secondary: 0 8px 20px rgba(255, 125, 84, 0.3);
        
        /* Glass effects */
        --glass-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.2);
        --glass-blur: blur(20px);
        --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        
        /* Dimensions */
        --header-height: 70px;
        --border-radius-sm: 8px;
        --border-radius: 16px;
        --border-radius-lg: 28px;
        --card-border-radius: 24px;
        --input-border-radius: 12px;
        --button-border-radius: 12px;
        
        /* Animation */
        --transition-fast: all 0.2s ease;
        --transition: all 0.3s ease;
        --transition-slow: all 0.5s ease;
    }

    /* Base styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.6;
        min-height: 100vh;
        overflow-x: hidden;
    }
    
    /* Main profile container with background effect */
    .profile-container {
        position: relative;
        padding: 60px 0;
        background: linear-gradient(135deg, #EBF1FF 0%, #F7F9FF 100%);
        min-height: 80vh;
        overflow: hidden;
    }
    
    /* Animated background shapes */
    .animated-shape {
        position: absolute;
        opacity: 0.4;
        z-index: 0;
    }
    
    .shape-1 {
        top: 10%;
        left: 5%;
        width: 300px;
        height: 300px;
        background: linear-gradient(45deg, var(--primary-light), var(--primary));
        border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        animation: morph 15s linear infinite alternate;
    }
    
    .shape-2 {
        top: 60%;
        right: 5%;
        width: 250px;
        height: 250px;
        background: linear-gradient(45deg, var(--secondary), var(--secondary-light));
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        animation: morph 12s linear infinite alternate-reverse;
    }
    
    .shape-3 {
        bottom: 10%;
        left: 30%;
        width: 180px;
        height: 180px;
        background: linear-gradient(45deg, var(--primary), var(--primary-light));
        border-radius: 35% 65% 65% 35% / 45% 45% 55% 55%;
        animation: morph 10s linear infinite alternate;
    }
    
    @keyframes morph {
        0% {
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            transform: rotate(0deg) translateY(0);
        }
        50% {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            transform: rotate(180deg) translateY(20px);
        }
        100% {
            border-radius: 35% 65% 65% 35% / 45% 45% 55% 55%;
            transform: rotate(360deg) translateY(0);
        }
    }
    
    /* Glass container for profile */
    .glass-container {
        max-width: 1000px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
        padding: 0 20px;
    }
    
    /* Header breadcrumb navigation */
    .profile-breadcrumb {
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        font-size: 0.95rem;
        color: var(--text-muted);
    }
    
    .profile-breadcrumb a {
        color: var(--text-dark);
        text-decoration: none;
        transition: var(--transition);
    }
    
    .profile-breadcrumb a:hover {
        color: var(--primary);
    }
    
    .profile-breadcrumb i {
        margin: 0 10px;
        font-size: 0.8rem;
    }
    
    /* Main profile card */
    .profile-card {
        background: var(--glass-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border-radius: var(--card-border-radius);
        box-shadow: var(--glass-shadow);
        border: 1px solid var(--glass-border);
        overflow: hidden;
        transform-style: preserve-3d;
        perspective: 1000px;
        position: relative;
    }
    
    /* Card header section */
    .profile-header {
        position: relative;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .cover-photo {
        width: 100%;
        height: 180px;
        background-image: url('https://images.unsplash.com/photo-1519338381761-c7523edc1f46?ixlib=rb-4.0.3&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }
    
    .cover-photo::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.1) 100%);
        z-index: 1;
    }
    
    .cover-photo-edit {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        opacity: 0.8;
        transition: var(--transition);
    }
    
    .cover-photo-edit:hover {
        opacity: 1;
        transform: scale(1.05);
    }
    
    .profile-avatar-wrapper {
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }
    
    .profile-avatar-container {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        padding: 5px;
        background: white;
        box-shadow: var(--shadow);
        position: relative;
    }
    
    .profile-avatar-circle {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .profile-avatar-initials {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
    }
    
    .profile-avatar-photo {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }
    
    .profile-avatar-edit {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background: var(--secondary);
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        z-index: 3;
    }
    
    .profile-avatar-edit:hover {
        transform: scale(1.1);
        background: var(--secondary-dark);
    }
    
    /* Card content area */
    .profile-content {
        padding: 70px 40px 40px;
    }
    
    .profile-heading {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .profile-name {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }
    
    .profile-email {
        font-size: 1rem;
        color: var(--text-muted);
    }
    
    /* Tabs navigation */
    .profile-tabs {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
        gap: 10px;
    }
    
    .tab-button {
        background: none;
        border: none;
        padding: 10px 20px;
        font-weight: 500;
        color: var(--text-muted);
        cursor: pointer;
        transition: var(--transition);
        position: relative;
        font-size: 1rem;
    }
    
    .tab-button::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 3px;
        background: var(--primary);
        transition: var(--transition);
        border-radius: 3px;
    }
    
    .tab-button:hover {
        color: var(--text-dark);
    }
    
    .tab-button.active {
        color: var(--primary);
    }
    
    .tab-button.active::after {
        width: 100%;
    }
    
    /* Tab content */
    .tab-content {
        display: none;
    }
    
    .tab-content.active {
        display: block;
        animation: fadeIn 0.5s ease forwards;
    }
    
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
    
    /* Form styling */
    .profile-form-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
    
    .form-group {
        margin-bottom: 25px;
        position: relative;
    }
    
    .form-group.full-width {
        grid-column: 1 / -1;
    }
    
    .input-label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-dark);
        font-weight: 500;
        font-size: 0.95rem;
    }
    
    .input-wrapper {
        position: relative;
    }
    
    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        transition: var(--transition);
    }
    
    .form-input {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid transparent;
        background-color: rgba(240, 244, 255, 0.7);
        border-radius: var(--input-border-radius);
        font-size: 1rem;
        color: var(--text-dark);
        transition: var(--transition);
        box-shadow: var(--shadow-inset);
    }
    
    .form-input::placeholder {
        color: var(--text-muted);
    }
    
    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        background-color: rgba(240, 244, 255, 0.9);
        box-shadow: var(--shadow-primary);
    }
    
    .form-input:focus + .input-icon {
        color: var(--primary);
    }
    
    .form-input:not([readonly]):hover {
        background-color: rgba(240, 244, 255, 0.9);
    }
    
    .form-input[readonly] {
        background-color: rgba(240, 244, 255, 0.5);
        cursor: not-allowed;
        opacity: 0.7;
        border: 2px dashed rgba(142, 149, 169, 0.3);
    }
    
    /* Form validation styles */
    .input-validation {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: var(--transition);
    }
    
    .form-input:not([readonly]):valid ~ .input-validation {
        opacity: 1;
        color: var(--success);
    }
    
    .form-input:not([readonly]):invalid:not(:placeholder-shown) ~ .input-validation {
        opacity: 1;
        color: var(--danger);
    }
    
    .validation-message {
        font-size: 0.85rem;
        margin-top: 5px;
        display: none;
    }
    
    .form-input:not([readonly]):invalid:not(:placeholder-shown) ~ .validation-message.error {
        display: block;
        color: var(--danger);
    }
    
    .form-input:not([readonly]):valid ~ .validation-message.success {
        display: block;
        color: var(--success);
    }
    
    /* Info cards */
    .info-card {
        background: rgba(255, 255, 255, 0.7);
        border-radius: var(--border-radius);
        padding: 25px;
        position: relative;
        overflow: hidden;
        transition: var(--transition);
        border: 1px solid rgba(255, 255, 255, 0.5);
        box-shadow: var(--shadow-sm);
        height: 100%;
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow);
    }
    
    .info-card-icon {
        position: absolute;
        top: 15px;
        right: 15px;
        color: var(--primary);
        font-size: 1.5rem;
        opacity: 0.2;
        transition: var(--transition);
    }
    
    .info-card:hover .info-card-icon {
        opacity: 0.5;
        transform: scale(1.2);
    }
    
    .info-card-title {
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--primary-dark);
        margin-bottom: 15px;
    }
    
    .info-card-content {
        color: var(--text-muted);
        font-size: 0.95rem;
    }
    
    .info-card-content strong {
        color: var(--text-dark);
        font-weight: 500;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    /* Activity timeline */
    .timeline {
        position: relative;
        padding: 0;
        margin: 0;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        height: 100%;
        width: 2px;
        background-color: rgba(142, 149, 169, 0.2);
    }
    
    .timeline-item {
        position: relative;
        padding-left: 50px;
        padding-bottom: 25px;
        list-style-type: none;
    }
    
    .timeline-item:last-child {
        padding-bottom: 0;
    }
    
    .timeline-dot {
        position: absolute;
        left: 15px;
        top: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: var(--primary);
        border: 3px solid white;
        box-shadow: 0 0 0 3px rgba(78, 107, 255, 0.2);
    }
    
    .timeline-content {
        background-color: rgba(255, 255, 255, 0.7);
        padding: 15px 20px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    .timeline-title {
        font-weight: 600;
        font-size: 1rem;
        color: var(--text-dark);
        margin-bottom: 5px;
    }
    
    .timeline-date {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin-bottom: 10px;
    }
    
    .timeline-description {
        color: var(--text-dark);
        font-size: 0.95rem;
    }
    
    /* Button styling */
    .button-row {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        gap: 15px;
    }
    
    .btn {
        padding: 12px 25px;
        border-radius: var(--button-border-radius);
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: none;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        box-shadow: var(--shadow-primary);
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(78, 107, 255, 0.4);
    }
    
    .btn-primary:active {
        transform: translateY(-1px);
    }
    
    .btn-secondary {
        background: linear-gradient(135deg, white, #f0f4ff);
        color: var(--text-dark);
        box-shadow: var(--shadow-sm);
    }
    
    .btn-secondary:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow);
    }
    
    .btn-secondary:active {
        transform: translateY(-1px);
    }
    
    .btn-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Alert notifications */
    .alert-container {
        position: relative;
        margin-bottom: 30px;
    }
    
    .alert {
        padding: 15px 20px;
        border-radius: var(--border-radius);
        display: flex;
        align-items: flex-start;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(5px);
        box-shadow: var(--shadow);
        position: relative;
        overflow: hidden;
        animation: slideDown 0.5s ease forwards;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .alert-icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 15px;
    }
    
    .alert-body {
        flex-grow: 1;
    }
    
    .alert-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .alert-message {
        font-size: 0.95rem;
        margin: 0;
    }
    
    .alert-close {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.1);
        color: var(--text-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        font-size: 0.8rem;
    }
    
    .alert-close:hover {
        background: rgba(0, 0, 0, 0.2);
    }
    
    /* Alert variants */
    .alert-success {
        background: linear-gradient(135deg, rgba(37, 211, 102, 0.15), rgba(255, 255, 255, 0.8));
        border-left: 4px solid var(--success);
    }
    
    .alert-success .alert-icon {
        background: rgba(37, 211, 102, 0.2);
        color: var(--success);
    }
    
    .alert-error {
        background: linear-gradient(135deg, rgba(255, 71, 87, 0.15), rgba(255, 255, 255, 0.8));
        border-left: 4px solid var(--danger);
    }
    
    .alert-error .alert-icon {
        background: rgba(255, 71, 87, 0.2);
        color: var(--danger);
    }
    
    /* Additional animations */
    .floating {
        animation: floating 3s ease infinite;
    }
    
    @keyframes floating {
        0% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0); }
    }
    
    /* Responsiveness */
    @media (max-width: 992px) {
        .profile-content {
            padding: 70px 30px 30px;
        }
    }
    
    @media (max-width: 768px) {
        .profile-form-section {
            grid-template-columns: 1fr;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .cover-photo {
            height: 150px;
        }
        
        .profile-avatar-container {
            width: 100px;
            height: 100px;
        }
        
        .profile-avatar-initials {
            font-size: 2rem;
        }
        
        .profile-content {
            padding: 60px 20px 30px;
        }
        
        .profile-heading {
            margin-bottom: 25px;
        }
        
        .button-row {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
        
        .profile-tabs {
            flex-wrap: wrap;
        }
        
        .profile-avatar-wrapper {
            bottom: -40px;
        }
    }
    
    @media (max-width: 576px) {
        .profile-tabs {
            justify-content: flex-start;
            overflow-x: auto;
            padding-bottom: 10px;
            margin: 0 -20px 30px;
            padding: 0 20px 10px;
        }
        
        .tab-button {
            padding: 10px 15px;
            font-size: 0.9rem;
            white-space: nowrap;
        }
    }
</style>
</head>

<body>
<!-- top-header -->
<?php include('includes/header.php');?>
<div class="banner-1">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">PEARL HERITAGE TRAVELS</h1>
    </div>
</div>

<!-- Profile Container -->
<div class="profile-container">
    <!-- Background animated shapes -->
    <div class="animated-shape shape-1"></div>
    <div class="animated-shape shape-2"></div>
    <div class="animated-shape shape-3"></div>
    
    <div class="glass-container">
        <!-- Breadcrumb Navigation -->
        <div class="profile-breadcrumb">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="dashboard.php">My Account</a>
            <i class="fas fa-chevron-right"></i>
            <span>My Profile</span>
        </div>
        
        <!-- Main Profile Card -->
        <div class="profile-card">
            <!-- Profile Header with Cover Photo -->
            <div class="profile-header">
                <div class="cover-photo">
                    <div class="cover-photo-edit" title="Change cover photo">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                
                <div class="profile-avatar-wrapper">
                    <?php 
                    $useremail=$_SESSION['login'];
                    $sql = "SELECT * from tblusers where EmailId=:useremail";
                    $query = $dbh -> prepare($sql);
                    $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0) {
                        foreach($results as $result) {
                            // Getting first letter for avatar
                            $firstLetter = substr($result->FullName, 0, 1);
                    ?>
                    <div class="profile-avatar-container">
                        <div class="profile-avatar-circle">
                            <span class="profile-avatar-initials"><?php echo $firstLetter; ?></span>
                            <!-- If you want to add a real photo later, uncomment this: -->
                            <!-- <img src="path-to-photo" class="profile-avatar-photo" alt="Profile Photo"> -->
                        </div>
                        <div class="profile-avatar-edit" title="Change profile picture">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Profile Name and Info -->
                <div class="profile-heading">
                    <h1 class="profile-name"><?php echo htmlentities($result->FullName);?></h1>
                    <p class="profile-email"><?php echo htmlentities($result->EmailId);?></p>
                </div>
                
                <!-- Tabs Navigation -->
                <div class="profile-tabs">
                    <button class="tab-button active" data-tab="personal-info">
                        <i class="fas fa-user"></i> Personal Info
                    </button>
                    <button class="tab-button" data-tab="account-activity">
                        <i class="fas fa-history"></i> Account Activity
                    </button>
                    <button class="tab-button" data-tab="settings">
                        <i class="fas fa-cog"></i> Settings
                    </button>
                </div>
                
                <!-- Alert Messages -->
                <?php if($error){?>
                <div class="alert-container">
                    <div class="alert alert-error">
                        <div class="alert-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="alert-body">
                            <h4 class="alert-title">Oops! Something went wrong</h4>
                            <p class="alert-message"><?php echo htmlentities($error); ?></p>
                        </div>
                        <div class="alert-close">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>
                <?php } else if($msg){?>
                <div class="alert-container">
                    <div class="alert alert-success">
                        <div class="alert-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="alert-body">
                            <h4 class="alert-title">Success!</h4>
                            <p class="alert-message"><?php echo htmlentities($msg); ?></p>
                        </div>
                        <div class="alert-close">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>
                <?php }?>
                
                <!-- Tab Content Areas -->
                <!-- Personal Info Tab (Active by default) -->
                <div class="tab-content active" id="personal-info">
                    <form method="post" class="profile-form">
                        <div class="profile-form-section">
                            <div class="form-group">
                                <label class="input-label" for="name">Full Name</label>
                                <div class="input-wrapper">
                                    <input type="text" name="name" id="name" class="form-input" 
                                           value="<?php echo htmlentities($result->FullName);?>" 
                                           placeholder="Enter your full name" required>
                                    <i class="fas fa-user input-icon"></i>
                                    <div class="input-validation">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="validation-message error">Please enter your full name</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="input-label" for="mobileno">Mobile Number</label>
                                <div class="input-wrapper">
                                    <input type="tel" name="mobileno" id="mobileno" class="form-input" 
                                           value="<?php echo htmlentities($result->MobileNumber);?>" 
                                           placeholder="Enter your mobile number" 
                                           pattern="[0-9]{10}" maxlength="10" required>
                                    <i class="fas fa-phone-alt input-icon"></i>
                                    <div class="input-validation">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="validation-message error">Please enter a valid 10-digit mobile number</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="input-label" for="email">Email Address</label>
                                <div class="input-wrapper">
                                    <input type="email" name="email" id="email" class="form-input" 
                                           value="<?php echo htmlentities($result->EmailId);?>" readonly>
                                    <i class="fas fa-envelope input-icon"></i>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="info-grid">
                                    <div class="info-card floating">
                                        <i class="fas fa-calendar-alt info-card-icon"></i>
                                        <h3 class="info-card-title">Registration Info</h3>
                                        <div class="info-card-content">
                                            <p><strong>Registered On:</strong> <?php echo htmlentities($result->RegDate);?></p>
                                            <p><strong>Last Updated:</strong> <?php echo htmlentities($result->UpdationDate ? $result->UpdationDate : 'Never updated');?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="info-card floating" style="animation-delay: 0.2s;">
                                        <i class="fas fa-shield-alt info-card-icon"></i>
                                        <h3 class="info-card-title">Account Security</h3>
                                        <div class="info-card-content">
                                            <p><strong>Email Verified:</strong> Yes</p>
                                            <p><strong>2FA Enabled:</strong> No <a href="#" style="color: var(--primary); text-decoration: none; font-size: 0.85rem;">(Enable)</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group full-width button-row">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fas fa-undo"></i> Cancel
                                </button>
                                <button type="submit" name="submit6" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Account Activity Tab -->
                <div class="tab-content" id="account-activity">
                    <ul class="timeline">
                        <li class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">Profile Updated</h3>
                                <div class="timeline-date"><i class="far fa-clock"></i> <?php echo $result->UpdationDate ? $result->UpdationDate : $result->RegDate; ?></div>
                                <p class="timeline-description">You updated your profile information.</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">Account Created</h3>
                                <div class="timeline-date"><i class="far fa-clock"></i> <?php echo $result->RegDate; ?></div>
                                <p class="timeline-description">You created your account with Pearl Heritage Travels.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Settings Tab -->
                <div class="tab-content" id="settings">
                    <div class="profile-form-section">
                        <div class="form-group full-width">
                            <h3 style="margin-bottom: 20px; color: var(--text-dark);">Account Preferences</h3>
                            <div class="info-card">
                                <i class="fas fa-bell info-card-icon"></i>
                                <h3 class="info-card-title">Notifications</h3>
                                <div class="info-card-content">
                                    <div style="display: flex; align-items: center; margin-bottom: 15px; justify-content: space-between;">
                                        <div>Email Notifications</div>
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                        <div>SMS Notifications</div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group full-width">
                            <div class="info-card">
                                <i class="fas fa-lock info-card-icon"></i>
                                <h3 class="info-card-title">Password & Security</h3>
                                <div class="info-card-content">
                                    <div style="margin-bottom: 20px;">
                                        <p style="margin-bottom: 15px;">Change your password regularly to keep your account secure.</p>
                                        <button type="button" class="btn btn-secondary" style="width: 100%;">
                                            <i class="fas fa-key"></i> Change Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group full-width button-row">
                            <button type="button" class="btn btn-secondary">
                                <i class="fas fa-undo"></i> Cancel
                            </button>
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Settings
                            </button>
                        </div>
                    </div>
                </div>
                
                <?php }} ?>
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

<script>
// Tab switching functionality
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and content
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to current tab and content
            this.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });
    
    // Alert close functionality
    const alertCloseButtons = document.querySelectorAll('.alert-close');
    alertCloseButtons.forEach(button => {
        button.addEventListener('click', function() {
            const alert = this.closest('.alert');
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        });
    });
    
    // Form validation visual feedback
    const formInputs = document.querySelectorAll('.form-input');
    formInputs.forEach(input => {
        if (!input.hasAttribute('readonly')) {
            input.addEventListener('input', validateInput);
            input.addEventListener('blur', validateInput);
        }
    });
    
    function validateInput() {
        if (this.checkValidity()) {
            this.classList.add('valid');
            this.classList.remove('invalid');
        } else {
            this.classList.add('invalid');
            this.classList.remove('valid');
        }
    }
    
    // Toggle switches styling
    const switches = document.querySelectorAll('.switch');
    switches.forEach(switchEl => {
        const slider = switchEl.querySelector('.slider');
        
        // Add custom styling for switch
        const styleEl = document.createElement('style');
        document.head.appendChild(styleEl);
        
        styleEl.sheet.insertRule(`
            .switch {
                position: relative;
                display: inline-block;
                width: 50px;
                height: 24px;
            }
        `);
        
        styleEl.sheet.insertRule(`
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }
        `);
        
        styleEl.sheet.insertRule(`
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
            }
        `);
        
        styleEl.sheet.insertRule(`
            .slider:before {
                position: absolute;
                content: "";
                height: 18px;
                width: 18px;
                left: 3px;
                bottom: 3px;
                background-color: white;
                transition: .4s;
            }
        `);
        
        styleEl.sheet.insertRule(`
            input:checked + .slider {
                background-color: var(--primary);
            }
        `);
        
        styleEl.sheet.insertRule(`
            input:focus + .slider {
                box-shadow: 0 0 1px var(--primary);
            }
        `);
        
        styleEl.sheet.insertRule(`
            input:checked + .slider:before {
                transform: translateX(26px);
            }
        `);
        
        styleEl.sheet.insertRule(`
            .slider.round {
                border-radius: 34px;
            }
        `);
        
        styleEl.sheet.insertRule(`
            .slider.round:before {
                border-radius: 50%;
            }
        `);
    });
});
</script>
</body>
</html>
<?php } ?>