<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Booking Confirmation | Pearl Heritage Travels</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
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
<style>
    .thank-you-section {
        min-height: 80vh;
        background-color: #f0f4f8;
        background-image: url('https://images.unsplash.com/photo-1526778548025-fa2f459cd5ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-blend-mode: overlay;
        padding: 60px 0;
        position: relative;
    }
    
    .confirmation-card {
        max-width: 900px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
    }
    
    .card-header {
        text-align: center;
        padding: 40px 30px 30px;
        position: relative;
        background: #fff;
        border-bottom: 1px solid #eaeef3;
    }
    
    .success-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: #ebf7ee;
        color: #34c759;
        border-radius: 50%;
        margin-bottom: 20px;
        font-size: 32px;
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .confirmation-title {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        color: #2d3748;
        margin: 15px 0 10px;
    }
    
    .confirmation-subtitle {
        color: #718096;
        font-size: 18px;
        max-width: 600px;
        margin: 0 auto 20px;
    }
    
    .booking-reference-wrapper {
        margin: 20px 0 0;
    }
    
    .booking-reference {
        display: inline-block;
        background: #f7fafc;
        padding: 10px 20px;
        border: 1px dashed #cbd5e0;
        border-radius: 8px;
        font-family: 'Courier New', monospace;
        letter-spacing: 1px;
        font-size: 18px;
        color: #4a5568;
        font-weight: 600;
    }
    
    .ticket-stub {
        position: relative;
        padding: 40px;
        background: #fff;
    }
    
    .stub-edge {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 16px;
        background-image: 
            linear-gradient(90deg, 
                transparent 0%, transparent 50%, #fff 50%, #fff 100%),
            linear-gradient(90deg, #f0f4f8 50%, transparent 50%);
        background-size: 16px 16px, 16px 16px;
        background-position: 0 0;
    }
    
    .journey-route {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 0;
        padding: 0 20px;
    }
    
    .route-point {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 0 0 auto;
        position: relative;
        z-index: 1;
    }
    
    .route-icon {
        width: 50px;
        height: 50px;
        background: #fff;
        border: 2px solid #3182ce;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #3182ce;
        font-size: 20px;
        margin-bottom: 10px;
    }
    
    .point-label {
        font-weight: 600;
        color: #2d3748;
        font-size: 16px;
        text-align: center;
    }
    
    .route-line {
        flex: 1;
        height: 2px;
        background: #3182ce;
        margin: 0 10px;
        position: relative;
    }
    
    .route-line:before {
        content: '';
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #3182ce;
        top: -2px;
        left: 20%;
    }
    
    .route-line:after {
        content: '';
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #3182ce;
        top: -2px;
        right: 20%;
    }
    
    .route-icon .active {
        background: #3182ce;
        color: white;
    }
    
    .details-grid {
        margin-top: 30px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .detail-block {
        padding: 20px;
        border-radius: 8px;
        background: #f7fafc;
    }
    
    .detail-block h4 {
        font-size: 16px;
        font-weight: 600;
        color: #4a5568;
        margin: 0 0 10px;
    }
    
    .detail-block p {
        margin: 0;
        color: #718096;
        line-height: 1.6;
    }
    
    .confirmation-message {
        margin: 30px 0;
        padding: 20px;
        background: #f0f9ff;
        border-left: 4px solid #3182ce;
        border-radius: 4px;
        color: #2c5282;
    }
    
    .action-row {
        margin-top: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }
    
    .btn-travel {
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 16px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .btn-primary {
        background: #3182ce;
        color: white;
        border: none;
    }
    
    .btn-primary:hover {
        background: #2c5282;
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        color: white;
        text-decoration: none;
    }
    
    .btn-secondary {
        background: white;
        color: #3182ce;
        border: 1px solid #3182ce;
    }
    
    .btn-secondary:hover {
        background: #f7fafc;
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        color: #3182ce;
        text-decoration: none;
    }
    
    .btn-outline {
        background: transparent;
        color: #718096;
        border: 1px solid #cbd5e0;
    }
    
    .btn-outline:hover {
        background: #f7fafc;
        color: #4a5568;
        text-decoration: none;
    }
    
    .share-section {
        margin-top: 30px;
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #eaeef3;
    }
    
    .share-title {
        font-size: 15px;
        color: #718096;
        margin-bottom: 15px;
    }
    
    .share-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }
    
    .share-btn {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        transition: all 0.3s ease;
    }
    
    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        color: white;
    }
    
    .share-btn.facebook {
        background: #3b5998;
    }
    
    .share-btn.twitter {
        background: #1da1f2;
    }
    
    .share-btn.instagram {
        background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D, #F56040, #F77737, #FCAF45, #FFDC80);
    }
    
    .share-btn.email {
        background: #d44638;
    }
    
    .footnote {
        text-align: center;
        margin-top: 30px;
        color: #a0aec0;
        font-size: 14px;
    }
    
    @media (max-width: 767px) {
        .thank-you-section {
            padding: 30px 15px;
        }
        
        .confirmation-title {
            font-size: 26px;
        }
        
        .confirmation-subtitle {
            font-size: 16px;
        }
        
        .ticket-stub {
            padding: 30px 20px;
        }
        
        .journey-route {
            flex-direction: column;
            margin: 20px 0;
        }
        
        .route-point {
            margin: 15px 0;
        }
        
        .route-line {
            width: 2px;
            height: 30px;
            margin: 5px 0;
        }
        
        .route-line:before, .route-line:after {
            left: -2px;
            top: 20%;
            width: 6px;
            height: 6px;
        }
        
        .route-line:after {
            top: auto;
            bottom: 20%;
        }
        
        .action-row {
            flex-direction: column;
        }
        
        .btn-travel {
            width: 100%;
        }
    }
</style>
</head>
<body>
<?php include('includes/header.php');?>
<div class="banner-1">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">PEARL HERITAGE TRAVELS</h1>
    </div>
</div>

<!-- Travel-Inspired Thank You Section -->
<section class="thank-you-section">
    <div class="container">
        <div class="confirmation-card wow fadeInUp" data-wow-delay="0.3s">
            <div class="card-header">
                <div class="success-icon pulse-animation">
                    <i class="fa fa-check"></i>
                </div>
                <h2 class="confirmation-title">Your Journey Awaits!</h2>
                <p class="confirmation-subtitle">Thank you for joining with Pearl Heritage Travels.</p>
                
                <div class="booking-reference-wrapper">
                    <div class="booking-reference">
                        PHT<?php echo rand(100000, 999999); ?>
                    </div>
                </div>
            </div>
            
            <div class="ticket-stub">
                <div class="stub-edge"></div>
                
                <!-- Visual Journey Map -->
                <div class="journey-route">
                    <div class="route-point">
                        <div class="route-icon active">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="point-label">Details Complete</div>
                    </div>
                    
                    <div class="route-line"></div>
                    
                    <div class="route-point">
                        <div class="route-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="point-label">Confirmation Email</div>
                    </div>
                    
                    <div class="route-line"></div>
                    
                    <div class="route-point">
                        <div class="route-icon">
                            <i class="fa fa-suitcase"></i>
                        </div>
                        <div class="point-label">Prepare for Travel</div>
                    </div>
                    
                    <div class="route-line"></div>
                    
                    <div class="route-point">
                        <div class="route-icon">
                            <i class="fa fa-car"></i>
                        </div>
                        <div class="point-label">Begin Journey</div>
                    </div>
                </div>
                
                <!-- Confirmation Message Box -->
                <div class="confirmation-message">
                    <?php echo htmlentities($_SESSION['msg']);?>
                </div>
                
                <!-- Travel Details Grid -->
                <div class="details-grid">
                    <div class="detail-block">
                        <h4>Booking Status</h4>
                        <p>Your booking has been confirmed and processed successfully.</p>
                    </div>
                    
                    <div class="detail-block">
                        <h4>What's Next?</h4>
                        <p>Please check your email for a detailed confirmation with important travel information.</p>
                    </div>
                    
                    <div class="detail-block">
                        <h4>Need Assistance?</h4>
                        <p>Contact our support team at <strong>support1@pearlheritage.com</strong> or call <strong>+94 76 832 9877</strong>.</p>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="action-row">
                    <a href="my-bookings.php" class="btn-travel btn-primary">
                        <i class="fa fa-list-alt"></i> View My Bookings
                    </a>
                    <a href="index.php" class="btn-travel btn-secondary">
                        <i class="fa fa-compass"></i> Explore More Destinations
                    </a>
                    <a href="javascript:window.print()" class="btn-travel btn-outline">
                        <i class="fa fa-print"></i> Print Receipt
                    </a>
                </div>
                
                <p class="footnote">We're excited to be part of your travel journey. Safe travels!</p>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php');?>
<!-- sign -->
<?php include('includes/signup.php');?>	
<!-- signin -->
<?php include('includes/signin.php');?>	
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>	
<!-- //write us -->	
</body>
</html>