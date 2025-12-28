<!-- GSAP Scripts - Load Once -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<!-- Footer Start -->
<footer class="paradise-footer">
    <!-- Wave Divider -->
    <div class="footer-wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="wave-fill"></path>
        </svg>
    </div>
    
    <div class="paradise-pattern"></div>
    
    <div class="footer-container">
        <!-- Main Footer Content -->
        <div class="footer-content">
            <!-- Brand Column -->
            <div class="footer-col footer-brand">
                <div class="brand-container">
                    <div class="logo-container">
                        <div class="footer-logo">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                    </div>
                    <div>
                        <h2>Pearl Heritage <span>Travels</span></h2>
                        <p class="tagline">Discover the wonder of Sri Lanka</p>
                    </div>
                </div>
                
                <p class="about-text">Experience unforgettable journeys through Sri Lanka's rich cultural heritage, pristine beaches, and breathtaking landscapes with our expertly crafted travel experiences.</p>
                
                <div class="newsletter-box">
                    <h4><i class="far fa-envelope"></i> Subscribe for Travel Updates</h4>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Your email address" required>
                        <button type="submit">
                            Subscribe <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                    <p class="newsletter-note">Get exclusive offers and travel inspiration</p>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-col footer-links">
                <h4>Discover</h4>
                <ul>
                    <li><a href="package-list.php"><i class="fas fa-compass"></i> Popular Destinations</a></li>
                    <li><a href="package-list.php"><i class="fas fa-suitcase"></i> Tour Packages</a></li>
                    <li><a href="#"><i class="fas fa-tag"></i> Special Offers</a></li>
                    <li><a href="#"><i class="fas fa-calendar-alt"></i> Upcoming Events</a></li>
                    <li><a href="#"><i class="fas fa-star"></i> Travel Reviews</a></li>
                </ul>
            </div>
            
            <!-- Support Links -->
            <div class="footer-col footer-links">
                <h4>Traveler Support</h4>
                <ul>
                    <li><a href="page.php?type=aboutus"><i class="fas fa-info-circle"></i> About Us</a></li>
                    <li><a href="page.php?type=privacy"><i class="fas fa-shield-alt"></i> Privacy Policy</a></li>
                    <li><a href="page.php?type=terms"><i class="fas fa-file-contract"></i> Terms of Service</a></li>
                    <li><a href="page.php?type=contact"><i class="fas fa-headset"></i> Customer Support</a></li>
                    <li><a href="page.php?type=faqs"><i class="fas fa-question-circle"></i> FAQs</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-col footer-contact">
                <h4>Contact Us</h4>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5>Our Location</h5>
                            <p>123 Temple Road, Colombo, Sri Lanka</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="icon-box">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h5>Call Us</h5>
                            <p>+94 76 832 9877</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="icon-box">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h5>Email Us</h5>
                            <p>info@pearlheritage.com</p>
                        </div>
                    </div>
                </div>
                
                <div class="social-links">
    <h5>Follow Our Journey</h5>
    <div class="social-icons">
        <a href="https://web.facebook.com/people/Pearl-heritage-travels/100075999866320/?_rdc=1&_rdr#" target="_blank" class="social-icon facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/pearlheritage" target="_blank" class="social-icon twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.youtube.com/pearlheritage" target="_blank" class="social-icon youtube">
            <i class="fab fa-youtube"></i>
        </a>
        <a href="https://www.instagram.com/pearlheritage" target="_blank" class="social-icon instagram">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
</div>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <div class="payment-methods">
                <span>Secure Payment Options:</span>
                <div class="payment-icons">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-paypal"></i>
                    <i class="fab fa-cc-amex"></i>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> Pearl Heritage Travels. All Rights Reserved.</p>
            </div>
            
            <div class="trust-badges">
                <div class="badge">
                    <i class="fas fa-lock"></i> Secure Booking
                </div>
                <div class="badge">
                    <i class="fas fa-headset"></i> 24/7 Support
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* ===== FOOTER SPECIFIC STYLES - COMPLETELY ISOLATED ===== */
.paradise-footer {
    --footer-bg: linear-gradient(160deg, #1A6B54 0%, #0F4A3A 100%);
    --footer-text: #ffffff;
    --footer-light-text: rgba(255, 255, 255, 0.8);
    --footer-accent: #F9A826;
    --footer-accent-light: #FFCB69;
    --footer-link-hover: #FFCB69;
    --footer-divider: rgba(255, 255, 255, 0.1);
    --footer-input-bg: rgba(255, 255, 255, 0.1);
    --footer-btn-bg: #F9A826;
    --footer-btn-text: #0F4A3A;
    --footer-pattern: rgba(255, 255, 255, 0.03);
    --footer-icon-bg: rgba(255, 255, 255, 0.1);
    --footer-shadow-light: 0 5px 15px rgba(0, 0, 0, 0.05);
    --footer-shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
    --footer-transition: all 0.3s ease;
    --footer-radius-sm: 8px;
    --footer-radius-md: 12px;
    --footer-radius-lg: 20px;
    --footer-radius-xl: 30px;
    
    position: relative;
    background: var(--footer-bg);
    color: var(--footer-text);
    padding: 80px 0 0;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
    margin-top: 60px;
}

/* Background Pattern */
.paradise-footer .paradise-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 100 100'%3E%3Cpath fill='%23FFFFFF' fill-opacity='0.03' d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z'%3E%3C/path%3E%3C/svg%3E");
    opacity: 0.5;
    pointer-events: none;
}

/* Wave Divider */
.paradise-footer .footer-wave {
    position: absolute;
    top: -70px;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}

.paradise-footer .footer-wave svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 70px;
}

.paradise-footer .footer-wave .wave-fill {
    fill: #1A6B54;
}

/* Container */
.paradise-footer .footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

/* Main Footer Content */
.paradise-footer .footer-content {
    display: grid;
    grid-template-columns: 1.8fr 1fr 1fr 1.2fr;
    gap: 40px;
}

/* Brand Section */
.paradise-footer .footer-brand {
    display: block;
}

.paradise-footer .brand-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.paradise-footer .logo-container {
    margin-right: 15px;
}

.paradise-footer .footer-logo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--footer-accent);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 5px 15px rgba(249, 168, 38, 0.3);
}

.paradise-footer .footer-logo i {
    font-size: 22px;
    color: var(--footer-btn-text);
}

.paradise-footer .footer-brand h2 {
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0;
    line-height: 1.2;
    color: var(--footer-text);
}

.paradise-footer .footer-brand h2 span {
    font-weight: 400;
    opacity: 0.9;
    color: var(--footer-text);
}

.paradise-footer .tagline {
    font-size: 0.95rem;
    color: var(--footer-light-text);
    margin: 5px 0 0;
}

.paradise-footer .about-text {
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--footer-light-text);
    margin-bottom: 25px;
}

/* Newsletter */
.paradise-footer .newsletter-box {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: var(--footer-radius-md);
    padding: 20px;
    margin-top: 25px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.paradise-footer .newsletter-box h4 {
    font-size: 1.1rem;
    margin: 0 0 15px;
    display: flex;
    align-items: center;
    color: var(--footer-text);
}

.paradise-footer .newsletter-box h4 i {
    margin-right: 8px;
    color: var(--footer-accent);
}

.paradise-footer .newsletter-form {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
}

.paradise-footer .newsletter-form input {
    flex: 1;
    background: var(--footer-input-bg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--footer-radius-sm);
    padding: 12px 15px;
    color: var(--footer-text);
    font-size: 0.9rem;
    outline: none;
    transition: var(--footer-transition);
}

.paradise-footer .newsletter-form input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.paradise-footer .newsletter-form input:focus {
    border-color: var(--footer-accent-light);
}

.paradise-footer .newsletter-form button {
    background: var(--footer-btn-bg);
    color: var(--footer-btn-text);
    font-weight: 600;
    border: none;
    border-radius: var(--footer-radius-sm);
    padding: 0 20px;
    cursor: pointer;
    transition: var(--footer-transition);
    white-space: nowrap;
    display: flex;
    align-items: center;
}

.paradise-footer .newsletter-form button i {
    margin-left: 8px;
    transition: var(--footer-transition);
}

.paradise-footer .newsletter-form button:hover {
    background: var(--footer-accent-light);
    transform: translateY(-2px);
}

.paradise-footer .newsletter-form button:hover i {
    transform: translateX(3px);
}

.paradise-footer .newsletter-note {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.6);
    margin: 10px 0 0;
}

/* Links Columns */
.paradise-footer .footer-col {
    display: block;
}

.paradise-footer .footer-col h4 {
    font-size: 1.2rem;
    margin: 0 0 20px;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
    color: var(--footer-text);
}

.paradise-footer .footer-col h4::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--footer-accent);
    border-radius: 10px;
}

.paradise-footer .footer-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.paradise-footer .footer-links li {
    margin-bottom: 12px;
}

.paradise-footer .footer-links a {
    color: var(--footer-light-text);
    text-decoration: none;
    display: flex;
    align-items: center;
    font-size: 0.95rem;
    transition: var(--footer-transition);
}

.paradise-footer .footer-links a i {
    margin-right: 10px;
    font-size: 0.85rem;
    color: var(--footer-accent-light);
    transition: var(--footer-transition);
}

.paradise-footer .footer-links a:hover {
    color: var(--footer-link-hover);
    transform: translateX(5px);
}

.paradise-footer .footer-links a:hover i {
    color: var(--footer-accent);
}

/* Contact Column */
.paradise-footer .footer-contact {
    display: block;
}

.paradise-footer .contact-info {
    margin-bottom: 25px;
}

.paradise-footer .contact-item {
    display: flex;
    margin-bottom: 20px;
}

.paradise-footer .icon-box {
    min-width: 40px;
    height: 40px;
    background: var(--footer-icon-bg);
    border-radius: 50%;
    margin-right: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--footer-transition);
}

.paradise-footer .contact-item:hover .icon-box {
    background: var(--footer-accent);
    transform: translateY(-3px);
}

.paradise-footer .icon-box i {
    font-size: 1rem;
    color: var(--footer-accent-light);
    transition: var(--footer-transition);
}

.paradise-footer .contact-item:hover .icon-box i {
    color: var(--footer-btn-text);
}

.paradise-footer .contact-item h5 {
    margin: 0 0 5px;
    font-size: 0.9rem;
    color: var(--footer-accent-light);
}

.paradise-footer .contact-item p {
    margin: 0;
    font-size: 0.95rem;
    color: var(--footer-light-text);
}

/* Enhanced Social Icons Styles */
.paradise-footer .social-links {
    margin-top: 25px;
}

.paradise-footer .social-links h5 {
    font-size: 1rem;
    margin: 0 0 15px;
    color: var(--footer-text);
    font-weight: 600;
}

.paradise-footer .social-icons {
    display: flex;
    flex-wrap: nowrap; /* Prevent wrapping to new line */
    gap: 10px; /* Reduced gap to fit all icons */
    justify-content: flex-start;
    width: 100%;
    align-items: center;
    flex-direction: row;
    height: 50px;
}

.paradise-footer .social-icons a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    color: var(--footer-text);
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.paradise-footer .social-icons a:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.05);
    transform: scale(0);
    transition: all 0.3s ease;
    border-radius: 50%;
}

.paradise-footer .social-icons a:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.paradise-footer .social-icons a:hover:before {
    transform: scale(1);
}

.paradise-footer .social-icons a i {
    position: relative;
    z-index: 2;
    font-size: 18px;
}

/* Specific social media colors */
.paradise-footer .social-icons .facebook:hover {
    background: #1877F2;
    border-color: #1877F2;
}

.paradise-footer .social-icons .twitter:hover {
    background: #1DA1F2;
    border-color: #1DA1F2;
}

.paradise-footer .social-icons .youtube:hover {
    background: #FF0000;
    border-color: #FF0000;
}

.paradise-footer .social-icons .instagram:hover {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    border-color: #e1306c;
}

/* Make sure icons stay in a row on mobile */
@media (max-width: 480px) {
        .paradise-footer .social-icons {
        gap: 8px; /* Even smaller gap on mobile */
    }
    
    .paradise-footer .social-icons a {
        width: 36px;
        height: 36px;
        min-width: 36px;
    }
}

/* Control icon order */
.paradise-footer .social-icons .facebook,
.paradise-footer .social-icons .twitter,
.paradise-footer .social-icons .youtube,
.paradise-footer .social-icons .instagram {
    order: 0;
}

/* Footer Bottom */
.paradise-footer .footer-bottom {
    margin-top: 60px;
    padding: 25px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid var(--footer-divider);
}

.paradise-footer .payment-methods {
    display: flex;
    align-items: center;
}

.paradise-footer .payment-methods span {
    font-size: 0.85rem;
    margin-right: 15px;
    color: var(--footer-light-text);
}

.paradise-footer .payment-icons {
    display: flex;
    gap: 10px;
}

.paradise-footer .payment-icons i {
    font-size: 1.8rem;
    color: rgba(255, 255, 255, 0.8);
    transition: var(--footer-transition);
}

.paradise-footer .payment-icons i:hover {
    color: var(--footer-accent-light);
}

.paradise-footer .copyright p {
    font-size: 0.9rem;
    color: var(--footer-light-text);
    margin: 0;
}

.paradise-footer .trust-badges {
    display: flex;
    gap: 20px;
}

.paradise-footer .badge {
    display: flex;
    align-items: center;
    font-size: 0.85rem;
    color: var(--footer-light-text);
}

.paradise-footer .badge i {
    margin-right: 5px;
    color: var(--footer-accent);
}

/* Responsive Design */
@media (max-width: 1100px) {
    .paradise-footer .footer-content {
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
    
    .paradise-footer .footer-brand {
        grid-column: span 2;
    }
}

@media (max-width: 768px) {
    .paradise-footer {
        padding-top: 60px;
    }
    
    .paradise-footer .footer-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .paradise-footer .footer-brand {
        grid-column: 1;
    }
    
    .paradise-footer .footer-bottom {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }
    
    .paradise-footer .payment-methods {
        flex-direction: column;
        gap: 10px;
    }
    
    .paradise-footer .payment-methods span {
        margin-right: 0;
        margin-bottom: 10px;
    }
    
    .paradise-footer .trust-badges {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .paradise-footer .newsletter-form {
        flex-direction: column;
    }
    
    .paradise-footer .social-icons {
        justify-content: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Make sure GSAP is loaded before attempting animations
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        try {
            gsap.registerPlugin(ScrollTrigger);
            
            // Simple animations with scroll triggers
            const footerElements = [
                ".footer-brand",
                ".about-text",
                ".newsletter-box",
                ".footer-links",
                ".footer-contact",
                ".footer-links li",
                ".contact-item",
                ".social-icons a",
                ".footer-bottom"
            ];
            
            // Simple animation with minimal delay 
            footerElements.forEach((selector, index) => {
                const elements = document.querySelectorAll(`.paradise-footer ${selector}`);
                if (elements.length) {
                    gsap.from(elements, {
                        scrollTrigger: {
                            trigger: ".paradise-footer",
                            start: "top bottom-=50",
                            toggleActions: "play none none none"
                        },
                        opacity: 0,
                        y: 20,
                        duration: 0.6,
                        delay: 0.1 * index
                    });
                }
            });
            
            console.log("Footer animations initialized successfully");
        } catch (error) {
            console.error("Error initializing footer animations:", error);
        }
    }
    
    // Handle newsletter submission
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            alert(`Thank you! ${email} has been subscribed to our newsletter.`);
            this.reset();
        });
    }
});
</script>