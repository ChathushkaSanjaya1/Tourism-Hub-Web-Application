<header class="glass-header">
    <div class="header-container">
        <div class="header-left">
            <button class="menu-trigger" aria-label="Toggle navigation">
                <div class="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </button>
            
            <a href="dashboard.php" class="brand"> 
                <span class="logo-text">Pearl Heritage Travels</span>
            </a>
        </div>
        
        <div class="header-center">
            <div class="search-wrapper">
                <input type="text" placeholder="Search..." class="search-input">
                <button class="search-button" aria-label="Search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="header-right">
            <div class="quick-actions">
                <button class="action-button" data-tooltip="Messages">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 15C21 15.5304 20.7893 16.0391 20.4142 16.4142C20.0391 16.7893 19.5304 17 19 17H7L3 21V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="badge">5</span>
                </button>
                
                <button class="action-button" data-tooltip="Notifications">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="badge">3</span>
                </button>
                
                <button class="action-button theme-toggle" data-tooltip="Toggle theme">
                    <svg class="sun-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 1V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 21V23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.22 4.22L5.64 5.64" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.36 18.36L19.78 19.78" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 12H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 12H23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.22 19.78L5.64 18.36" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.36 5.64L19.78 4.22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <svg class="moon-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 12.79C20.8427 14.4922 20.2039 16.1144 19.1582 17.4668C18.1126 18.8192 16.7035 19.8458 15.0957 20.4265C13.4879 21.0073 11.748 21.1181 10.0795 20.7461C8.41102 20.3741 6.88299 19.5345 5.67419 18.3258C4.46539 17.117 3.62594 15.589 3.2539 13.9205C2.88186 12.252 2.99274 10.5121 3.57346 8.9043C4.15419 7.29651 5.18083 5.88737 6.53321 4.84175C7.88559 3.79614 9.5078 3.15731 11.21 3C10.2133 4.34827 9.73381 6.00945 9.85851 7.68141C9.98322 9.35338 10.7039 10.9251 11.8894 12.1106C13.0749 13.2961 14.6466 14.0168 16.3186 14.1415C17.9906 14.2662 19.6517 13.7867 21 12.79Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            
            <div class="user-menu">
                <button class="profile-toggle" aria-expanded="false" aria-label="Toggle user menu">
                    <div class="profile-info">
                        <span class="profile-name">Administrator</span>
                        <span class="profile-role">Admin</span>
                    </div>
                    <div class="profile-avatar">
                        <img src="images/User-icon.png" alt="Admin">
                        <span class="status-indicator online"></span>
                    </div>
                </button>
                
				<div class="profile-dropdown">
    <!-- User Card -->
    <div class="user-card">
        <div class="user-card-content">
            <div class="dropdown-avatar">
                <img src="images/User-icon.png" alt="Admin">
            </div>
            <div class="user-info">
                <h4 class="user-name">Administrator</h4>
                <p class="user-email">admin@pearlheritage.com</p>
                <div class="user-status">
                    <span class="status-dot"></span>
                    <span>Online</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Account Section -->
    <div class="menu-section">
        <h5>Account</h5>
        <a href="profile.php" class="menu-item">
            <div class="menu-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div class="menu-content">
                <span class="menu-label">My Profile</span>
                <span class="menu-description">View and edit your information</span>
            </div>
        </a>
        <a href="change-password.php" class="menu-item">
            <div class="menu-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </div>
            <div class="menu-content">
                <span class="menu-label">Security</span>
                <span class="menu-description">Change password & security settings</span>
            </div>
        </a>
    </div>
    
    <div class="dropdown-divider"></div>
    
    <!-- Settings Section -->
    <div class="menu-section">
        <h5>Preferences</h5>
        <a href="#" class="menu-item">
            <div class="menu-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
            </div>
            <div class="menu-content">
                <span class="menu-label">Settings</span>
                <span class="menu-description">System preferences & options</span>
            </div>
        </a>
        <a href="#" class="menu-item">
            <div class="menu-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
            </div>
            <div class="menu-content">
                <span class="menu-label">Help & Support</span>
                <span class="menu-description">Get help with your account</span>
            </div>
        </a>
    </div>
    
    <!-- Logout Section -->
	<div class="dropdown-footer">
    <a href="logout.php" class="logout-button">
        <div class="icon-container">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
        </div>
        <div class="text-container">Sign Out</div>
    </a>
</div>
            </div>
        </div>
    </div>
</header>

<style>
:root {
    /* Primary color scheme */
    --primary-50: #eff6ff;
    --primary-100: #dbeafe;
    --primary-200: #bfdbfe;
    --primary-300: #93c5fd;
    --primary-400: #60a5fa;
    --primary-500: #3b82f6;
    --primary-600: #2563eb;
    --primary-700: #1d4ed8;
    --primary-800: #1e40af;
    --primary-900: #1e3a8a;
    
    /* Accent color */
    --accent-500: #8b5cf6;
    --accent-600: #7c3aed;
    
    /* Neutrals */
    --neutral-50: #f9fafb;
    --neutral-100: #f3f4f6;
    --neutral-200: #e5e7eb;
    --neutral-300: #d1d5db;
    --neutral-400: #9ca3af;
    --neutral-500: #6b7280;
    --neutral-600: #4b5563;
    --neutral-700: #374151;
    --neutral-800: #1f2937;
    --neutral-900: #111827;
    
    /* Status colors */
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
    --info: #3b82f6;
    
    /* Glass effect */
    --glass-background: rgba(255, 255, 255, 0.9);
    --glass-border: rgba(255, 255, 255, 0.2);
    --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    --glass-backdrop: blur(10px);
    
    /* Typography */
    --font-sans: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
    
    /* Layout */
    --header-height: 70px;
    --border-radius-sm: 6px;
    --border-radius-md: 8px;
    --border-radius-lg: 12px;
    --border-radius-xl: 16px;
    --border-radius-full: 9999px;
}

/* Dark mode variables */
.dark-mode {
    --glass-background: rgba(17, 24, 39, 0.85);
    --glass-border: rgba(255, 255, 255, 0.08);
    --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    
    --neutral-50: #111827;
    --neutral-100: #1f2937;
    --neutral-200: #374151;
    --neutral-300: #4b5563;
    --neutral-400: #6b7280;
    --neutral-500: #9ca3af;
    --neutral-600: #d1d5db;
    --neutral-700: #e5e7eb;
    --neutral-800: #f3f4f6;
    --neutral-900: #f9fafb;
}

/* Base styles */
body {
    font-family: var(--font-sans);
    margin: 0;
    padding: 0;
    background-color: var(--neutral-100);
    color: var(--neutral-900);
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Header styling */
.glass-header {
    position: sticky;
    top: 0;
    z-index: 100;
    background: var(--glass-background);
    backdrop-filter: var(--glass-backdrop);
    -webkit-backdrop-filter: var(--glass-backdrop);
    border-bottom: 1px solid var(--glass-border);
    box-shadow: var(--glass-shadow);
    height: var(--header-height);
    transition: all 0.3s ease;
	
}

.header-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1400px;
    height: 100%;
    margin: 0 auto;
    padding: 0 24px;
}

/* Left section - Brand & Menu */
.header-left {
    display: flex;
    align-items: center;
    gap: 50px;
}

.menu-trigger {
    background: transparent;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px;
    border-radius: var(--border-radius-md);
    transition: background-color 0.2s ease;
}

.menu-trigger:hover {
    background-color: var(--neutral-200);
}

.hamburger {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 24px;
    height: 18px;
}

.hamburger .line {
    width: 100%;
    height: 2px;
    background-color: var(--neutral-700);
    border-radius: 2px;
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.sidebar-open .hamburger .line:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
}

.sidebar-open .hamburger .line:nth-child(2) {
    opacity: 0;
}

.sidebar-open .hamburger .line:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
}

.brand {
    display: flex;
    align-items: center;
    gap: 20px;
    text-decoration: none;
    color: var(--neutral-900);
}

.logo-symbol {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, var(--primary-600), var(--accent-600));
    color: white;
    border-radius: var(--border-radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    box-shadow: 0 2px 10px rgba(37, 99, 235, 0.2);
    transition: transform 0.3s ease;
}

.brand:hover .logo-symbol {
    transform: translateY(-2px);
}

.logo-text {
    font-size: 18px;
    font-weight: 600;
    background: linear-gradient(to right, var(--primary-700), var(--accent-600));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Center section - Search */
.header-center {
    flex: 1;
    max-width: 500px;
    padding: 0 24px;
}

.search-wrapper {
    position: relative;
    width: 100%;
}

.search-input {
    width: 100%;
    padding: 10px 18px;
    padding-right: 45px;
    border: 1px solid var(--neutral-300);
    border-radius: var(--border-radius-full);
    background-color: var(--neutral-100);
    color: var(--neutral-900);
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
}

.search-input::placeholder {
    color: var(--neutral-500);
}

.search-input:focus {
    border-color: var(--primary-500);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
}

.search-button {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--neutral-500);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    padding: 0;
    transition: color 0.2s ease;
}

.search-input:focus + .search-button,
.search-button:hover {
    color: var(--primary-600);
}

/* Right section - Actions & User Menu */
.header-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

.quick-actions {
    display: flex;
    gap: 8px;
}

.action-button {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: var(--border-radius-full);
    border: none;
    background-color: var(--neutral-100);
    color: var(--neutral-700);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.action-button:hover, .action-button:focus {
    background-color: var(--neutral-200);
    color: var(--primary-600);
}

.action-button[data-tooltip]:hover::after {
    content: attr(data-tooltip);
    position: absolute;
    bottom: -35px;
    left: 50%;
    transform: translateX(-50%);
    padding: 6px 12px;
    background: var(--neutral-800);
    color: white;
    border-radius: var(--border-radius-md);
    font-size: 12px;
    white-space: nowrap;
    z-index: 10;
    opacity: 0;
    animation: fade-in 0.2s ease forwards;
}

@keyframes fade-in {
    to { opacity: 1; }
}

.badge {
    position: absolute;
    top: -4px;
    right: -4px;
    min-width: 18px;
    height: 18px;
    padding: 0 5px;
    border-radius: var(--border-radius-full);
    background-color: var(--danger);
    color: white;
    font-size: 11px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Theme toggle */
.sun-icon {
    display: none;
}

.moon-icon {
    display: block;
}

.dark-mode .sun-icon {
    display: block;
}

.dark-mode .moon-icon {
    display: none;
}

/* User Menu */
.user-menu {
    position: relative;
}

.profile-toggle {
    display: flex;
    align-items: center;
    padding: 4px;
    padding-right: 12px;
    gap: 12px;
    background: transparent;
    border: 1px solid var(--neutral-300);
    border-radius: var(--border-radius-full);
    cursor: pointer;
    transition: all 0.2s ease;
}

.profile-toggle:hover {
    border-color: var(--primary-500);
    background-color: var(--neutral-100);
}

.profile-info {
    display: none;
}

@media (min-width: 992px) {
    .profile-info {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    
    .profile-toggle {
        padding-left: 12px;
    }
}

.profile-name {
    font-size: 14px;
    font-weight: 600;
    color: var(--neutral-900);
    line-height: 1.2;
}

.profile-role {
    font-size: 12px;
    color: var(--neutral-500);
}

.profile-avatar {
    position: relative;
    width: 36px;
    height: 36px;
    border-radius: var(--border-radius-full);
    overflow: hidden;
    border: 2px solid var(--primary-200);
    transition: border-color 0.2s ease;
}

.profile-toggle:hover .profile-avatar {
    border-color: var(--primary-500);
}

.profile-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.status-indicator {
    position: absolute;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 2px solid white;
    bottom: 0;
    right: 0;
}

.status-indicator.online {
    background-color: var(--success);
}

/* Profile Dropdown - New Card Style Design */
.profile-dropdown {
    position: absolute;
    top: calc(100% + 12px);
    right: 0;
    width: 320px;
    background-color: var(--neutral-50);
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12), 0 4px 12px rgba(0, 0, 0, 0.08);
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px) scale(0.98);
    transform-origin: top right;
    transition: all 0.25s cubic-bezier(0.3, 0, 0.2, 1);
    z-index: 100;
    overflow: hidden;
    border: 1px solid var(--neutral-200);
}

/* Animation for dropdown appearing */
.profile-toggle[aria-expanded="true"] + .profile-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

/* User profile card at the top */
.user-card {
    position: relative;
    padding: 24px;
    background: linear-gradient(to right, var(--primary-600), var(--accent-600));
    color: white;
    border-radius: 16px 16px 0 0;
    overflow: hidden;
}

/* Abstract shapes in background */
.user-card::before {
    content: "";
    position: absolute;
    top: -20px;
    right: -20px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    z-index: 0;
}

.user-card::after {
    content: "";
    position: absolute;
    bottom: -40px;
    left: -20px;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
    z-index: 0;
}

.user-card-content {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 16px;
}

/* Avatar with border */
.dropdown-avatar {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    overflow: hidden;
    border: 3px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.dropdown-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* User details with cleaner typography */
.user-info {
    flex: 1;
}

.user-name {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    letter-spacing: 0.2px;
    color: white;
}

.user-email {
    margin: 4px 0 0;
    font-size: 13px;
    opacity: 0.85;
    letter-spacing: 0.1px;
}

.user-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 8px;
    padding: 4px 10px;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: var(--success);
}

/* Menu links section */
.menu-section {
    padding: 8px 0;
    background-color: var(--neutral-50);
}

.menu-section h5 {
    margin: 0;
    padding: 12px 24px 8px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: var(--neutral-500);
}

.menu-item {
    display: flex;
    align-items: center;
    padding: 12px 24px;
    text-decoration: none;
    transition: all 0.2s;
}

.menu-item:hover {
    background-color: var(--neutral-100);
}

.menu-item:active {
    background-color: var(--neutral-200);
}

.menu-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    margin-right: 14px;
    background-color: var(--neutral-100);
    color: var(--primary-600);
}

.menu-item:hover .menu-icon {
    background-color: var(--primary-50);
    color: var(--primary-700);
}

.menu-content {
    flex: 1;
}

.menu-label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: var(--neutral-800);
}

.menu-description {
    display: block;
    font-size: 12px;
    color: var(--neutral-500);
    margin-top: 2px;
}

/* Divider between sections */
.dropdown-divider {
    height: 1px;
    background-color: var(--neutral-200);
    margin: 8px 0;
}

/* Footer with logout */
.dropdown-footer {
    padding: 16px 24px;
    background-color: var(--neutral-50);
}

.logout-button {
    display: flex;
    align-items: center;
    width: 100%;
    border: 1px solid var(--neutral-200);
    border-radius: 12px;
    overflow: hidden;
    text-decoration: none;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.logout-button .icon-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--danger), #ff6b6b);
    color: white;
    flex-shrink: 0;
}

.logout-button .text-container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    padding: 0 16px;
    height: 48px;
    font-weight: 500;
    font-size: 14px;
    color: var(--neutral-800);
    background-color: var(--neutral-50);
    transition: background-color 0.3s ease;
}

.logout-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    border-color: var(--neutral-300);
}

.logout-button:hover .text-container {
    background-color: var(--neutral-100);
}

.logout-button:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Dark mode adjustments */
.dark-mode .logout-button {
    border-color: var(--neutral-700);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.dark-mode .logout-button .text-container {
    background-color: var(--neutral-800);
    color: var(--neutral-200);
}

.dark-mode .logout-button:hover {
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    border-color: var(--neutral-600);
}

.dark-mode .logout-button:hover .text-container {
    background-color: var(--neutral-700);
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .profile-dropdown {
        width: 280px;
    }
    
    .dropdown-avatar {
        width: 50px;
        height: 50px;
    }
    
    .user-card {
        padding: 20px;
    }
    
    .menu-item {
        padding: 10px 20px;
    }
}

/* Responsive styles */
@media (max-width: 768px) {
    .header-center {
        display: none;
    }
    
    .action-button[data-tooltip="Messages"] {
        display: none;
    }
    
    .logo-text {
        display: none;
    }
}

@media (max-width: 480px) {
    .header-container {
        padding: 0 16px;
    }
    
    .header-right {
        gap: 8px;
    }
    
    .action-button {
        width: 36px;
        height: 36px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Menu toggle
    const menuTrigger = document.querySelector('.menu-trigger');
    if (menuTrigger) {
        menuTrigger.addEventListener('click', function() {
            document.body.classList.toggle('sidebar-open');
        });
    }

    // Theme toggle
    const themeToggle = document.querySelector('.theme-toggle');
    if (themeToggle) {
        // Check for saved preference
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
        }
        
        themeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            
            // Save preference
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    }
    
    // User profile dropdown
    const profileToggle = document.querySelector('.profile-toggle');
    if (profileToggle) {
        profileToggle.addEventListener('click', function(e) {
            e.preventDefault();
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
        });
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileToggle.contains(e.target) && 
                !document.querySelector('.profile-dropdown').contains(e.target)) {
                profileToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                profileToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
    
    // Initialize functionality for sidebar toggle
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            document.body.classList.toggle('sidebar-open');
        });
    }
});
</script>