<?php
session_start();
error_reporting(0);
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
<title>Admin Manage Users</title>
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
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Manage Users</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th>Name</th>
							<th>Mobile No.</th>
							<th>Email Id</th>
							<th>RegDate </th>
							<th>Updation Date</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT * from tblusers";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->FullName);?></td>
							<td><?php echo htmlentities($result->MobileNumber);?></td>
							<td><?php echo htmlentities($result->EmailId);?></td>
							<td><?php echo htmlentities($result->RegDate);?></td>
							<td><?php echo htmlentities($result->UpdationDate);?></td>
							<td><a href="user-bookings.php?uid=<?php echo htmlentities($result->EmailId);?>&&uname=<?php echo htmlentities($result->FullName);?>" class="btn btn-primary">User Bookings</td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
		<style>
/* Modern Professional Table Design */
body {
    font-family: 'Roboto', 'Segoe UI', sans-serif;
    background: #f0f4f8;
    color: #334e68;
}

.agile-tables {
    background: #ffffff;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0 5px 20px rgba(107, 126, 190, 0.1);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    border-top: none;
}

.agile-tables::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #4299e1, #63b3ed, #90cdf4);
}

.w3l-table-info h2 {
    color: #1a365d;
    font-size: 20px;
    margin-bottom: 25px;
    font-weight: 500;
    padding-bottom: 12px;
    position: relative;
    border-bottom: 1px solid #e2e8f0;
}

.w3l-table-info h2::before {
    content: "📊";
    margin-right: 8px;
    font-size: 20px;
}

/* Table styling */
#table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-bottom: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

#table thead th {
    background:rgb(93, 132, 177);
    color: #2d3748;
    padding: 14px 16px;
    font-weight: 500;
    text-align: left;
    font-size: 13px;
    letter-spacing: 0.3px;
    border-bottom: 2px solid #edf2f7;
    position: sticky;
    top: 0;
    z-index: 10;
}

#table tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #edf2f7;
}

#table tbody tr:last-child {
    border-bottom: none;
}

#table tbody tr:hover {
    background-color: #ebf8ff;
}

#table td {
    padding: 14px 16px;
    font-size: 14px;
    color: #4a5568;
    vertical-align: middle;
    line-height: 1.4;
}

/* Action buttons */
.btn {
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.08);
    letter-spacing: 0.3px;
}

.btn-primary {
    background:rgb(65, 185, 255);
    color: white;
    margin-bottom: 8px;
}

.btn-primary:hover {
    background: #2b6cb0;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(49, 130, 206, 0.2);
}

.btn-danger {
    background: #e53e3e;
    color: white;
}

.btn-danger:hover {
    background: #c53030;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(229, 62, 62, 0.2);
}

.btn-block {
    display: block;
    width: 100%;
    text-align: center;
    margin-bottom: 6px;
}

/* Breadcrumb styling */
.breadcrumb {
    background: transparent;
    padding: 15px 0;
    margin-bottom: 20px;
    font-size: 14px;
    border-radius: 0;
    color: #718096;
}

.breadcrumb-item {
    display: inline-block;
}

.breadcrumb-item a {
    color: #4299e1;
    text-decoration: none;
    font-weight: 500;
}

.breadcrumb i {
    margin: 0 8px;
    color: #cbd5e0;
}

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .agile-tables {
        padding: 20px 15px;
        border-radius: 8px;
    }
    
    #table thead th {
        padding: 12px 10px;
        font-size: 12px;
    }
    
    #table td {
        padding: 12px 10px;
        font-size: 13px;
    }
    
    .btn {
        padding: 7px 12px;
        font-size: 12px;
    }
}

/* Email styling - make emails more readable */
#table td:nth-child(4) {
    font-family: monospace;
    font-size: 13px;
    color: #4a5568;
}

/* Date styling */
#table td:nth-child(5), #table td:nth-child(6) {
    color: #718096;
    font-size: 13px;
}

/* Name highlighting */
#table td:nth-child(2) {
    font-weight: 500;
    color: #2d3748;
}

/* Row count styling */
#table td:first-child {
    color: #a0aec0;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
    width: 40px;
}

/* Focus styles for accessibility */
a:focus, button:focus {
    outline: 2px solid #4299e1;
    outline-offset: 2px;
}

/* Empty state styling */
.no-users {
    text-align: center;
    padding: 40px 0;
    color: #a0aec0;
    font-size: 16px;
    background: #f7fafc;
    border-radius: 6px;
    margin: 20px 0;
    border: 1px dashed #e2e8f0;
}

/* Subtle hover effect for rows */
#table tbody tr {
    position: relative;
}

#table tbody tr::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 0%;
    background: #4299e1;
    transition: height 0.3s ease;
}

#table tbody tr:hover::after {
    height: 100%;
}

/* Better scrolling experience */
.w3l-table-info {
    position: relative;
    overflow: auto;
    max-height: 70vh;
    scrollbar-width: thin;
    scrollbar-color: #cbd5e0 #edf2f7;
}

/* Custom scrollbar */
.w3l-table-info::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.w3l-table-info::-webkit-scrollbar-track {
    background: #edf2f7;
    border-radius: 4px;
}

.w3l-table-info::-webkit-scrollbar-thumb {
    background: #cbd5e0;
    border-radius: 4px;
}

.w3l-table-info::-webkit-scrollbar-thumb:hover {
    background: #a0aec0;
}

/* Status indicators for potential future use */
.status-indicator {
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-right: 6px;
}

.status-active {
    background: #48bb78;
}

.status-inactive {
    background: #a0aec0;
}

/* Responsive tables for mobile */
@media (max-width: 767px) {
    .bt-content {
        padding: 8px 0;
    }
    
    .bt-content:before {
        color: #a0aec0;
        font-weight: 500;
        padding-right: 8px;
    }
}
</style>
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
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

</body>
</html>
<?php } ?>