<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{ 
  $iid=intval($_GET['iid']);
if(isset($_POST['submit2']))
  {
$remark=$_POST['remark'];

$sql = "UPDATE tblissues SET AdminRemark=:remark WHERE  id=:iid";
$query = $dbh->prepare($sql);
$query -> bindParam(':remark',$remark, PDO::PARAM_STR);
$query-> bindParam(':iid',$iid, PDO::PARAM_STR);
$query -> execute();

$msg="Remark successfully updated";
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Issue Remark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --primary-bg: #eef2ff;
            --secondary: #14b8a6;
            --dark: #1e293b;
            --medium: #64748b;
            --light: #94a3b8;
            --lighter: #f1f5f9;
            --white: #ffffff;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--lighter);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .main-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .page-title i {
            color: var(--primary);
        }

        .issue-card {
            background-color: var(--white);
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
        }

        .issue-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .issue-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 2rem;
            background-color: var(--primary-bg);
            border-bottom: 1px solid var(--primary-light);
        }

        .issue-id {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 1rem;
            background-color: var(--primary);
            color: var(--white);
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .issue-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-badge {
            padding: 0.35rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .status-resolved {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .issue-body {
            padding: 2rem;
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-1rem); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: var(--success);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        .alert-icon {
            font-size: 1.25rem;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .alert-message {
            font-size: 0.9375rem;
        }

        .split-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .split-layout {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        .issue-info h3, .response-section h3 {
            color: var(--dark);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .issue-info h3 i, .response-section h3 i {
            color: var(--primary);
        }

        .info-card {
            background-color: var(--primary-bg);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            margin-bottom: 1.25rem;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            color: var(--medium);
            margin-bottom: 0.5rem;
            font-size: 0.9375rem;
        }

        .info-label i {
            color: var(--primary);
            font-size: 1rem;
        }

        .info-value {
            background-color: var(--white);
            padding: 0.875rem 1rem;
            border-radius: 0.5rem;
            color: var(--dark);
            font-size: 0.9375rem;
            border: 1px solid var(--primary-light);
        }

        .info-value.description {
            white-space: pre-line;
            max-height: 150px;
            overflow-y: auto;
        }

        .response-section {
            margin-bottom: 1.5rem;
        }

        .textarea-wrapper {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-textarea {
            width: 100%;
            min-height: 180px;
            padding: 1rem;
            border: 2px solid var(--primary-light);
            border-radius: 0.75rem;
            font-family: inherit;
            font-size: 0.9375rem;
            color: var(--dark);
            resize: vertical;
            transition: var(--transition);
            background-color: var(--white);
        }

        .form-textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .form-textarea::placeholder {
            color: var(--light);
        }

        .char-counter {
            position: absolute;
            bottom: 0.5rem;
            right: 0.75rem;
            font-size: 0.75rem;
            color: var(--medium);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 0.125rem 0.375rem;
            border-radius: 0.25rem;
        }

        .admin-reply {
            background-color: var(--primary-bg);
            border-radius: 0.75rem;
            padding: 1.5rem;
            position: relative;
            border-left: 4px solid var(--primary);
        }

        .reply-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px dashed rgba(99, 102, 241, 0.2);
        }

        .reply-admin {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .admin-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            background-color: var(--primary);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: 600;
        }

        .admin-info {
            display: flex;
            flex-direction: column;
        }

        .admin-name {
            font-weight: 600;
            color: var(--dark);
        }

        .admin-role {
            font-size: 0.75rem;
            color: var(--primary);
        }

        .reply-date {
            font-size: 0.875rem;
            color: var(--medium);
        }

        .reply-content {
            color: var(--dark);
            line-height: 1.7;
            white-space: pre-line;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.9375rem;
            transition: var(--transition);
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--medium);
            border: 1px solid var(--light);
        }

        .btn-outline:hover {
            background-color: var(--lighter);
            border-color: var(--medium);
            color: var(--dark);
        }

        .btn-icon {
            font-size: 1rem;
        }

        @media print {
            .btn, .char-counter {
                display: none;
            }

            body, .issue-card {
                box-shadow: none;
                background-color: white;
            }

            .issue-card {
                border: 1px solid #ddd;
            }
        }

        @media (max-width: 640px) {
            .issue-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .issue-body {
                padding: 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .reply-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <header class="header">
            <h1 class="page-title">
                <i class="fas fa-ticket-alt"></i> Customer Support Issue
            </h1>
            <div class="issue-id">#<?php echo htmlentities($iid); ?></div>
        </header>

        <div class="issue-card">
            <div class="issue-header">
                <?php 
                $sql = "SELECT * from tblissues where id=:iid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':iid',$iid, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);

                if($query->rowCount() > 0) {
                    foreach($results as $result) { 
                ?>
                <h2><?php echo htmlentities($result->Issue); ?></h2>
                <div class="issue-status">
                    <?php if($result->AdminRemark=="") { ?>
                        <span class="status-badge status-pending">
                            <i class="fas fa-clock"></i> Awaiting Response
                        </span>
                    <?php } else { ?>
                        <span class="status-badge status-resolved">
                            <i class="fas fa-check-circle"></i> Resolved
                        </span>
                    <?php } ?>
                </div>
            </div>
            
            <div class="issue-body">
                <?php if($error){?>
                <div class="alert alert-danger">
                    <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                    <div class="alert-content">
                        <h4 class="alert-title">Error</h4>
                        <p class="alert-message"><?php echo htmlentities($error); ?></p>
                    </div>
                </div>
                <?php } else if($msg){?>
                <div class="alert alert-success">
                    <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="alert-content">
                        <h4 class="alert-title">Success</h4>
                        <p class="alert-message"><?php echo htmlentities($msg); ?></p>
                    </div>
                </div>
                <?php }?>
                
                <div class="split-layout">
                    <div class="issue-info">
                        <h3><i class="fas fa-info-circle"></i> Issue Details</h3>
                        <div class="info-card">
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-tag"></i> Type
                                </div>
                                <div class="info-value">
                                    <?php echo htmlentities($result->Issue); ?>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-align-left"></i> Description
                                </div>
                                <div class="info-value description">
                                    <?php echo htmlentities($result->Description); ?>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-user"></i> Reported By
                                </div>
                                <div class="info-value">
                                    <?php echo htmlentities($result->UserEmail); ?>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-calendar-alt"></i> Submission Date
                                </div>
                                <div class="info-value">
                                    <?php echo date('F j, Y, g:i a', strtotime($result->PostingDate)); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="response-section">
                        <form name="updateticket" id="updateticket" method="post">
                            <?php if($result->AdminRemark=="") { ?>
                                <h3><i class="fas fa-reply"></i> Your Response</h3>
                                <div class="textarea-wrapper">
                                    <textarea 
                                        class="form-textarea" 
                                        name="remark" 
                                        id="remark" 
                                        placeholder="Type your detailed response to this customer issue..."
                                        required
                                        maxlength="500"
                                        onkeyup="countChars(this)"
                                    ></textarea>
                                    <div class="char-counter">
                                        <span id="charCount">0</span>/500
                                    </div>
                                </div>
                                
                                <div class="action-buttons">
                                    <button type="button" class="btn btn-outline" onclick="window.close()">
                                        <span class="btn-icon"><i class="fas fa-times"></i></span>
                                        <span>Cancel</span>
                                    </button>
                                    <button type="submit" name="submit2" class="btn btn-primary">
                                        <span class="btn-icon"><i class="fas fa-paper-plane"></i></span>
                                        <span>Send Response</span>
                                    </button>
                                </div>
                            <?php } else { ?>
                                <h3><i class="fas fa-comment-alt"></i> Admin Response</h3>
                                <div class="admin-reply">
                                    <div class="reply-header">
                                        <div class="reply-admin">
                                            <div class="admin-avatar">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="admin-info">
                                                <div class="admin-name">Administrator</div>
                                                <div class="admin-role">Support Team</div>
                                            </div>
                                        </div>
                                        <div class="reply-date">
                                            <i class="far fa-clock"></i>
                                            <?php echo date('F j, Y, g:i a', strtotime($result->AdminremarkDate)); ?>
                                        </div>
                                    </div>
                                    <div class="reply-content">
                                        <?php echo htmlentities($result->AdminRemark); ?>
                                    </div>
                                </div>
                                
                                <div class="action-buttons">
                                    <button type="button" class="btn btn-outline" onclick="window.close()">
                                        <span class="btn-icon"><i class="fas fa-arrow-left"></i></span>
                                        <span>Back</span>
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="window.print()">
                                        <span class="btn-icon"><i class="fas fa-print"></i></span>
                                        <span>Print</span>
                                    </button>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    
    <script>
        function countChars(textarea) {
            var charCount = textarea.value.length;
            document.getElementById('charCount').textContent = charCount;
            
            if (charCount >= 450) {
                document.getElementById('charCount').style.color = '#ef4444';
            } else {
                document.getElementById('charCount').style.color = '';
            }
        }
    </script>
</body>
</html>
<?php } ?>