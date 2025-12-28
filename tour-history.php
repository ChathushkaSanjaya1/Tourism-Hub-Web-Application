<?php

session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0) {	
    header('location:index.php');
} else {
    if(isset($_REQUEST['bkid'])) {
        $bid=intval($_GET['bkid']);
        $email=$_SESSION['login'];
        $sql ="SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
        $query= $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':bid', $bid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0) {
            foreach($results as $result) {
                $fdate=$result->FromDate;
                $a=explode("/",$fdate);
                $val=array_reverse($a);
                $mydate =implode("/",$val);
                $cdate=date('Y/m/d');
                $date1=date_create("$cdate");
                $date2=date_create("$fdate");
                $diff=date_diff($date1,$date2);
                $df=$diff->format("%a");
                if($df>1) {
                    $status=2;
                    $cancelby='u';
                    $sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':status',$status, PDO::PARAM_STR);
                    $query->bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
                    $query->bindParam(':email',$email, PDO::PARAM_STR);
                    $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                    $query->execute();
                    $msg="Booking Cancelled successfully";
                } else {
                    $error="You can't cancel booking before 24 hours";
                }
            }
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Pearl Heritage Travels - My Bookings</title>
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
    <script>new WOW().init();</script>

    <style>
        :root {
            --primary-color: #1089ff;
            --primary-dark: #0071ce;
            --primary-light: #e6f3ff;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --dark: #343a40;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 8px;
            --shadow: 0 4px 12px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .my-bookings-container {
            padding: 30px 0;
        }
        
        .booking-page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1px;
            flex-wrap: wrap;
            width: 800px;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            position: relative;
            padding-bottom: 10px;
        }
        
        .page-title span.count {
            font-size: 16px;
            color: var(--gray);
            font-weight: 500;
            margin-left: 10px;
        }
        
        /* Enhanced search and filter styles */
        .search-and-filter {
            margin-top: 250px; 
            margin-bottom: 30px;
        }

        .advanced-search {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 20px;
            margin-bottom: 15px;
        }
        
        .search-bar {
            position: relative;
            margin-bottom: 15px;
        }
        
        .search-input {
            width: 100%;
            padding: 14px 45px;
            border: 1px solid var(--light-gray);
            border-radius: 30px;
            font-size: 15px;
            transition: var(--transition);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 137, 255, 0.15);
            outline: none;
        }
        
        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 18px;
        }
        
        .clear-search {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            font-size: 16px;
            cursor: pointer;
            opacity: 0.7;
            transition: var(--transition);
            display: none;
        }
        
        .clear-search:hover {
            opacity: 1;
            color: var(--danger);
        }
        
        .advanced-filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid var(--light-gray);
        }
        
        .date-range-picker {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .date-input-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        
        .date-input-group label {
            font-size: 12px;
            color: var(--gray);
            font-weight: 500;
        }
        
        .date-input {
            padding: 8px;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 14px;
        }
        
        .apply-filter-btn {
            padding: 8px 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            align-self: flex-end;
            margin-left: 5px;
        }
        
        .apply-filter-btn:hover {
            background-color: var(--primary-dark);
        }
        
        .sort-options {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sort-options label {
            font-size: 14px;
            color: var(--gray);
        }
        
        .sort-select {
            padding: 8px 12px;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 14px;
        }
        
        /* Enhanced filter controls */
        .filter-controls {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            flex-wrap: wrap;
            overflow-x: auto;
            padding-bottom: 5px;
        }
        
        .filter-btn {
            padding: 10px 20px;
            background-color: white;
            border: 1px solid var(--light-gray);
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
            white-space: nowrap;
        }
        
        .filter-btn:hover {
            background-color: var(--light);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.06);
        }
        
        .filter-btn.active {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .bookings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        /* Enhanced booking card styles */
        .booking-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            display: flex;
            flex-direction: column;
        }
        
        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.12);
        }
        
        .booking-banner {
            height: 5px;
            background: var(--primary-color);
        }
        
        .booking-banner.pending {
            background: var(--warning);
        }
        
        .booking-banner.confirmed {
            background: var(--success);
        }
        
        .booking-banner.cancelled {
            background: var(--danger);
        }
        
        .booking-header {
            padding: 15px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .booking-id {
            font-weight: 600;
            color: var(--dark);
            font-size: 15px;
        }
        
        .booking-date {
            font-size: 13px;
            color: var(--gray);
        }
        
        .package-thumbnail {
            position: relative;
            height: 160px;
            overflow: hidden;
            background-color: #f0f0f0;
        }
        
        .package-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            background-color: #f0f0f0;
        }
        
        .booking-card:hover .package-image {
            transform: scale(1.05);
        }
        
        .package-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 15px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        }
        
        .package-name {
            display: block;
            font-size: 18px;
            font-weight: 600;
            color: white;
            margin-bottom: 5px;
            text-decoration: none;
            transition: var(--transition);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }
        
        .package-name:hover {
            color: var(--primary-light);
        }
        
        .booking-content {
            padding: 0;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        
        .booking-details {
            flex: 1;
            padding: 15px;
        }
        
        .travel-details {
            margin-bottom: 15px;
        }
        
        .date-range {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: var(--dark);
        }
        
        .date-separator {
            margin: 0 10px;
            color: var(--gray);
        }
        
        .booking-info-row {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .booking-info-row i {
            margin-right: 8px;
            color: var(--primary-color);
            width: 16px;
            text-align: center;
        }
        
        .booking-status {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 13px;
            margin: 15px 0;
        }
        
        .booking-status i {
            margin-right: 5px;
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.15);
            color: #856404;
        }
        
        .status-confirmed {
            background-color: rgba(40, 167, 69, 0.15);
            color: #155724;
        }
        
        .status-cancelled {
            background-color: rgba(220, 53, 69, 0.15);
            color: #721c24;
        }
        
        .comment-box {
            background-color: var(--light);
            padding: 10px 15px;
            border-radius: 6px;
            margin-top: 15px;
            font-size: 14px;
            color: var(--dark);
        }
        
        .comment-box strong {
            display: block;
            margin-bottom: 5px;
            color: var(--gray);
        }
        
        .countdown-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: rgba(255,255,255,0.9);
            color: var(--dark);
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
            z-index: 1;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .countdown-badge.imminent {
            background-color: var(--warning);
            color: #856404;
            animation: pulse 1.5s infinite;
        }
        
        /* Status tag */
        .status-tag {
            position: absolute;
            top: 24px;
            right: -25px;
            transform: rotate(45deg);
            background-color: var(--success);
            color: white;
            padding: 5px 20px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1;
        }
        
        .status-tag.pending {
            background-color: var(--warning);
        }
        
        .status-tag.cancelled {
            background-color: var(--danger);
        }
        
        .booking-actions {
            padding: 15px;
            border-top: 1px solid var(--light-gray);
            text-align: right;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 12px;
            border-radius: var(--border-radius);
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            font-size: 13px;
        }
        
        .view-btn {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }
        
        .view-btn:hover {
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
        }
        
        .cancel-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background-color: var(--danger);
            color: white;
            padding: 8px 16px;
            border-radius: var(--border-radius);
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .cancel-btn:hover {
            background-color: #c82333;
            color: white;
            text-decoration: none;
        }
        
        /* Alerts */
        .alert-box {
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            position: relative;
            animation: fadeIn 0.5s;
        }
        
        .alert-success {
            background-color: rgba(40, 167, 69, 0.15);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: #155724;
        }
        
        .alert-error {
            background-color: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #721c24;
        }
        
        .close-alert {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            color: inherit;
            opacity: 0.7;
            font-size: 18px;
        }
        
        .close-alert:hover {
            opacity: 1;
        }
        
        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .empty-icon {
            font-size: 60px;
            color: var(--light-gray);
            margin-bottom: 20px;
        }
        
        .empty-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .empty-text {
            color: var(--gray);
            margin-bottom: 20px;
        }
        
        .browse-btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .browse-btn:hover {
            background-color: var(--primary-dark);
            color: white;
            text-decoration: none;
        }
        
        /* No results state */
        .no-results {
            text-align: center;
            padding: 30px;
            background-color: white;
            border-radius: var(--border-radius);
            margin-top: 20px;
            display: none;
        }
        
        .no-results-icon {
            font-size: 40px;
            color: var(--gray);
            margin-bottom: 10px;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .fadeIn {
            animation: fadeIn 0.5s;
        }
        
        /* Responsive design */
        @media (max-width: 767px) {
            .bookings-grid {
                grid-template-columns: 1fr;
            }
            
            .booking-page-header {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
                height: auto;
            }
            
            .advanced-filters {
                flex-direction: column;
                align-items: stretch;
            }
            
            .date-range-picker {
                justify-content: space-between;
            }
            
            .filter-controls {
                margin-top: 15px;
                padding-bottom: 10px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 8px;
            }
            
            .action-btn {
                text-align: center;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<!-- Top Header -->
<div class="top-header">
    <?php include('includes/header.php');?>
    <div class="banner-1">
        <?php 
            $uemail=$_SESSION['login'];
            $sql = "SELECT COUNT(*) as total FROM tblbooking WHERE UserEmail=:uemail";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
            $query->execute();
            $totalBookings = $query->fetchColumn();
            ?>
        <div class="container">
            <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">My Travel Bookings <span class="count">(<?php echo $totalBookings; ?> total)</span></h1>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="privacy">
    <div class="container my-bookings-container">
        <!-- Alert Messages -->
        <?php if($error){ ?>
        <div class="alert-box alert-error fadeIn">
            <i class="fa fa-exclamation-circle" style="margin-right:8px;"></i> <?php echo htmlentities($error); ?>
            <span class="close-alert" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
        <?php } else if($msg){ ?>
        <div class="alert-box alert-success fadeIn">
            <i class="fa fa-check-circle" style="margin-right:8px;"></i> <?php echo htmlentities($msg); ?>
            <span class="close-alert" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
        <?php } ?>
        
        <!-- Search and Filter Section -->
        <div class="search-and-filter wow fadeIn" data-wow-delay="0.3s">
            <!-- Enhanced Search Bar -->
            <div class="advanced-search">
                <div class="search-bar">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" id="booking-search" class="search-input" placeholder="Search bookings by destination, ID, or date...">
                    <button class="clear-search" id="clear-search"><i class="fa fa-times"></i></button>
                </div>
                <div class="advanced-filters">
                    <div class="date-filter">
                        <div class="date-range-picker">
                            <div class="date-input-group">
                                <label>From</label>
                                <input type="date" id="date-from" class="date-input">
                            </div>
                            <div class="date-input-group">
                                <label>To</label>
                                <input type="date" id="date-to" class="date-input">
                            </div>
                            <button id="apply-date-filter" class="apply-filter-btn">Apply</button>
                        </div>
                    </div>
                    <div class="sort-options">
                        <label>Sort by:</label>
                        <select id="sort-bookings" class="sort-select">
                            <option value="date-desc">Newest first</option>
                            <option value="date-asc">Oldest first</option>
                            <option value="a-z">A-Z</option>
                            <option value="z-a">Z-A</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Filter Controls -->
            <div class="filter-controls">
                <button class="filter-btn active" data-filter="all">
                    <i class="fa fa-list-ul"></i> All Bookings
                </button>
                <button class="filter-btn" data-filter="pending">
                    <i class="fa fa-clock-o"></i> Pending
                </button>
                <button class="filter-btn" data-filter="confirmed">
                    <i class="fa fa-check-circle"></i> Confirmed
                </button>
                <button class="filter-btn" data-filter="cancelled">
                    <i class="fa fa-times-circle"></i> Cancelled
                </button>
                <button class="filter-btn" data-filter="upcoming">
                    <i class="fa fa-plane"></i> Upcoming
                </button>
            </div>
        </div>
        
        <!-- No Results Message -->
        <div class="no-results" id="no-results">
            <div class="no-results-icon">
                <i class="fa fa-search"></i>
            </div>
            <h3>No matching bookings found</h3>
            <p>Try a different search term or filter selection</p>
        </div>
        
        <!-- Bookings Grid -->
        <?php 
        $sql = "SELECT tb.BookingId as bookid, tb.PackageId as pkgid, tp.PackageName as packagename, 
                tb.FromDate as fromdate, tb.ToDate as todate, tb.Comment as comment, 
                tb.status as status, tb.RegDate as regdate, tb.CancelledBy as cancelby, tb.UpdationDate as upddate 
                FROM tblbooking tb 
                JOIN tbltourpackages tp ON tp.PackageId=tb.PackageId 
                WHERE UserEmail=:uemail ORDER BY tb.BookingId DESC";
        $query = $dbh->prepare($sql);
        $query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        
        if($query->rowCount() > 0){ 
        ?>
        
        <div class="bookings-grid" id="bookings-grid">
            <?php foreach($results as $result){ 
                // Set status variables
                $statusClass = "";
                $statusText = "";
                $statusIcon = "";
                $bannerClass = "";
                $tagText = "";
                
                if($result->status == 0) {
                    $statusClass = "status-pending";
                    $statusText = "Pending Confirmation";
                    $statusIcon = "fa-clock-o";
                    $bannerClass = "pending";
                    $tagText = "PENDING";
                } else if($result->status == 1) {
                    $statusClass = "status-confirmed";
                    $statusText = "Confirmed";
                    $statusIcon = "fa-check-circle";
                    $bannerClass = "confirmed";
                    $tagText = "CONFIRMED";
                } else {
                    $statusClass = "status-cancelled";
                    $statusText = "Cancelled";
                    $statusIcon = "fa-times-circle";
                    $bannerClass = "cancelled";
                    $tagText = "CANCELLED";
                }
                
                // Calculate days remaining until trip
                $today = new DateTime();
                $tripStart = new DateTime($result->fromdate);
                $daysRemaining = $today->diff($tripStart)->days;
                $isUpcoming = ($tripStart > $today && $result->status != 2);
                
                // Check if the trip is within 7 days
                $isImminent = $isUpcoming && $daysRemaining <= 7;
            ?>
            
            <div class="booking-card wow fadeInUp" 
                 data-filter-status="<?php echo $statusClass; ?> <?php echo $isUpcoming ? 'upcoming' : ''; ?>"
                 data-search-content="<?php echo htmlentities(strtolower($result->packagename . ' BK' . $result->bookid . ' ' . 
                                                     date('d M Y', strtotime($result->fromdate)) . ' ' . 
                                                     date('d M Y', strtotime($result->todate)) . ' ' . 
                                                     date('d M Y', strtotime($result->regdate)) . ' ' . 
                                                     $statusText)); ?>"
                 data-date="<?php echo strtotime($result->regdate); ?>"
                 data-name="<?php echo htmlentities($result->packagename); ?>">
                
                <!-- Status Banner -->
                <div class="booking-banner <?php echo $bannerClass; ?>"></div>
                
                <!-- Status Tag -->
                <?php if($result->status != 2) { ?>
                <div class="status-tag <?php echo $bannerClass; ?>"><?php echo $tagText; ?></div>
                <?php } ?>
                
                <!-- Countdown badge for upcoming trips -->
                <?php if($isUpcoming) { ?>
                <div class="countdown-badge <?php echo $isImminent ? 'imminent' : ''; ?>">
                    <i class="fa fa-calendar-check-o"></i>
                    <?php if($daysRemaining == 0) { ?>
                        <span>Today!</span>
                    <?php } elseif($daysRemaining == 1) { ?>
                        <span>Tomorrow!</span>
                    <?php } else { ?>
                        <span><?php echo $daysRemaining; ?> days left</span>
                    <?php } ?>
                </div>
                <?php } ?>
                
                <!-- Card Header -->
                <div class="booking-header">
                    <div class="booking-id">
                        <i class="fa fa-bookmark"></i> Booking #BK<?php echo htmlentities($result->bookid); ?>
                    </div>
                    <div class="booking-date">
                        <i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($result->regdate)); ?>
                    </div>
                </div>
                
                <!-- Card Content -->
                <div class="booking-content">
                    <!-- Fetch and display package image if available -->
                    <?php 
                    $pkgId = htmlentities($result->pkgid);
                    $sqlImg = "SELECT PackageImage FROM tbltourpackages WHERE PackageId = :pkgid";
                    $queryImg = $dbh->prepare($sqlImg);
                    $queryImg->bindParam(':pkgid', $pkgId, PDO::PARAM_STR);
                    $queryImg->execute();
                    $imgResult = $queryImg->fetch(PDO::FETCH_OBJ);

                    // Default image path
                    $defaultImage = 'images/default-package.jpg';

                   // Process image data properly
                   if($queryImg->rowCount() > 0 && !empty($imgResult->PackageImage)) {
                    $rawImagePath = $imgResult->PackageImage;
    
                // Check if it's JSON format and try to extract the first image
                   if(strpos($rawImagePath, '[') === 0 || strpos($rawImagePath, '{') === 0) {
                    $decoded = json_decode($rawImagePath, true);
                     if(json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                       if(isset($decoded[0])) {
                         $rawImagePath = $decoded[0];
                           } elseif(!empty($decoded)) {
                       // If associative array, take first value
                           $rawImagePath = reset($decoded);
                           }
                }
           }
    
    // Clean the path
    $rawImagePath = trim($rawImagePath, '/\\');
    
    // Try different possible path combinations
    $possiblePaths = [
        $rawImagePath,
        'admin/' . $rawImagePath,
        '../admin/' . $rawImagePath,
        'packageimages/' . $rawImagePath,
        'admin/packageimages/' . $rawImagePath,
        'admin/pacakgeimages/' . $rawImagePath, // Common typo in some systems
        'images/packageimages/' . $rawImagePath,
        'uploads/' . $rawImagePath
    ];
    
    // Find first existing path
    $finalImagePath = $defaultImage;
    foreach($possiblePaths as $path) {
        if(file_exists($path)) {
            $finalImagePath = $path;
            break;
        }
    }
} else {
    $finalImagePath = $defaultImage;
}

// Create default image directory and placeholder if needed
if(!file_exists('images')) {
    mkdir('images', 0755, true);
}

// Ensure default image exists
if($finalImagePath === $defaultImage && !file_exists($defaultImage)) {
    // Use a data URI as fallback if the default image doesn't exist
    $finalImagePath = 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCAEsASwDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//Z';
}
?>
                    
                    <div class="package-thumbnail">
                        <img src="<?php echo htmlentities($finalImagePath); ?>" 
                             alt="<?php echo htmlentities($result->packagename); ?>" 
                             class="package-image"
                             onerror="this.src='images/default-package.jpg'; this.onerror=null;">
                        
                        <!-- Package info overlaid on image -->
                        <div class="package-info">
                            <a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid); ?>" class="package-name">
                                <?php echo htmlentities($result->packagename); ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="booking-details">
                        <div class="travel-details">
                            <div class="booking-info-row">
                                <i class="fa fa-calendar-check-o"></i>
                                <div class="date-range">
                                    <span><?php echo date('d M Y', strtotime($result->fromdate)); ?></span>
                                    <span class="date-separator"><i class="fa fa-long-arrow-right"></i></span>
                                    <span><?php echo date('d M Y', strtotime($result->todate)); ?></span>
                                </div>
                            </div>
                            
                            <div class="booking-info-row">
                                <i class="fa fa-clock-o"></i>
                                <div>Duration: <?php 
                                    $datetime1 = new DateTime($result->fromdate);
                                    $datetime2 = new DateTime($result->todate);
                                    $interval = $datetime1->diff($datetime2);
                                    echo $interval->format('%a days');
                                ?></div>
                            </div>
                            
                            <!-- Add traveler details if available in your database -->
                            <div class="booking-info-row">
                                <i class="fa fa-users"></i>
                                <div>
                                    <?php
                                    // If you have a travelers table, uncomment and modify this code
                                    /*
                                    $sqlTravelers = "SELECT * FROM tbltravelers WHERE BookingId = :bookid";
                                    $queryTravelers = $dbh->prepare($sqlTravelers);
                                    $queryTravelers->bindParam(':bookid', $result->bookid, PDO::PARAM_STR);
                                    $queryTravelers->execute();
                                    $travelerCount = $queryTravelers->rowCount();
                                    
                                    if($travelerCount > 0) {
                                        echo $travelerCount . " Traveler" . ($travelerCount > 1 ? "s" : "");
                                    } else {
                                        echo "Traveler details not specified";
                                    }
                                    */
                                    // For now, show a placeholder
                                    echo "Adult travelers";
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Status Badge -->
                        <div class="booking-status <?php echo $statusClass; ?>">
                            <i class="fa <?php echo $statusIcon; ?>"></i> <?php echo $statusText; ?>
                            <?php if($result->status == 2) {
                                echo ($result->cancelby == 'u') ? ' by you' : ' by admin';
                                if($result->upddate) {
                                    echo ' on ' . date('d M Y', strtotime($result->upddate));
                                }
                            } ?>
                        </div>
                        
                        <!-- Comment Box (if any) -->
                        <?php if(!empty($result->comment)) { ?>
                        <div class="comment-box">
                            <strong><i class="fa fa-comment"></i> Your Note:</strong>
                            <?php echo htmlentities($result->comment); ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <!-- Card Footer with Actions -->
                <div class="booking-actions">
                    <?php if($result->status == 2) { ?>
                        <span class="booking-status <?php echo $statusClass; ?>" style="margin:0">
                            <i class="fa <?php echo $statusIcon; ?>"></i> Cancelled
                        </span>
                    <?php } else { ?>
                        <div class="action-buttons">
                            <!-- View Invoice/Download Ticket button -->
                            <a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid); ?>" class="action-btn view-btn">
                                <i class="fa fa-file-text-o"></i> View Details
                            </a>
                            
                            <!-- Cancel Booking -->
                            <a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid); ?>" 
                               class="action-btn cancel-btn" 
                               onclick="return confirm('Are you sure you want to cancel this booking?')">
                                <i class="fa fa-times"></i> Cancel
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } else { ?>
            <!-- Empty State -->
            <div class="empty-state wow fadeIn" data-wow-delay="0.5s">
                <div class="empty-icon">
                    <i class="fa fa-suitcase"></i>
                </div>
                <h3 class="empty-title">No bookings found</h3>
                <p class="empty-text">You haven't booked any tours yet. Explore our packages and plan your next adventure!</p>
                <a href="package-list.php" class="browse-btn">Browse Tour Packages</a>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer -->
<?php include('includes/footer.php');?>

<!-- Modal Popups -->
<?php include('includes/signup.php');?>			
<?php include('includes/signin.php');?>			
<?php include('includes/write-us.php');?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create default image directory if needed
        function ensureDefaultImageExists() {
            // Check if images folder exists, create it if not
            var xhr = new XMLHttpRequest();
            xhr.open('HEAD', 'images', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status !== 200) {
                        console.log("Images directory might not exist. Default image fallback may not work.");
                    }
                }
            };
            xhr.send(null);
        }
        
        ensureDefaultImageExists();
        
        // Rest of your existing JavaScript
        const filterButtons = document.querySelectorAll('.filter-btn');
        const bookingCards = document.querySelectorAll('.booking-card');
        const searchInput = document.getElementById('booking-search');
        const clearSearchBtn = document.getElementById('clear-search');
        const noResultsDiv = document.getElementById('no-results');
        const bookingsGrid = document.getElementById('bookings-grid');
        const dateFromInput = document.getElementById('date-from');
        const dateToInput = document.getElementById('date-to');
        const applyDateBtn = document.getElementById('apply-date-filter');
        const sortSelect = document.getElementById('sort-bookings');
        
        // Function to filter bookings
        function filterBookings() {
            const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
            const searchTerm = searchInput.value.trim().toLowerCase();
            let visibleCount = 0;
            
            // Show/hide clear button
            if (searchTerm.length > 0) {
                clearSearchBtn.style.display = 'block';
            } else {
                clearSearchBtn.style.display = 'none';
            }
            
            // Get date filters if set
            const dateFrom = dateFromInput.value ? new Date(dateFromInput.value) : null;
            const dateTo = dateToInput.value ? new Date(dateToInput.value) : null;
            
            bookingCards.forEach(card => {
                // Check if card matches current status filter
                const matchesFilter = activeFilter === 'all' || card.getAttribute('data-filter-status').includes(activeFilter);
                
                // Check if card matches search term
                const searchContent = card.getAttribute('data-search-content');
                const matchesSearch = searchTerm === '' || searchContent.includes(searchTerm);
                
                // Check if card matches date range
                let matchesDateRange = true;
                if (dateFrom || dateTo) {
                    const cardDate = new Date(parseInt(card.getAttribute('data-date')) * 1000);
                    if (dateFrom && dateTo) {
                        matchesDateRange = cardDate >= dateFrom && cardDate <= dateTo;
                    } else if (dateFrom) {
                        matchesDateRange = cardDate >= dateFrom;
                    } else if (dateTo) {
                        matchesDateRange = cardDate <= dateTo;
                    }
                }
                
                // Show/hide card based on all conditions
                if (matchesFilter && matchesSearch && matchesDateRange) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noResultsDiv.style.display = 'block';
                bookingsGrid.style.marginBottom = '0';
            } else {
                noResultsDiv.style.display = 'none';
                bookingsGrid.style.marginBottom = '30px';
            }
        }
        
        // Function to sort booking cards
        function sortBookings() {
            const sortOption = sortSelect.value;
            const cards = Array.from(bookingCards);
            
            // Sort the cards based on selected option
            cards.sort((a, b) => {
                if (sortOption === 'date-desc') {
                    return parseInt(b.getAttribute('data-date')) - parseInt(a.getAttribute('data-date'));
                } else if (sortOption === 'date-asc') {
                    return parseInt(a.getAttribute('data-date')) - parseInt(b.getAttribute('data-date'));
                } else if (sortOption === 'a-z') {
                    return a.getAttribute('data-name').localeCompare(b.getAttribute('data-name'));
                } else if (sortOption === 'z-a') {
                    return b.getAttribute('data-name').localeCompare(a.getAttribute('data-name'));
                }
                return 0;
            });
            
            // Reorder cards in the DOM
            const container = document.getElementById('bookings-grid');
            cards.forEach(card => {
                container.appendChild(card);
            });
        }
        
        // Filter button click event
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Apply filters
                filterBookings();
            });
        });
        
        // Search input event
        searchInput.addEventListener('input', filterBookings);
        
        // Clear search button
        clearSearchBtn.addEventListener('click', function() {
            searchInput.value = '';
            filterBookings();
        });
        
        // Apply date filter
        applyDateBtn.addEventListener('click', filterBookings);
        
        // Sort change event
        sortSelect.addEventListener('change', function() {
            sortBookings();
            filterBookings(); // Apply filters after sorting
        });
        
        // Initialize
        filterBookings();
    });
</script>

</body>
</html>
<?php } ?>