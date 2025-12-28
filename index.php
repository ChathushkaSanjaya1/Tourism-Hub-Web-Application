<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>PEARL HERITAGE TRAVELS | Discover Sri Lanka's Beauty</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Discover amazing travel packages with Pearl Heritage Travels - Your gateway to explore Sri Lanka's natural beauty and cultural heritage">
<meta name="keywords" content="sri lanka tours, travel packages, heritage travel, vacation packages">

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Scripts -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="js/wow.min.js"></script>

<style>
    /* Base Styles */
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
        line-height: 1.6;
        overflow-x: hidden;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-weight: 600;
    }
    
    .accent-color {
        color: #1A6B54;
    }
    
    .btn-primary {
        background: #1A6B54;
        border: none;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(26, 107, 84, 0.2);
    }
    
    .btn-primary:hover {
        background: #0F4A3A;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(26, 107, 84, 0.3);
    }
    
    .btn-secondary {
        background: #F9A826;
        color: #fff;
        border: none;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(249, 168, 38, 0.2);
    }
    
    .btn-secondary:hover {
        background: #e69615;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(249, 168, 38, 0.3);
    }
    
    .btn-outline {
        background: transparent;
        color: #fff;
        border: 2px solid #fff;
        padding: 11px 28px;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .btn-outline:hover {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        transform: translateY(-2px);
    }
    
    .section-padding {
        padding: 100px 0;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        padding-bottom: 20px;
    }
    
    .section-title h2 {
        font-size: 36px;
        margin-bottom: 15px;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 70px;
        height: 3px;
        background: #F9A826;
    }
    
    /* Hero Section */
    .hero-slider {
        position: relative;
        overflow: hidden;
        height: 100vh;
        min-height: 600px;
    }

    .text-warning { 
  color: #F9A826; 
}
    
    .hero-slide {
        height: 100vh;
        min-height: 600px;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
    }
    
    .hero-slide:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6));
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        color: #fff;
        padding: 0 15px;
    }
    
    .hero-content h1 {
        font-size: 52px;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    
    .hero-content p {
        font-size: 18px;
        margin-bottom: 30px;
        text-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }
    
    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    
    /* Modern Package Card Design */
.packages-section {
    background-color: #f8f9fa;
    position: relative;
    padding: 80px 0;
}

.packages-section:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:linear-gradient(rgba(255, 255, 255, 0.89), rgba(253, 253, 253, 0.89)), url("https://img.freepik.com/premium-vector/black-white-abstract-geometric-minimalist-aesthetic-pattern-background_525160-521.jpg");
}

.package-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    height: 100%;
    margin-bottom: 30px;
    position: relative;
    border: 1px solid rgba(0, 0, 0, 0.03);
    top: 0;
}

.package-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    border-color: transparent;
}

.package-img {
    height: 240px;
    position: relative;
    overflow: hidden;
}

.package-img::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.4), transparent);
    opacity: 0;
    transition: all 0.4s;
}

.package-card:hover .package-img::after {
    opacity: 1;
}

.package-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.package-card:hover .package-img img {
    transform: scale(1.08);
}

.package-tag {
    position: absolute;
    top: 18px;
    right: -4px;
    background: #F9A826;
    color: #fff;
    padding: 8px 18px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    border-radius: 4px 0 0 4px;
    box-shadow: -2px 2px 8px rgba(255, 238, 0, 0.3);
    z-index: 2;
}

.package-tag::before {
    content: '';
    position: absolute;
    right: 0;
    bottom: -8px;
    border-top: 8px solid #e08c0b;
    border-right: 8px solid transparent;
}

.package-content {
    padding: 28px 25px 25px;
    position: relative;
}

.package-content h4 {
    font-size: 20px;
    margin-top: 0;
    margin-bottom: 14px;
    line-height: 1.4;
    font-weight: 600;
    color: #333;
    transition: color 0.3s;
}

.package-card:hover .package-content h4 {
    color: #1A6B54;
}

.package-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 18px;
    font-size: 13px;
}

.package-meta span {
    display: flex;
    align-items: center;
    color: #666;
    background-color: #f8f9fa;
    border-radius: 50px;
    padding: 6px 12px;
    transition: all 0.3s;
}

.package-card:hover .package-meta span {
    background-color: #e8f2ef;
    color: #1A6B54;
}

.package-meta i {
    color: #1A6B54;
    margin-right: 6px;
    font-size: 14px;
}

.package-card p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
    font-size: 14px;
}

.package-price {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 22px;
    padding-top: 18px;
    border-top: 1px solid #f0f0f0;
}

.price {
    font-size: 24px;
    font-weight: 700;
    color: #1A6B54;
    display: flex;
    align-items: baseline;
}

.price span {
    font-size: 13px;
    color: #777;
    font-weight: 400;
    margin-left: 4px;
}

.btn-view {
    background: #1A6B54;
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s;
    box-shadow: 0 4px 12px rgba(26, 107, 84, 0.15);
}

.btn-view i {
    margin-left: 6px;
    font-size: 12px;
    transition: transform 0.3s;
    opacity: 0;
    width: 0;
    overflow: hidden;
}

.package-card:hover .btn-view i {
    opacity: 1;
    width: 12px;
    transform: translateX(3px);
}

.btn-view:hover {
    background: #0F4A3A;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(26, 107, 84, 0.25);
}

@media (max-width: 767px) {
    .package-img {
        height: 200px;
    }
    
    .package-content {
        padding: 22px 20px 20px;
    }
    
    .price {
        font-size: 20px;
    }
    
    .btn-view {
        padding: 8px 16px;
        font-size: 13px;
    }
}

    /* Features Section */
    .features-section {
        background: #fff;
    }
    
    .feature-box {
        background: #ffffff;
        border-radius: 15px;
        padding: 35px 25px;
        text-align: center;
        transition: all 0.3s;
        position: relative;
        margin-bottom: 30px;
        border: 1px solid #eee;
    }
    
    .feature-box:hover {
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        background: rgba(26, 107, 84, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        transition: all 0.3s;
    }
    
    .feature-box:hover .feature-icon {
        background: #1A6B54;
    }
    
    .feature-icon i {
        font-size: 32px;
        color: #1A6B54;
        transition: all 0.3s;
    }
    
    .feature-box:hover .feature-icon i {
        color: #fff;
    }
    
    .feature-box h3 {
        font-size: 20px;
        margin-bottom: 15px;
    }
    
    .feature-box p {
        color: #777;
        margin-bottom: 0;
    }

    /* Destinations Section */
    .destinations-section {
        background-color: #f9f9f9;
    }
    
    .destination-card {
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
        height: 300px;
    }
    
    .destination-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s;
    }
    
    .destination-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 25px 20px;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        color: #fff;
    }
    
    .destination-overlay h4 {
        margin-bottom: 5px;
    }
    
    .destination-overlay p {
        margin-bottom: 0;
        font-size: 14px;
    }
    
    .destination-card:hover img {
        transform: scale(1.1);
    }

    /* Testimonials Section */
    .testimonial-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        margin: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        position: relative;
    }
    
    .testimonial-card:before {
        content: '\f10d';
        font-family: 'FontAwesome';
        position: absolute;
        top: 15px;
        left: 20px;
        font-size: 24px;
        color: rgba(26, 107, 84, 0.1);
    }
    
    .testimonial-content {
        padding-top: 15px;
        font-style: italic;
        color: #555;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
        margin-top: 20px;
    }
    
    .author-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 15px;
    }
    
    .author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .author-info h5 {
        margin: 0 0 5px;
    }
    
    .author-info p {
        margin: 0;
        font-size: 12px;
        color: #777;
    }

    /* Stats Counter */
    .stats-section {
        background: url('https://plus.unsplash.com/premium_photo-1670591909028-1ea631e317d7?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8dHJhdmVsJTIwd2FsbHBhcGVyfGVufDB8fDB8fHww') no-repeat center/cover;
        position: relative;
        color: #fff;
    }
    
    .stats-section:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(26, 107, 84, 0.85), rgba(15, 74, 58, 0.9));
    }
    
    .stats-container {
        position: relative;
        z-index: 2;
    }
    
    .stat-item {
        text-align: center;
        padding: 30px 15px;
    }
    
    .stat-number {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .stat-title {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
    }
    
    /* CTA Section */
    .cta-section {
        background: linear-gradient(rgba(29, 29, 29, 0.7), rgba(27, 27, 27, 0.7)), url('https://images.etihadholidays.com/background-lg/www.etihadholidays.co.uk/assets/Sri_Lanka/Elephant_Bant-min.jpg') no-repeat center/cover;
        color: #fff;
        text-align: center;
    }
    
    .cta-content {
        max-width: 700px;
        margin: 0 auto;
    }
    
    .cta-content h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }
    
    .cta-content p {
        margin-bottom: 30px;
        font-size: 18px;
    }

    /* Blog Section */
    .blog-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        margin-bottom: 30px;
    }
    
    .blog-img {
        height: 200px;
        overflow: hidden;
    }
    
    .blog-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s;
    }
    
    .blog-card:hover .blog-img img {
        transform: scale(1.1);
    }
    
    .blog-content {
        padding: 25px;
    }
    
    .blog-meta {
        font-size: 12px;
        color: #777;
        margin-bottom: 10px;
    }
    
    .blog-title {
        font-size: 18px;
        margin-bottom: 15px;
        line-height: 1.4;
    }
    
    .blog-excerpt {
        color: #666;
        margin-bottom: 15px;
    }
    
    .read-more {
        color: #1A6B54;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
    }
    
    .read-more i {
        margin-left: 5px;
        transition: all 0.3s;
    }
    
    .read-more:hover {
        color: #0F4A3A;
        text-decoration: none;
    }
    
    .read-more:hover i {
        transform: translateX(3px);
    }

    /* Chatbot Styles */
    .chatbot-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
    }
    
    .chat-trigger {
        width: 60px;
        height: 60px;
        background: #1A6B54;
        border-radius: 50%;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .chat-trigger:hover {
        background: #0F4A3A;
        transform: scale(1.05);
    }
    
    .chat-trigger i {
        color: #fff;
        font-size: 24px;
    }
    
    .chatbox {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 350px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        display: none;
        transition: all 0.3s;
        opacity: 0;
        transform: translateY(20px) scale(0.9);
    }
    
    .chatbox.active {
        display: block;
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    .chat-header {
        background: #1A6B54;
        color: #fff;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .chat-header h4 {
        margin: 0;
        font-size: 16px;
    }
    
    .close-chat {
        color: #fff;
        cursor: pointer;
        font-size: 18px;
    }
    
    .chat-messages {
        padding: 20px;
        height: 300px;
        overflow-y: auto;
    }
    
    .chat-input {
        display: flex;
        border-top: 1px solid #eee;
        padding: 10px;
    }
    
    .chat-input input {
        flex: 1;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 30px;
        outline: none;
    }
    
    .chat-input button {
        background: #1A6B54;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-left: 10px;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .chat-input button:hover {
        background: #0F4A3A;
    }
    
    .message {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
    }
    
    .message.user-message {
        align-items: flex-end;
    }
    
    .message.bot-message {
        align-items: flex-start;
    }
    
    .message-content {
        max-width: 70%;
        padding: 10px 15px;
        border-radius: 15px;
        font-size: 14px;
    }
    
    .user-message .message-content {
        background: #1A6B54;
        color: #fff;
        border-bottom-right-radius: 5px;
    }
    
    .bot-message .message-content {
        background: #f1f1f1;
        color: #333;
        border-bottom-left-radius: 5px;
    }
    
    .message-time {
        font-size: 10px;
        margin-top: 5px;
        color: #888;
    }
    
    .typing-indicator {
        display: flex;
        padding: 10px 15px;
        background: #f1f1f1;
        border-radius: 15px;
        border-bottom-left-radius: 5px;
        margin-bottom: 15px;
        align-self: flex-start;
    }
    
    .typing-dot {
        width: 8px;
        height: 8px;
        background: #888;
        border-radius: 50%;
        margin: 0 2px;
        animation: typing 1.5s infinite;
    }
    
    .typing-dot:nth-child(2) {
        animation-delay: 0.5s;
    }
    
    .typing-dot:nth-child(3) {
        animation-delay: 1s;
    }
    
    @keyframes typing {
        0% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
        100% { transform: translateY(0); }
    }
    
    /* Responsive */
    @media (max-width: 991px) {
        .hero-content h1 {
            font-size: 42px;
        }
        
        .section-padding {
            padding: 70px 0;
        }
        
        .hero-search-box {
            margin-top: 40px;
        }
    }
    
    @media (max-width: 767px) {
        .hero-content h1 {
            font-size: 32px;
        }
        
        .hero-content p {
            font-size: 16px;
        }
        
        .section-padding {
            padding: 50px 0;
        }
        
        .section-title h2 {
            font-size: 28px;
        }
        
        .chatbox {
            width: 300px;
        }
    }
</style>

<script>
    new WOW().init();
</script>
</head>
<body>
<?php include('includes/header.php');?>

<!-- Hero Section with Slider -->
<div class="hero-slider owl-carousel">
    <div class="hero-slide" style="background-image: url('https://www.holidify.com/images/bgImages/YALA-NATIONAL-PARK.jpg');">
        <div class="container">
            <div class="hero-content animate__animated animate__fadeIn animate__delay-0.5s">
                <h1 class="animate__animated animate__fadeInDown">Discover Sri Lanka's <span class="text-warning">Hidden Treasures</span></h1>
                <p class="animate__animated animate__fadeInUp animate__delay-1s">Experience the world's most breathtaking locations with Pearl Heritage Travels</p>
                <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-1.5s">
                    <a href="package-list.php" class="btn btn-secondary animate__animated animate__zoomIn animate__delay-2s">Explore Packages</a>
                    <a href="#destinations" class="btn btn-outline animate__animated animate__zoomIn animate__delay-2.2s">Popular Destinations</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="hero-slide" style="background-image: url('https://facts.net/wp-content/uploads/2023/07/16-facts-about-kandy-esala-perahera-1690662003.jpg');">
        <div class="container">
            <div class="hero-content animate__animated animate__fadeIn">
                <h1 class="animate__animated animate__slideInLeft">Experience <span class="text-warning">Cultural Wonders</span></h1>
                <p class="animate__animated animate__slideInRight animate__delay-0.5s">Immerse yourself in Sri Lanka's rich heritage and ancient traditions</p>
                <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-1s">
                    <a href="package-list.php?type=Cultural" class="btn btn-secondary animate__animated animate__bounceIn animate__delay-1.5s">Cultural Tours</a>
                    <a href="#destinations" class="btn btn-outline animate__animated animate__bounceIn animate__delay-1.7s">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1552055568-e9943cd2a08f?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c3JpJTIwbGFua2ElMjBiZWFjaHxlbnwwfHwwfHx8MA%3D%3D');">
        <div class="container">
            <div class="hero-content animate__animated animate__fadeIn">
                <h1 class="animate__animated animate__slideInDown">Pristine <span class="text-warning">Beach Getaways</span></h1>
                <p class="animate__animated animate__slideInUp animate__delay-0.5s">Relax on the most beautiful beaches with crystal clear waters</p>
                <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-1s">
                    <a href="package-list.php?type=Beach" class="btn btn-secondary animate__animated animate__flipInX animate__delay-1.5s">Beach Packages</a>
                    <a href="#destinations" class="btn btn-outline animate__animated animate__flipInX animate__delay-1.7s">View Beaches</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Packages -->
<section class="packages-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title wow fadeInUp">
                    <h2>Popular Tour Packages</h2>
                    <p>Discover our hand-picked experiences for unforgettable journeys</p>
                </div>
            </div>
        </div>
        
        <div class="row">
        <?php 
        $sql = "SELECT * from tbltourpackages order by rand() limit 4";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0) {
            foreach($results as $result) { 
        ?>
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.<?php echo $counter = isset($counter) ? $counter + 2 : 2; ?>s">
                <div class="package-card">
                    <div class="package-img">
                        <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" alt="<?php echo htmlentities($result->PackageName);?>">
                        <div class="package-tag"><?php echo htmlentities($result->PackageType);?></div>
                    </div>
                    <div class="package-content">
                        <h4><?php echo htmlentities($result->PackageName);?></h4>
                        <div class="package-meta">
                            <span><i class="fa fa-map-marker"></i> <?php echo htmlentities($result->PackageLocation);?></span>
                            <span><i class="fa fa-clock-o"></i> <?php echo htmlentities($result->PackageFetures);?></span>
                        </div>
                        <p><?php echo substr(htmlentities($result->PackageDetails), 0, 75);?>...</p>
                        <div class="package-price">
                            <div class="price">Rs.<?php echo htmlentities($result->PackagePrice);?> <span>/ person</span></div>
                            <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="btn-view">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }} ?>
        </div>
        
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="package-list.php" class="btn btn-primary wow fadeInUp" data-wow-delay="0.5s">View All Packages</a>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Section -->
<section id="destinations" class="destinations-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title wow fadeInUp">
                    <h2>Top Destinations</h2>
                    <p>Explore Sri Lanka's most captivating locations</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 col-sm-6 wow fadeInUp">
                <div class="destination-card">
                    <img src="https://nerdnomads.com/wp-content/uploads/2014/03/DSC67702.jpg" alt="Sigiriya">
                    <div class="destination-overlay">
                        <h4>Sigiriya</h4>
                        <p>Ancient rock fortress with spectacular views</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="destination-card">
                    <img src="https://cdn.tatlerasia.com/tatlerasia/i/2025/01/22093254-yashowdays-1707021173-3295054881364627685-63061201054_cover_1280x1600.jpg" alt="Kandy">
                    <div class="destination-overlay">
                        <h4>Kandy</h4>
                        <p>Cultural capital with sacred Temple of the Tooth</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="destination-card">
                    <img src="https://d2rdhxfof4qmbb.cloudfront.net/wp-content/uploads/20180221131329/iStock-641293560-1024x575.jpg" alt="Galle">
                    <div class="destination-overlay">
                        <h4>Galle</h4>
                        <p>Colonial-era fort city by the Indian Ocean</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8 col-sm-6 wow fadeInUp">
                <div class="destination-card">
                    <img src="https://tripjive.com/wp-content/uploads/2024/10/nuwara-eliya-travel-guide-3-1024x585.jpg" alt="Nuwara Eliya">
                    <div class="destination-overlay">
                        <h4>Nuwara Eliya</h4>
                        <p>Tea country with cool climate and British colonial architecture</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="destination-card">
                    <img src="https://www.travelmapsrilanka.com/destinations/destinationimages/unawatuna-beach-in-sri-lanka.webp" alt="Unawatuna Beach">
                    <div class="destination-overlay">
                        <h4>Unawatuna Beach</h4>
                        <p>Palm-fringed beach with clear turquoise waters</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title wow fadeInUp">
                    <h2>Why Choose Us</h2>
                    <p>We're committed to making your travel dreams come true</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 wow fadeInUp">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-headphones"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>At every stage of your journey—before you depart, while traveling, and even after you return, we are dedicated to providing reliable assistance.</p>
                </div>
            </div>
            
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h3>Expert Local Guides</h3>
                    <p>Our knowledgeable guides are locals who bring the destinations to life with authentic stories and insider access to hidden gems.</p>
                </div>
            </div>
            
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <h3>Customized Packages</h3>
                    <p>We create personalized itineraries tailored to your interests, ensuring every journey is unique and exceeds your expectations.</p>
                </div>
            </div>
            
            <div class="col-md-4 wow fadeInUp">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <h3>Secure Payments</h3>
                    <p>Your financial information is protected with advanced security measures, giving you peace of mind when booking with us.</p>
                </div>
            </div>
            
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3>Sustainable Travel</h3>
                    <p>We're committed to responsible tourism practices that respect local cultures and protect the natural environment for future generations.</p>
                </div>
            </div>
            
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-star"></i>
                    </div>
                    <h3>Best Value</h3>
                    <p>Enjoy premium experiences at competitive prices with transparent pricing and no hidden fees throughout your journey.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Counter Section -->
<section class="stats-section section-padding">
    <div class="container stats-container">
        <div class="row">
            <div class="col-md-3 col-sm-6 wow fadeInUp">
                <div class="stat-item">
                    <div class="stat-number" data-count="7500">0</div>
                    <div class="stat-title">Happy Travelers</div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="stat-item">
                    <div class="stat-number" data-count="150">0</div>
                    <div class="stat-title">Destinations</div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="stat-item">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-title">Tours Completed</div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="stat-item">
                    <div class="stat-number" data-count="5">0</div>
                    <div class="stat-title">Years Experience</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title wow fadeInUp">
                    <h2>What Our Customers Say</h2>
                    <p>Read about experiences from our satisfied travelers</p>
                </div>
            </div>
        </div>
        
        <div class="testimonials-slider owl-carousel">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    The trip to Sigiriya was absolutely amazing. Everything was well organized and the accommodations were superb. Our guide was knowledgeable and friendly. Can't wait to book again!
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah Johnson">
                    </div>
                    <div class="author-info">
                        <h5>Sarah Johnson</h5>
                        <p>Cultural Explorer</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    Our family vacation to the beaches of Sri Lanka was the best experience ever. The guides were knowledgeable and friendly. My kids loved the activities and the beautiful scenery. Highly recommended!
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="https://randomuser.me/api/portraits/men/53.jpg" alt="Michael Brown">
                    </div>
                    <div class="author-info">
                        <h5>Michael Brown</h5>
                        <p>Family Traveler</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    The customer service was outstanding. When our flight got delayed, they quickly arranged alternative transportation and adjusted our itinerary without any extra fees. Simply excellent!
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="Lisa Wong">
                    </div>
                    <div class="author-info">
                        <h5>Lisa Wong</h5>
                        <p>Adventure Seeker</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    As a solo traveler, I felt safe and welcomed throughout my journey. The itinerary was perfect, allowing me to see all the major attractions while still having personal time to explore.
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="https://randomuser.me/api/portraits/men/34.jpg" alt="David Thompson">
                    </div>
                    <div class="author-info">
                        <h5>David Thompson</h5>
                        <p>Solo Traveler</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="cta-content wow fadeInUp">
            <h2>Ready for Your Next Adventure?</h2>
            <p>Book your dream vacation today and embark on an unforgettable journey through Sri Lanka's treasures.</p>
            <a href="package-list.php" class="btn btn-secondary btn-lg">Explore Packages</a>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title wow fadeInUp">
                    <h2>Travel Inspiration</h2>
                    <p>Read our latest travel stories and tips</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 wow fadeInUp">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="https://www.chamilatours.com/wp-content/uploads/2022/10/The-Best-Places-to-Visit-in-Sri-Lanka.jpg" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">May 20, 2025 • 5 min read</div>
                        <h4 class="blog-title">Top 10 Must-Visit Places in Sri Lanka</h4>
                        <p class="blog-excerpt">Discover the most breathtaking destinations across this beautiful island nation, from ancient ruins to pristine beaches.</p>
                        <a href="#" class="read-more">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="https://travelseewrite.com/wp-content/uploads/2023/08/sl-food.jpeg" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">May 15, 2025 • 4 min read</div>
                        <h4 class="blog-title">A Culinary Journey Through Sri Lanka</h4>
                        <p class="blog-excerpt">Explore the rich flavors and unique dishes that make Sri Lankan cuisine one of the world's most exciting food scenes.</p>
                        <a href="#" class="read-more">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="https://theportuguesetraveler.com/wp-content/uploads/2024/11/nine-arches-bridge-train-sri-lanka-24.jpg" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">May 10, 2025 • 6 min read</div>
                        <h4 class="blog-title">The Best Most Time to Visit Sri Lanka</h4>
                        <p class="blog-excerpt">Plan your perfect trip with our expert guide to Sri Lanka's weather patterns, vibrant festivals, and stunning seasonal highlights.</p>
                        <a href="#" class="read-more">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Chatbot -->
<div class="chatbot-container">
    <div class="chat-trigger">
        <i class="fa fa-comments"></i>
    </div>
    <div class="chatbox">
        <div class="chat-header">
            <h4><i class="fa fa-robot"></i> Pearl Travel Assistant</h4>
            <div class="close-chat"><i class="fa fa-times"></i></div>
        </div>
        <div class="chat-messages">
            <!-- Messages will be appended here -->
        </div>
        <div class="chat-input">
            <input type="text" placeholder="Ask me anything..." id="chat-input-field">
            <button type="button" id="send-message"><i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>

<!-- Other includes -->
<?php include('includes/signup.php');?>			
<?php include('includes/signin.php');?>			
<?php include('includes/write-us.php');?>

<!-- Scripts -->
<script>
$(document).ready(function() {
    // Hero Slider
    $('.hero-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 7000,
        smartSpeed: 1000,
        animateOut: 'fadeOut',
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                nav: false
            },
            768: {
                nav: true
            }
        }
    });
    
    // Testimonials Slider
    $('.testimonials-slider').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
    
    // Stats Counter
    function startCounter() {
        $('.stat-number').each(function() {
            var $this = $(this);
            var countTo = $this.attr('data-count');
            
            $({ countNum: $this.text() }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }
    
    // Start counter when element is in viewport
    $(window).scroll(function() {
        var statsSection = $('.stats-section');
        if($(window).scrollTop() + $(window).height() > statsSection.offset().top) {
            startCounter();
            $(window).off('scroll');
        }
    });
    
    // Chatbot functionality
    const chatTrigger = $('.chat-trigger');
    const chatbox = $('.chatbox');
    const closeChat = $('.close-chat');
    const chatMessages = $('.chat-messages');
    const chatInputField = $('#chat-input-field');
    const sendMessageBtn = $('#send-message');
    
    // Predefined responses
    const botResponses = {
        greeting: ["Hello! Welcome to Pearl Heritage Travels. How can I assist you today?", "Hi there! I'm your travel assistant. What can I help you with?"],
        packages: ["We offer a variety of packages including cultural tours, beach getaways, adventure trips, and family vacations. You can view them all at our 'Packages' section.", "Our most popular packages include the Cultural Triangle Tour, Beach Paradise Escape, and Adventure Trek. Would you like more information on any of these?"],
        booking: ["To book a tour, you can browse our packages, select one that interests you, and follow the booking process online. Alternatively, you can contact our customer service at +94 76 832 9877.", "Booking is easy! Just select a package, choose your dates, and complete the payment process. If you need assistance, our team is available 24/7."],
        payment: ["We accept all major credit cards, PayPal, and bank transfers. All payments are secured with industry-standard encryption.", "Our payment options include credit/debit cards, PayPal, and bank transfers. We ensure your payment details are always secure."],
        cancellation: ["Our cancellation policy varies by package. Generally, full refunds are available for cancellations made 30 days before departure. Please check the specific terms for your chosen package.", "You can cancel your booking with a full refund up to 30 days before your trip. For cancellations closer to the departure date, partial refunds may apply."],
        contact: ["You can reach our customer service team at +94 76 832 9877 or email us at info@pearlheritage.com. We're available 24/7 to assist you.", "Need to talk to us? Call +94 76 832 9877 or email info@pearlheritage.com anytime."],
        destinations: ["Sri Lanka offers a variety of destinations including Colombo, Kandy, Galle, Sigiriya, and beautiful beaches like Unawatuna and Mirissa. Each has its unique charm and attractions.", "Popular destinations in Sri Lanka include the ancient city of Anuradhapura, the hill country of Nuwara Eliya, the sacred city of Kandy, and the colonial fort of Galle."],
        weather: ["Sri Lanka has a tropical climate with temperatures ranging between 26-30°C (79-86°F) throughout the year. The best time to visit depends on which part of the island you plan to explore.", "The best time to visit Sri Lanka's west and south coasts is from November to April, while the east coast is best from May to September."],
        default: ["I'm not sure I understand. Could you please rephrase your question?", "I'm still learning! Could you ask that in a different way?", "Sorry, I don't have information about that yet. Would you like to ask about our packages, booking process, or destinations?"]
    };
    
    // Initialize chatbot with welcome message
    function initChat() {
        setTimeout(() => {
            addBotMessage(getRandomResponse('greeting'));
        }, 500);
    }
    
    // Get random response from category
    function getRandomResponse(category) {
        const responses = botResponses[category] || botResponses.default;
        return responses[Math.floor(Math.random() * responses.length)];
    }
    
    // Add user message to chat
    function addUserMessage(message) {
        const time = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
        const messageHtml = `
            <div class="message user-message">
                <div class="message-content">${message}</div>
                <div class="message-time">${time}</div>
            </div>
        `;
        chatMessages.append(messageHtml);
        scrollToBottom();
    }
    
    // Add bot message to chat
    function addBotMessage(message) {
        // Add typing indicator
        const typingHtml = `
            <div class="typing-indicator" id="typing-indicator">
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
            </div>
        `;
        chatMessages.append(typingHtml);
        scrollToBottom();
        
        // Simulate typing and then display message
        setTimeout(() => {
            $('#typing-indicator').remove();
            const time = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            const messageHtml = `
                <div class="message bot-message">
                    <div class="message-content">${message}</div>
                    <div class="message-time">${time}</div>
                </div>
            `;
            chatMessages.append(messageHtml);
            scrollToBottom();
        }, 1500);
    }
    
    // Scroll chat to bottom
    function scrollToBottom() {
        chatMessages.scrollTop(chatMessages[0].scrollHeight);
    }
    
    // Process user message and generate response
    function processMessage(message) {
        message = message.toLowerCase();
        
        if (message.includes('hello') || message.includes('hi') || message.includes('hey') || message.includes('greetings')) {
            return getRandomResponse('greeting');
        } else if (message.includes('package') || message.includes('tour') || message.includes('trip')) {
            return getRandomResponse('packages');
        } else if (message.includes('book') || message.includes('reserve')) {
            return getRandomResponse('booking');
        } else if (message.includes('pay') || message.includes('payment') || message.includes('credit card')) {
            return getRandomResponse('payment');
        } else if (message.includes('cancel') || message.includes('refund')) {
            return getRandomResponse('cancellation');
        } else if (message.includes('contact') || message.includes('call') || message.includes('phone') || message.includes('email')) {
            return getRandomResponse('contact');
        } else if (message.includes('destination') || message.includes('place') || message.includes('location') || message.includes('where')) {
            return getRandomResponse('destinations');
        } else if (message.includes('weather') || message.includes('climate') || message.includes('temperature') || message.includes('when') || message.includes('best time')) {
            return getRandomResponse('weather');
        } else {
            return getRandomResponse('default');
        }
    }
    
    // Toggle chatbox
    chatTrigger.on('click', function() {
        chatbox.toggleClass('active');
        if (chatbox.hasClass('active') && chatMessages.children().length === 0) {
            initChat();
        }
    });
    
    // Close chatbox
    closeChat.on('click', function() {
        chatbox.removeClass('active');
    });
    
    // Send message on button click
    sendMessageBtn.on('click', function() {
        sendMessage();
    });
    
    // Send message on Enter key
    chatInputField.on('keypress', function(e) {
        if (e.which === 13) {
            sendMessage();
        }
    });
    
    // Send message function
    function sendMessage() {
        const message = chatInputField.val().trim();
        if (message !== '') {
            addUserMessage(message);
            chatInputField.val('');
            
            // Process and respond
            const response = processMessage(message);
            addBotMessage(response);
        }
    }
});
</script>
</body>
</html>