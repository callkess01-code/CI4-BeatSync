/**
 * BeatSync Road Map JavaScript
 * Interactive functionality for the road map page
 */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initializeNavigation();
    initializeFeatureCards();
    initializeProgressBars();
    initializeMobileMenu();
    initializeScrollAnimations();
    initializeNewsletterForm();
    initializeSmoothScroll();
    initializePageTransitions();
    
    console.log('🗺️ BeatSync Road Map Initialized');
});

/**
 * Initialize Smooth Scrolling
 */
function initializeSmoothScroll() {
    document.documentElement.style.scrollBehavior = 'smooth';
    
    // Enhanced smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            
            if (targetId === '#') return;
            
            const target = document.querySelector(targetId);
            
            if (target) {
                const headerHeight = document.querySelector('.header').offsetHeight || 80;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Update active navigation state
                updateActiveNavigation(targetId);
                
                // Close mobile menu if open
                closeMobileMenu();
                
                // Track navigation clicks
                trackNavigation(targetId);
            }
        });
    });
}

/**
 * Navigation functionality
 */
function initializeNavigation() {
    // Handle scroll-based active navigation for sections
    const sections = document.querySelectorAll('.pricing-plan-section, .coming-soon-section');
    const navItems = document.querySelectorAll('.nav-item');
    
    function updateActiveNav() {
        let current = '';
        const scrollY = window.pageYOffset;
        
        sections.forEach((section) => {
            if (section.id) {
                const sectionHeight = section.offsetHeight;
                const sectionTop = section.offsetTop - 150;
                const sectionId = section.getAttribute('id');
                
                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    current = sectionId;
                }
            }
        });
        
        // Update navigation highlighting
        navItems.forEach((item) => {
            item.classList.remove('active');
        });
    }
    
    // Throttle scroll events for better performance
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(() => {
                updateActiveNav();
                ticking = false;
            });
            ticking = true;
        }
    });
}

/**
 * Feature Cards Interactive Features
 */
function initializeFeatureCards() {
    const featureCards = document.querySelectorAll('.feature-card');
    
    featureCards.forEach((card, index) => {
        // Add click interaction
        card.addEventListener('click', () => {
            const featureTitle = card.querySelector('.feature-title').textContent;
            const featureStatus = card.querySelector('.feature-status').textContent;
            
            showNotification(`Feature: ${featureTitle} - Status: ${featureStatus}`, 'info');
            
            // Visual feedback
            card.style.transform = 'translateY(-8px) scale(1.02)';
            setTimeout(() => {
                card.style.transform = '';
            }, 300);
            
            trackFeatureCardClick(featureTitle, featureStatus, index);
        });
        
        // Hover effects for better interactivity
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px)';
            card.style.borderColor = '#ff4057';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.borderColor = 'transparent';
        });
        
        // Keyboard accessibility
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'button');
        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.click();
            }
        });
    });
}

/**
 * Progress Bars Animation
 */
function initializeProgressBars() {
    const progressBars = document.querySelectorAll('.progress-fill');
    
    // Function to animate progress bars
    function animateProgressBars() {
        progressBars.forEach(bar => {
            const progress = bar.getAttribute('data-progress');
            bar.style.setProperty('--progress-width', progress + '%');
            
            // Delay animation slightly for visual effect
            setTimeout(() => {
                bar.style.width = progress + '%';
                bar.parentElement.parentElement.classList.add('progress-animated');
            }, Math.random() * 500 + 200);
        });
    }
    
    // Intersection Observer for progress bars
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressFill = entry.target.querySelector('.progress-fill');
                if (progressFill && !progressFill.style.width) {
                    const progress = progressFill.getAttribute('data-progress');
                    setTimeout(() => {
                        progressFill.style.width = progress + '%';
                        entry.target.classList.add('progress-animated');
                    }, Math.random() * 300 + 100);
                }
            }
        });
    }, { threshold: 0.5 });
    
    // Observe all feature cards for progress animation
    document.querySelectorAll('.feature-card').forEach(card => {
        progressObserver.observe(card);
    });
}

/**
 * Mobile Menu Toggle
 */
function initializeMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const body = document.body;
    
    if (!hamburger || !navMenu) return;
    
    hamburger.addEventListener('click', (e) => {
        e.preventDefault();
        toggleMobileMenu();
    });
    
    function toggleMobileMenu() {
        const isOpen = navMenu.classList.contains('mobile-menu-open');
        
        if (isOpen) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }
    
    function openMobileMenu() {
        navMenu.classList.add('mobile-menu-open');
        hamburger.innerHTML = '✕';
        hamburger.setAttribute('aria-expanded', 'true');
        body.style.overflow = 'hidden';
        
        // Animate menu items
        const navItems = navMenu.querySelectorAll('.nav-item');
        navItems.forEach((item, index) => {
            item.style.animation = `fadeInUp 0.6s ease ${index * 0.1}s forwards`;
        });
    }
    
    // Close menu when clicking on navigation items
    navMenu.addEventListener('click', (e) => {
        if (e.target.classList.contains('nav-item')) {
            closeMobileMenu();
        }
    });
    
    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && navMenu.classList.contains('mobile-menu-open')) {
            closeMobileMenu();
        }
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (navMenu.classList.contains('mobile-menu-open') && 
            !navMenu.contains(e.target) && 
            !hamburger.contains(e.target)) {
            closeMobileMenu();
        }
    });
}

function closeMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const body = document.body;
    
    if (navMenu && navMenu.classList.contains('mobile-menu-open')) {
        navMenu.classList.remove('mobile-menu-open');
        
        if (hamburger) {
            hamburger.innerHTML = '☰';
            hamburger.setAttribute('aria-expanded', 'false');
        }
        
        body.style.overflow = '';
        
        // Clear animations
        const navItems = navMenu.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.style.animation = '';
        });
    }
}

/**
 * Scroll Animations
 */
function initializeScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Special animation for feature cards
                if (entry.target.classList.contains('feature-card')) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, Math.random() * 200);
                }
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const elementsToAnimate = document.querySelectorAll(
        '.roadmap-title, .roadmap-description, .section-title, .feature-card, .coming-soon-card'
    );
    
    elementsToAnimate.forEach((element, index) => {
        // Initial state for feature cards
        if (element.classList.contains('feature-card')) {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        }
        
        observer.observe(element);
    });
}

/**
 * Newsletter Form Handling
 */
function initializeNewsletterForm() {
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (!newsletterForm) return;
    
    newsletterForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const emailInput = newsletterForm.querySelector('input[type="email"]');
        const submitBtn = newsletterForm.querySelector('button[type="submit"]');
        const email = emailInput.value.trim();
        
        if (!validateEmail(email)) {
            showNotification('Please enter a valid email address.', 'error');
            emailInput.focus();
            return;
        }
        
        // Show loading state
        const originalBtnText = submitBtn.textContent;
        submitBtn.textContent = 'Subscribing...';
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.7';
        
        try {
            // Simulate API call
            await new Promise(resolve => setTimeout(resolve, 1500));
            
            showNotification('Thank you for subscribing! You\'ll receive our latest updates.', 'success');
            emailInput.value = '';
            trackNewsletterSignup(email);
            
        } catch (error) {
            console.error('Newsletter signup error:', error);
            showNotification('Oops! Something went wrong. Please try again.', 'error');
        } finally {
            // Restore button state
            submitBtn.textContent = originalBtnText;
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
        }
    });
}

/**
 * Page Transitions
 */
function initializePageTransitions() {
    // Add smooth transitions for internal links
    document.querySelectorAll('a[href*=".php"]').forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            
            // Skip external links
            if (href.startsWith('http') && !href.includes(window.location.hostname)) {
                return;
            }
            
            e.preventDefault();
            
            // Add fade out effect
            document.body.style.transition = 'opacity 0.3s ease';
            document.body.style.opacity = '0.7';
            
            // Navigate after transition
            setTimeout(() => {
                window.location.href = href;
            }, 300);
            
            trackPageTransition(href);
        });
    });
    
    // Fade in on page load
    window.addEventListener('load', () => {
        document.body.style.opacity = '1';
        document.body.style.transition = 'opacity 0.5s ease';
    });
}

/**
 * Feature Tags Interaction
 */
function initializeFeatureTags() {
    const featureTags = document.querySelectorAll('.feature-tag');
    
    featureTags.forEach(tag => {
        tag.addEventListener('click', () => {
            const tagText = tag.textContent;
            showNotification(`Coming soon: ${tagText}!`, 'info');
            
            // Animation effect
            tag.style.transform = 'scale(0.95)';
            setTimeout(() => {
                tag.style.transform = 'scale(1)';
            }, 150);
            
            trackFeatureTagClick(tagText);
        });
        
        // Keyboard accessibility
        tag.setAttribute('tabindex', '0');
        tag.setAttribute('role', 'button');
        tag.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                tag.click();
            }
        });
    });
}

/**
 * Utility Functions
 */
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 16px 24px;
        border-radius: 12px;
        color: white;
        font-weight: 500;
        z-index: 10000;
        max-width: 400px;
        font-size: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        animation: slideInNotification 0.3s ease;
    `;
    
    // Set background color based on type
    const colors = {
        success: '#4CAF50',
        error: '#FF4757',
        info: '#5DADE2',
        warning: '#F39C12'
    };
    notification.style.backgroundColor = colors[type] || colors.info;
    
    notification.textContent = message;
    document.body.appendChild(notification);
    
    // Auto-remove after 4 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOutNotification 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }
    }, 4000);
    
    // Add close button
    const closeBtn = document.createElement('button');
    closeBtn.innerHTML = '×';
    closeBtn.style.cssText = `
        position: absolute;
        top: 8px;
        right: 8px;
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    `;
    closeBtn.addEventListener('click', () => {
        notification.style.animation = 'slideOutNotification 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    });
    notification.appendChild(closeBtn);
    
    // Add CSS animations if not already added
    if (!document.querySelector('#notification-styles')) {
        const style = document.createElement('style');
        style.id = 'notification-styles';
        style.textContent = `
            @keyframes slideInNotification {
                from { 
                    transform: translateX(100%); 
                    opacity: 0; 
                }
                to { 
                    transform: translateX(0); 
                    opacity: 1; 
                }
            }
            @keyframes slideOutNotification {
                from { 
                    transform: translateX(0); 
                    opacity: 1; 
                }
                to { 
                    transform: translateX(100%); 
                    opacity: 0; 
                }
            }
        `;
        document.head.appendChild(style);
    }
}

function updateActiveNavigation(targetId) {
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === targetId) {
            item.classList.add('active');
        }
    });
}

/**
 * Analytics and Tracking Functions
 */
function trackFeatureCardClick(featureTitle, status, index) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'feature_card_click', {
            event_category: 'roadmap',
            event_label: featureTitle,
            custom_parameter_1: status,
            value: index
        });
    }
    console.log(`🗺️ Feature card clicked: ${featureTitle} (${status}) at position ${index}`);
}

function trackFeatureTagClick(tagText) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'feature_tag_click', {
            event_category: 'roadmap',
            event_label: tagText,
            value: 1
        });
    }
    console.log(`🏷️ Feature tag clicked: ${tagText}`);
}

function trackNavigation(targetId) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'navigation_click', {
            event_category: 'roadmap',
            event_label: targetId.replace('#', ''),
            value: 1
        });
    }
    console.log(`📊 Navigation: ${targetId}`);
}

function trackNewsletterSignup(email) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'newsletter_signup', {
            event_category: 'conversion',
            event_label: 'roadmap',
            value: 1
        });
    }
    console.log(`📧 Newsletter signup from roadmap: ${email.replace(/(.{2})(.*)(@.*)/, '$1***$3')}`);
}

function trackPageTransition(href) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'page_transition', {
            event_category: 'navigation',
            event_label: href,
            value: 1
        });
    }
    console.log(`🔄 Page transition: ${href}`);
}

/**
 * Error Handling
 */
window.addEventListener('error', (e) => {
    console.error('Road Map JavaScript Error:', e.error);
    
    // Track errors (don't send sensitive data)
    if (typeof gtag !== 'undefined') {
        gtag('event', 'javascript_error', {
            event_category: 'error',
            event_label: 'roadmap_' + (e.error?.message?.substring(0, 50) || 'unknown'),
            value: 1
        });
    }
});

// Prevent unhandled promise rejections
window.addEventListener('unhandledrejection', (e) => {
    console.error('Road Map Unhandled Promise Rejection:', e.reason);
    e.preventDefault(); // Prevent console spam
});

/**
 * Initialize page functionality
 */
function initializePage() {
    console.log('🗺️ BeatSync Road Map - Future Plans Ready! 🚀');
    
    // Add loading complete class to body
    document.body.classList.add('loaded');
    
    // Initialize feature tags after DOM is ready
    setTimeout(() => {
        initializeFeatureTags();
    }, 100);
    
    // Initialize smooth scroll fallback for older browsers
    if (!CSS.supports('scroll-behavior', 'smooth')) {
        initializeSmoothScrollFallback();
    }
    
    // Add keyboard navigation instructions
    console.log('⌨️ Keyboard shortcuts:');
    console.log('  • Tab: Navigate through interactive elements');
    console.log('  • Enter/Space: Activate buttons and cards');
    console.log('  • Escape: Close mobile menu');
}

/**
 * Smooth scroll fallback for older browsers
 */
function initializeSmoothScrollFallback() {
    function smoothScrollTo(targetY, duration = 800) {
        const startY = window.pageYOffset;
        const difference = targetY - startY;
        const startTime = performance.now();
        
        function step() {
            const progress = (performance.now() - startTime) / duration;
            const ease = progress < 0.5 
                ? 4 * progress * progress * progress 
                : (progress - 1) * (2 * progress - 2) * (2 * progress - 2) + 1;
                
            window.scrollTo(0, startY + difference * Math.min(ease, 1));
            
            if (progress < 1) {
                requestAnimationFrame(step);
            }
        }
        
        requestAnimationFrame(step);
    }
    
    // Override the smooth scroll implementation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = document.querySelector('.header').offsetHeight || 80;
                smoothScrollTo(target.offsetTop - headerHeight - 20);
            }
        });
    });
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializePage);
} else {
    initializePage();
}