<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];	
$mobile=$_POST['mobileno'];
$subject=$_POST['subject'];	
$description=$_POST['description'];
$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Enquiry Successfully submitted";
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Contact Pearl Heritage Travels for all your travel inquiries and needs" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
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
<!-- Font Awesome 5 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    :root {
        --teal: #2EC4B6;
        --teal-light: #CBF3F0;
        --teal-dark: #0F9988;
        --coral: #FF9F1C;
        --coral-light: #FFBF69;
        --coral-dark: #E76F51;
        --sand: #F8F1E0;
        --sand-dark: #E6DBC8;
        --ocean: #1A535C;
        --white: #FFFFFF;
        --shadow: 0 10px 30px rgba(46, 196, 182, 0.15);
        --shadow-dark: 0 15px 35px rgba(26, 83, 92, 0.2);
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        line-height: 1.6;
        color: var(--ocean);
        background-color: var(--sand);
        overflow-x: hidden;
        position: relative;
    }

    /* Tropical background patterns */
    body::before, body::after {
        content: '';
        position: fixed;
        width: 300px;
        height: 300px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%232EC4B6" opacity="0.1"><path d="M21,4c0,9.39-6.89,17-15.35,17A16.86,16.86,0,0,1,3,20.65c5.28-.23,9-6.08,9-13.65A11.51,11.51,0,0,0,10.73,0,25.84,25.84,0,0,1,21,4Z"/></svg>');
        background-size: contain;
        background-repeat: no-repeat;
        z-index: -1;
    }

    body::before {
        top: -150px;
        right: -150px;
        transform: rotate(45deg);
    }

    body::after {
        bottom: -150px;
        left: -150px;
        transform: rotate(215deg);
    }

    h1, h2, h3, h4, h5, h6 {
        font-weight: 600;
        color: var(--ocean);
    }

    .script-font {
        font-family: 'Satisfy', cursive;
    }

    /* Wave divider */
    .wave-divider {
        width: 100%;
        height: 60px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%232EC4B6"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%232EC4B6"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%232EC4B6"></path></svg>');
        background-size: cover;
        background-repeat: no-repeat;
        margin-top: -1px;
    }

    .wave-divider-bottom {
        transform: rotate(180deg);
        margin-bottom: -1px;
    }

    /* Main container */
    .tropical-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    /* Hero section */
    .tropical-hero {
        background-color: var(--teal);
        color: white;
        padding: 80px 0 120px;
        position: relative;
        text-align: center;
    }

    .tropical-hero-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .tropical-hero-title {
        font-size: 56px;
        margin-bottom: 5px;
        color: white;
    }

    .tropical-hero-subtitle {
        font-family: 'Satisfy', cursive;
        font-size: 28px;
        margin-bottom: 20px;
        color: var(--coral-light);
    }

    .tropical-hero-text {
        font-size: 18px;
        max-width: 600px;
        margin: 0 auto 30px;
        opacity: 0.9;
    }

    /* Floating islands */
    .floating-island {
        position: absolute;
        width: 220px;
        height: 120px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" fill="none"><path d="M190,80 C150,100 50,100 10,80 C10,80 0,75 0,70 C0,65 10,60 10,60 C50,40 150,40 190,60 C190,60 200,65 200,70 C200,75 190,80 190,80 Z" fill="%23E6DBC8"/><path d="M180,65 C150,80 50,80 20,65 C50,50 150,50 180,65 Z" fill="%23F8F1E0"/><path d="M150,45 L155,20 L160,45 Z" fill="%23E76F51"/><path d="M155,20 C155,20 158,30 163,25 C168,20 155,20 155,20 Z" fill="%232EC4B6"/><path d="M140,50 L143,35 L146,50 Z" fill="%23E76F51"/><path d="M143,35 C143,35 145,42 148,38 C151,34 143,35 143,35 Z" fill="%232EC4B6"/><path d="M130,55 L132,45 L134,55 Z" fill="%23E76F51"/><path d="M132,45 C132,45 134,50 136,47 C138,44 132,45 132,45 Z" fill="%232EC4B6"/><path d="M60,45 L65,15 L70,45 Z" fill="%23E76F51"/><path d="M65,15 C65,15 68,28 75,22 C82,16 65,15 65,15 Z" fill="%232EC4B6"/><path d="M40,55 L43,35 L46,55 Z" fill="%23E76F51"/><path d="M43,35 C43,35 45,45 50,40 C55,35 43,35 43,35 Z" fill="%232EC4B6"/></svg>');
        background-repeat: no-repeat;
        background-size: contain;
        animation: float 6s ease-in-out infinite;
    }

    .island-1 {
        bottom: 10px;
        left: 5%;
        animation-delay: 0s;
    }

    .island-2 {
        bottom: 30px;
        right: 5%;
        animation-delay: 2s;
        transform: scaleX(-1);
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    /* Contact cards */
    .tropical-cards {
        margin-top: -60px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        padding: 0 20px;
    }

    .tropical-card {
        background: var(--white);
        border-radius: 15px;
        box-shadow: var(--shadow);
        padding: 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: var(--transition);
    }

    .tropical-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-dark);
    }

    .tropical-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(to right, var(--teal), var(--coral));
        opacity: 0;
        transition: var(--transition);
    }

    .tropical-card:hover::after {
        opacity: 1;
    }

    .card-icon-wrapper {
        width: 80px;
        height: 80px;
        background: var(--teal-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        position: relative;
        z-index: 1;
    }

    .card-icon-wrapper::before {
        content: '';
        position: absolute;
        width: 70px;
        height: 70px;
        background: white;
        border-radius: 50%;
        z-index: -1;
    }

    .card-icon {
        font-size: 32px;
        color: var(--teal);
    }

    .tropical-card:hover .card-icon {
        color: var(--coral);
    }

    .card-title {
        color: var(--ocean);
        font-size: 20px;
        margin-bottom: 15px;
    }

    .card-content {
        color: #666;
        margin-bottom: 15px;
        font-size: 15px;
    }

    .card-link {
        display: inline-flex;
        align-items: center;
        color: var(--teal);
        font-weight: 500;
        transition: var(--transition);
    }

    .card-link i {
        margin-left: 5px;
        transition: var(--transition);
    }

    .card-link:hover {
        color: var(--coral);
        text-decoration: none;
    }

    .card-link:hover i {
        transform: translateX(5px);
    }

    /* Contact form section */
    .form-section {
        margin: 80px 0;
    }

    .form-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        background: white;
        border-radius: 20px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    .form-image {
        position: relative;
        min-height: 300px;
    }

    .form-image-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://www.pocketwanderings.com/wp-content/uploads/2024/02/Goyambokka.jpg') center/cover no-repeat;
    }

    .form-image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(103, 238, 170, 0.8), rgba(68, 75, 82, 0.8));
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 40px;
        color: white;
    }

    .form-tagline {
        font-family: 'Satisfy', cursive;
        font-size: 28px;
        margin-bottom: 15px;
    }

    .form-headline {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .form-description {
        font-size: 16px;
        opacity: 0.9;
        margin-bottom: 30px;
    }

    .form-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .form-feature {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .feature-icon {
        width: 24px;
        height: 24px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        font-size: 12px;
    }

    .form-content {
        padding: 40px;
    }

    .form-header {
        margin-bottom: 30px;
        position: relative;
    }

    .form-header::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(to right, var(--teal), var(--coral));
        border-radius: 10px;
    }

    .form-title {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .form-subtitle {
        color: #666;
        font-size: 16px;
    }

    /* Notification messages */
    .tropical-alert {
        padding: 16px;
        margin-bottom: 25px;
        border-radius: 12px;
        display: flex;
        align-items: flex-start;
    }

    .tropical-alert-success {
        background: rgba(46, 196, 182, 0.1);
        border: 1px solid rgba(46, 196, 182, 0.3);
    }

    .tropical-alert-error {
        background: rgba(231, 111, 81, 0.1);
        border: 1px solid rgba(231, 111, 81, 0.3);
    }

    .alert-icon {
        margin-right: 15px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .tropical-alert-success .alert-icon {
        background: var(--teal);
        color: white;
    }

    .tropical-alert-error .alert-icon {
        background: var(--coral-dark);
        color: white;
    }

    .alert-body {
        flex-grow: 1;
    }

    .alert-title {
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 16px;
    }

    .tropical-alert-success .alert-title {
        color: var(--teal-dark);
    }

    .tropical-alert-error .alert-title {
        color: var(--coral-dark);
    }

    .alert-message {
        color: #666;
        font-size: 14px;
    }

    /* Form controls */
    .tropical-form .form-group {
        margin-bottom: 25px;
    }

    .tropical-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--ocean);
        font-size: 15px;
    }

    .input-wrapper {
        position: relative;
    }

    .tropical-form .form-control {
        width: 100%;
        padding: 12px 12px 12px 45px;
        border: 2px solid var(--sand-dark);
        border-radius: 10px;
        transition: var(--transition);
        font-size: 15px;
        color: var(--ocean);
        background: var(--sand);
    }

    .tropical-form .form-control:focus {
        border-color: var(--teal);
        outline: none;
        box-shadow: 0 0 0 3px rgba(46, 196, 182, 0.2);
        background: white;
    }

    .tropical-form .field-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 18px;
        transition: var(--transition);
    }

    .tropical-form textarea.form-control {
        padding-top: 45px;
        min-height: 150px;
        resize: vertical;
    }

    .tropical-form textarea ~ .field-icon {
        top: 25px;
        transform: none;
    }

    .tropical-form .form-control:focus ~ .field-icon {
        color: var(--teal);
    }

    .field-error {
        display: none;
        color: var(--coral-dark);
        font-size: 13px;
        margin-top: 6px;
    }

    .tropical-form .form-control.invalid {
        border-color: var(--coral-dark);
    }

    .tropical-form .form-control.invalid ~ .field-icon {
        color: var(--coral-dark);
    }

    .tropical-form .form-control.invalid ~ .field-error {
        display: block;
    }

    /* Button */
    .btn-tropical {
        background: linear-gradient(45deg, var(--teal), var(--teal-dark));
        color: white;
        border: none;
        border-radius: 10px;
        padding: 14px 30px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-tropical:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(46, 196, 182, 0.3);
    }

    .btn-tropical::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, var(--coral), var(--coral-dark));
        transition: var(--transition);
        z-index: -1;
        opacity: 0;
    }

    .btn-tropical:hover::after {
        opacity: 1;
    }

    .btn-icon {
        margin-right: 10px;
    }

    /* FAQ Section */
    .tropical-faq {
        margin: 80px 0;
        padding: 60px 0;
        background: var(--teal-light);
        position: relative;
    }

    .faq-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .faq-title {
        font-size: 36px;
        color: var(--ocean);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .faq-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, var(--teal), var(--coral));
        border-radius: 10px;
    }

    .faq-subtitle {
        font-size: 18px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
    }

    .faq-list {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        background: white;
        border-radius: 15px;
        box-shadow: var(--shadow);
        margin-bottom: 20px;
        overflow: hidden;
        transition: var(--transition);
    }

    .faq-item:hover {
        box-shadow: var(--shadow-dark);
    }

    .faq-question {
        padding: 20px 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 500;
        color: var(--ocean);
        transition: var(--transition);
    }

    .faq-question:hover {
        background: #f9f9f9;
    }

    .faq-question.active {
        background: var(--teal);
        color: white;
    }

    .faq-toggle {
        width: 30px;
        height: 30px;
        background: var(--teal-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        color: var(--teal);
    }

    .faq-question.active .faq-toggle {
        background: white;
        transform: rotate(45deg);
    }

    .faq-answer {
        padding: 0;
        height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-answer-content {
        padding: 20px 25px;
        color: #666;
    }

    /* Map Section */
    .tropical-map {
        margin-bottom: 80px;
        text-align: center;
    }

    .map-title {
        margin-bottom: 30px;
    }

    .map-title h2 {
        font-size: 36px;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .map-title h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, var(--teal), var(--coral));
        border-radius: 10px;
    }

    .map-title p {
        color: #666;
        max-width: 600px;
        margin: 0 auto;
    }

    .map-frame {
        height: 450px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow);
    }

    /* Palm tree decorations */
    .palm-tree {
        position: absolute;
        width: 150px;
        height: 150px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none"><path d="M50,95 L53,95 L55,65 L48,65 L50,95 Z" fill="%23E76F51"/><path d="M50,65 C50,65 40,45 35,30 C25,40 44,55 50,65 Z" fill="%23E76F51"/><path d="M53,65 C53,65 65,50 75,40 C80,55 60,60 53,65 Z" fill="%232EC4B6"/><path d="M51,60 C51,60 48,40 50,25 C35,35 45,55 51,60 Z" fill="%232EC4B6"/><path d="M52,60 C52,60 60,40 72,33 C65,20 55,45 52,60 Z" fill="%23E76F51"/></svg>');
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.15;
        z-index: -1;
    }

    .palm-1 {
        top: 50px;
        left: 5%;
        transform: rotate(-15deg);
    }

    .palm-2 {
        bottom: 100px;
        right: 5%;
        transform: rotate(15deg) scaleX(-1);
    }

    /* Responsive styles */
    @media (max-width: 991px) {
        .tropical-hero-title {
            font-size: 42px;
        }
        
        .tropical-hero-subtitle {
            font-size: 24px;
        }
        
        .form-image {
            display: none;
        }
    }

    @media (max-width: 767px) {
        .tropical-hero {
            padding: 60px 0 100px;
        }
        
        .tropical-hero-title {
            font-size: 32px;
        }
        
        .tropical-hero-subtitle {
            font-size: 20px;
        }
        
        .tropical-cards {
            margin-top: -40px;
        }
        
        .form-content {
            padding: 30px;
        }
        
        .form-title {
            font-size: 24px;
        }
        
        .floating-island, .palm-tree {
            display: none;
        }
    }
</style>
</head>
<body>
<?php include('includes/header.php');?>

<!-- Hero Section -->
<section class="tropical-hero">
    <div class="tropical-hero-content">
        <h1 class="tropical-hero-title wow fadeInDown">Contact Us</h1>
        <p class="tropical-hero-subtitle wow fadeInUp" data-wow-delay="0.2s">Your journey begins with a conversation</p>
        <p class="tropical-hero-text wow fadeInUp" data-wow-delay="0.3s">We're ready to help you plan the perfect Sri Lankan adventure. Reach out to our team of travel experts and let's craft unforgettable moments together.</p>
    </div>
    
    <!-- Decorative islands -->
    <div class="floating-island island-1"></div>
    <div class="floating-island island-2"></div>
    
    <!-- Wave divider -->
    <div class="wave-divider"></div>
</section>

<div class="tropical-container">
    <!-- Contact Cards -->
    <div class="tropical-cards">
        <div class="tropical-card wow fadeInUp" data-wow-delay="0.1s">
            <div class="card-icon-wrapper">
                <i class="fas fa-phone-alt card-icon"></i>
            </div>
            <h3 class="card-title">Call Us</h3>
            <p class="card-content">Our friendly team is here to help with any inquiry.</p>
            <a href="tel:+94112345678" class="card-link">+94 11 234 5678 <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="tropical-card wow fadeInUp" data-wow-delay="0.2s">
            <div class="card-icon-wrapper">
                <i class="fas fa-envelope card-icon"></i>
            </div>
            <h3 class="card-title">Email Us</h3>
            <p class="card-content">Send us an email and we'll get back to you.</p>
            <a href="mailto:info@pearlheritage.com" class="card-link">info@pearlheritage.com <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="tropical-card wow fadeInUp" data-wow-delay="0.3s">
            <div class="card-icon-wrapper">
                <i class="fas fa-map-marker-alt card-icon"></i>
            </div>
            <h3 class="card-title">Visit Us</h3>
            <p class="card-content">Come say hello at our office location.</p>
            <a href="https://maps.google.com" target="_blank" class="card-link">123 Travel Street, Colombo <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="tropical-card wow fadeInUp" data-wow-delay="0.4s">
            <div class="card-icon-wrapper">
                <i class="fas fa-clock card-icon"></i>
            </div>
            <h3 class="card-title">Office Hours</h3>
            <p class="card-content">Monday to Friday: 9AM - 5PM</p>
            <p class="card-content">Saturday: 10AM - 2PM</p>
        </div>
    </div>
    
    <!-- Form Section -->
    <section class="form-section">
        <div class="form-container">
            <div class="form-image">
                <div class="form-image-bg"></div>
                <div class="form-image-overlay">
                    <p class="form-tagline">Discover Sri Lanka</p>
                    <h2 class="form-headline">Let's Plan Your Perfect Holiday</h2>
                    <p class="form-description">Our travel specialists are ready to create a personalized itinerary based on your preferences and interests.</p>
                    
                    <ul class="form-features">
                        <li class="form-feature">
                            <span class="feature-icon"><i class="fas fa-check"></i></span>
                            <span>Personalized travel experiences</span>
                        </li>
                        <li class="form-feature">
                            <span class="feature-icon"><i class="fas fa-check"></i></span>
                            <span>Local guides and authentic experiences</span>
                        </li>
                        <li class="form-feature">
                            <span class="feature-icon"><i class="fas fa-check"></i></span>
                            <span>24/7 support throughout your journey</span>
                        </li>
                        <li class="form-feature">
                            <span class="feature-icon"><i class="fas fa-check"></i></span>
                            <span>Best price guarantee on all packages</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="form-content">
                <div class="form-header">
                    <h2 class="form-title">Send us a Message</h2>
                    <p class="form-subtitle">We'll respond within 24 hours</p>
                </div>
                
                <?php if($error){?>
                    <div class="tropical-alert tropical-alert-error">
                        <div class="alert-icon">
                            <i class="fas fa-exclamation"></i>
                        </div>
                        <div class="alert-body">
                            <div class="alert-title">We're Sorry</div>
                            <div class="alert-message"><?php echo htmlentities($error); ?></div>
                        </div>
                    </div>
                <?php } else if($msg){?>
                    <div class="tropical-alert tropical-alert-success">
                        <div class="alert-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="alert-body">
                            <div class="alert-title">Message Sent!</div>
                            <div class="alert-message"><?php echo htmlentities($msg); ?></div>
                        </div>
                    </div>
                <?php }?>
                
                <form name="enquiry" method="post" id="contactForm" class="tropical-form">
                    <div class="form-group">
                        <label for="fname">Full Name</label>
                        <div class="input-wrapper">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Your full name" required>
                            <i class="fas fa-user field-icon"></i>
                            <div class="field-error">Please enter your full name</div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your email address" required>
                            <i class="fas fa-envelope field-icon"></i>
                            <div class="field-error">Please enter a valid email address</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobileno">Phone Number</label>
                                <div class="input-wrapper">
                                    <input type="tel" name="mobileno" id="mobileno" class="form-control" placeholder="Your phone number" maxlength="10" required>
                                    <i class="fas fa-phone-alt field-icon"></i>
                                    <div class="field-error">Please enter a valid phone number</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <div class="input-wrapper">
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="What is this regarding?" required>
                                    <i class="fas fa-tag field-icon"></i>
                                    <div class="field-error">Please enter a subject</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Your Message</label>
                        <div class="input-wrapper">
                            <textarea name="description" id="description" class="form-control" placeholder="Tell us about your travel plans..." required></textarea>
                            <i class="fas fa-comment-alt field-icon"></i>
                            <div class="field-error">Please enter your message</div>
                        </div>
                    </div>
                    
                    <button type="submit" name="submit1" class="btn-tropical" id="submitBtn">
                        <i class="fas fa-paper-plane btn-icon"></i>
                        <span>Send Message</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- FAQ Section -->
<section class="tropical-faq">
    <!-- Decorative elements -->
    <div class="palm-tree palm-1"></div>
    <div class="palm-tree palm-2"></div>
    
    <div class="wave-divider wave-divider-bottom"></div>
    
    <div class="tropical-container">
        <div class="faq-header">
            <h2 class="faq-title wow fadeInUp">Frequently Asked Questions</h2>
            <p class="faq-subtitle wow fadeInUp" data-wow-delay="0.2s">Find answers to common questions about our services</p>
        </div>
        
        <div class="faq-list">
            <div class="faq-item wow fadeInUp">
                <div class="faq-question">
                    <span>How do I book a tour with Pearl Heritage Travels?</span>
                    <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        You can book a tour by filling out our online booking form, contacting us directly via email or phone, or visiting our office in person. We'll guide you through the process and help you choose the perfect travel package.
                    </div>
                </div>
            </div>
            
            <div class="faq-item wow fadeInUp" data-wow-delay="0.1s">
                <div class="faq-question">
                    <span>What payment methods do you accept?</span>
                    <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        We accept various payment methods including credit/debit cards (Visa, MasterCard, American Express), bank transfers, and PayPal. For certain destinations, we also offer payment plans to make your travel dreams more accessible.
                    </div>
                </div>
            </div>
            
            <div class="faq-item wow fadeInUp" data-wow-delay="0.2s">
                <div class="faq-question">
                    <span>Can I customize a tour package?</span>
                    <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Absolutely! We specialize in creating customized travel experiences. Contact our team with your preferences, budget, and interests, and we'll craft a personalized itinerary just for you.
                    </div>
                </div>
            </div>
            
            <div class="faq-item wow fadeInUp" data-wow-delay="0.3s">
                <div class="faq-question">
                    <span>What's your cancellation policy?</span>
                    <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Our standard cancellation policy allows for a full refund if cancelled at least 30 days before departure. Cancellations between 15-30 days incur a 50% fee, and less than 15 days results in no refund. However, policies may vary depending on the specific tour package and destination.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="tropical-map">
    <div class="tropical-container">
        <div class="map-title">
            <h2 class="wow fadeInUp">Find Our Office</h2>
            <p class="wow fadeInUp" data-wow-delay="0.2s">Located in the heart of Colombo, our office is easy to find and accessible from all major areas</p>
        </div>
        
        <div class="map-frame wow fadeInUp" data-wow-delay="0.3s">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63371.813701825!2d79.8211861!3d6.9218386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo!5e0!3m2!1sen!2slk!4v1713338000000!5m2!1sen!2slk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php include('includes/footer.php');?>

<script>
// Form validation
document.getElementById('contactForm').addEventListener('submit', function(event) {
    let isValid = true;
    
    // Reset validation
    document.querySelectorAll('.form-control').forEach(function(el) {
        el.classList.remove('invalid');
    });
    
    // Validate name
    const nameInput = document.getElementById('fname');
    if (!nameInput.value.trim()) {
        nameInput.classList.add('invalid');
        isValid = false;
    }
    
    // Validate email
    const emailInput = document.getElementById('email');
    if (!emailInput.value.trim() || !isValidEmail(emailInput.value)) {
        emailInput.classList.add('invalid');
        isValid = false;
    }
    
    // Validate phone
    const phoneInput = document.getElementById('mobileno');
    if (!phoneInput.value.trim() || !isValidPhone(phoneInput.value)) {
        phoneInput.classList.add('invalid');
        isValid = false;
    }
    
    // Validate subject
    const subjectInput = document.getElementById('subject');
    if (!subjectInput.value.trim()) {
        subjectInput.classList.add('invalid');
        isValid = false;
    }
    
    // Validate message
    const messageInput = document.getElementById('description');
    if (!messageInput.value.trim()) {
        messageInput.classList.add('invalid');
        isValid = false;
    }
    
    if (!isValid) {
        event.preventDefault();
    }
});

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

function isValidPhone(phone) {
    return phone.length >= 10;
}

// Clear validation on input
document.querySelectorAll('.form-control').forEach(function(input) {
    input.addEventListener('input', function() {
        this.classList.remove('invalid');
    });
});

// FAQ Accordion
document.querySelectorAll('.faq-question').forEach(function(question) {
    question.addEventListener('click', function() {
        // Toggle active class
        this.classList.toggle('active');
        
        // Toggle answer visibility
        const answer = this.nextElementSibling;
        if (this.classList.contains('active')) {
            answer.style.height = answer.scrollHeight + 'px';
        } else {
            answer.style.height = 0;
        }
        
        // Close other open questions
        document.querySelectorAll('.faq-question.active').forEach(function(activeQuestion) {
            if (activeQuestion !== question) {
                activeQuestion.classList.remove('active');
                activeQuestion.nextElementSibling.style.height = 0;
            }
        });
    });
});

// Parallax effect on decorative elements
window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset;
    
    document.querySelectorAll('.palm-tree').forEach(function(palm) {
        const speed = 0.05;
        palm.style.transform = `translateY(${scrollTop * speed}px)`;
    });
});
</script>
</body>
</html>