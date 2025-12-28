<div class="sidebar-container">
    <!-- Top Logo Section -->
    <div class="logo-section">
        <div class="logo-wrapper">
            <svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" class="logo-icon">
                <path d="M18 36C27.9411 36 36 27.9411 36 18C36 8.05887 27.9411 0 18 0C8.05887 0 0 8.05887 0 18C0 27.9411 8.05887 36 18 36Z" fill="#EEF2FF"/>
                <path d="M18 30C24.6274 30 30 24.6274 30 18C30 11.3726 24.6274 6 18 6C11.3726 6 6 11.3726 6 18C6 24.6274 11.3726 30 18 30Z" fill="#4F46E5"/>
                <path d="M14 18H22M18 14V22" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <h1 class="logo-text">Welcome</h1>
        </div>
        <button id="sidebar-toggle" class="toggle-btn">
            <svg viewBox="0 0 20 20" fill="currentColor" class="toggle-icon">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="sidebar-nav">
        <div class="nav-group">
            <p class="nav-group-label">Dashboard</p>
            <ul class="nav-cards">
                <li class="nav-item active">
                    <a href="dashboard.php" class="nav-card">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="9"></rect>
                                <rect x="14" y="3" width="7" height="5"></rect>
                                <rect x="14" y="12" width="7" height="9"></rect>
                                <rect x="3" y="16" width="7" height="5"></rect>
                            </svg>
                        </div>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-group">
            <p class="nav-group-label">Tour Management</p>
            <ul class="nav-cards">
                <li class="nav-item has-submenu">
                    <div class="nav-card expandable">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <span class="nav-text">Tour Packages</span>
                        <div class="expand-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <ul class="submenu">
                        <li><a href="create-package.php">Create Package</a></li>
                        <li><a href="manage-packages.php">Manage Packages</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="manage-users.php" class="nav-card">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <span class="nav-text">Manage Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="manage-bookings.php" class="nav-card">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <span class="nav-text">Manage Bookings</span>
                        <span class="badge">14</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-group">
            <p class="nav-group-label">Customer Support</p>
            <ul class="nav-cards">
                <li class="nav-item">
                    <a href="manageissues.php" class="nav-card">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <span class="nav-text">Manage Issues</span>
                        <span class="badge danger">3</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="manage-enquires.php" class="nav-card">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                            </svg>
                        </div>
                        <span class="nav-text">Manage Enquiries</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="manage-pages.php" class="nav-card">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <span class="nav-text">Manage Pages</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <a href="settings.php" class="quick-action">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
        </a>
        <a href="#" class="quick-action" id="notificationBtn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="notification-dot"></span>
        </a>
        <a href="logout.php" class="quick-action logout">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
        </a>
    </div>
</div>

<!-- Mobile Menu Toggle -->
<button id="mobile-menu-toggle" class="mobile-toggle">
    <span></span>
    <span></span>
    <span></span>
</button>

<style>
:root {
    /* Color Variables */
    --primary: #4F46E5;
    --primary-light: #818CF8;
    --primary-dark: #4338CA;
    --secondary: #10B981;
    --danger: #EF4444;
    --warning: #F59E0B;
    --success: #10B981;
    --text-primary: #111827;
    --text-secondary: #4B5563;
    --text-muted: #9CA3AF;
    --bg-white:rgb(255, 255, 255);
    --bg-light: #F3F4F6;
    --bg-lighter: #F9FAFB;
    --border-color: #E5E7EB;
    
    /* Sizing */
    --sidebar-width: 253px;
    --sidebar-collapsed-width: 80px;
    --sidebar-transition: 0.3s ease;
    
    /* Effects */
    --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    --hover-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    --focus-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
}

/* Base Styles */
.sidebar-container {
    position: fixed;
    top: 0;
    left: 0;
    width: var(--sidebar-width);
    height: 100vh;
    background-color: var(--bg-white);
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    transition: width var(--sidebar-transition);
    z-index: 1000;
    overflow-x: hidden;
    overflow-y: auto;
}

.sidebar-container.collapsed {
    width: var(--sidebar-collapsed-width);
}

/* Logo Section */
.logo-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
}

.logo-wrapper {
    display: flex;
    align-items: center;
}

.logo-icon {
    width: 36px;
    height: 36px;
}

.logo-text {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0 0 0 0.75rem;
    white-space: nowrap;
}

.toggle-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: none;
    background-color: var(--bg-light);
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.2s ease;
}

.toggle-btn:hover {
    background-color: var(--bg-lighter);
    color: var(--primary);
}

.toggle-icon {
    width: 20px;
    height: 20px;
    transition: transform var(--sidebar-transition);
}

.collapsed .toggle-icon {
    transform: rotate(180deg);
}

/* User Profile */
.user-profile {
    display: flex;
    align-items: center;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border-color);
}

.user-avatar {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.status-dot {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: var(--success);
    border: 2px solid var(--bg-white);
}

.user-info {
    margin-left: 0.875rem;
    min-width: 0;
}

.user-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.user-role {
    font-size: 0.75rem;
    color: var(--text-muted);
    margin: 0.25rem 0 0;
}

/* Navigation */
.sidebar-nav {
    flex: 1;
    padding: 1.25rem 0;
    overflow-y: auto;
}

.nav-group {
    margin-bottom: 1.5rem;
}

.nav-group-label {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-muted);
    margin: 0 0 0.75rem 1.5rem;
}

.nav-cards {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item {
    position: relative;
    margin-bottom: 0.375rem;
}

.nav-card {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    margin: 0 0.75rem;
    color: var(--text-secondary);
    text-decoration: none;
    transition: all 0.2s ease;
    position: relative;
    overflow: hidden;
}

.nav-card:hover {
    background-color: var(--bg-light);
    color: var(--text-primary);
    box-shadow: var(--hover-shadow);
}

.nav-item.active .nav-card {
    background-color: var(--primary);
    color: white;
}

.icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    margin-right: 0.875rem;
    flex-shrink: 0;
}

.icon-wrapper svg {
    width: 20px;
    height: 20px;
    stroke-width: 2;
}

.nav-text {
    font-size: 0.9375rem;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    flex-grow: 1;
}

.badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 20px;
    height: 20px;
    border-radius: 10px;
    background-color: var(--primary-light);
    color: white;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0 6px;
}

.badge.danger {
    background-color: var(--danger);
}

/* Expandable Items */
.nav-card.expandable {
    cursor: pointer;
}

.expand-icon {
    width: 20px;
    height: 20px;
    transition: transform 0.2s ease;
}

.nav-item.expanded .expand-icon {
    transform: rotate(180deg);
}

.submenu {
    list-style: none;
    padding: 0;
    margin: 0 0 0 3.5rem;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.nav-item.expanded .submenu {
    max-height: 500px;
}

.submenu li {
    margin: 0.25rem 0;
}

.submenu a {
    display: block;
    padding: 0.5rem 1rem;
    color: var(--text-muted);
    text-decoration: none;
    font-size: 0.875rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    position: relative;
}

.submenu a:hover {
    color: var(--primary);
    background-color: var(--bg-lighter);
}

.submenu a::before {
    content: '';
    position: absolute;
    left: -0.75rem;
    top: 50%;
    transform: translateY(-50%);
    width: 0.25rem;
    height: 0.25rem;
    border-radius: 50%;
    background-color: var(--text-muted);
    transition: all 0.2s ease;
}

.submenu a:hover::before {
    background-color: var(--primary);
    width: 0.375rem;
    height: 0.375rem;
}

/* Sidebar Footer */
.sidebar-footer {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 1rem 1.5rem;
    border-top: 1px solid var(--border-color);
}

.quick-action {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background-color: var(--bg-light);
    color: var(--text-secondary);
    position: relative;
    transition: all 0.2s ease;
}

.quick-action svg {
    width: 20px;
    height: 20px;
}

.quick-action:hover {
    background-color: var(--bg-lighter);
    color: var(--primary);
    transform: translateY(-2px);
    box-shadow: var(--hover-shadow);
}

.quick-action.logout {
    color: var(--text-muted);
}

.quick-action.logout:hover {
    color: var(--danger);
}

.notification-dot {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: var(--danger);
    border: 2px solid var(--bg-white);
}

/* Mobile Toggle */
.mobile-toggle {
    position: fixed;
    top: 1rem;
    right: 1rem;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background-color: var(--primary);
    border: none;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    display: none;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    z-index: 1001;
    cursor: pointer;
}

.mobile-toggle span {
    display: block;
    width: 24px;
    height: 2px;
    background-color: white;
    transition: all 0.3s ease;
}

/* Collapsed Sidebar Styles */
.sidebar-container.collapsed .logo-text,
.sidebar-container.collapsed .user-info,
.sidebar-container.collapsed .nav-group-label,
.sidebar-container.collapsed .nav-text,
.sidebar-container.collapsed .badge {
    display: none;
}

.sidebar-container.collapsed .nav-card {
    justify-content: center;
    padding: 0.75rem;
}

.sidebar-container.collapsed .icon-wrapper {
    margin-right: 0;
}

.sidebar-container.collapsed .submenu {
    position: absolute;
    left: 100%;
    top: 0;
    margin: 0;
    width: 200px;
    max-height: none;
    background-color: var(--bg-white);
    border-radius: 0 8px 8px 0;
    box-shadow: var(--hover-shadow);
    padding: 0.75rem;
    display: none;
}

.sidebar-container.collapsed .nav-item.has-submenu:hover .submenu {
    display: block;
}

.sidebar-container.collapsed .expand-icon {
    display: none;
}

/* Responsive Styles */
@media (max-width: 992px) {
    .sidebar-container {
        transform: translateX(-100%);
    }
    
    .sidebar-container.mobile-open {
        transform: translateX(0);
    }
    
    .mobile-toggle {
        display: flex;
    }
    
    .mobile-toggle.active span:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
    }
    
    .mobile-toggle.active span:nth-child(2) {
        opacity: 0;
    }
    
    .mobile-toggle.active span:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('.sidebar-container');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
        });
    }
    
    // Expandable menu items
    const expandableItems = document.querySelectorAll('.nav-card.expandable');
    
    expandableItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const navItem = this.closest('.nav-item');
            
            if (sidebar.classList.contains('collapsed')) {
                return; // Don't toggle when collapsed
            }
            
            if (navItem.classList.contains('expanded')) {
                navItem.classList.remove('expanded');
            } else {
                // Close other expanded items
                document.querySelectorAll('.nav-item.expanded').forEach(item => {
                    if (item !== navItem) {
                        item.classList.remove('expanded');
                    }
                });
                
                navItem.classList.add('expanded');
            }
        });
    });
    
    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    
    if (mobileToggle && sidebar) {
        mobileToggle.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-open');
            this.classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 992 && 
                !sidebar.contains(e.target) && 
                e.target !== mobileToggle && 
                !mobileToggle.contains(e.target)) {
                sidebar.classList.remove('mobile-open');
                mobileToggle.classList.remove('active');
            }
        });
    }
    
    // Set active menu item based on current URL
    function setActiveMenuItem() {
        const currentPath = window.location.pathname;
        const filename = currentPath.substring(currentPath.lastIndexOf('/') + 1);
        
        document.querySelectorAll('.nav-card, .submenu a').forEach(link => {
            const href = link.getAttribute('href');
            if (href && href !== '#' && filename === href) {
                // For main nav items
                const navItem = link.closest('.nav-item');
                navItem.classList.add('active');
                
                // For submenu items
                const parentItem = link.closest('.nav-item.has-submenu');
                if (parentItem) {
                    parentItem.classList.add('expanded');
                }
            }
        });
    }
    
    setActiveMenuItem();
    
    // GSAP Animations
    if (typeof gsap !== 'undefined') {
        // Initial animation
        const timeline = gsap.timeline();
        
        timeline.from('.logo-wrapper', {
            opacity: 0,
            x: -20,
            duration: 0.5,
            ease: 'power3.out'
        }).from('.user-profile', {
            opacity: 0,
            y: -15,
            duration: 0.4,
            ease: 'power2.out'
        }, '-=0.2').from('.nav-group', {
            opacity: 0,
            y: 20,
            stagger: 0.1,
            duration: 0.5,
            ease: 'power2.out'
        }, '-=0.2').from('.sidebar-footer .quick-action', {
            opacity: 0,
            y: 10,
            stagger: 0.05,
            duration: 0.4,
            ease: 'power2.out'
        }, '-=0.3');
        
        // Hover animations
        gsap.utils.toArray('.nav-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                if (!card.closest('.nav-item').classList.contains('active')) {
                    gsap.to(card, {
                        backgroundColor: 'rgba(243, 244, 246, 1)',
                        scale: 1.02,
                        duration: 0.2
                    });
                }
            });
            
            card.addEventListener('mouseleave', () => {
                if (!card.closest('.nav-item').classList.contains('active')) {
                    gsap.to(card, {
                        backgroundColor: 'transparent',
                        scale: 1,
                        duration: 0.2
                    });
                }
            });
        });
        
        // Active item highlight animation
        const activeItems = document.querySelectorAll('.nav-item.active .nav-card');
        activeItems.forEach(item => {
            gsap.to(item, {
                boxShadow: '0 0 0 2px rgba(79, 70, 229, 0.4)',
                repeat: -1,
                yoyo: true,
                duration: 1.5
            });
        });
        
        // Notification pulse animation
        gsap.to('.notification-dot', {
            scale: 1.4,
            opacity: 0.7,
            duration: 0.8,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });
    }
    
    // Demo Only: Notification click event
    const notificationBtn = document.getElementById('notificationBtn');
    if (notificationBtn) {
        notificationBtn.addEventListener('click', function(e) {
            e.preventDefault();
            alert('Notifications feature would open here.');
        });
    }
});
</script>