<?php
session_start();
include('includes/config.php');

// Initialize message variables
$error = "";
$msg = "";
$showReceipt = false;

if(isset($_POST['submit2'])) {
    // First check if user is logged in
    if(!isset($_SESSION['login']) || empty($_SESSION['login'])) {
        $error = "Please login to book a package";
    } else {
        try {
            // Get and sanitize inputs
            $pid = intval($_POST['pkgid']);
            $useremail = $_SESSION['login'];
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
            $comment = $_POST['comment'];
            $status = 0;

            // Validate inputs
            if(empty($fromdate) || empty($todate) || empty($comment)) {
                $error = "All fields are required";
            } else if($pid <= 0) {
                $error = "Invalid package selected";
            } else {
                // Store package details in session for receipt
                $sqlPackage = "SELECT PackageName, PackageLocation, PackagePrice from tbltourpackages where PackageId=:pid";
                $queryPackage = $dbh->prepare($sqlPackage);
                $queryPackage->bindParam(':pid', $pid, PDO::PARAM_INT);
                $queryPackage->execute();
                $packageResult = $queryPackage->fetch(PDO::FETCH_OBJ);
                
                if($packageResult) {
                    $_SESSION['bookingPackageName'] = $packageResult->PackageName;
                    $_SESSION['bookingPackageLocation'] = $packageResult->PackageLocation;
                    $_SESSION['bookingPackagePrice'] = $packageResult->PackagePrice ?? "800";
                    
                    // Configure PDO to throw exceptions on error
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // Insert booking data
                    $sql = "INSERT INTO tblbooking(PackageId, UserEmail, FromDate, ToDate, Comment, status) 
                            VALUES(:pid, :useremail, :fromdate, :todate, :comment, :status)";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':pid', $pid, PDO::PARAM_INT);
                    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                    $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
                    $query->bindParam(':todate', $todate, PDO::PARAM_STR);
                    $query->bindParam(':comment', $comment, PDO::PARAM_STR);
                    $query->bindParam(':status', $status, PDO::PARAM_INT);
                    
                    $query->execute();
                    $lastInsertId = $dbh->lastInsertId();
                    
                    if($lastInsertId) {
                        // Store booking ID in session for receipt
                        $_SESSION['lastBookingId'] = $lastInsertId;
                        $_SESSION['bookingDate'] = date('d-m-Y H:i');
                        $_SESSION['fromdate'] = $fromdate;
                        $_SESSION['todate'] = $todate;
                        
                        $msg = "Booking confirmed successfully";
                        $showReceipt = true;
                    } else {
                        $error = "Booking failed. Please try again.";
                    }
                } else {
                    $error = "Package details could not be retrieved";
                }
            }
        } catch(PDOException $e) {
            $error = "Database error: " . $e->getMessage();
            // For production, use:
            // $error = "A system error occurred. Please try again later.";
            // error_log("PDO Error: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pearl Heritage Travels | Package Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js"></script>
<script>new WOW().init();</script>
<script src="js/jquery-ui.js"></script>
<script>
    $(function() {
        $("#datepicker,#datepicker1").datepicker({
            minDate: 0,
            dateFormat: 'dd-mm-yy'
        });
    });
</script>
<style>
:root {
    --primary: #4F46E5; /* Indigo 600 */
    --primary-dark: #4338CA; /* Indigo 700 */
    --primary-light: #EEF2FF; /* Indigo 50 */
    --accent: #F59E0B; /* Amber 500 */
    --accent-dark: #D97706; /* Amber 600 */
    --success: #10B981; /* Emerald 500 */
    --error: #EF4444; /* Red 500 */
    --dark: #1E293B; /* Slate 800 */
    --gray: #64748B; /* Slate 500 */
    --light-gray: #E2E8F0; /* Slate 200 */
    --lighter-gray: #F8FAFC; /* Slate 50 */
    --white: #FFFFFF;
    --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
    --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
    --shadow-md: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
    --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
    --rounded-sm: 0.25rem;
    --rounded: 0.375rem;
    --rounded-md: 0.5rem;
    --rounded-lg: 0.75rem;
    --rounded-xl: 1rem;
    --rounded-2xl: 1.5rem;
    --rounded-full: 9999px;
    --transition: all 0.3s ease;
    --transition-bounce: all 0.5s cubic-bezier(0.68, -0.6, 0.32, 1.6);
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: var(--lighter-gray);
    color: var(--dark);
    line-height: 1.6;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Utility Classes */
.mt-4 { margin-top: 1rem; }
.mt-8 { margin-top: 2rem; }
.mb-4 { margin-bottom: 1rem; }
.mb-8 { margin-bottom: 2rem; }
.flex { display: flex; }
.items-center { align-items: center; }
.justify-between { justify-content: space-between; }
.gap-2 { gap: 0.5rem; }
.gap-4 { gap: 1rem; }
.text-sm { font-size: 0.875rem; }
.text-lg { font-size: 1.125rem; }
.font-medium { font-weight: 500; }
.font-semibold { font-weight: 600; }
.font-bold { font-weight: 700; }
.text-white { color: var(--white); }
.opacity-90 { opacity: 0.9; }
.w-full { width: 100%; }

/* Hero Section */
.hero-section {
    position: relative;
    height: 65vh;
    min-height: 550px;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 60%, rgba(0,0,0,0.1) 100%);
    z-index: 1;
}

.hero-image {
    position: absolute;
    width: 100%; 
    height: 100%;
    object-fit: cover;
    transform: scale(1);
    transition: transform 7s ease;
}

.hero-content {
    position: relative;
    z-index: 2;
    color: var(--white);
    padding: 40px 0;
    width: 100%;
}

.hero-badge {
    display: inline-flex;
    padding: 6px 12px;
    background-color: rgba(255,255,255,0.2);
    backdrop-filter: blur(5px);
    border-radius: var(--rounded-full);
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 16px;
    opacity: 0;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin: 0 0 16px;
    opacity: 0;
    transform: translateY(20px);
    letter-spacing: -0.02em;
    line-height: 1.2;
    max-width: 800px;
}

.hero-location {
    display: flex;
    align-items: center;
    font-size: 1.1rem;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateY(20px);
}

.hero-location i {margin-right: 8px;}

.hero-cta {
    margin-top: 20px;
    opacity: 0;
}

/* Content Section */
.content-section {
    position: relative;
    margin-top: -1px;
    padding-bottom: 60px;
}

/* Card styles */
.card {
    background: var(--white);
    border-radius: var(--rounded-xl);
    box-shadow: var(--shadow);
    margin-bottom: 30px;
    overflow: hidden;
    opacity: 0;
    transform: translateY(20px);
    transition: var(--transition);
}

.card:hover {
    box-shadow: var(--shadow-md);
}

.card-header {
    padding: 25px 30px;
    border-bottom: 1px solid var(--light-gray);
}

.card-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    color: var(--dark);
}

.card-title i {
    margin-right: 10px;
    color: var(--primary);
    font-size: 1.2em;
}

.card-body {
    padding: 25px 30px;
}

/* Info grid */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 25px;
    margin-bottom: 20px;
}

.info-item {
    display: flex;
    flex-direction: column;
    opacity: 0;
    transform: translateY(10px);
}

.info-label {
    font-size: 13px;
    color: var(--gray);
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 0.05em;
    margin-bottom: 4px;
}

.info-value {
    font-weight: 600;
    font-size: 16px;
    color: var(--dark);
}

/* Features */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px;
    background-color: var(--lighter-gray);
    border-radius: var(--rounded-md);
    transition: var(--transition);
    opacity: 0;
    transform: translateY(10px);
}

.feature-item:hover {
    background-color: var(--primary-light);
    transform: translateY(-3px);
    box-shadow: var(--shadow);
}

.feature-icon {
    color: var(--primary);
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-text {
    font-weight: 500;
}

/* Price card */
.price-card {
    background-color: var(--primary-light);
    border-radius: var(--rounded-lg);
    padding: 25px;
    margin-top: 25px;
    opacity: 0;
    transform: translateY(10px);
    position: relative;
    overflow: hidden;
}

.price-card::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.1) 50%, transparent 60%);
    transform: rotate(45deg);
    transition: transform 2s ease;
}

.price-card:hover::after {
    transform: translate(100%, 100%) rotate(45deg);
}

.price-label {
    font-size: 14px;
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.price-amount {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--primary-dark);
}

.price-includes {
    margin-top: 15px;
    font-size: 14px;
    color: var(--gray);
}

.price-includes ul {
    list-style: none;
    padding: 0;
    margin: 10px 0 0;
}

.price-includes li {
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.price-includes i {
    color: var(--primary);
}

/* Description */
.description-content {
    line-height: 1.8;
    color: var(--gray);
    font-size: 16px;
}

.description-content p {
    margin-bottom: 16px;
}

/* Form styles */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--dark);
}

.form-control {
    width: 100%;
    padding: 14px 16px;
    border: 1px solid var(--light-gray);
    border-radius: var(--rounded-md);
    background-color: var(--lighter-gray);
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    transition: var(--transition);
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.form-control::placeholder {
    color: #94A3B8; /* Slate 400 */
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 24px;
    font-weight: 600;
    border-radius: var(--rounded-md);
    cursor: pointer;
    transition: var(--transition-bounce);
    border: none;
    text-decoration: none;
    font-size: 16px;
}

.btn-primary {
    background-color: var(--primary);
    color: var(--white);
    box-shadow: var(--shadow-sm);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
    color: var(--white);
    text-decoration: none;
}

.btn-secondary {
    background-color: var(--light-gray);
    color: var(--dark);
}

.btn-secondary:hover {
    background-color: var(--gray);
    color: var(--white);
    transform: translateY(-2px);
}

.btn-accent {
    background-color: var(--accent);
    color: var(--white);
    box-shadow: var(--shadow-sm);
}

.btn-accent:hover {
    background-color: var(--accent-dark);
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
    color: var(--white);
    text-decoration: none;
}

.btn-lg {
    padding: 16px 28px;
    font-size: 18px;
}

.btn i {
    margin-right: 8px;
    font-size: 18px;
}

/* Alert */
.alert {
    padding: 20px;
    border-radius: var(--rounded-lg);
    margin: 0 0 30px;
    display: flex;
    align-items: center;
    opacity: 0;
    transform: translateY(15px);
    animation: fadeIn 0.5s forwards 0.5s;
    box-shadow: var(--shadow);
}

.alert-success {
    background-color: #ECFDF5; /* Green 50 */
    color: var(--success);
    border-left: 4px solid var(--success);
}

.alert-error {
    background-color: #FEF2F2; /* Red 50 */
    color: var(--error);
    border-left: 4px solid var(--error);
}

.alert i {
    margin-right: 12px;
    font-size: 20px;
}

.alert a {
    margin-left: 8px;
    color: inherit;
    text-decoration: underline;
    font-weight: 600;
    transition: var(--transition);
}

.alert a:hover {
    opacity: 0.8;
}

/* Modal Styles */
.modal-backdrop {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(4px);
    z-index: 1000;
    display: none;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.modal {
    position: fixed;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%) scale(0.95);
    width: 95%;
    height: 900px;
    max-width: 800px;
    background: var(--white);
    border-radius: var(--rounded-xl);
    z-index: 1001;
    display: none;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: var(--shadow-xl);
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.modal.active, .modal-backdrop.active {
    display: block;
    opacity: 1;
}

.modal.active {
    transform: translate(-50%, -50%) scale(1);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
    border-bottom: 1px solid var(--light-gray);
}

.modal-title {
    font-size: 20px;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: var(--gray);
    transition: var(--transition);
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: var(--rounded-full);
}

.modal-close:hover {
    background-color: var(--light-gray);
    color: var(--dark);
}

.modal-body {
    padding: 25px 30px;
}

.modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    padding: 20px 25px;
    border-top: 1px solid var(--light-gray);
}

/* Receipt Styles */
.receipt {
    border-radius: var(--rounded-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    background: var(--white);
}

.receipt-header {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    padding: 25px;
    position: relative;
    text-align: center;
}

.receipt-header-pattern {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background-image: linear-gradient(135deg, rgba(255,255,255,0.1) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.1) 50%, rgba(255,255,255,0.1) 75%, transparent 75%, transparent);
    background-size: 20px 20px;
    opacity: 0.2;
}

.receipt-logo {
    font-size: 40px;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

.receipt-company {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 4px;
    letter-spacing: 0.5px;
}

.receipt-id {
    font-size: 14px;
    opacity: 0.9;
    letter-spacing: 0.5px;
}

.receipt-body {
    padding: 0;
    background-color: var(--white);
}

.receipt-message {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px 25px;
    background-color: rgba(16, 185, 129, 0.1);
    border-bottom: 1px solid rgba(16, 185, 129, 0.2);
}

.receipt-message i {
    font-size: 24px;
    color: var(--success);
}

.receipt-message h4 {
    color: var(--success);
    font-weight: 600;
    margin: 0 0 4px 0;
}

.receipt-message p {
    margin: 0;
    font-size: 14px;
    color: var(--gray);
}

.receipt-section {
    padding: 20px 25px;
    border-bottom: 1px solid var(--light-gray);
}

.receipt-section-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--dark);
    margin: 0 0 15px 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.receipt-section-title i {
    color: var(--primary);
}

.receipt-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    font-size: 15px;
}

.receipt-label {
    color: var(--gray);
    font-weight: 500;
}

.receipt-value {
    font-weight: 500;
    color: var(--dark);
    text-align: right;
    max-width: 60%;
}

.receipt-status {
    color: var(--success);
    font-weight: 600;
}

.receipt-total {
    display: flex;
    justify-content: space-between;
    font-size: 18px;
    font-weight: 700;
    padding-top: 15px;
    margin-top: 10px;
    border-top: 2px solid var(--light-gray);
    color: var(--dark);
}

.receipt-footer-info {
    padding: 20px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: var(--lighter-gray);
    border-bottom: 1px solid var(--light-gray);
}

.verified-badge {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--success);
    font-weight: 600;
}

.verified-badge i {
    font-size: 18px;
}

.receipt-qr-code {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.qr-placeholder {
    width: 50px;
    height: 50px;
    background: repeating-linear-gradient(45deg, #ddd, #ddd 2px, #eee 2px, #eee 4px);
    border-radius: 5px;
}

.receipt-qr-code span {
    font-size: 12px;
    color: var(--gray);
}

.receipt-notes {
    padding: 20px 25px;
    font-size: 14px;
    color: var(--gray);
    background-color: var(--lighter-gray);
}

.receipt-notes p {
    margin: 0 0 10px;
    line-height: 1.5;
}

.receipt-notes p:last-child {
    margin-bottom: 0;
}

/* Print styles enhancement */
@media print {
    .receipt {
        box-shadow: none;
        border: 1px solid #ddd;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .receipt-header {
        background: #4F46E5 !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .receipt-message {
        background-color: rgba(16, 185, 129, 0.1) !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .receipt-footer-info {
        background-color: #f8fafc !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .receipt-notes {
        background-color: #f8fafc !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .modal-footer, header, footer, .hero-section, .content-section > *:not(.receipt) {
        display: none !important;
    }
    
    @page {
        margin: 1cm;
    }
}

/* Make receipt responsive */
@media (max-width: 576px) {
    .receipt-row {
        flex-direction: column;
        padding: 10px 0;
    }
    
    .receipt-value {
        text-align: left;
        margin-top: 4px;
        max-width: 100%;
    }
    
    .receipt-footer-info {
        flex-direction: column;
        gap: 15px;
    }
    
    .receipt-qr-code {
        margin-top: 5px;
    }
    
    .modal-footer {
        flex-wrap: wrap;
    }
    
    .modal-footer .btn {
        flex: 1 0 100%;
        margin-bottom: 8px;
    }
}

/* Datepicker customization */
.ui-datepicker {
    padding: 15px;
    border-radius: var(--rounded-lg);
    background-color: var(--white);
    box-shadow: var(--shadow-lg);
    border: none;
    font-family: 'Poppins', sans-serif;
    width: 300px !important;
}

.ui-datepicker-header {
    padding: 12px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-radius: var(--rounded-md);
    border: none;
    margin-bottom: 10px;
}

.ui-datepicker-title {
    color: var(--white);
    font-weight: 600;
    text-align: center;
    font-size: 15px;
}

.ui-datepicker th {
    font-weight: 600;
    font-size: 13px;
    padding: 7px 0;
    color: var(--dark);
}

.ui-datepicker td a {
    display: block;
    padding: 8px;
    text-align: center;
    font-size: 14px;
    border-radius: var(--rounded-sm);
    transition: var(--transition);
    border: none;
    background: transparent;
    color: var(--dark);
}

.ui-datepicker td a:hover {
    background-color: var(--primary-light);
}

.ui-datepicker td a.ui-state-active {
    background-color: var(--primary);
    color: var(--white);
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(79, 70, 229, 0); }
    100% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0); }
}

.animate-pulse {
    animation: pulse 2s infinite;
}


/* Responsive Styles */
@media (max-width: 992px) {
    .hero-title {
        font-size: 2.75rem;
    }
}

@media (max-width: 768px) {
    .hero-section {
        height: 55vh;
        min-height: 450px;
    }
    
    .hero-title {
        font-size: 2.25rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .info-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .hero-section {
        height: 50vh;
        min-height: 400px;
    }
    
    .hero-title {
        font-size: 1.75rem;
    }
    
    .price-amount {
        font-size: 28px;
    }
    
    .card-header, .card-body {
        padding: 20px;
    }
    
    .receipt-row {
        flex-direction: column;
    }
    
    .receipt-value {
        text-align: left;
        margin-top: 4px;
    }
    
    .modal-footer {
        flex-direction: column;
    }
    
    .modal-footer .btn {
        width: 100%;
    }
}

/* Print styles */
@media print {
    body {
        margin: 0;
        padding: 15px;
        background: white;
    }
    
    .receipt {
        box-shadow: none;
        width: 100%;
        margin: 0;
        border: 1px solid #ddd;
    }
    
    .receipt-header {
        background: #4F46E5 !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .modal-footer, header, footer, .hero-section, .content-section > *:not(.receipt) {
        display: none !important;
    }
    
    @page {
        margin: 0.5cm;
    }
}

/* Map styles */
.map-container {
    height: 400px;
    width: 100%;
    border-radius: var(--rounded-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    position: relative;
}

.map-container::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 120%;
    height: 100%;
    background: var(--lighter-gray);
    z-index: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.map-container::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: var(--gray);
    font-weight: 500;
    z-index: 1;
}

.map-info-window {
    padding: 12px;
    width: 210px;
    font-family: 'Poppins', sans-serif;
}

.map-info-window h4 {
    margin: 0 0 8px;
    font-size: 18px;
    font-weight: 600;
    color: var(--primary);
}

.map-info-window p {
    margin: 1px;
    font-size: 14px;
    color: var(--dark);
    display: flex;
    align-items: center;
}

.map-info-window p i {
    margin-right: 16px;
    color: var(--primary);
    font-size: 12px;
    width: 20px;
}

.map-info-window .map-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 12px;
    font-size: 13px;
    margin-top: 10px;
    background-color: var(--primary-light);
    color: var(--primary);
    font-weight: 600;
    border-radius: var(--rounded-md);
    text-decoration: none;
    transition: var(--transition);
}

.map-info-window .map-btn:hover {
    background-color: var(--primary);
    color: var(--white);
}

.map-info-window .map-btn i {
    margin-right: 4px;
}
</style>
</head>

<body>
<?php include('includes/header.php');?>

<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query->bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0) {
foreach($results as $result) { ?>

<!-- Hero Section -->
<section class="hero-section">
    <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" alt="<?php echo htmlentities($result->PackageName);?>" class="hero-image">
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge"><?php echo htmlentities($result->PackageType);?></div>
            <h1 class="hero-title"><?php echo htmlentities($result->PackageName);?></h1>
            <div class="hero-location">
                <i class="fa fa-map-marker"></i>
                <?php echo htmlentities($result->PackageLocation);?>
            </div>
        
        </div>
    </div>
</section>

<div class="container">
    <div class="content-section">
        <!-- Alerts -->
        <?php if($error){ ?>
        <div class="alert alert-error">
            <i class="fa fa-exclamation-circle"></i> <?php echo htmlentities($error); ?>
        </div>
        <?php } else if($msg){ ?>
        <div class="alert alert-success">
            <i class="fa fa-check-circle"></i> <?php echo htmlentities($msg); ?> 
            <a href="#" onclick="openReceiptModal()">View receipt</a>
        </div>
        <?php } ?>

        <!-- Overview Card -->
        <div class="card overview-card">
            <div class="card-header">
                <h2 class="card-title"><i class="fa fa-info-circle"></i> Package Overview</h2>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Package ID</div>
                        <div class="info-value">#PKG-<?php echo htmlentities($result->PackageId);?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Duration</div>
                        <div class="info-value">7 Days / 6 Nights</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Group Size</div>
                        <div class="info-value">2-8 People</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Language</div>
                        <div class="info-value">English, Local</div>
                    </div>
                </div>
                
                <div class="price-card">
                    <div class="price-label">Package Price</div>
                    <div class="price-amount">
                        Rs. <?php echo htmlentities($result->PackagePrice ?? '800'); ?>
                    </div>
                    <a href="#booking" class="btn btn-primary w-full mt-4">
                        <i class="fa fa-check"></i> Book This Package
                    </a>
                    <div class="price-includes">
                        <span class="font-semibold">Price includes:</span>
                        <ul>
                            <li><i class="fa fa-check"></i> Accommodation</li>
                            <li><i class="fa fa-check"></i> Transportation</li>
                            <li><i class="fa fa-check"></i> Expert guides</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Features Card -->
        <div class="card features-card">
            <div class="card-header">
                <h2 class="card-title"><i class="fa fa-star"></i> Package Features</h2>
            </div>
            <div class="card-body">
                <div class="features-grid">
                    <?php 
                    $features = explode(',', $result->PackageFetures);
                    foreach($features as $feature) {
                        if(trim($feature) != '') {
                            echo '<div class="feature-item">
                                <div class="feature-icon"><i class="fa fa-check-circle"></i></div>
                                <div class="feature-text">'.trim($feature).'</div>
                            </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <!-- Description Card -->
        <div class="card description-card">
            <div class="card-header">
                <h2 class="card-title"><i class="fa fa-file-text-o"></i> Package Description</h2>
            </div>
            <div class="card-body">
                <div class="description-content">
                    <?php echo htmlentities($result->PackageDetails);?>
                </div>
            </div>
        </div>
        
        <!-- Booking Form -->
        <div class="card booking-card" id="booking">
    <div class="card-header">
        <h2 class="card-title"><i class="fa fa-calendar"></i> Book Your Trip</h2>
    </div>
    <div class="card-body">
        <form name="book" method="post">
            <!-- Move the hidden field here, outside any form-group divs -->
            <input type="hidden" name="pkgid" value="<?php echo htmlentities($result->PackageId); ?>">
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">From Date</label>
                    <!-- Remove the hidden field from here -->
                    <input type="text" id="datepicker" name="fromdate" class="form-control" placeholder="Select start date" required>
                </div>
                <div class="form-group">
                    <label class="form-label">To Date</label>
                    <input type="text" id="datepicker1" name="todate" class="form-control" placeholder="Select end date" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Special Requests</label>
                <textarea name="comment" class="form-control" placeholder="Tell us about any special requirements or questions" rows="4" required></textarea>
            </div>
            <div class="form-group" style="margin-bottom: 10px;">
                <?php if($_SESSION['login']){ ?>
                    <button type="submit" name="submit2" class="btn btn-accent w-full animate-pulse">
                        <i class="fa fa-check-circle"></i> Confirm Booking
                    </button>
                <?php } else { ?>
                    <a href="#" data-toggle="modal" data-target="#myModal4" class="btn btn-primary w-full">
                        <i class="fa fa-sign-in"></i> Sign In to Book
                    </a>
                <?php } ?>
            </div>
        </form>
    </div>
</div>
    </div>
</div>

<?php }} ?>

<!-- Receipt Modal -->
<div class="modal-backdrop" id="modalBackdrop"></div>
<div class="modal" id="receiptModal">
    <div class="modal-header">
        <h3 class="modal-title">
            <i class="fa fa-check-circle" style="color: var(--success); margin-right: 7px;"></i>
            Booking Confirmation
        </h3>
        <button class="modal-close" onclick="closeReceiptModal()">&times;</button>
    </div>
    <div class="modal-body">
        <div class="receipt">
            <div class="receipt-header">
                <div class="receipt-header-pattern"></div>
                <div class="receipt-logo">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="receipt-company">PEARL HERITAGE TRAVELS</div>
                <div class="receipt-id">Receipt #<?php echo rand(10000, 99999); ?></div>
            </div>
            
            <div class="receipt-body">
                <!-- Booking Success Message -->
                <div class="receipt-message">
                    <i class="fa fa-check-circle-o"></i>
                    <div>
                        <h4>Booking Confirmed!</h4>
                        <p>Your travel package has been successfully booked. Details below.</p>
                    </div>
                </div>
                
                <!-- Main Details Section -->
                <div class="receipt-section">
                    <h5 class="receipt-section-title"><i class="fa fa-info-circle"></i> Booking Information</h5>
                    <div class="receipt-row">
                        <div class="receipt-label">Booking ID</div>
                        <div class="receipt-value">#BKG-<?php echo isset($lastInsertId) ? $lastInsertId : rand(10000, 99999); ?></div>
                    </div>
                    <div class="receipt-row">
                        <div class="receipt-label">Booking Date</div>
                        <div class="receipt-value"><?php echo date('d-m-Y H:i'); ?></div>
                    </div>
                    <div class="receipt-row">
                        <div class="receipt-label">Status</div>
                        <div class="receipt-value receipt-status">Confirmed</div>
                    </div>
                </div>
                
                <!-- Package Details -->
                <div class="receipt-section">
                    <h5 class="receipt-section-title"><i class="fa fa-suitcase"></i> Package Details</h5>
                    <div class="receipt-row">
                        <div class="receipt-label">Package</div>
                        <div class="receipt-value">
                            <?php 
                            if(isset($_SESSION['bookingPackageName'])) {
                                echo htmlentities($_SESSION['bookingPackageName']);
                            } else {
                                echo "Selected Package";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="receipt-row">
                        <div class="receipt-label">Location</div>
                        <div class="receipt-value">
                            <?php 
                            if(isset($_SESSION['bookingPackageLocation'])) {
                                echo htmlentities($_SESSION['bookingPackageLocation']);
                            } else {
                                echo "Package Location";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- Customer & Travel Details -->
                <div class="receipt-section">
                    <h5 class="receipt-section-title"><i class="fa fa-user"></i> Customer & Travel Details</h5>
                    <div class="receipt-row">
                        <div class="receipt-label">Customer</div>
                        <div class="receipt-value"><?php echo isset($_SESSION['login']) ? htmlentities($_SESSION['login']) : ''; ?></div>
                    </div>
                    <div class="receipt-row">
                        <div class="receipt-label">Travel Period</div>
                        <div class="receipt-value">
                            <?php if(isset($fromdate) && isset($todate)): ?>
                                <i class="fa fa-calendar"></i> <?php echo htmlentities($fromdate); ?> to <?php echo htmlentities($todate); ?>
                            <?php else: ?>
                                <i class="fa fa-calendar"></i> As per confirmation
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Location Map Card -->
<div class="card map-card">
    <div class="card-header">
        <h2 class="card-title"><i class="fa fa-map"></i> Location Map</h2>
    </div>
    <div class="card-body">
        <div id="map-container" class="map-container"></div>
    </div>
</div>
                
                <!-- Payment Information -->
                <div class="receipt-section">
                    <h5 class="receipt-section-title"><i class="fa fa-credit-card"></i> Payment Information</h5>
                    <div class="receipt-row">
                        <div class="receipt-label">Payment Method</div>
                        <div class="receipt-value">Credit Card / Online Payment</div>
                    </div>
                    <div class="receipt-total">
                        <div>Total Amount</div>
                        <div>Rs. <?php echo isset($_SESSION['bookingPackagePrice']) ? htmlentities($_SESSION['bookingPackagePrice']) : '800'; ?></div>
                    </div>
                </div>
                
                <div class="receipt-footer-info">
                    <div class="verified-badge">
                        <i class="fa fa-shield"></i>
                        <span>Payment Verified & Confirmed</span>
                    </div>
                    
                    <div class="receipt-qr-code">
                        <div class="qr-placeholder"></div>
                        <span>Scan for reference</span>
                    </div>
                </div>
                
                <div class="receipt-notes">
                    <p>Thank you for choosing Pearl Heritage Travels. A confirmation email has been sent to your registered email address.</p>
                    <p>For any questions or support, please contact us at <strong>support@pearlheritagetravels.com</strong> or call <strong>+1 (555) 123-4567</strong>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary btn-print" onclick="printReceipt()">
            <i class="fa fa-print"></i> Print Receipt
        </button>
        <button class="btn btn-accent btn-email">
            <i class="fa fa-envelope"></i> Email Receipt
        </button>
        <button class="btn btn-primary btn-close" onclick="closeReceiptModal()">
            <i class="fa fa-check"></i> Done
        </button>
    </div>
</div>

<?php include('includes/footer.php');?>
<?php include('includes/signup.php');?>
<?php include('includes/signin.php');?>
<?php include('includes/write-us.php');?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize GSAP
    gsap.registerPlugin(ScrollTrigger);
    
    // Hero animations
    gsap.to('.hero-badge', {opacity: 1, duration: 0.8, delay: 0.2});
    gsap.to('.hero-title', {opacity: 1, y: 0, duration: 0.8, delay: 0.4});
    gsap.to('.hero-location', {opacity: 1, y: 0, duration: 0.8, delay: 0.6});
    gsap.to('.hero-cta', {opacity: 1, duration: 0.8, delay: 0.8});
    
    // Hero image subtle zoom
    gsap.to('.hero-image', {scale: 1.05, duration: 7, ease: "none"});
    
    // Card animations with ScrollTrigger
    gsap.utils.toArray('.card').forEach((card, i) => {
        gsap.to(card, {
            scrollTrigger: {
                trigger: card,
                start: "top bottom-=100",
            },
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: 0.1 * i,
            ease: "power3.out"
        });
    });
    
    // Info items animation
    gsap.utils.toArray('.info-item').forEach((item, i) => {
        gsap.to(item, {
            scrollTrigger: {
                trigger: '.info-grid',
                start: "top bottom-=100",
            },
            opacity: 1,
            y: 0,
            duration: 0.5,
            delay: 0.1 * i,
            ease: "power2.out"
        });
    });
    
    // Feature items animation
    gsap.utils.toArray('.feature-item').forEach((item, i) => {
        gsap.to(item, {
            scrollTrigger: {
                trigger: '.features-grid',
                start: "top bottom-=100",
            },
            opacity: 1,
            y: 0,
            duration: 0.5,
            delay: 0.05 * i,
            ease: "power2.out"
        });
    });
    
    // Price card animation
    gsap.to('.price-card', {
        scrollTrigger: {
            trigger: '.price-card',
            start: "top bottom-=100",
        },
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: "power3.out"
    });
    
    <?php if(isset($showReceipt) && $showReceipt) { ?>
    // Show receipt on booking success
    setTimeout(function() {
        openReceiptModal();
    }, 1000);
    <?php } ?>
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            if(this.getAttribute('href').length > 1 && !this.hasAttribute('data-toggle')) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // Set up event handlers
    setupEventHandlers();
});

// Modal functions
function openReceiptModal() {
    const backdrop = document.getElementById('modalBackdrop');
    const modal = document.getElementById('receiptModal');
    
    backdrop.classList.add('active');
    setTimeout(() => {
        modal.classList.add('active');
    }, 100);
    document.body.style.overflow = 'hidden';
    
    // Add keyboard event listener
    document.addEventListener('keydown', handleModalKeyPress);
}

function closeReceiptModal() {
    const backdrop = document.getElementById('modalBackdrop');
    const modal = document.getElementById('receiptModal');
    
    modal.classList.remove('active');
    setTimeout(() => {
        backdrop.classList.remove('active');
    }, 300);
    document.body.style.overflow = 'auto';
    
    // Remove keyboard event listener
    document.removeEventListener('keydown', handleModalKeyPress);
}

function handleModalKeyPress(event) {
    if (event.key === "Escape") {
        closeReceiptModal();
    }
}

// Improved print function
function printReceipt() {
    // Create a clean copy for printing
    const printContent = document.querySelector('.receipt').cloneNode(true);
    const originalContents = document.body.innerHTML;
    
    // Create a wrapper with proper styling for print
    const printWrapper = document.createElement('div');
    printWrapper.className = 'print-wrapper';
    
    // Add print-specific styles
    const style = document.createElement('style');
    style.innerHTML = `
        @media print {
            body { 
                margin: 0; 
                padding: 20px;
                background: white;
                font-family: 'Poppins', Arial, sans-serif;
            }
            .print-wrapper {
                max-width: 800px;
                margin: 0 auto;
            }
            .receipt { 
                box-shadow: none; 
                border: 1px solid #ddd; 
                page-break-inside: avoid;
            }
            .receipt-header {
                background: #4F46E5 !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .receipt-message {
                background-color: rgba(16, 185, 129, 0.1) !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .receipt-footer-info,
            .receipt-notes {
                background-color: #f8fafc !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .receipt-status { color: #10B981 !important; }
            @page { margin: 0.5cm; }
        }
    `;
    
    // Add company footer to the print version
    const footer = document.createElement('div');
    footer.style.textAlign = 'center';
    footer.style.marginTop = '20px';
    footer.style.fontSize = '12px';
    footer.style.color = '#64748B';
    footer.innerHTML = `
        <p>Pearl Heritage Travels - Your trusted travel partner since 2010</p>
        <p>123 Travel Lane, Tourism City, TC 54321 | Tel: +1 (555) 123-4567</p>
        <p>www.pearlheritagetravels.com</p>
    `;
    
    printWrapper.appendChild(style);
    printWrapper.appendChild(printContent);
    printWrapper.appendChild(footer);
    
    // Set print content
    document.body.innerHTML = '';
    document.body.appendChild(printWrapper);
    
    // Print and restore after short delay
    setTimeout(() => {
        window.print();
        document.body.innerHTML = originalContents;
        
        // Reattach event handlers after printing
        setTimeout(setupEventHandlers, 300);
    }, 200);
}

// More comprehensive event handler setup
function setupEventHandlers() {
    // Modal controls - use optional chaining for safety
    document.querySelector(".btn-print")?.addEventListener("click", printReceipt);
    document.querySelector(".btn-close")?.addEventListener("click", closeReceiptModal);
    
    // Email receipt functionality
    const emailButton = document.querySelector('.btn-email');
    if (emailButton) {
        emailButton.addEventListener('click', function() {
            alert('A copy of your receipt has been sent to your email address.');
        });
    }
    
    // Window click to close modal
    window.onclick = function(event) {
        const backdrop = document.getElementById("modalBackdrop");
        if (event.target === backdrop) {
            closeReceiptModal();
        }
    };
    
    // Alert view receipt links
    document.querySelectorAll('.alert a').forEach(el => {
        if (el.textContent.includes('View receipt')) {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                openReceiptModal();
            });
        }
    });
}

// Create confetti effect for successful booking
<?php if(isset($showReceipt) && $showReceipt) { ?>
function createConfetti() {
    const confettiCount = 150;
    const colors = ['#4F46E5', '#F59E0B', '#10B981', '#EF4444', '#A855F7'];
    
    for (let i = 0; i < confettiCount; i++) {
        const confetti = document.createElement('div');
        confetti.style.position = 'fixed';
        confetti.style.top = '-10px';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.width = Math.random() * 10 + 5 + 'px';
        confetti.style.height = Math.random() * 10 + 5 + 'px';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
        confetti.style.zIndex = '1002';
        confetti.style.opacity = Math.random() + 0.5;
        confetti.style.animation = 'fall ' + (Math.random() * 3 + 2) + 's linear forwards';
        document.body.appendChild(confetti);
        
        setTimeout(() => {
            confetti.remove();
        }, 5000);
    }
}



// Create confetti animation
const style = document.createElement('style');
style.innerHTML = `
@keyframes fall {
    0% { transform: translateY(0) rotate(0deg); }
    100% { transform: translateY(100vh) rotate(720deg); }
}`;
document.head.appendChild(style);

// Trigger confetti after a delay
setTimeout(() => {
    createConfetti();
}, 1000);
<?php } ?>
</script>
<script>
    let map;
    let marker;
    let geocoder;
    let packageLocation = "<?php echo htmlentities($result->PackageLocation); ?>";
    let packageName = "<?php echo htmlentities($result->PackageName); ?>";

    function initMap() {
        // Default coordinates for Sri Lanka
        let defaultLatLng = { lat: 7.8731, lng: 80.7718 };
        
        // Initialize map with default coordinates
        map = new google.maps.Map(document.getElementById("map-container"), {
            zoom: 7,
            center: defaultLatLng,
            mapTypeControl: true,
            streetViewControl: true,
            fullscreenControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#c9b2a6"}]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#3C4858"}]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#f5f5f5"}]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#e0e0e0"}]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ccdca1"}]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#b9d6f2"}]
                }
            ]
        });

        // Initialize geocoder
        geocoder = new google.maps.Geocoder();
        
        // Remove loading indicator once map loads
        google.maps.event.addListenerOnce(map, 'idle', function() {
            const mapContainer = document.getElementById('map-container');
            mapContainer.style.position = 'relative';
        });
        
        // Geocode the package location
        geocodePackageLocation();
    }
    
    function geocodePackageLocation() {
        // First, try to geocode specifically in Sri Lanka
        geocoder.geocode({
            'address': packageLocation + ", Sri Lanka"
        }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                placeMarker(results[0].geometry.location);
            } else {
                // If that fails, try a broader search
                geocoder.geocode({
                    'address': packageLocation
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        placeMarker(results[0].geometry.location);
                    } else {
                        console.error("Geocoding failed: " + status);
                        // Use a default location for Sri Lanka if geocoding fails
                        placeMarker({ lat: 7.8731, lng: 80.7718 });
                    }
                });
            }
        });
    }

    function placeMarker(location) {
        // Set map to the found location
        map.setCenter(location);
        map.setZoom(10);
        
        // Create a marker at the location
        marker = new google.maps.Marker({
            map: map,
            position: location,
            animation: google.maps.Animation.DROP,
            title: packageName,
            icon: {
                url: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'
            }
        });
        
        // Create an info window with enhanced content
        const infoWindow = new google.maps.InfoWindow({
            content: `<div class="map-info-window">
                        <h4>${packageName}</h4>
                        <p><i class="fa fa-map-marker"></i> ${packageLocation}</p>
                        <p><i class="fa fa-calendar"></i> Available year-round</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(packageLocation + ', Sri Lanka')}" target="_blank" class="map-btn">
                            <i class="fa fa-directions"></i> Get Directions
                        </a>
                      </div>`,
            maxWidth: 300
        });
        
        // Open info window on marker click
        marker.addListener("click", () => {
            infoWindow.open(map, marker);
        });
        
        // Open info window by default with slight delay for smooth animation
        setTimeout(() => {
            infoWindow.open(map, marker);
        }, 1000);
        
        // Add a bounce effect to the marker
        setTimeout(() => {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
                setTimeout(() => {
                    marker.setAnimation(null);
                }, 1500);
            }
        }, 500);
    }
    
    // Handle map loading errors
    function handleMapError() {
        console.error("Google Maps failed to load");
        const mapContainer = document.getElementById('map-container');
        if (mapContainer) {
            mapContainer.innerHTML = '<div style="padding: 30px; text-align: center; color: var(--gray);"><i class="fa fa-map-o" style="font-size: 48px; margin-bottom: 15px; display: block; opacity: 0.6;"></i><p>Unable to load map. Please check your internet connection.</p></div>';
        }
    }
</script>

<!-- Google Maps API Script - Replace YOUR_API_KEY with your actual API key -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ40eiJWELEHZZ9cAYnYuBkt4ySndDeqM&callback=initMap&libraries=places"
    onerror="handleMapError()">
</script>
</body>
</html>