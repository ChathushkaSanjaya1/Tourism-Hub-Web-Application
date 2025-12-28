<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
<!--header start here-->
<?php include('includes/header.php');?>
<!--header end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
			<?php
// filepath: c:\xampp\htdocs\PearlHeritageTravels\tms\admin\dashboard.php
?>
<style>
/* Card base styling with a clean, modern design */
.card-counter {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(149, 157, 165, 0.1);
    height: 155px;
    margin: 15px 8px;
    padding: 20px;
    position: relative;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    overflow: hidden;
    border: none;
}

/* Sleek hover effect */
.card-counter:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(149, 157, 165, 0.15);
}

/* Soft focus state for keyboard navigation */
.card-counter:focus-within {
    outline: none;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5), 0 8px 24px rgba(149, 157, 165, 0.1);
}

/* Left border accent instead of gradient backgrounds */
.card-counter.primary {
    border-left: 4px solid #6366F1;
    color: #2D3748;
}

.card-counter.success {
    border-left: 4px solid #10B981;
    color: #2D3748;
}

.card-counter.danger {
    border-left: 4px solid #EF4444;
    color: #2D3748;
}

.card-counter.info {
    border-left: 4px solid #3B82F6;
    color: #2D3748;
}

.card-counter.warning {
    border-left: 4px solid #F59E0B;
    color: #2D3748;
}

/* Add colored ribbon effect at top */
.card-counter::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background-color: #E2E8F0;
}

.card-counter.primary::before { background-color: #6366F1; }
.card-counter.success::before { background-color: #10B981; }
.card-counter.danger::before { background-color: #EF4444; }
.card-counter.info::before { background-color: #3B82F6; }
.card-counter.warning::before { background-color: #F59E0B; }

/* Clean, colorful icon styling with a background halo */
.card-counter i {
    font-size: 2.8em;
    opacity: 1;
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}

.card-counter.primary i { color: #6366F1; }
.card-counter.success i { color: #10B981; }
.card-counter.danger i { color: #EF4444; }
.card-counter.info i { color: #3B82F6; }
.card-counter.warning i { color: #F59E0B; }

/* Icon background halo effect */
.card-counter i::after {
    content: '';
    position: absolute;
    width: 50px;
    height: 50px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: currentColor;
    border-radius: 50%;
    opacity: 0.1;
    z-index: -1;
}

/* Subtle icon animation on hover */
.card-counter:hover i {
    transform: translateY(-50%) scale(1.1);
}

/* Clean counter numbers */
.card-counter .count-numbers {
    font-size: 2.8em;
    font-weight: 700;
    position: absolute;
    right: 22px;
    top: 15px;
    color: #1A202C;
    letter-spacing: -0.5px;
    line-height: 1;
}

/* Understated counter labels */
.card-counter .count-name {
    font-size: 0.9rem;
    font-weight: 500;
    position: absolute;
    right: 22px;
    bottom: 18px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #718096;
    max-width: 60%;
    text-align: right;
}

/* Card link styling */
a.card-link {
    text-decoration: none;
    display: block;
}

/* Add subtle reveal effect */
.card-counter::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: radial-gradient(circle at top right, rgba(255,255,255,0.8) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.card-counter:hover::after {
    opacity: 1;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-counter {
        height: 140px;
        padding: 15px;
    }
    
    .card-counter i {
        font-size: 2.4em;
        left: 15px;
    }
    
    .card-counter .count-numbers {
        font-size: 2.2em;
        right: 15px;
    }
    
    .card-counter .count-name {
        font-size: 0.85rem;
        right: 15px;
    }
}

/* Fix for very small screens */
@media (max-width: 480px) {
    .card-counter {
        height: 130px;
    }
    
    .card-counter .count-numbers {
        font-size: 2em;
    }
    
    .card-counter .count-name {
        max-width: 55%;
        font-size: 0.8rem;
    }
}
</style>

<div class="row">
    <div class="col-md-3">
      <a href="manage-users.php"  class="card-link">
        <div class="card-counter primary">
          <i class="glyphicon glyphicon-user"></i>
          <span class="count-numbers">
            <?php
              $sql = "SELECT id from tblusers";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = $query->rowCount();
              echo htmlentities($cnt);
            ?>
          </span>
          <span class="count-name">Registered Users</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="manageissues.php"  class="card-link">
        <div class="card-counter danger">
          <i class="glyphicon glyphicon-exclamation-sign"></i>
          <span class="count-numbers">
            <?php
              $sql5 = "SELECT id from tblissues";
              $query5 = $dbh->prepare($sql5);
              $query5->execute();
              $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
              $cnt5 = $query5->rowCount();
              echo htmlentities($cnt5);
            ?>
          </span>
          <span class="count-name">Reported Issues</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="manage-packages.php"  class="card-link">
        <div class="card-counter success">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span class="count-numbers">
            <?php
              $sql3 = "SELECT PackageId from tbltourpackages";
              $query3 = $dbh->prepare($sql3);
              $query3->execute();
              $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
              $cnt3 = $query3->rowCount();
              echo htmlentities($cnt3);
            ?>
          </span>
          <span class="count-name">Tour Packages</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="manage-enquires.php"  class="card-link">
        <div class="card-counter info">
          <i class="glyphicon glyphicon-question-sign"></i>
          <span class="count-numbers">
            <?php
              $sql2 = "SELECT id from tblenquiry";
              $query2 = $dbh->prepare($sql2);
              $query2->execute();
              $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
              $cnt2 = $query2->rowCount();
              echo htmlentities($cnt2);
            ?>
          </span>
          <span class="count-name">Total Enquiries</span>
        </div>
      </a>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
      <a href="manage-enquires.php"  class="card-link">
        <div class="card-counter primary">
          <i class="glyphicon glyphicon-envelope"></i>
          <span class="count-numbers">
            <?php
              $sql = "SELECT id from tblenquiry where (Status is null || Status='')";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $newenq = $query->rowCount();
              echo htmlentities($newenq);
            ?>
          </span>
          <span class="count-name">New Enquiries</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="manage-enquires.php"  class="card-link">
        <div class="card-counter success">
          <i class="glyphicon glyphicon-ok-sign"></i>
          <span class="count-numbers">
            <?php
              $sql5 = "SELECT id from tblenquiry where (Status='1')";
              $query5 = $dbh->prepare($sql5);
              $query5->execute();
              $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
              $redenq = $query5->rowCount();
              echo htmlentities($redenq);
            ?>
          </span>
          <span class="count-name">Read Enquiries</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="manage-bookings.php"  class="card-link">
        <div class="card-counter info">
          <i class="glyphicon glyphicon-calendar"></i>
          <span class="count-numbers">
            <?php
              $sql1 = "SELECT BookingId from tblbooking";
              $query1 = $dbh->prepare($sql1);
              $query1->execute();
              $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
              $cnt1 = $query1->rowCount();
              echo htmlentities($cnt1);
            ?>
          </span>
          <span class="count-name">Total Bookings</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="manage-bookings.php"  class="card-link">
        <div class="card-counter warning">
          <i class="glyphicon glyphicon-time"></i>
          <span class="count-numbers">
            <?php
              $sql = "SELECT BookingId from tblbooking where (status is null || status='')";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $newbookings = $query->rowCount();
              echo htmlentities($newbookings);
            ?>
          </span>
          <span class="count-name">Pending Bookings</span>
        </div>
      </a>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
      <a href="manage-bookings.php"  class="card-link">
        <div class="card-counter danger">
          <i class="glyphicon glyphicon-remove-circle"></i>
          <span class="count-numbers">
            <?php
              $sql = "SELECT BookingId from tblbooking where (status='2')";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cancelbooking = $query->rowCount();
              echo htmlentities($cancelbooking);
            ?>
          </span>
          <span class="count-name">Cancelled Bookings</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="manage-bookings.php"  class="card-link">
        <div class="card-counter success">
          <i class="glyphicon glyphicon-ok-circle"></i>
          <span class="count-numbers">
            <?php
              $sql = "SELECT BookingId from tblbooking where (status='1')";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $confirmedbooking = $query->rowCount();
              echo htmlentities($confirmedbooking);
            ?>
          </span>
          <span class="count-name">Confirmed Bookings</span>
        </div>
      </a>
    </div>
</div>
<!-- //Four Grids -->


<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
</div>
</div>

			<!--/sidebar-menu-->
				<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
</body>
</html>
<?php } ?>