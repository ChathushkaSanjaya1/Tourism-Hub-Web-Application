<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$issue=$_POST['issue'];
$description=$_POST['description'];
$email=$_SESSION['login'];
$sql="INSERT INTO  tblissues(UserEmail,Issue,Description) VALUES(:email,:issue,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':issue',$issue,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Info successfully submited ";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
}
?>	

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            
            <div class="contact-container">
                <!-- Left side - Image and info -->
                <div class="contact-sidebar">
                    <div class="contact-sidebar-content">
                        <h3>We're Here For You</h3>
                        <p>Have questions about your booking or our destinations? Our team is ready to assist you.</p>
                        
                        <div class="contact-benefits">
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="benefit-text">
                                    <h5>Fast Response</h5>
                                    <p>We typically respond within 24 hours</p>
                                </div>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="benefit-text">
                                    <h5>Expert Support</h5>
                                    <p>Get help from our travel specialists</p>
                                </div>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <div class="benefit-text">
                                    <h5>Secure Communication</h5>
                                    <p>Your information is always protected</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-direct">
                            <p>Need immediate assistance?</p>
                            <div class="direct-contact">
                                <i class="fa fa-phone"></i> +94 76 832 9877
                            </div>
                            <div class="direct-contact">
                                <i class="fa fa-envelope"></i> support@pearlheritage.com
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right side - Contact form -->
                <div class="contact-form-wrapper">
                    <form name="help" method="post" id="contactForm">
                        <div class="form-header">
                            <h3>Write Us</h3>
                            <p>Please fill out the form below and we'll be in touch soon</p>
                        </div>
                        
                        <div class="input-container">
                            <label for="issue" class="floating-label">Select Issue Type</label>
                            <select id="issue" name="issue" class="form-input" required>
                                <option value="">Select an option</option>
                                <option value="Booking Issues">Booking Issues</option>
                                <option value="Cancellation">Cancellation Request</option>
                                <option value="Refund">Refund Inquiry</option>
                                <option value="Package Information">Package Information</option>
                                <option value="Payment Issues">Payment Issues</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="input-container">
                            <label for="description" class="floating-label">Your Message</label>
                            <textarea id="description" name="description" class="form-input" rows="5" required></textarea>
                            <div class="char-count">0 characters (minimum 10)</div>
                        </div>
                        
                        <div class="email-notification">
                            <div class="email-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="email-text">
                                Reply will be sent to: <strong><?php echo isset($_SESSION['login']) ? $_SESSION['login'] : 'Please sign in first'; ?></strong>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" name="submit" class="submit-btn">
                                <span class="btn-text">Send Message</span>
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.modal-lg {
    max-width: 900px;
}

.modal-content {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    position: relative;
}

.close-modal {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 32px;
    height: 32px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    font-size: 18px;
    color: #64748b;
    z-index: 10;
    transition: all 0.2s;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.close-modal:hover {
    background: #f1f5f9;
    transform: rotate(90deg);
}

.contact-container {
    display: flex;
    flex-direction: row;
}

.contact-sidebar {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    flex: 0 0 40%;
    position: relative;
    overflow: hidden;
}

.contact-sidebar:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('https://images.unsplash.com/photo-1568843240915-b512cc9b4415?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-size: cover;
    opacity: 0.15;
    z-index: 0;
}

.contact-sidebar-content {
    position: relative;
    z-index: 1;
    padding: 40px 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.contact-sidebar h3 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
}

.contact-sidebar p {
    opacity: 0.85;
    line-height: 1.6;
}

.contact-benefits {
    margin: 30px 0;
    flex-grow: 1;
}

.benefit-item {
    display: flex;
    margin-bottom: 20px;
    align-items: center;
}

.benefit-icon {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    font-size: 18px;
}

.benefit-text h5 {
    margin: 0 0 5px;
    font-size: 16px;
    font-weight: 600;
}

.benefit-text p {
    margin: 0;
    font-size: 14px;
    opacity: 0.7;
}

.contact-direct {
    margin-top: auto;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding-top: 20px;
}

.contact-direct p {
    font-size: 14px;
    margin-bottom: 10px;
}

.direct-contact {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 15px;
    font-weight: 600;
}

.direct-contact i {
    margin-right: 10px;
}

.contact-form-wrapper {
    flex: 1;
    padding: 40px;
    background: #fff;
}

.form-header {
    margin-bottom: 30px;
}

.form-header h3 {
    font-size: 24px;
    color: #1e293b;
    margin: 0 0 8px;
    font-weight: 700;
}

.form-header p {
    color: #64748b;
    margin: 0;
}

.input-container {
    margin-bottom: 25px;
    position: relative;
}

.floating-label {
    position: absolute;
    top: -10px;
    left: 10px;
    background: white;
    padding: 0 8px;
    font-size: 13px;
    color: #6a11cb;
    font-weight: 600;
    pointer-events: none;
    transition: all 0.3s;
}

.form-input {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid #cbd5e1;
    border-radius: 8px;
    font-size: 16px;
    transition: all 0.3s;
    color: #1e293b;
    background: transparent;
}

.form-input:focus {
    outline: none;
    border-color: #6a11cb;
    box-shadow: 0 0 0 2px rgba(106, 17, 203, 0.2);
}

.form-input:focus + .floating-label,
.form-input:not(:placeholder-shown) + .floating-label {
    transform: translateY(-25px) scale(0.9);
    color: #6a11cb;
}

.char-count {
    position: absolute;
    bottom: -20px;
    right: 10px;
    font-size: 12px;
    color: #94a3b8;
}

.email-notification {
    display: flex;
    align-items: center;
    background: #f8fafc;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 30px;
    border-left: 3px solid #6a11cb;
}

.email-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #e0e7ff;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.email-icon i {
    color: #6a11cb;
    font-size: 16px;
}

.email-text {
    color: #64748b;
    font-size: 14px;
    flex: 1;
}

.email-text strong {
    color: #1e293b;
}

.form-actions {
    text-align: right;
}

.submit-btn {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    border: none;
    padding: 14px 28px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(106, 17, 203, 0.3);
}

.btn-text {
    margin-right: 10px;
}

@media (max-width: 768px) {
    .contact-container {
        flex-direction: column;
    }
    
    .contact-sidebar {
        flex: 0 0 auto;
        padding: 30px 20px;
    }
    
    .benefit-item {
        margin-bottom: 15px;
    }
    
    .contact-benefits {
        margin: 20px 0;
    }
    
    .contact-form-wrapper {
        padding: 30px 20px;
    }
}
</style>
