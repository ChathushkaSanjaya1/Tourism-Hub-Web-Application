<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$adminid=$_SESSION['alogin'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];

$sql="update admin set Name=:name,EmailId=:email,MobileNumber=:mobile where UserName=:adminid";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':adminid',$adminid,PDO::PARAM_STR);
$query->execute();

echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('notification').classList.add('show');
        setTimeout(function() {
            window.location.href = 'profile.php';
        }, 2000);
    });
</script>";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin Profile | Pearl Heritage Travels</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />

<style>
    :root {
        --primary: #6366F1;
        --primary-dark: #4F46E5;
        --primary-light: #A5B4FC;
        --primary-lightest: #EEF2FF;
        --secondary: #EC4899;
        --text-darkest: #1E293B;
        --text-dark: #334155;
        --text-medium: #64748B;
        --text-light: #94A3B8;
        --text-white: #FFFFFF;
        --bg-white: #FFFFFF;
        --bg-lightest: #F8FAFC;
        --bg-light: #F1F5F9;
        --bg-medium: #E2E8F0;
        --success: #10B981;
        --warning: #F59E0B;
        --error: #EF4444;
        --border-color: #E2E8F0;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-ring: 0 0 0 3px rgba(99, 102, 241, 0.15);
        --transition: all 0.2s ease;
        --radius-sm: 0.375rem;
        --radius-md: 0.5rem;
        --radius-lg: 0.75rem;
        --radius-xl: 1rem;
        --font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    body {
        font-family: var(--font-family);
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.5;
    }

    /* Main container */
    .profile-container {
        max-width: 960px;
        margin: 0 auto;
        padding: 1.5rem;
    }

    /* Page header */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }
    
    .page-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-darkest);
        margin: 0;
    }
    
    .breadcrumb {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 0.875rem;
    }
    
    .breadcrumb-item {
        display: flex;
        align-items: center;
    }
    
    .breadcrumb-item a {
        color: var(--primary);
        text-decoration: none;
        transition: var(--transition);
    }
    
    .breadcrumb-item a:hover {
        color: var(--primary-dark);
    }
    
    .breadcrumb-item i {
        margin: 0 0.5rem;
        color: var(--text-light);
        font-size: 0.75rem;
    }
    
    .breadcrumb-item.active {
        color: var(--text-medium);
    }

    /* Card components */
    .card {
        background: var(--bg-white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        margin-bottom: 1.5rem;
        border: 1px solid var(--border-color);
        overflow: hidden;
    }
    
    .card:hover {
        box-shadow: var(--shadow-lg);
    }
    
    .card-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--border-color);
        background-color: var(--bg-white);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-darkest);
        margin: 0;
        display: flex;
        align-items: center;
    }
    
    .card-title i {
        margin-right: 0.75rem;
        color: var(--primary);
        font-size: 1.25rem;
    }
    
    .card-subtitle {
        font-size: 0.875rem;
        color: var(--text-medium);
        margin: 0.25rem 0 0 0;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .card-footer {
        padding: 1.25rem 1.5rem;
        border-top: 1px solid var(--border-color);
        background-color: var(--bg-lightest);
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    /* Profile overview card */
    .profile-overview {
        display: flex;
        align-items: center;
        padding: 1.5rem;
    }
    
    .profile-avatar {
        width: 5rem;
        height: 5rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-right: 1.5rem;
        font-size: 2rem;
        color: white;
        position: relative;
    }
    
    .profile-avatar::after {
        content: '';
        position: absolute;
        top: -0.25rem;
        left: -0.25rem;
        right: -0.25rem;
        bottom: -0.25rem;
        border-radius: 9999px;
        border: 2px dashed var(--primary-light);
        animation: rotate 30s linear infinite;
    }
    
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    
    .profile-info h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-darkest);
        margin: 0 0 0.5rem 0;
    }
    
    .profile-info p {
        margin: 0;
        color: var(--text-medium);
        font-size: 0.875rem;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        background-color: var(--primary-lightest);
        color: var(--primary);
        border-radius: 9999px;
        padding: 0.25rem 0.75rem;
        font-size: 0.75rem;
        font-weight: 500;
        margin-top: 0.75rem;
    }
    
    .status-badge i {
        font-size: 0.625rem;
        margin-right: 0.375rem;
    }

    /* Stats cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .stat-card {
        background: var(--bg-white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        padding: 1.25rem;
        transition: var(--transition);
        border: 1px solid var(--border-color);
    }
    
    .stat-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-2px);
    }
    
    .stat-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background-color: var(--primary-lightest);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }
    
    .stat-value {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-darkest);
        margin: 0 0 0.25rem 0;
    }
    
    .stat-label {
        font-size: 0.875rem;
        color: var(--text-medium);
        margin: 0;
    }

    /* Form styling */
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        background-color: var(--bg-white);
        color: var(--text-dark);
        transition: var(--transition);
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: var(--shadow-ring);
    }
    
    .form-control::placeholder {
        color: var(--text-light);
    }
    
    .form-control[readonly] {
        background-color: var(--bg-light);
        cursor: not-allowed;
    }
    
    .form-control-icon {
        position: relative;
    }
    
    .form-control-icon input {
        padding-left: 2.5rem;
    }
    
    .form-control-icon i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
        transition: var(--transition);
    }
    
    .form-control-icon input:focus + i {
        color: var(--primary);
    }
    
    .form-hint {
        display: block;
        font-size: 0.75rem;
        color: var(--text-medium);
        margin-top: 0.375rem;
    }

    /* Button styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.625rem 1.25rem;
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        font-weight: 500;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        border: none;
        outline: none;
    }
    
    .btn-primary {
        background-color: var(--primary);
        color: white;
        box-shadow: 0 1px 2px rgba(99, 102, 241, 0.2);
    }
    
    .btn-primary:hover {
        background-color: var(--primary-dark);
        box-shadow: 0 3px 6px rgba(99, 102, 241, 0.3);
        transform: translateY(-1px);
    }
    
    .btn-outline {
        background-color: transparent;
        color: var(--text-medium);
        border: 1px solid var(--border-color);
    }
    
    .btn-outline:hover {
        border-color: var(--text-light);
        color: var(--text-dark);
        background-color: var(--bg-lightest);
    }
    
    .btn-link {
        background: none;
        color: var(--primary);
        padding: 0;
        text-decoration: none;
    }
    
    .btn-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }
    
    .btn i {
        margin-right: 0.5rem;
    }
    
    .btn-group {
        display: flex;
        gap: 0.75rem;
    }

    /* Notification toast */
    #notification {
        position: fixed;
        top: 1.5rem;
        right: 1.5rem;
        background-color: var(--success);
        color: white;
        border-radius: var(--radius-md);
        padding: 1rem 1.25rem;
        box-shadow: var(--shadow-lg);
        display: flex;
        align-items: center;
        z-index: 9999;
        transform: translateX(calc(100% + 1.5rem));
        transition: transform 0.3s ease;
    }
    
    #notification.show {
        transform: translateX(0);
    }
    
    #notification i {
        margin-right: 0.75rem;
        font-size: 1.125rem;
    }

    /* Last update info */
    .last-update {
        display: flex;
        align-items: center;
        font-size: 0.75rem;
        color: var(--text-medium);
    }
    
    .last-update i {
        color: var(--primary);
        margin-right: 0.375rem;
    }
    
    /* Two-column layout */
    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .card-footer {
            flex-direction: column;
            align-items: stretch;
        }
        
        .btn-group {
            flex-direction: column;
        }
        
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .profile-overview {
            flex-direction: column;
            text-align: center;
        }
        
        .profile-avatar {
            margin-right: 0;
            margin-bottom: 1rem;
        }
    }
</style>

</head> 
<body>
   <div id="notification">
       <i class="fa fa-check-circle"></i> Profile successfully updated
   </div>

   <div class="page-container">
   <!--/content-inner-->
   <div class="left-content">
       <div class="mother-grid-inner">
              <!--header start here-->
              <?php include('includes/header.php');?>
              <div class="clearfix"></div>	
       </div>
       
       <div class="profile-container">
           <div class="page-header">
               <h1 class="page-title">Account Settings</h1>
               <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a><i class="fa fa-angle-right"></i></li>
                   <li class="breadcrumb-item active">Profile</li>
               </ol>
           </div>
           
           <?php 
               $adminid=$_SESSION['alogin'];
               $sql ="SELECT * from admin where UserName=:adminid";
               $query= $dbh -> prepare($sql);
               $query->bindParam(':adminid',$adminid, PDO::PARAM_STR);
               $query-> execute();
               $results = $query -> fetchAll(PDO::FETCH_OBJ);
               
               if($query->rowCount() > 0) {
                   foreach($results as $result) {
           ?>
           
           <!-- Profile Overview Card -->
           <div class="card">
               <div class="profile-overview">
                   <div class="profile-avatar">
                       <i class="fa fa-user"></i>
                   </div>
                   <div class="profile-info">
                       <h3><?php echo htmlentities($result->Name); ?></h3>
                       <p><?php echo htmlentities($result->EmailId); ?></p>
                       <div class="status-badge">
                           <i class="fa fa-circle"></i> Administrator
                       </div>
                   </div>
               </div>
           </div>
           
           <!-- Stats Cards -->
           <div class="stats-container">
               <div class="stat-card">
                   <div class="stat-icon">
                       <i class="fa fa-envelope"></i>
                   </div>
                   <h4 class="stat-value">Email</h4>
                   <p class="stat-label"><?php echo htmlentities($result->EmailId); ?></p>
               </div>
               
               <div class="stat-card">
                   <div class="stat-icon">
                       <i class="fa fa-phone"></i>
                   </div>
                   <h4 class="stat-value">Phone</h4>
                   <p class="stat-label"><?php echo htmlentities($result->MobileNumber); ?></p>
               </div>
               
               <div class="stat-card">
                   <div class="stat-icon">
                       <i class="fa fa-user-shield"></i>
                   </div>
                   <h4 class="stat-value">Username</h4>
                   <p class="stat-label"><?php echo htmlentities($result->UserName); ?></p>
               </div>
           </div>
           
           <!-- Edit Profile Form -->
           <div class="card">
               <div class="card-header">
                   <div>
                       <h3 class="card-title"><i class="fa fa-user-edit"></i> Edit Profile</h3>
                       <p class="card-subtitle">Update your personal information</p>
                   </div>
                   <div class="last-update">
                       <i class="fa fa-clock"></i> Last updated: 
                       <?php echo $result->updationDate ? htmlentities($result->updationDate) : 'Never'; ?>
                   </div>
               </div>
               
               <div class="card-body">
                   <form name="chngpwd" method="post">
                       <div class="form-row">
                           <div class="form-group">
                               <label class="form-label">Username</label>
                               <div class="form-control-icon">
                                   <input type="text" class="form-control" value="<?php echo htmlentities($result->UserName);?>" readonly>
                                   <i class="fa fa-user"></i>
                               </div>
                               <span class="form-hint">Username cannot be changed</span>
                           </div>
                           
                           <div class="form-group">
                               <label class="form-label">Full Name</label>
                               <div class="form-control-icon">
                                   <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlentities($result->Name);?>">
                                   <i class="fa fa-user-edit"></i>
                               </div>
                           </div>
                       </div>
                       
                       <div class="form-row">
                           <div class="form-group">
                               <label class="form-label">Email Address</label>
                               <div class="form-control-icon">
                                   <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlentities($result->EmailId);?>">
                                   <i class="fa fa-envelope"></i>
                               </div>
                           </div>
                           
                           <div class="form-group">
                               <label class="form-label">Mobile Number</label>
                               <div class="form-control-icon">
                                   <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo htmlentities($result->MobileNumber);?>">
                                   <i class="fa fa-phone"></i>
                               </div>
                           </div>
                       </div>
                       
                       <div class="form-group">
                           <label class="form-label">Security Question</label>
                           <div class="form-control-icon">
                               <input type="text" class="form-control" value="What was your childhood nickname?" readonly>
                               <i class="fa fa-lock"></i>
                           </div>
                           <span class="form-hint">Contact system administrator to change security question</span>
                       </div>
                   </div>
                   
                   <div class="card-footer">
                       <div class="btn-group">
                           <button type="submit" name="submit" class="btn btn-primary">
                               <i class="fa fa-save"></i> Save Changes
                           </button>
                           <button type="reset" class="btn btn-outline">
                               <i class="fa fa-undo"></i> Reset
                           </button>
                       </div>
                   </div>
               </form>
           </div>
           
           <!-- Security Settings Card -->
           <div class="card">
               <div class="card-header">
                   <div>
                       <h3 class="card-title"><i class="fa fa-shield-alt"></i> Security Settings</h3>
                       <p class="card-subtitle">Manage your account security</p>
                   </div>
               </div>
               
               <div class="card-body">
                   <p>Update your password or configure two-factor authentication to keep your account secure.</p>
                   
                   <div class="btn-group" style="margin-top: 1rem;">
                       <a href="change-password.php" class="btn btn-primary">
                           <i class="fa fa-key"></i> Change Password
                       </a>
                       <a href="#" class="btn btn-outline">
                           <i class="fa fa-lock"></i> Two-Factor Authentication
                       </a>
                   </div>
               </div>
           </div>
           
           <?php }} ?>
       </div>
       
       <!--inner block start here-->
       <div class="inner-block"></div>
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
   <script src="js/jquery.nicescroll.js"></script>
   <script src="js/scripts.js"></script>
   <script src="js/bootstrap.min.js"></script>
   
</body>
</html>
<?php } ?>