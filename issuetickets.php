<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{   
    header('location:index.php');
}
else{
    // Process new ticket submission if form submitted
    if(isset($_POST['submitissue'])) {
        $issue = $_POST['issue'];
        $description = $_POST['description'];
        $email = $_SESSION['login'];
        
        $sql = "INSERT INTO tblissues(UserEmail, Issue, Description) VALUES(:email, :issue, :description)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':issue', $issue, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        
        if($lastInsertId) {
            $msg = "Ticket submitted successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Support Tickets | PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
:root {
    --primary: #3498db;
    --primary-dark: #2980b9;
    --secondary: #e74c3c;
    --gray-dark: #34495e;
    --gray: #7f8c8d;
    --gray-light: #ecf0f1;
    --success: #2ecc71;
    --warning: #f1c40f;
    --danger: #e74c3c;
    --info: #3498db;
}

body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f9f9f9;
    color: #333;
}

.ticket-heading {
    font-size: 28px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 15px;
}

.ticket-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 60px;
    height: 3px;
    background: var(--primary);
}

/* Ticket dashboard */
.ticket-dashboard {
    margin: 40px 0;
    padding: 0;
}

.dashboard-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
}

.stats-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    padding: 20px;
    flex: 1;
    min-width: 200px;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    font-size: 22px;
    color: white;
}

.stat-icon.blue {
    background: linear-gradient(45deg, #3498db, #2980b9);
}

.stat-icon.orange {
    background: linear-gradient(45deg, #f39c12, #d35400);
}

.stat-icon.green {
    background: linear-gradient(45deg, #2ecc71, #27ae60);
}

.stat-icon.red {
    background: linear-gradient(45deg, #e74c3c, #c0392b);
}

.stat-text {
    flex: 1;
}

.stat-number {
    font-size: 28px;
    font-weight: 700;
    margin: 0;
    line-height: 1;
}

.stat-label {
    color: var(--gray);
    margin: 5px 0 0;
    font-size: 14px;
}

.ticket-actions {
    display: flex;
    gap: 10px;
}

.btn {
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 14px;
    text-transform: none;
    letter-spacing: 0;
    transition: all 0.3s ease;
    border: none;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-primary:hover {
    background: var(--primary-dark);
}

.btn-outline {
    background: transparent;
    border: 1px solid #ddd;
    color: var(--gray);
}

.btn-outline:hover {
    background: #f5f5f5;
    color: var(--gray-dark);
}

.btn i {
    margin-right: 8px;
}

/* Search and filter bar */
.filter-container {
    background: white;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    padding: 15px 20px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.search-box {
    flex: 1 1 300px;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 10px 15px 10px 40px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

.search-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray);
    font-size: 16px;
}

.filter-dropdown {
    position: relative;
}

.filter-btn {
    background: transparent;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 10px 15px;
    font-size: 14px;
    color: var(--gray-dark);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-btn:hover {
    background: #f9f9f9;
}

.filter-dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: 5px;
    background: white;
    border-radius: 6px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    min-width: 180px;
    z-index: 10;
    display: none;
}

.filter-dropdown-menu.show {
    display: block;
}

.filter-dropdown-item {
    padding: 10px 15px;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
}

.filter-dropdown-item:hover {
    background: #f5f5f5;
}

.filter-dropdown-item i {
    margin-right: 10px;
    width: 16px;
    color: var(--gray);
}

/* Enhanced ticket container with smoother scrolling and better responsiveness */
.ticket-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
    margin-bottom: 40px;
    scroll-behavior: smooth;
}

/* Ticket cards */
.ticket-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
    border: 1px solid rgba(0, 0, 0, 0.04);
    cursor: pointer;
}

.ticket-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gray-light);
}

.ticket-card[data-status="pending"]::before {
    background: var(--warning);
}

.ticket-card[data-status="active"]::before {
    background: var(--info);
}

.ticket-card[data-status="resolved"]::before {
    background: var(--success);
}

.ticket-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
}

.ticket-card:active {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.ticket-header {
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
    background: rgba(250, 250, 252, 0.7);
}

.ticket-id {
    font-family: 'Courier New', monospace;
    font-weight: bold;
    color: var(--primary);
    font-size: 14px;
    letter-spacing: 0.5px;
    padding: 4px 8px;
    background: rgba(52, 152, 219, 0.08);
    border-radius: 4px;
}

.ticket-status {
    font-size: 12px;
    font-weight: 600;
    border-radius: 20px;
    padding: 4px 12px;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.ticket-status::before {
    content: '';
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-right: 6px;
}

.status-pending {
    background-color: #FFF3CD;
    color: #856404;
}

.status-pending::before {
    background-color: #f1c40f;
    box-shadow: 0 0 0 2px rgba(241, 196, 15, 0.2);
}

.status-active {
    background-color: #D1ECF1;
    color: #0C5460;
}

.status-active::before {
    background-color: #3498db;
    box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
}

.status-resolved {
    background-color: #D4EDDA;
    color: #155724;
}

.status-resolved::before {
    background-color: #2ecc71;
    box-shadow: 0 0 0 2px rgba(46, 204, 113, 0.2);
}

.status-closed {
    background-color: #E2E3E5;
    color: #383D41;
}

.status-closed::before {
    background-color: #7f8c8d;
    box-shadow: 0 0 0 2px rgba(127, 140, 141, 0.2);
}


.ticket-body {
    padding: 22px 20px;
    position: relative;
}


.ticket-issue {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 12px;
    color: var(--gray-dark);
    line-height: 1.4;
}


.ticket-desc {
    color: var(--gray);
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 15px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    position: relative;
}

.ticket-desc::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 30%;
    height: 1.6em;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
    pointer-events: none;
}

.admin-response {
    background: #f8f9fa;
    border-left: 3px solid var(--gray);
    padding: 14px 16px;
    font-size: 13px;
    border-radius: 0 8px 8px 0;
    color: var(--gray-dark);
    margin-top: 16px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.02);
    position: relative;
}

.ticket-card[data-status="active"] .admin-response {
    border-left-color: var(--info);
    background-color: rgba(52, 152, 219, 0.05);
}

.ticket-card[data-status="resolved"] .admin-response {
    border-left-color: var(--success);
    background-color: rgba(46, 204, 113, 0.05);
}

.response-label {
    font-size: 11px;
    text-transform: uppercase;
    font-weight: 600;
    color: var(--gray);
    margin-bottom: 6px;
    display: block;
    letter-spacing: 0.5px;
}

.ticket-footer {
    padding: 14px 20px;
    background: #f8f9fa;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    color: var(--gray);
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.ticket-date {
    display: flex;
    align-items: center;
    background: rgba(0, 0, 0, 0.02);
    padding: 4px 10px;
    border-radius: 30px;
    transition: background 0.2s;
}

.ticket-card:hover .ticket-date {
    background: rgba(0, 0, 0, 0.04);
}

.ticket-date i {
    margin-right: 6px;
    color: var(--gray);
}

.ticket-actions-btn {
    margin-left: 10px;
    color: var(--gray);
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 14px;
    padding: 5px 12px;
    border-radius: 6px;
    transition: all 0.2s;
}

.ticket-actions-btn:hover {
    color: var(--primary);
    background: rgba(52, 152, 219, 0.08);
}

.ticket-actions-btn:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.25);
}

.ticket-actions-btn:active {
    transform: scale(0.95);
}

@media (max-width: 768px) {
    .ticket-container {
        gap: 16px;
    }
    
    .ticket-card:hover {
        transform: translateY(-3px);
    }
    
    .ticket-header, .ticket-body, .ticket-footer {
        padding: 16px;
    }
}

.ticket-card:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.3);
}

.ticket-actions-btn {
    position: relative;
    overflow: hidden;
}

.ticket-actions-btn:after {
    content: "";
    background: rgba(255, 255, 255, 0.3);
    display: block;
    position: absolute;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%) scale(0);
    opacity: 0;
    transition: all 0.3s;
}

.ticket-actions-btn:active:after {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
    transition: 0s;
}

/* Empty state */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
}

.empty-icon {
    font-size: 60px;
    color: #ddd;
    margin-bottom: 20px;
}

.empty-title {
    font-size: 20px;
    font-weight: 600;
    color: var(--gray-dark);
    margin-bottom: 10px;
}

.empty-subtitle {
    color: var(--gray);
    margin-bottom: 25px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

/* Ticket modal */
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.modal-backdrop.show {
    opacity: 1;
    visibility: visible;
}

.modal-dialog {
    width: 100%;
    max-width: 650px;
    height:750px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    transform: translateY(-20px);
    transition: all 0.3s ease;
    max-height: 850vh;
    display: flex;
    flex-direction: column;
}

.modal-backdrop.show .modal-dialog {
    transform: translateY(0);
}

.modal-header {
    padding: 10px;
    border-bottom: 1px solid #eee;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.modal-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--gray-dark);
}

.modal-close {
    background: transparent;
    border: none;
    font-size: 25px;
    color: var(--gray);
    cursor: pointer;
}

.modal-close:hover {
    color: var(--secondary);
}

.modal-body {
    padding: 20px;
    overflow-y: auto;
    flex: 1;
}

.modal-footer {
    padding: 15px 20px;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

/* Form styling */
.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--gray-dark);
    font-size: 14px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.select-control {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%237f8c8d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 01.753 1.659l-4.796 5.48a1 1 0 01-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: calc(100% - 12px) center;
    padding-right: 30px;
}

/*Ticket Details*/
.ticket-detail-item {
    margin-bottom: 24px;
    position: relative;
    transition: all 0.25s ease;
    padding-left: 25px;
    border-left: 3px solid transparent;
    animation: fadeSlideIn 0.4s ease backwards;
    animation-delay: calc(var(--item-index, 0) * 0.1s);
}

@keyframes fadeSlideIn {
    from { opacity: 0; transform: translateY(12px); }
    to { opacity: 1; transform: translateY(0); }
}

.ticket-detail-item:hover {
    transform: translateX(4px);
}

.ticket-detail-item:nth-child(1) {
    --item-index: 1;
    border-left-color: var(--primary);
}

.ticket-detail-item:nth-child(2) {
    --item-index: 2;
    border-left-color: var(--info);
}

.ticket-detail-item:nth-child(3) {
    --item-index: 3;
    border-left-color: var(--warning);
}

.ticket-detail-item:nth-child(4) {
    --item-index: 4;
    border-left-color: var(--gray);
}

.ticket-detail-item:nth-child(5) {
    --item-index: 5;
    border-left-color: var(--success);
}

.ticket-detail-item:last-child {
    --item-index: 6;
    border-left-color: var(--gray-light);
}

.ticket-detail-label {
    position: relative;
    font-size: 15px;
    font-weight: 700;
    color: var(--gray);
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
}

.ticket-detail-label::before {
    content: '';
    position: absolute;
    left: -28px;
    width: 12px;
    height: 15px;
    border-radius: 50%;
    background: white;
    border: 3px solid currentColor;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
    transition: all 0.3s ease;
}

.ticket-detail-item:hover .ticket-detail-label::before {
    transform: scale(1.2);
}

.ticket-detail-value {
    position: relative;
    font-size: 16px;
    color: var(--gray-dark);
    background-color: white;
    padding: 16px;
    border-radius: 8px;
    box-shadow: 
        0 2px 5px rgba(0, 0, 0, 0.06),
        0 0 0 1px rgba(0, 0, 0, 0.03);
    transition: all 0.3s ease;
    overflow: hidden;
}

.ticket-detail-value:hover {
    box-shadow: 
        0 5px 15px rgba(0, 0, 0, 0.08),
        0 0 0 1px rgba(0, 0, 0, 0.03);
    transform: translateY(-2px);
}

.ticket-detail-value::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.03), rgba(0, 0, 0, 0));
}

/* Specific styling for ticket status */
.ticket-detail-value .ticket-status {
    display: inline-flex;
    align-items: center;
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.ticket-detail-desc {
    background: #f8f9fa;
    padding: 18px 20px;
    border-radius: 8px;
    white-space: pre-line;
    line-height: 1.6;
    font-size: 15px;
    position: relative;
    max-height: 200px;
    overflow-y: auto;
    transition: all 0.3s ease;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.04);
    backdrop-filter: blur(20px);
    scrollbar-width: thin;
    scrollbar-color: var(--gray-light) transparent;
}

.ticket-detail-desc::-webkit-scrollbar {
    width: 6px;
}

.ticket-detail-desc::-webkit-scrollbar-track {
    background: transparent;
}

.ticket-detail-desc::-webkit-scrollbar-thumb {
    background-color: var(--gray-light);
    border-radius: 6px;
}

.ticket-detail-desc:hover {
    background: #f4f7f9;
}

.ticket-detail-item:nth-child(1) .ticket-detail-value {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    letter-spacing: 1px;
    color: var(--primary);
    background: rgba(52, 152, 219, 0.05);
}

.ticket-detail-item:has(.status-pending) .ticket-detail-value {
    background: rgba(241, 196, 15, 0.05);
}

.ticket-detail-item:has(.status-active) .ticket-detail-value {
    background: rgba(52, 152, 219, 0.05);
}

.ticket-detail-item:has(.status-resolved) .ticket-detail-value {
    background: rgba(46, 204, 113, 0.05);
}

/* Admin response */
.ticket-detail-item:nth-child(5) .ticket-detail-desc {
    background: rgba(46, 204, 113, 0.05);
    border-left: 4px solid var(--success);
}

/* Timestamp styling */
.ticket-detail-item:last-child .ticket-detail-value {
    display: flex;
    align-items: center;
    gap: 10px;
}

.ticket-detail-item:last-child .ticket-detail-value::before {
    content: '\f073';
    font-family: 'Font Awesome 5 Free';
    font-weight: 400;
    color: var(--gray);
    font-size: 16px;
}

/* Add responsive adjustments */
@media (max-width: 768px) {
    .ticket-detail-item {
        padding-left: 12px;
    }
    
    .ticket-detail-label::before {
        left: -22px;
        width: 10px;
        height: 10px;
    }
    
    .ticket-detail-value {
        padding: 14px;
        font-size: 15px;
    }
    
    .ticket-detail-desc {
        padding: 16px;
        max-height: 150px;
    }
}

/* Copy functionality for ticket ID */
.ticket-detail-item:first-child .ticket-detail-value {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.copy-ticket-id {
    background: transparent;
    border: none;
    color: var(--gray);
    font-size: 14px;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 4px;
    transition: all 0.2s ease;
    display: none;
}

.ticket-detail-item:first-child:hover .copy-ticket-id {
    display: block;
}

.copy-ticket-id:hover {
    background: rgba(52, 152, 219, 0.1);
    color: var(--primary);
}

.copy-ticket-id:active {
    transform: scale(0.95);
}

/* Expandable description */
.expand-description {
    position: absolute;
    bottom: 8px;
    right: 8px;
    background: white;
    border: none;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--gray);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transition: opacity 0.2s ease, transform 0.2s ease;
    z-index: 2;
}

.ticket-detail-desc:hover .expand-description {
    opacity: 1;
}

.expand-description:hover {
    transform: scale(1.1);
    color: var(--primary);
}

.ticket-detail-desc.expanded {
    max-height: 500px;
}

/* Tooltip on hover elements */
.ticket-detail-label {
    position: relative;
}

.ticket-detail-label .tooltip {
    position: absolute;
    top: -30px;
    left: 0;
    background: var(--gray-dark);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 10px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.ticket-detail-label:hover .tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateY(-3px);
}

/* Add a highlighted background for important information */
.highlight-info {
    background: rgba(52, 152, 219, 0.1);
    padding: 2px 6px;
    border-radius: 4px;
    color: var(--primary-dark);
    font-weight: 600;
}

/* Visual attention effect for urgent tickets */
@keyframes urgentPulse {
    0% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(231, 76, 60, 0); }
    100% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0); }
}

.urgent-ticket .ticket-detail-value {
    animation: urgentPulse 2s infinite;
    border-left: 3px solid var(--danger);
}

/* Alert messages */
.alert {
    border-radius: 6px;
    padding: 15px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.alert-error {
    background-color: #FDECEA;
    border-left: 4px solid var(--danger);
    color: #B71C1C;
}

.alert-success {
    background-color: #E8F5E9;
    border-left: 4px solid var(--success);
    color: #1B5E20;
}

.alert-icon {
    font-size: 24px;
    line-height: 1;
}

.alert-content {
    flex: 1;
}

.alert-title {
    font-weight: 600;
    margin-bottom: 3px;
    font-size: 16px;
}

.alert-message {
    font-size: 14px;
    margin: 0;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .dashboard-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .ticket-actions {
        margin-top: 15px;
        width: 100%;
    }
    
    .ticket-actions .btn {
        flex: 1;
    }
    
    .stats-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .filter-container {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-box {
        width: 100%;
    }
    
    .filter-dropdown {
        width: 100%;
    }
    
    .filter-dropdown .filter-btn {
        width: 100%;
        justify-content: space-between;
    }
    
    .ticket-container {
        grid-template-columns: 1fr;
    }
    
    .ticket-detail-grid {
        grid-template-columns: 1fr;
    }
    
    .modal-dialog {
        max-width: 95%;
    }
}

.errorWrap, .succWrap {
    margin: 0 0 20px 0;
    border-radius: 6px;
    padding: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.errorWrap {
    background-color: #FDECEA;
    border-left: 4px solid var(--danger);
    color: #B71C1C;
}

.succWrap {
    background-color: #E8F5E9;
    border-left: 4px solid var(--success);
    color: #1B5E20;
}

.errorWrap strong, .succWrap strong {
    font-weight: 600;
    margin-bottom: 3px;
    font-size: 16px;
}
</style>
</head>
<body>
<!-- top-header -->
<?php include('includes/header.php');?>
<div class="banner-1">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">PEARL HERITAGE TRAVELS</h1>
    </div>
</div>

<!-- Main Content -->
<div class="ticket-dashboard">
    <div class="container">
        <div class="dashboard-header">
            <h2 class="ticket-heading">Support Tickets</h2>
            <div class="ticket-actions">
                <button type="button" class="btn btn-outline" id="refreshButton">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
                <button type="button" class="btn btn-primary" id="newTicketButton">
                    <i class="fas fa-plus"></i> New Ticket
                </button>
            </div>
        </div>
        
        <!-- Display error/success messages -->
        <?php if($error){?>
        <div class="alert alert-error">
            <div class="alert-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="alert-content">
                <h5 class="alert-title">Error</h5>
                <p class="alert-message"><?php echo htmlentities($error); ?></p>
            </div>
        </div>
        <?php } else if($msg){?>
        <div class="alert alert-success">
            <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="alert-content">
                <h5 class="alert-title">Success</h5>
                <p class="alert-message"><?php echo htmlentities($msg); ?></p>
            </div>
        </div>
        <?php }?>
        
        <?php
        // Count ticket statistics
        $uemail = $_SESSION['login'];
        
        // Count total tickets
        $sql1 = "SELECT COUNT(*) as total FROM tblissues WHERE UserEmail=:uemail";
        $query1 = $dbh->prepare($sql1);
        $query1->bindParam(':uemail', $uemail, PDO::PARAM_STR);
        $query1->execute();
        $totalTickets = $query1->fetchColumn();
        
        // Count tickets with no admin remark (pending)
        $sql2 = "SELECT COUNT(*) as pending FROM tblissues WHERE UserEmail=:uemail AND AdminRemark IS NULL";
        $query2 = $dbh->prepare($sql2);
        $query2->bindParam(':uemail', $uemail, PDO::PARAM_STR);
        $query2->execute();
        $pendingTickets = $query2->fetchColumn();
        
        // Count tickets with admin remark containing 'resolved'
        $sql3 = "SELECT COUNT(*) as resolved FROM tblissues WHERE UserEmail=:uemail AND AdminRemark LIKE '%resolved%'";
        $query3 = $dbh->prepare($sql3);
        $query3->bindParam(':uemail', $uemail, PDO::PARAM_STR);
        $query3->execute();
        $resolvedTickets = $query3->fetchColumn();
        
        // Count active tickets (with remark but not resolved)
        $activeTickets = $totalTickets - $pendingTickets - $resolvedTickets;
        ?>
        
        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-text">
                    <p class="stat-number"><?php echo $totalTickets; ?></p>
                    <p class="stat-label">Total Tickets</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-text">
                    <p class="stat-number"><?php echo $pendingTickets; ?></p>
                    <p class="stat-label">Pending</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-text">
                    <p class="stat-number"><?php echo $resolvedTickets; ?></p>
                    <p class="stat-label">Resolved</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon red">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="stat-text">
                    <p class="stat-number"><?php echo $activeTickets; ?></p>
                    <p class="stat-label">Active</p>
                </div>
            </div>
        </div>
        
        <!-- Search and Filter -->
        <div class="filter-container">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" id="searchTicket" placeholder="Search tickets...">
            </div>
            <div class="filter-dropdown">
                <button class="filter-btn" id="statusFilterBtn">
                    <i class="fas fa-filter"></i>
                    <span>Status</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="filter-dropdown-menu" id="statusFilterMenu">
                    <div class="filter-dropdown-item" data-status="all">
                        <i class="fas fa-border-all"></i> All Tickets
                    </div>
                    <div class="filter-dropdown-item" data-status="pending">
                        <i class="fas fa-clock"></i> Pending
                    </div>
                    <div class="filter-dropdown-item" data-status="active">
                        <i class="fas fa-spinner"></i> Active
                    </div>
                    <div class="filter-dropdown-item" data-status="resolved">
                        <i class="fas fa-check-circle"></i> Resolved
                    </div>
                </div>
            </div>
            <div class="filter-dropdown">
                <button class="filter-btn" id="sortFilterBtn">
                    <i class="fas fa-sort"></i>
                    <span>Sort</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="filter-dropdown-menu" id="sortFilterMenu">
                    <div class="filter-dropdown-item" data-sort="newest">
                        <i class="fas fa-arrow-down"></i> Newest First
                    </div>
                    <div class="filter-dropdown-item" data-sort="oldest">
                        <i class="fas fa-arrow-up"></i> Oldest First
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tickets Container -->
        <div class="ticket-container" id="ticketContainer">
            <?php 
            $uemail=$_SESSION['login'];
            $sql = "SELECT * FROM tblissues WHERE UserEmail=:uemail ORDER BY id DESC";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            
            if($query->rowCount() > 0) {
                foreach($results as $result) {
                    // Determine status based on admin remark
                    $status = "pending";
                    $statusText = "Pending";
                    
                    if($result->AdminRemark) {
                        if(stripos($result->AdminRemark, 'resolved') !== false) {
                            $status = "resolved";
                            $statusText = "Resolved";
                        } else {
                            $status = "active";
                            $statusText = "Active";
                        }
                    }
            ?>
            <div class="ticket-card" data-id="<?php echo $result->id; ?>" data-status="<?php echo $status; ?>">
                <div class="ticket-header">
                    <div class="ticket-id">#TKT-<?php echo htmlentities($result->id); ?></div>
                    <div class="ticket-status status-<?php echo $status; ?>"><?php echo $statusText; ?></div>
                </div>
                <div class="ticket-body">
                    <h3 class="ticket-issue"><?php echo htmlentities($result->Issue); ?></h3>
                    <p class="ticket-desc"><?php echo htmlentities($result->Description); ?></p>
                    <?php if($result->AdminRemark) { ?>
                    <div class="admin-response">
                        <span class="response-label">Admin Response</span>
                        <?php echo htmlentities($result->AdminRemark); ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="ticket-footer">
                    <div class="ticket-date">
                        <i class="far fa-calendar-alt"></i> 
                        <?php echo date('M d, Y', strtotime($result->PostingDate)); ?>
                    </div>
                    <button class="ticket-actions-btn view-ticket-btn" data-id="<?php echo $result->id; ?>">
                        <i class="fas fa-eye"></i> View
                    </button>
                </div>
            </div>
            <?php
                }
            } else { ?>
            <div class="empty-state" style="grid-column: 1/-1">
                <div class="empty-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3 class="empty-title">No Support Tickets Found</h3>
                <p class="empty-subtitle">You haven't created any support tickets yet. Need help? Create your first ticket now.</p>
                <button class="btn btn-primary" id="emptyStateButton">
                    <i class="fas fa-plus"></i> Create Your First Ticket
                </button>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- New Ticket Modal -->
<div class="modal-backdrop" id="newTicketModal">
    <div class="modal-dialog">
        <div class="modal-header">
            <h3 class="modal-title">Create New Ticket</h3>
            <button type="button" class="modal-close" id="closeNewTicketModal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="post" id="newTicketForm">
                <div class="form-group">
                    <label class="form-label" for="issueType">Issue Type</label>
                    <select class="select-control" id="issueType" name="issue" required>
                        <option value="">Select an issue type</option>
                        <option value="Booking Issue">Booking Issue</option>
                        <option value="Cancellation">Cancellation</option>
                        <option value="Refund">Refund</option>
                        <option value="Payment Issue">Payment Issue</option>
                        <option value="Website Error">Website Error</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Please provide details about your issue..." required></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="cancelTicket">Cancel</button>
            <button type="button" class="btn btn-primary" id="submitTicket">
                <i class="fas fa-paper-plane"></i> Submit Ticket
            </button>
        </div>
    </div>
</div>

<!-- Ticket Details Modal -->
<div class="modal-backdrop" id="viewTicketModal">
    <div class="modal-dialog modal-ticket-details">
        <div class="modal-header">
            <div class="modal-title-wrapper">
                
                <div class="ticket-status-badge" id="modalTicketStatus">
                    <!-- Status will be populated dynamically -->
                </div>
            </div>
            <button type="button" class="modal-close" id="closeViewTicketModal" aria-label="Close modal">&times;</button>
        </div>
        
        <div class="modal-body" id="ticketDetailsContainer">
            <!-- Content will be loaded dynamically -->
            <div class="loading-spinner">
                <i class="fas fa-circle-notch fa-spin"></i> Loading ticket details...
            </div>
        </div>
        
        <div class="modal-footer">
            <div class="ticket-actions-group">
                <button type="button" class="btn btn-icon" id="printTicketBtn" title="Print ticket details">
                    <i class="fas fa-print"></i>
                </button>
                <button type="button" class="btn btn-icon" id="copyTicketBtn" title="Copy ticket information">
                    <i class="fas fa-copy"></i>
                </button>
                <button type="button" class="btn btn-icon" id="refreshTicketBtn" title="Refresh ticket data">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
            <div class="main-actions">
                <button type="button" class="btn btn-outline" id="closeTicketDetails">Close</button>
                <button type="button" class="btn btn-primary" id="followUpBtn">
                    <i class="fas fa-reply"></i> Follow Up
                </button>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>         
<!-- signin -->
<?php include('includes/signin.php');?>         
<!-- write us -->
<?php include('includes/write-us.php');?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter dropdown functionality
    const statusFilterBtn = document.getElementById('statusFilterBtn');
    const statusFilterMenu = document.getElementById('statusFilterMenu');
    const sortFilterBtn = document.getElementById('sortFilterBtn');
    const sortFilterMenu = document.getElementById('sortFilterMenu');
    
    // Toggle status dropdown
    statusFilterBtn.addEventListener('click', function() {
        statusFilterMenu.classList.toggle('show');
        sortFilterMenu.classList.remove('show');
    });
    
    // Toggle sort dropdown
    sortFilterBtn.addEventListener('click', function() {
        sortFilterMenu.classList.toggle('show');
        statusFilterMenu.classList.remove('show');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('#statusFilterBtn') && !event.target.closest('#statusFilterMenu')) {
            statusFilterMenu.classList.remove('show');
        }
        
        if (!event.target.closest('#sortFilterBtn') && !event.target.closest('#sortFilterMenu')) {
            sortFilterMenu.classList.remove('show');
        }
    });
    
    // Status filter functionality
    document.querySelectorAll('#statusFilterMenu .filter-dropdown-item').forEach(function(item) {
        item.addEventListener('click', function() {
            const status = this.getAttribute('data-status');
            const tickets = document.querySelectorAll('.ticket-card');
            
            tickets.forEach(function(ticket) {
                if (status === 'all' || ticket.getAttribute('data-status') === status) {
                    ticket.style.display = 'block';
                } else {
                    ticket.style.display = 'none';
                }
            });
            
            statusFilterMenu.classList.remove('show');
        });
    });
    
    // Sort functionality
    document.querySelectorAll('#sortFilterMenu .filter-dropdown-item').forEach(function(item) {
        item.addEventListener('click', function() {
            const sort = this.getAttribute('data-sort');
            const ticketContainer = document.getElementById('ticketContainer');
            const tickets = Array.from(document.querySelectorAll('.ticket-card'));
            
            // Sort tickets
            tickets.sort(function(a, b) {
                const aId = parseInt(a.getAttribute('data-id'));
                const bId = parseInt(b.getAttribute('data-id'));
                
                if (sort === 'newest') {
                    return bId - aId;
                } else {
                    return aId - bId;
                }
            });
            
            // Remove all tickets
            tickets.forEach(function(ticket) {
                ticket.remove();
            });
            
            // Add sorted tickets back
            tickets.forEach(function(ticket) {
                ticketContainer.appendChild(ticket);
            });
            
            sortFilterMenu.classList.remove('show');
        });
    });
    
    // Search functionality
    const searchInput = document.getElementById('searchTicket');
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const tickets = document.querySelectorAll('.ticket-card');
        
        tickets.forEach(function(ticket) {
            const issue = ticket.querySelector('.ticket-issue').textContent.toLowerCase();
            const desc = ticket.querySelector('.ticket-desc').textContent.toLowerCase();
            
            if (issue.includes(query) || desc.includes(query)) {
                ticket.style.display = 'block';
            } else {
                ticket.style.display = 'none';
            }
        });
    });
    
    // Refresh button
    document.getElementById('refreshButton').addEventListener('click', function() {
        location.reload();
    });
    
    // New ticket modal
    const newTicketModal = document.getElementById('newTicketModal');
    const newTicketBtn = document.getElementById('newTicketButton');
    const closeNewTicketModal = document.getElementById('closeNewTicketModal');
    const cancelTicket = document.getElementById('cancelTicket');
    const submitTicket = document.getElementById('submitTicket');
    
    // Show new ticket modal
    newTicketBtn.addEventListener('click', function() {
        newTicketModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    });
    
    // Empty state "Create First Ticket" button
    const emptyStateBtn = document.getElementById('emptyStateButton');
    if (emptyStateBtn) {
        emptyStateBtn.addEventListener('click', function() {
            newTicketModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
    }
    
    // Close new ticket modal
    closeNewTicketModal.addEventListener('click', function() {
        newTicketModal.classList.remove('show');
        document.body.style.overflow = '';
    });
    
    cancelTicket.addEventListener('click', function() {
        newTicketModal.classList.remove('show');
        document.body.style.overflow = '';
    });
    
    // Submit new ticket
    submitTicket.addEventListener('click', function() {
        document.getElementById('newTicketForm').submit();
    });
    
function enhanceTicketDetails() {
    // Add copy button to ticket ID
    const ticketIdItem = document.querySelector('.ticket-detail-item:first-child .ticket-detail-value');
    if (ticketIdItem) {
        const ticketId = ticketIdItem.textContent;
        const copyBtn = document.createElement('button');
        copyBtn.className = 'copy-ticket-id';
        copyBtn.innerHTML = '<i class="far fa-copy"></i>';
        copyBtn.title = 'Copy ticket ID';
        
        copyBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            navigator.clipboard.writeText(ticketId.trim());
            this.innerHTML = '<i class="fas fa-check"></i>';
            setTimeout(() => {
                this.innerHTML = '<i class="far fa-copy"></i>';
            }, 2000);
        });
        
        ticketIdItem.appendChild(copyBtn);
    }
    
    // Add expand buttons to descriptions
    document.querySelectorAll('.ticket-detail-desc').forEach(desc => {
        const expandBtn = document.createElement('button');
        expandBtn.className = 'expand-description';
        expandBtn.innerHTML = '<i class="fas fa-expand-alt"></i>';
        expandBtn.title = 'Expand description';
        
        expandBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            desc.classList.toggle('expanded');
            this.innerHTML = desc.classList.contains('expanded') 
                ? '<i class="fas fa-compress-alt"></i>' 
                : '<i class="fas fa-expand-alt"></i>';
        });
        
        desc.appendChild(expandBtn);
    });
    
    // Add tooltips to labels
    document.querySelectorAll('.ticket-detail-label').forEach(label => {
        const tooltip = document.createElement('span');
        tooltip.className = 'tooltip';
        tooltip.textContent = 'Click to highlight';
        label.appendChild(tooltip);
        
        label.addEventListener('click', function() {
            const value = this.nextElementSibling;
            value.classList.toggle('highlight-effect');
        });
    });
    
    // Check for urgent tickets (could be based on some criteria)
    if (document.querySelector('.ticket-status.status-pending')) {
        const timeWaiting = 24;
        if (timeWaiting > 48) {
            document.querySelector('.ticket-detail-item:nth-child(2)')
                .classList.add('urgent-ticket');
        }
    }
}
viewTicketModal.addEventListener('show', function() {

    setTimeout(enhanceTicketDetails, 100);
});
    
    // Show ticket details on clicking a ticket card or view button
    document.querySelectorAll('.ticket-card, .view-ticket-btn').forEach(function(element) {
        element.addEventListener('click', function(event) {
            // If clicked on view button, prevent propagation to the card
            if (event.target.closest('.view-ticket-btn')) {
                event.stopPropagation();
            }
            
            // Get ticket id
            const ticketId = event.target.closest('.ticket-card').getAttribute('data-id') || 
                             event.target.getAttribute('data-id');
            
            // Find the ticket card
            const ticketCard = document.querySelector(`.ticket-card[data-id="${ticketId}"]`);
            const ticketStatus = ticketCard.getAttribute('data-status');
            const ticketStatusText = ticketCard.querySelector('.ticket-status').textContent;
            const ticketIssue = ticketCard.querySelector('.ticket-issue').textContent;
            const ticketDesc = ticketCard.querySelector('.ticket-desc').textContent;
            const adminResponse = ticketCard.querySelector('.admin-response')?.textContent.replace('Admin Response', '').trim() || '';
            const ticketDate = ticketCard.querySelector('.ticket-date').textContent.trim();
            
            // Build details HTML
            let detailsHTML = `
                <div class="ticket-detail-item">
                    <div class="ticket-detail-label">Ticket ID</div>
                    <div class="ticket-detail-value">#TKT-${ticketId}</div>
                </div>
                <div class="ticket-detail-item">
                    <div class="ticket-detail-label">Status</div>
                    <div class="ticket-detail-value">
                        <span class="ticket-status status-${ticketStatus}">${ticketStatusText}</span>
                    </div>
                </div>
                <div class="ticket-detail-item">
                    <div class="ticket-detail-label">Issue Type</div>
                    <div class="ticket-detail-value">${ticketIssue}</div>
                </div>
                <div class="ticket-detail-item">
                    <div class="ticket-detail-label">Description</div>
                    <div class="ticket-detail-value ticket-detail-desc">${ticketDesc}</div>
                </div>`;
                
            if (adminResponse) {
                detailsHTML += `
                <div class="ticket-detail-item">
                    <div class="ticket-detail-label">Admin Response</div>
                    <div class="ticket-detail-value ticket-detail-desc">${adminResponse}</div>
                </div>`;
            }
            
            detailsHTML += `
                <div class="ticket-detail-item">
                    <div class="ticket-detail-label">Submitted On</div>
                    <div class="ticket-detail-value">${ticketDate}</div>
                </div>`;
                
            // Update modal content
            ticketDetailsContainer.innerHTML = detailsHTML;
            
            // Show modal
            viewTicketModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Close ticket details modal
    closeViewTicketModal.addEventListener('click', function() {
        viewTicketModal.classList.remove('show');
        document.body.style.overflow = '';
    });
    
    closeTicketDetails.addEventListener('click', function() {
        viewTicketModal.classList.remove('show');
        document.body.style.overflow = '';
    });
    
    // Close modals when clicking outside
    document.addEventListener('click', function(event) {
        if (event.target === newTicketModal) {
            newTicketModal.classList.remove('show');
            document.body.style.overflow = '';
        }
        
        if (event.target === viewTicketModal) {
            viewTicketModal.classList.remove('show');
            document.body.style.overflow = '';
        }
    });
});
</script>
</body>
</html>
<?php } ?>