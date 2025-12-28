<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
}else{ 
// Code for deletion
if($_GET['action']=='delete')
{
$id=intval($_GET['id']);
//$query=mysqli_query($con,"delete from tbltourpackages where PackageId =:id");
$sql ="delete from tbltourpackages where PackageId =:id";
$query = $dbh -> prepare($sql);
$query -> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Package deleted.');</script>";
 echo "<script>window.location.href='manage-packages.php'</script>";

}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Manage packages</title>
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
					  <h2>Manage Packages</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th >Name</th>
							<th>Type</th>
							<th>Location</th>
							<th>Price</th>
							<th>Creation Date</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT * from tblTourPackages";
$query = $dbh -> prepare($sql);
//$query -> bindParam(':city', $city, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->PackageName);?></td>
							<td><?php echo htmlentities($result->PackageType);?></td>
							<td><?php echo htmlentities($result->PackageLocation);?></td>
							<td>Rs.<?php echo htmlentities($result->PackagePrice);?></td>
							<td><?php echo htmlentities($result->Creationdate);?></td>
							<td><a href="update-package.php?pid=<?php echo htmlentities($result->PackageId);?>"><button type="button" class="btn btn-primary btn-block">View Details</button></a><br />
<a href="manage-packages.php?action=delete&&id=<?php echo $result->PackageId;?>" onclick="return confirm('Do you really want to delete?')" class="btn btn-danger btn-block">Delete</a>
							</td>
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
<style>
/* Modern User-Friendly Table Styling */
body {
    font-family: 'Roboto', sans-serif;
    background: #f5f7fa;
    color: #4a4a4a;
}

.agile-tables {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
}

.w3l-table-info h2 {
    color: #3a4f63;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: 500;
    border-bottom: 2px solid #f1f1f1;
    padding-bottom: 10px;
}

/* Table styling */
#table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    box-shadow: none;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 15px;
}

#table thead th {
    background:rgb(93, 132, 177);
    color: #ffffff;
    padding: 12px 15px;
    font-weight: 500;
    text-align: left;
    font-size: 14px;
    border: none;
    letter-spacing: 0.5px;
}

#table tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #f2f2f2;
}

#table tbody tr:hover {
    background-color: #f7f9fc;
}

#table tbody tr:nth-child(even) {
    background-color: #f8fafd;
}

#table td {
    padding: 12px 15px;
    font-size: 14px;
    color: #555;
    border: none;
    vertical-align: middle;
}

/* Action buttons */
.btn {
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-primary {
    background:rgb(65, 185, 255);
    color: white;
    margin-bottom: 6px;
}

.btn-primary:hover {
    background: #5a68d5;
    box-shadow: 0 4px 8px rgba(108, 122, 224, 0.2);
}

.btn-danger {
    background:rgb(126, 126, 126);
    color: white;
}

.btn-danger:hover {
    background: #ff5252;
    box-shadow: 0 4px 8px rgba(255, 107, 107, 0.2);
}

.btn-block {
    display: block;
    width: 100%;
    text-align: center;
    margin-bottom: 5px;
}

/* Breadcrumb styling */
.breadcrumb {
    background: #fff;
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
    font-size: 14px;
}

.breadcrumb-item {
    display: inline-block;
}

.breadcrumb-item a {
    color: #6c7ae0;
    text-decoration: none;
}

.breadcrumb i {
    margin: 0 8px;
    color: #ccc;
}

/* Mobile responsive adjustments */
@media (max-width: 767px) {
    .agile-tables {
        padding: 15px 10px;
        border-radius: 6px;
    }
    
    #table {
        font-size: 13px;
    }
    
    #table td, #table th {
        padding: 10px 8px;
    }
    
    .btn {
        font-size: 13px;
        padding: 7px 10px;
    }
    
    /* For better mobile experience */
    .bt-content {
        padding: 8px 0;
    }
}

/* Package price styling */
#table td:nth-child(5) {
    font-weight: 500;
    color: #3a4f63;
}

/* Status indicators - could be used for future features */
.status-active {
    background: #e3fcef;
    color: #00a67d;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
}

/* Empty state styling */
.no-packages {
    text-align: center;
    padding: 30px;
    color: #8c9bab;
}

/* Focus styles for accessibility */
a:focus, button:focus {
    outline: 2px solid #6c7ae0;
    outline-offset: 2px;
}

/* Add a bit of animation to deletion confirmation */
.confirm-delete {
    animation: pulse 0.3s ease-in-out;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}
</style>							
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>