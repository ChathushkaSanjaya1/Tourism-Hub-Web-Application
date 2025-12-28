<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if($_POST['submit']=="Update")
{
	$pagetype=$_GET['type'];
	$pagedetails=$_POST['pgedetails'];
$sql = "UPDATE tblpages SET detail=:pagedetails WHERE type=:pagetype";
$query = $dbh->prepare($sql);
$query -> bindParam(':pagetype',$pagetype, PDO::PARAM_STR);
$query-> bindParam(':pagedetails',$pagedetails, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Package Creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<style>
    /* Modern Gradient Design - Tropical Palette */
    :root {
        --primary: #00b894;
        --primary-gradient: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
        --primary-light: #55efc4;
        --primary-dark: #009670;
        --secondary: #fdcb6e;
        --secondary-gradient: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
        --accent: #e17055;
        --text-dark: #2d3436;
        --text-medium: #636e72;
        --text-light: #ffffff;
        --bg-light: #f5f8fa;
        --bg-white: #ffffff;
        --success: #00b894;
        --error: #d63031;
        --warning: #fdcb6e;
        --info: #0984e3;
        --border-color: #dfe6e9;
        --card-border: 1px solid rgba(0,0,0,0.05);
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.07);
        --shadow-md: 0 5px 15px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 25px rgba(0,0,0,0.15);
        --transition: all 0.3s ease;
        --radius-sm: 6px;
        --radius-md: 12px;
        --radius-lg: 20px;
    }

    body {
        font-family: 'Montserrat', 'Roboto', sans-serif;
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.6;
        letter-spacing: 0.2px;
    }

    .page-container {
        padding: 24px;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIj48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ0cmFuc3BhcmVudCIgLz48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iNiIgaGVpZ2h0PSI2IiBmaWxsPSIjMDBiODk0MTAiIHJ4PSIyIiAvPjwvc3ZnPg==');
    }

    .grid-form1 {
        background: var(--bg-white);
        padding: 30px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        border: var(--card-border);
        position: relative;
        overflow: hidden;
    }
    
    .grid-form1::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--primary-gradient);
    }
    
    .grid-form1:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-3px);
    }

    .grid-form1 h3 {
        color: var(--text-dark);
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        position: relative;
    }
    
    .grid-form1 h3::before {
        content: '';
        display: inline-block;
        width: 24px;
        height: 24px;
        background: var(--primary-gradient);
        margin-right: 12px;
        border-radius: 6px;
    }

    .form-horizontal .form-group {
        margin-bottom: 28px;
    }

    .form-horizontal .control-label {
        font-weight: 600;
        color: var(--text-medium);
        padding-top: 10px;
        font-size: 14px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .form-control {
        border-radius: var(--radius-sm);
        border: 2px solid var(--border-color);
        box-shadow: none;
        padding: 12px 16px;
        transition: var(--transition);
        height: auto;
        font-size: 15px;
        background-color: #f9fafb;
    }

    .form-control:focus {
        border-color: var(--primary);
        background-color: var(--bg-white);
        box-shadow: 0 0 0 4px rgba(0, 184, 148, 0.15);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 200px;
        line-height: 1.8;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%2300b894' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 16px;
        padding-right: 40px;
        cursor: pointer;
    }
    
    select.form-control:hover {
        border-color: var(--primary-light);
    }

    .btn-primary {
        background: var(--primary-gradient);
        border: none;
        padding: 12px 30px;
        border-radius: var(--radius-md);
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: var(--transition);
        box-shadow: 0 4px 10px rgba(0, 184, 148, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover {
        box-shadow: 0 6px 15px rgba(0, 184, 148, 0.4);
        transform: translateY(-2px);
    }
    
    .btn-primary:active {
        transform: translateY(0);
        box-shadow: 0 2px 5px rgba(0, 184, 148, 0.3);
    }
    
    .btn-primary::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
    }
    
    .btn-primary:focus::after {
        animation: ripple 1s ease-out;
    }
    
    @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 0.5;
        }
        100% {
            transform: scale(20, 20);
            opacity: 0;
        }
    }

    .errorWrap {
        padding: 18px;
        margin: 0 0 24px 0;
        background-color: #fff5f5;
        border-left: 5px solid var(--error);
        border-radius: var(--radius-sm);
        color: var(--error);
        font-weight: 500;
        display: flex;
        align-items: flex-start;
        position: relative;
    }
    
    .errorWrap:before {
        content: '\26A0';
        margin-right: 15px;
        font-size: 20px;
    }

    .succWrap {
        padding: 18px;
        margin: 0 0 24px 0;
        background-color: #f0fff4;
        border-left: 5px solid var(--success);
        border-radius: var(--radius-sm);
        color: var(--success);
        font-weight: 500;
        display: flex;
        align-items: flex-start;
    }
    
    .succWrap:before {
        content: '\2713';
        margin-right: 15px;
        font-size: 20px;
        background: var(--success);
        color: white;
        height: 25px;
        width: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin: 0 0 30px 0;
    }

    .breadcrumb-item a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .breadcrumb-item a:hover {
        color: var(--primary-dark);
    }

    .breadcrumb-item.active {
        color: var(--text-medium);
    }

    .panel-footer {
        background: #f9fafb;
        padding: 20px;
        border-top: 1px solid var(--border-color);
        border-radius: 0 0 var(--radius-md) var(--radius-md);
        margin-top: 30px;
    }
    
    /* Table styles */
    .table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        border-radius: var(--radius-md);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }
    
    .table thead th {
        background: var(--primary-gradient);
        color: var(--text-light);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 13px;
        padding: 16px;
    }
    
    .table tbody td {
        padding: 16px;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }
    
    .table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .table tbody tr:hover {
        background-color: rgba(0, 184, 148, 0.05);
    }
    
    /* Editor container */
    .nicEdit-main {
        border: 2px solid var(--border-color);
        border-radius: 0 0 var(--radius-sm) var(--radius-sm);
        padding: 15px;
        background-color: #f9fafb;
        transition: var(--transition);
    }
    
    .nicEdit-main:focus-within {
        background-color: var(--bg-white);
    }
    
    .nicEdit-panelContain {
        border-radius: var(--radius-sm) var(--radius-sm) 0 0;
        border: 2px solid var(--border-color);
        border-bottom: none;
        background: #f0f2f5;
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
        .grid-form1 {
            padding: 25px;
        }
        
        .form-horizontal .control-label {
            margin-bottom: 10px;
        }
    }
    
    @media (max-width: 768px) {
        .col-sm-8, .col-sm-offset-2 {
            width: 100%;
            margin-left: 0;
        }

        .form-horizontal .control-label {
            text-align: left;
            margin-bottom: 10px;
        }
        
        .grid-form1 h3 {
            font-size: 20px;
        }
        
        .btn-primary {
            width: 100%;
            margin-top: 10px;
        }
    }
    
    /* Animation & Effects */
    .tab-pane {
        animation: slideUp 0.4s ease-out;
    }
    
    @keyframes slideUp {
        from { 
            opacity: 0; 
            transform: translateY(20px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0); 
        }
    }
    
    /* Custom checkbox and radio styles */
    input[type="checkbox"], input[type="radio"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid var(--border-color);
        background-color: var(--bg-white);
        border-radius: 4px;
        margin-right: 8px;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        transition: var(--transition);
    }
    
    input[type="checkbox"]:checked, input[type="radio"]:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    
    input[type="checkbox"]:checked::before, input[type="radio"]:checked::before {
        content: '\2713';
        position: absolute;
        color: white;
        font-size: 14px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    
    input[type="radio"] {
        border-radius: 50%;
    }
    
    input[type="radio"]:checked::before {
        content: '';
        width: 10px;
        height: 10px;
        background-color: white;
        border-radius: 50%;
    }
    
    /* Target specific elements */
    .page-container .left-content {
        background-color: var(--bg-light);
    }
    
    .mother-grid-inner {
        position: relative;
    }
    
    .mother-grid-inner::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        opacity: 0.03;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2300b894' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>


<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>		

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

		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Update Page Data</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select page</label>
									<div class="col-sm-8">
									   <select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
                  <option value="" selected="selected" class="form-control">***Select One***</option>
                  <option value="manage-pages.php?type=terms">terms and condition</option>
                  <option value="manage-pages.php?type=privacy">privacy and policy</option>
                  <option value="manage-pages.php?type=aboutus">aboutus</option> 
                  <option value="manage-pages.php?type=contact">Contact us</option>
                </select>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Selected Page</label>
									<div class="col-sm-8">
									<?php
			
			switch($_GET['type'])
			{
				case "terms" :
									echo "Terms and Conditions";
									break;
				
				case "privacy" :
									echo "Privacy And Policy";
									break;
				
				case "aboutus" :
									echo "About US";
									break;
				case "software" :
									echo "Offers";
									break;	
				case "aspnet" :
									echo "Vission And MISSION";
									break;		
				case "objectives" :
									echo "Objectives";
									break;						
				case "disclaimer" :
									echo "Disclaimer";
									break;
				case "vbnet" :
									echo "Partner With Us";
									break;
				case "candc" :
									echo "Super Brand";
									break;
				case "contact" :
									echo "Contact Us";
									break;
				
				
							
											
				default :
								echo "";
								break;
			
			}
			
			
			
			
			
			?>
									</div>
								</div>



	


<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Page Details</label>
									<div class="col-sm-8">


										<textarea class="form-control" rows="5" cols="50" name="pgedetails" id="pgedetails" placeholder="Package Details" required>
										<?php 
$pagetype=$_GET['type'];
$sql = "SELECT detail from tblpages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{		
echo htmlentities($result->detail);
}}
?>

										</textarea> 
									</div>
								</div>															


								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" value="Update" id="submit" class="btn-primary btn">Update</button>

		
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

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
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>