/**
 * BeatSync EDM Events Landing Page JavaScript
 * Handles interactive functionality for the website
 */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initializeSlider();
    initializeNavigation();
    initializeNewsletterForm();
    initializeMobileMenu();
    initializeScrollAnimations();
    initializeEventCards();
    initializeSmoothScroll();
    
    console.log('🎵 BeatSync Landing Page Initialized');
});

/**
 * Initialize Smooth Scrolling for all anchor links
 */
function initializeSmoothScroll() {
    // Ensure CSS smooth scrolling is working
    document.documentElement.style.scrollBehavior = 'smooth';
    
    // Enhanced smooth scroll for better browser support
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            
            if (targetId === '#') return;
            
            const target = document.querySelector(targetId);
            
            if (target) {
                const headerHeight = document.querySelector('.header').offsetHeight || 80;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                // Use smooth scrollTo for better control
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
 * Event Slider Functionality
 */
function initializeSlider() {
    const slider = document.getElementById('eventsSlider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (!slider || !prevBtn || !nextBtn) return;
    
    let currentIndex = 0;
    const cards = Array.from(slider.children);
    const totalCards = cards.length;
    
    // Auto-slide functionality
    let autoSlideInterval;
    const autoSlideDelay = 5000; // 5 seconds
    
    function updateSlider() {
        if (window.innerWidth < 768) {
            // Mobile: scroll to card
            const cardWidth = cards[0].offsetWidth + 30; // card width + gap
            slider.scrollTo({
                left: currentIndex * cardWidth,
                behavior: 'smooth'
            });
        } else {
            // Desktop: center the cards
            const sliderWidth = slider.offsetWidth;
            const cardWidth = cards[0].offsetWidth;
            const gap = 40;
            const totalWidth = totalCards * (cardWidth + gap) - gap;
            const offset = (sliderWidth - totalWidth) / 2;
            
            slider.scrollTo({
                left: Math.max(0, currentIndex * (cardWidth + gap) - offset),
                behavior: 'smooth'
            });
        }
        
        // Update button states
        updateSliderButtons();
        
        // Add analytics tracking
        trackSliderInteraction(currentIndex);
    }
    
    function updateSliderButtons() {
        prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextBtn.style.opacity = currentIndex === totalCards - 1 ? '0.5' : '1';
        prevBtn.style.pointerEvents = currentIndex === 0 ? 'none' : 'auto';
        nextBtn.style.pointerEvents = currentIndex === totalCards - 1 ? 'none' : 'auto';
    }
    
    function nextSlide() {
        currentIndex = currentIndex < totalCards - 1 ? currentIndex + 1 : 0;
        updateSlider();
    }
    
    function prevSlide() {
        currentIndex = currentIndex > 0 ? currentIndex - 1 : totalCards - 1;
        updateSlider();
    }
    
    function startAutoSlide() {
        stopAutoSlide(); // Clear any existing interval
        autoSlideInterval = setInterval(nextSlide, autoSlideDelay);
    }
    
    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = null;
        }
    }
    
    // Event listeners
    prevBtn.addEventListener('click', (e) => {
        e.preventDefault();
        stopAutoSlide();
        prevSlide();
        setTimeout(startAutoSlide, 3000); // Restart after 3 seconds
    });
    
    nextBtn.addEventListener('click', (e) => {
        e.preventDefault();
        stopAutoSlide();
        nextSlide();
        setTimeout(startAutoSlide, 3000); // Restart after 3 seconds
    });
    
    // Pause auto-slide on hover
    slider.addEventListener('mouseenter', stopAutoSlide);
    slider.addEventListener('mouseleave', startAutoSlide);
    
    // Touch/swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    let isSwiping = false;
    
    slider.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
        isSwiping = true;
        stopAutoSlide();
    }, { passive: true });
    
    slider.addEventListener('touchmove', (e) => {
        if (!isSwiping) return;
        e.preventDefault();
    }, { passive: false });
    
    slider.addEventListener('touchend', (e) => {
        if (!isSwiping) return;
        touchEndX = e.changedTouches[0].clientX;
        handleSwipe();
        isSwiping = false;
        setTimeout(startAutoSlide, 3000);
    }, { passive: true });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide(); // Swipe left - next slide
            } else {
                prevSlide(); // Swipe right - previous slide
            }
        }
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (document.activeElement.closest('.events-section') || 
            document.activeElement === document.body) {
            switch(e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    stopAutoSlide();
                    prevSlide();
                    setTimeout(startAutoSlide, 3000);
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    stopAutoSlide();
                    nextSlide();
                    setTimeout(startAutoSlide, 3000);
                    break;
                case ' ':
                case 'Spacebar':
                    if (e.target === document.body) {
                        e.preventDefault();
                        stopAutoSlide();
                        nextSlide();
                        setTimeout(startAutoSlide, 3000);
                    }
                    break;
            }
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', () => {
        updateSlider();
    });
    
    // Initialize
    updateSliderButtons();
    setTimeout(startAutoSlide, 2000); // Start after 2 seconds
}

/**
 * Smooth Scrolling Navigation
 */
function initializeNavigation() {
    // Handle scroll-based active navigation
    const sections = document.querySelectorAll('section[id]');
    const navItems = document.querySelectorAll('.nav-item');
    
    function updateActiveNav() {
        let current = '';
        const scrollY = window.pageYOffset;
        
        sections.forEach((section) => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');
            
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                current = sectionId;
            }
        });
        
        navItems.forEach((item) => {
            item.classList.remove('active');
            if (item.getAttribute('href') === `#${current}`) {
                item.classList.add('active');
            }
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
 * Newsletter Form Handling
 */
function initializeNewsletterForm() {
    const newsletterForms = document.querySelectorAll('.newsletter-form');
    
    newsletterForms.forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const emailInput = form.querySelector('input[type="email"]');
            const submitBtn = form.querySelector('button[type="submit"]');
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
                // Simulate API call - replace with actual endpoint
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Success simulation
                showNotification('🎉 Thank you for subscribing! You\'ll receive our latest updates.', 'success');
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
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const elementsToAnimate = document.querySelectorAll(
        '.hero-title, .hero-description, .events-title, .event-card, .footer-brand'
    );
    
    elementsToAnimate.forEach(element => {
        observer.observe(element);
    });
}

/**
 * Event Card Interactions - UPDATED VERSION
 */
function initializeEventCards() {
    const eventCards = document.querySelectorAll('.event-card');
    
    eventCards.forEach((card, index) => {
        // Make entire card clickable
        card.addEventListener('click', (e) => {
            const eventId = card.getAttribute('data-event-id');
            const eventName = card.querySelector('.event-name')?.textContent || 'Event';
            
            // Show the notification
            showNotification(`🎵 Event ${eventId} selected! Redirecting to ticket booking...`, 'info');
            
            // Add visual feedback
            card.style.transform = 'scale(0.95)';
            setTimeout(() => {
                card.style.transform = '';
            }, 150);
            
            // Track the click
            trackEventCardClick(eventId, index);
            
            // Simulate redirect after 2 seconds (uncomment when ready)
            setTimeout(() => {
                console.log(`Redirecting to event ${eventId} - ${eventName}`);
                // window.location.href = `/booking?event=${eventId}`;
            }, 2000);
        });
        
        // Add keyboard support for accessibility
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'button');
        card.setAttribute('aria-label', `View details for ${card.querySelector('.event-name')?.textContent || 'event'}`);
        
        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const eventId = card.getAttribute('data-event-id');
                
                // Show the notification
                showNotification(`🎵 Event ${eventId} selected! Redirecting to ticket booking...`, 'info');
                
                // Track and redirect
                trackEventCardClick(eventId, index);
                setTimeout(() => {
                    console.log(`Redirecting to event ${eventId}`);
                    // window.location.href = `/booking?event=${eventId}`;
                }, 2000);
            }
        });
        
        // Enhanced hover effect with subtle tilt (desktop only)
        card.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                card.style.transform = `translateY(-15px) translateZ(30px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            }
        });
        
        card.addEventListener('mouseleave', () => {
            if (window.innerWidth > 768) {
                card.style.transform = '';
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
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOutNotification 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
    
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
function trackSliderInteraction(slideIndex) {
    // Google Analytics or other tracking service
    if (typeof gtag !== 'undefined') {
        gtag('event', 'slider_interaction', {
            event_category: 'engagement',
            event_label: `slide_${slideIndex}`,
            value: slideIndex
        });
    }
    console.log(`📊 Slider interaction: slide ${slideIndex}`);
}

function trackNavigation(targetId) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'navigation_click', {
            event_category: 'navigation',
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
            event_label: 'newsletter',
            value: 1
        });
    }
    console.log(`📊 Newsletter signup: ${email.replace(/(.{2})(.*)(@.*)/, '$1***$3')}`);
}

function trackEventCardClick(eventId, index) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'event_card_click', {
            event_category: 'engagement',
            event_label: `event_${eventId}`,
            value: index
        });
    }
    console.log(`📊 Event card click: ${eventId} at position ${index}`);
}

/**
 * Performance Monitoring
 */
function measurePerformance() {
    if ('performance' in window) {
        window.addEventListener('load', () => {
            setTimeout(() => {
                const navigation = performance.getEntriesByType('navigation')[0];
                if (navigation) {
                    const loadTime = navigation.loadEventEnd - navigation.loadEventStart;
                    console.log(`⚡ Page load time: ${Math.round(loadTime)}ms`);
                    
                    // Track performance metrics
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'page_load_time', {
                            event_category: 'performance',
                            value: Math.round(loadTime)
                        });
                    }
                }
            }, 0);
        });
    }
}

// Initialize performance monitoring
measurePerformance();

/**
 * Error Handling
 */
window.addEventListener('error', (e) => {
    console.error('JavaScript Error:', e.error);
    
    // Track errors (don't send sensitive data)
    if (typeof gtag !== 'undefined') {
        gtag('event', 'javascript_error', {
            event_category: 'error',
            event_label: e.error?.message?.substring(0, 100) || 'Unknown error',
            value: 1
        });
    }
});

// Prevent unhandled promise rejections
window.addEventListener('unhandledrejection', (e) => {
    console.error('Unhandled Promise Rejection:', e.reason);
    e.preventDefault(); // Prevent console spam
});

/**
 * Initialize page functionality
 */
function initializePage() {
    console.log('🎵 BeatSync - Ready to rock! 🎸');
    
    // Add loading complete class to body
    document.body.classList.add('loaded');
    
    // Initialize smooth scroll fallback for older browsers
    if (!CSS.supports('scroll-behavior', 'smooth')) {
        initializeSmoothScrollFallback();
    }
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