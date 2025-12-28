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
<html lang="en">
<head>
<title><?php echo $_GET['type']; ?> | PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Discover Sri Lanka's beauty with Pearl Heritage Travels. Explore our wide range of travel packages and services." />
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

    a {
        color: var(--teal);
        text-decoration: none;
        transition: var(--transition);
    }

    a:hover {
        color: var(--coral);
        text-decoration: none;
    }

    .script-font {
        font-family: 'Satisfy', cursive;
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Wave divider */
    .wave-divider {
        width: 100%;
        height: 60px;
        background-size: cover;
        background-repeat: no-repeat;
        margin-top: -1px;
    }

    .wave-divider-bottom {
        transform: rotate(180deg);
        margin-bottom: -1px;
    }

    /* Page Header with Dynamic Background Images */
    .tropical-header {
        position: relative;
        padding: 100px 0 140px;
        text-align: center;
        color: white;
        overflow: hidden;
        background-color: var(--teal);
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        transition: background-image 0.5s ease-in-out;
    }

    /* Header overlay */
    .tropical-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5));
        z-index: 1;
    }

    /* Header content */
    .header-content {
        position: relative;
        z-index: 2;
    }

    .tropical-header-title {
        font-size: 48px;
        margin-bottom: 15px;
        color: white;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .tropical-header-subtitle {
        font-family: 'Satisfy', cursive;
        font-size: 24px;
        margin-bottom: 20px;
        color: var(--coral-light);
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        position: relative;
    }



    /* Header badge */
    .header-badge {
        background: white;
        color: var(--ocean);
        display: inline-block;
        padding: 8px 15px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease-out forwards;
        animation-delay: 0.3s;
    }
    
    .header-badge i {
        color: var(--coral);
        margin-right: 5px;
    }

    /* Dynamic floating elements */
    .floating-element {
        position: absolute;
        width: 80px;
        height: 80px;
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.6;
        z-index: 2;
        transition: all 3s ease-in-out;
    }
    
    .float-1 {
        top: 15%;
        left: 10%;
        animation: float 8s ease-in-out infinite;
    }
    
    .float-2 {
        top: 25%;
        right: 10%;
        animation: float 7s ease-in-out infinite 1s;
    }
    
    .float-3 {
        bottom: 30%;
        left: 15%;
        animation: float 9s ease-in-out infinite 0.5s;
    }
    
    .float-4 {
        bottom: 20%;
        right: 15%;
        animation: float 10s ease-in-out infinite 1.5s;
    }
    
    /* Define floating element images based on page type */
    .header-about .float-1 {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFFFFF"><path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M13,17h-2v-6h2V17z M13,9h-2V7h2V9z"/></svg>');
    }
    
    .header-about .float-2 {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFFFFF"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>');
    }
    
    .header-contact .float-1 {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFFFFF"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>');
    }
    
    .header-contact .float-2 {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFFFFF"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>');
    }
    
    /* Breadcrumbs with visual enhancements */
    .tropical-breadcrumbs {
        background: rgba(255, 255, 255, 0.95);
        padding: 20px 0;
        border-bottom: 1px solid var(--sand-dark);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        position: relative;
        z-index: 10;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .breadcrumb-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .breadcrumb-item {
        display: inline-flex;
        align-items: center;
        margin: 5px 0;
    }

    .breadcrumb-item:not(:last-child):after {
        content: '';
        width: 6px;
        height: 6px;
        margin: 0 12px;
        border-top: 2px solid var(--teal-light);
        border-right: 2px solid var(--teal-light);
        transform: rotate(45deg);
    }

    .breadcrumb-link {
        color: var(--teal);
        text-decoration: none;
        transition: var(--transition);
        display: flex;
        align-items: center;
    }
    
    .breadcrumb-icon {
        margin-right: 6px;
        font-size: 14px;
    }

    .breadcrumb-link:hover {
        color: var(--coral);
    }

    .breadcrumb-current {
        color: var(--ocean);
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    /* Content area */
    .content-container {
        margin-top: -60px;
        margin-bottom: 80px;
        position: relative;
        z-index: 10;
    }

    .tropical-content {
        background: var(--white);
        border-radius: 15px;
        box-shadow: var(--shadow);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }
    
    /* Content background pattern */
    .content-pattern {
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%23E6DBC8" opacity="0.2"><circle cx="10" cy="10" r="2" /><circle cx="30" cy="10" r="2" /><circle cx="50" cy="10" r="2" /><circle cx="70" cy="10" r="2" /><circle cx="90" cy="10" r="2" /><circle cx="10" cy="30" r="2" /><circle cx="30" cy="30" r="2" /><circle cx="50" cy="30" r="2" /><circle cx="70" cy="30" r="2" /><circle cx="90" cy="30" r="2" /><circle cx="10" cy="50" r="2" /><circle cx="30" cy="50" r="2" /><circle cx="50" cy="50" r="2" /><circle cx="70" cy="50" r="2" /><circle cx="90" cy="50" r="2" /></svg>');
        opacity: 0.4;
        z-index: 0;
    }

    .content-header {
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
        z-index: 1;
    }

    .content-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, var(--teal), var(--coral));
        border-radius: 10px;
    }

    .content-title {
        font-size: 32px;
        margin-bottom: 15px;
        color: var(--ocean);
    }

    .content-body {
        font-size: 16px;
        line-height: 1.8;
        color: var(--ocean);
        position: relative;
        z-index: 1;
    }

    .content-body p {
        margin-bottom: 20px;
    }

    .content-body h2 {
        font-size: 26px;
        margin: 35px 0 15px;
        color: var(--ocean);
        position: relative;
        padding-left: 15px;
    }
    
    .content-body h2::before {
        content: '';
        position: absolute;
        left: 0;
        top: 8px;
        bottom: 8px;
        width: 4px;
        background: linear-gradient(to bottom, var(--teal), var(--coral));
        border-radius: 4px;
    }

    .content-body h3 {
        font-size: 22px;
        margin: 25px 0 15px;
        color: var(--ocean);
    }

    .content-body ul, .content-body ol {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .content-body li {
        margin-bottom: 10px;
        position: relative;
    }
    
    .content-body ul li::marker {
        color: var(--teal);
    }

    .content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 25px 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .content-body img:hover {
        transform: scale(1.02);
    }

    .content-body blockquote {
        padding: 25px 25px 25px 50px;
        background: var(--sand);
        border-left: 4px solid var(--coral);
        margin: 30px 0;
        font-style: italic;
        border-radius: 0 8px 8px 0;
        position: relative;
    }
    
    .content-body blockquote::before {
        content: '"';
        position: absolute;
        left: 20px;
        top: 10px;
        font-size: 60px;
        color: var(--coral);
        opacity: 0.3;
        font-family: Georgia, serif;
        line-height: 1;
    }

    /* Feature boxes with hover effects */
    .tropical-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin: 50px 0 30px;
    }

    .tropical-feature {
        background: var(--sand);
        border-radius: 15px;
        padding: 30px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        overflow: hidden;
        z-index: 1;
        height: 100%;
    }
    
    .tropical-feature::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--teal-light) 0%, var(--sand) 100%);
        opacity: 0;
        z-index: -1;
        transition: opacity 0.4s ease;
    }

    .tropical-feature::after {
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

    .tropical-feature:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow);
    }
    
    .tropical-feature:hover::before {
        opacity: 1;
    }

    .tropical-feature:hover::after {
        opacity: 1;
    }

    .feature-icon-wrapper {
        width: 80px;
        height: 80px;
        background: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .tropical-feature:hover .feature-icon-wrapper {
        transform: rotate(5deg) scale(1.1);
        box-shadow: 0 8px 25px rgba(46, 196, 182, 0.3);
    }

    .feature-icon {
        font-size: 32px;
        color: var(--teal);
        transition: var(--transition);
    }

    .tropical-feature:hover .feature-icon {
        color: var(--coral);
    }

    .feature-title {
        font-size: 20px;
        margin-bottom: 15px;
        color: var(--ocean);
        transition: var(--transition);
    }
    
    .tropical-feature:hover .feature-title {
        transform: translateX(5px);
    }

    .feature-text {
        color: var(--ocean);
        opacity: 0.8;
        font-size: 15px;
        transition: var(--transition);
    }
    
    .tropical-feature:hover .feature-text {
        opacity: 1;
    }

    /* CTA section with enhanced visuals */
    .tropical-cta {
        background: linear-gradient(135deg, var(--teal), var(--teal-dark));
        padding: 60px 50px;
        color: white;
        text-align: center;
        border-radius: 15px;
        margin: 50px 0;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-dark);
    }

    .cta-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none"><circle cx="10" cy="10" r="3" fill="white" opacity="0.1"/><circle cx="30" cy="10" r="3" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="3" fill="white" opacity="0.1"/><circle cx="70" cy="10" r="3" fill="white" opacity="0.1"/><circle cx="90" cy="10" r="3" fill="white" opacity="0.1"/><circle cx="10" cy="30" r="3" fill="white" opacity="0.1"/><circle cx="30" cy="30" r="3" fill="white" opacity="0.1"/><circle cx="50" cy="30" r="3" fill="white" opacity="0.1"/><circle cx="70" cy="30" r="3" fill="white" opacity="0.1"/><circle cx="90" cy="30" r="3" fill="white" opacity="0.1"/><circle cx="10" cy="50" r="3" fill="white" opacity="0.1"/><circle cx="30" cy="50" r="3" fill="white" opacity="0.1"/><circle cx="50" cy="50" r="3" fill="white" opacity="0.1"/><circle cx="70" cy="50" r="3" fill="white" opacity="0.1"/><circle cx="90" cy="50" r="3" fill="white" opacity="0.1"/><circle cx="10" cy="70" r="3" fill="white" opacity="0.1"/><circle cx="30" cy="70" r="3" fill="white" opacity="0.1"/><circle cx="50" cy="70" r="3" fill="white" opacity="0.1"/><circle cx="70" cy="70" r="3" fill="white" opacity="0.1"/><circle cx="90" cy="70" r="3" fill="white" opacity="0.1"/><circle cx="10" cy="90" r="3" fill="white" opacity="0.1"/><circle cx="30" cy="90" r="3" fill="white" opacity="0.1"/><circle cx="50" cy="90" r="3" fill="white" opacity="0.1"/><circle cx="70" cy="90" r="3" fill="white" opacity="0.1"/><circle cx="90" cy="90" r="3" fill="white" opacity="0.1"/></svg>');
    }
    
    /* CTA floating decoration */
    .cta-decoration {
        position: absolute;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none"><path d="M50,95 L53,95 L55,65 L48,65 L50,95 Z" fill="%23E76F51"/><path d="M50,65 C50,65 40,45 35,30 C25,40 44,55 50,65 Z" fill="%23E76F51"/><path d="M53,65 C53,65 65,50 75,40 C80,55 60,60 53,65 Z" fill="%23FFFFFF" opacity="0.3"/><path d="M51,60 C51,60 48,40 50,25 C35,35 45,55 51,60 Z" fill="%23FFFFFF" opacity="0.3"/><path d="M52,60 C52,60 60,40 72,33 C65,20 55,45 52,60 Z" fill="%23E76F51"/></svg>');
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.2;
        z-index: 1;
    }
    
    .cta-decoration-left {
        width: 150px;
        height: 150px;
        bottom: -40px;
        left: -30px;
        transform: rotate(-10deg);
    }
    
    .cta-decoration-right {
        width: 120px;
        height: 120px;
        top: -30px;
        right: -20px;
        transform: rotate(20deg);
    }

    .cta-content {
        position: relative;
        z-index: 2;
    }

    .cta-title {
        font-size: 36px;
        margin-bottom: 15px;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .cta-tagline {
        font-family: 'Satisfy', cursive;
        font-size: 22px;
        color: var(--coral-light);
        margin-bottom: 10px;
    }

    .cta-text {
        max-width: 700px;
        margin: 0 auto 30px;
        font-size: 16px;
        opacity: 0.9;
    }

    .cta-button {
        display: inline-block;
        background: var(--white);
        color: var(--teal);
        padding: 15px 40px;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .cta-button::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--coral);
        transition: var(--transition);
        z-index: -1;
        opacity: 0;
        transform: translateY(100%);
    }

    .cta-button:hover {
        color: white;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .cta-button:hover::after {
        opacity: 1;
        transform: translateY(0);
    }

    .btn-icon {
        margin-left: 8px;
        transition: var(--transition);
    }

    .cta-button:hover .btn-icon {
        transform: translateX(5px);
    }

    /* Alert messages with improved design */
    .tropical-alert {
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 12px;
        display: flex;
        align-items: flex-start;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.5s ease-out forwards;
    }

    .tropical-alert-success {
        background: linear-gradient(135deg, rgba(46, 196, 182, 0.1) 0%, rgba(203, 243, 240, 0.3) 100%);
        border-left: 4px solid var(--teal);
    }

    .tropical-alert-error {
        background: linear-gradient(135deg, rgba(231, 111, 81, 0.1) 0%, rgba(255, 191, 105, 0.2) 100%);
        border-left: 4px solid var(--coral-dark);
    }

    .alert-icon {
        margin-right: 15px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        animation: pulse 2s infinite;
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
        font-size: 17px;
    }

    .tropical-alert-success .alert-title {
        color: var(--teal-dark);
    }

    .tropical-alert-error .alert-title {
        color: var(--coral-dark);
    }

    .alert-message {
        color: var(--ocean);
        opacity: 0.8;
        font-size: 15px;
    }

    /* Enhanced animations */
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
    
    @keyframes float {
        0% {
            transform: translateY(0) rotate(0);
        }
        50% {
            transform: translateY(-15px) rotate(5deg);
        }
        100% {
            transform: translateY(0) rotate(0);
        }
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(46, 196, 182, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(46, 196, 182, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(46, 196, 182, 0);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .tropical-header {
            padding: 70px 0 120px;
        }
        
        .tropical-header-title {
            font-size: 36px;
        }
        
        .tropical-header-subtitle {
            font-size: 20px;
        }
        
        .tropical-content {
            padding: 30px;
        }
        
        .content-title {
            font-size: 28px;
        }
        
        .floating-element {
            width: 60px;
            height: 60px;
        }
        
        .cta-title {
            font-size: 28px;
        }
    }

    @media (max-width: 767px) {
        .tropical-header {
            padding: 60px 0 110px;
        }
        
        .tropical-header-title {
            font-size: 30px;
        }
        
        .tropical-header-subtitle {
            font-size: 18px;
        }
        
        .header-badge {
            font-size: 12px;
            padding: 6px 12px;
        }
        
        .tropical-content {
            padding: 25px 20px;
        }
        
        .content-title {
            font-size: 24px;
        }
        
        .tropical-features {
            grid-template-columns: 1fr;
        }
        
        .tropical-cta {
            padding: 35px 25px;
        }
        
        .cta-title {
            font-size: 26px;
        }
        
        .floating-element {
            width: 50px;
            height: 50px;
        }
        
        .float-1 { 
            left: 5%;
        }
        
        .float-2 {
            right: 5%;
        }
        
        .cta-decoration {
            opacity: 0.15;
        }
    }

    @media (max-width: 480px) {
        .tropical-header {
            padding: 50px 0 90px;
        }
        
        .tropical-header-title {
            font-size: 24px;
        }
        
        .tropical-header-subtitle {
            font-size: 16px;
        }
        
        .cta-title {
            font-size: 22px;
        }
        
        .cta-tagline {
            font-size: 18px;
        }
        
        .float-3, .float-4 {
            display: none;
        }
    }
</style>
</head>
<body>
<?php include('includes/header.php');?>

<!-- Determine page type for dynamic content -->
<?php 
         // Get page type from URL and normalize it
    $pageType = isset($_GET['type']) ? $_GET['type'] : '';
    $pageTypeLower = strtolower(str_replace(' ', '-', $pageType)); 
    
    // For debugging - uncomment to check the actual page type value
    // echo "<!-- Debug: Page type is '$pageTypeLower' -->";
    
    // Determine header class and background image based on page type
    $headerClass = "tropical-header";
    $backgroundImage = "";
    $headerIcon = "fas fa-info-circle"; // Default icon
    
    // Match page type with more flexibility using case-insensitive substring matching
    if (stripos($pageType, "About") !== false) {
        $headerIcon = "fas fa-users";
        $backgroundImage = "https://srilankabiz.lk/wp-content/uploads/2025/05/tour.png";
    } 
    else if (stripos($pageType, "Contact") !== false) {
        $headerIcon = "fas fa-envelope";
        $backgroundImage = "https://lcc-dmc.com/wp-content/uploads/2022/05/LSR-Sri-Lanka-Colombo-scaled.jpg";
    }
    else if (stripos($pageType, "Privacy") !== false) {
        $headerIcon = "fas fa-shield-alt";
        $backgroundImage = "https://yeadimtours.com/wp-content/uploads/2020/01/%D7%A7%D7%95%D7%9C%D7%90%D7%96-%D7%A1%D7%A8%D7%99-%D7%9C%D7%A0%D7%A7%D7%94-1.jpg";
    }
    else if (stripos($pageType, "Terms") !== false) {
        $headerIcon = "fas fa-file-contract";
        $backgroundImage = "https://lp-cms-production.imgix.net/2024-07/shutterstock1492815632.jpg?auto=format,compress&q=72&w=1440&h=810&fit=crop";
    }
    else if (stripos($pageType, "FAQ") !== false || stripos($pageType, "Faq") !== false) {
        $headerIcon = "fas fa-question-circle";
        $backgroundImage = "https://media.cntraveler.com/photos/64df56c0f3e99758036e9581/16:9/w_2560%2Cc_limit/1288609237";
    }
    else {
        // Default for any other page type
        $headerIcon = "fas fa-info-circle";
        $backgroundImage = "https://media.cntravellerme.com/photos/67d18d96d34064451a14d52e/4:3/w_6696,h_5022,c_limit/SRI%20LANKA%202025%20GettyImages-1643739335.jpg";
    }
?>

<!-- Dynamic Header with Background Image - force with !important -->
<section class="<?php echo $headerClass; ?>" style="background-image: url('<?php echo $backgroundImage; ?>') !important;">
    <div class="container header-content">
        <!-- Header badge -->
        <h1 class="tropical-header-title wow fadeInDown"><?php echo $_GET['type']; ?></h1>
        <p class="tropical-header-subtitle wow fadeInUp" data-wow-delay="0.2s">Discover the beauty and heritage of Sri Lanka</p>
    </div>
    
    <!-- Dynamic floating elements -->
    <div class="floating-element float-1"></div>
    <div class="floating-element float-2"></div>
    <div class="floating-element float-3"></div>
    <div class="floating-element float-4"></div>
    
    <!-- Wave divider -->
    <div class="wave-divider"></div>
</section>

<!-- Breadcrumb Navigation -->
<div class="tropical-breadcrumbs">
    <div class="container breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="index.php" class="breadcrumb-link">
                <i class="fas fa-home breadcrumb-icon"></i> Home
            </a>
        </div>
        <div class="breadcrumb-item">
            <span class="breadcrumb-current">
                <i class="<?php echo $headerIcon; ?> breadcrumb-icon"></i> <?php echo $_GET['type']; ?>
            </span>
        </div>
    </div>
</div>

<!-- Content Container -->
<div class="container content-container">
    <div class="tropical-content">
        <!-- Background pattern -->
        <div class="content-pattern"></div>
        
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
                    <div class="alert-title">Success!</div>
                    <div class="alert-message"><?php echo htmlentities($msg); ?></div>
                </div>
            </div>
        <?php }?>
        
        <?php 
        $pagetype=$_GET['type'];
        $sql = "SELECT type,detail from tblpages where type=:pagetype";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        
        if($query->rowCount() > 0) {
            foreach($results as $result) {		
        ?>
        
        <header class="content-header">
            <h1 class="content-title wow fadeInDown"><?php echo $_GET['type']; ?></h1>
        </header>
        
        <div class="content-body">
            <?php echo $result->detail; ?>
            
            <?php if($_GET['type'] == 'About Us'): ?>
            <!-- Feature boxes for About Us page -->
            <div class="tropical-features">
                <div class="tropical-feature" data-wow-delay="0.1s">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-map-marked-alt feature-icon"></i>
                    </div>
                    <h3 class="feature-title">Expert Local Guides</h3>
                    <p class="feature-text">Our guides are passionate locals who know Sri Lanka inside out and will show you hidden gems off the beaten path.</p>
                </div>
                
                <div class="tropical-feature" data-wow-delay="0.2s">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-thumbs-up feature-icon"></i>
                    </div>
                    <h3 class="feature-title">Satisfaction Guaranteed</h3>
                    <p class="feature-text">We're committed to making your journey perfect. If you're not happy, we'll make it right.</p>
                </div>
                
                <div class="tropical-feature" data-wow-delay="0.3s">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-shield-alt feature-icon"></i>
                    </div>
                    <h3 class="feature-title">Safe & Secure Travel</h3>
                    <p class="feature-text">Your safety is our priority. We follow all health and safety guidelines for worry-free travel.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <?php 
            }
        }
        ?>
        
        <!-- Call to Action Section -->
        <div class="tropical-cta">
            <div class="cta-overlay"></div>
            <div class="cta-decoration cta-decoration-left"></div>
            <div class="cta-decoration cta-decoration-right"></div>
            <div class="cta-content">
                <p class="cta-tagline">Your Sri Lankan adventure awaits</p>
                <h2 class="cta-title">Ready to Begin Your Journey?</h2>
                <p class="cta-text">Contact our travel specialists today and start planning your perfect Sri Lankan experience with Pearl Heritage Travels.</p>
                <a href="enquiry.php" class="cta-button">Get in Touch <i class="fas fa-arrow-right btn-icon"></i></a>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
<?php include('includes/signup.php');?>			
<?php include('includes/signin.php');?>			
<?php include('includes/write-us.php');?>

<script>
    // Create folder for background images if it doesn't exist
    $(document).ready(function() {
        // Feature animation when they come into view
        function animateOnScroll() {
            $('.tropical-feature, .cta-button').each(function() {
                const elementTop = $(this).offset().top;
                const elementVisible = 150;
                const windowTop = $(window).scrollTop();
                const windowHeight = $(window).height();
                
                if (elementTop < (windowTop + windowHeight - elementVisible)) {
                    $(this).addClass('visible');
                }
            });
        }
        
        // Trigger animations
        setTimeout(function() {
            $(window).trigger('scroll');
            animateOnScroll();
        }, 500);
        
        $(window).scroll(animateOnScroll);
        
        // Make external links open in a new tab
        $('.content-body a').each(function() {
            const a = new RegExp('/' + window.location.host + '/');
            if(!a.test(this.href)) {
                $(this).attr("target", "_blank").attr("rel", "noopener noreferrer");
            }
        });
        
        // Enhanced parallax effect
        const parallaxItems = [
            { selector: '.floating-element', factor: 0.03 },
            { selector: '.palm-decoration', factor: 0.05 },
            { selector: '.cta-decoration', factor: 0.04 }
        ];
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset;
            
            parallaxItems.forEach(item => {
                document.querySelectorAll(item.selector).forEach((element, index) => {
                    const direction = index % 2 === 0 ? 1 : -1;
                    const yOffset = scrollTop * item.factor * direction;
                    
                    if (element.classList.contains('palm-left') || element.classList.contains('cta-decoration-left')) {
                        element.style.transform = `translateY(${yOffset}px) rotate(-10deg)`;
                    } else if (element.classList.contains('palm-right') || element.classList.contains('cta-decoration-right')) {
                        element.style.transform = `translateY(${yOffset}px) rotate(10deg) scaleX(-1)`;
                    } else if (element.classList.contains('float-1') || element.classList.contains('float-3')) {
                        // Keep the floating animation but add parallax
                        // We don't modify the transform directly to preserve the float animation
                        element.style.top = `calc(${element.style.top || '0px'} + ${yOffset}px)`;
                    } else if (element.classList.contains('float-2') || element.classList.contains('float-4')) {
                        element.style.top = `calc(${element.style.top || '0px'} + ${yOffset}px)`;
                    }
                });
            });
        });
        
        // Image lazy loading and zoom effect
        $('.content-body img').each(function() {
            $(this).attr('loading', 'lazy');
            
            $(this).on('click', function() {
                $(this).css('transition', 'transform 0.3s ease');
                if ($(this).hasClass('zoomed')) {
                    $(this).removeClass('zoomed').css('transform', 'scale(1)');
                } else {
                    $(this).addClass('zoomed').css('transform', 'scale(1.05)');
                }
            });
        });
    });
</script>
</body>
</html>