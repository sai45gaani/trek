/**
 * Trekshitz Main JavaScript File
 * Author: Trekshitz Team
 * Description: Main functionality for the Trekshitz website
 */

// Global App Object
const TrekshitzApp = {
    // Configuration
    config: {
        scrollOffset: 100,
        animationDelay: 150,
        swipeThreshold: 50,
        debounceDelay: 300
    },

    // Initialize the application
    init() {
       this.setupEventListeners();
        this.initializeSwiper();
       this.setupThemeToggle();
        this.setupScrollEffects();
        this.setupAnimations();
       this.setupForms();
      /*  this.setupLoadingStates();*/
        console.log('Trekshitz App Initialized');
    },

    // Event Listeners
    setupEventListeners() {
        // Page load event
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
            this.hideLoadingSpinner();
        });

        // Scroll events
        window.addEventListener('scroll', this.debounce(() => {
            this.handleNavbarScroll();
            this.handleScrollAnimations();
        }, this.config.debounceDelay));

        // Resize events
        window.addEventListener('resize', this.debounce(() => {
            this.handleResize();
        }, this.config.debounceDelay));

        // Click events for smooth scrolling
        this.setupSmoothScrolling();
    },

    // Initialize Swiper for Hero Section
  /*  initializeSwiper() {
        if (typeof Swiper !== 'undefined' && document.querySelector('.hero-swiper')) {
            const heroSwiper = new Swiper('.hero-swiper', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                keyboard: {
                    enabled: true,
                    onlyInViewport: true
                },
                a11y: {
                    prevSlideMessage: 'Previous slide',
                    nextSlideMessage: 'Next slide',
                    paginationBulletMessage: 'Go to slide {{index}}'
                }
            });

            // Pause autoplay on hover
            const heroSection = document.querySelector('.hero-swiper');
            if (heroSection) {
                heroSection.addEventListener('mouseenter', () => {
                    heroSwiper.autoplay.stop();
                });
                heroSection.addEventListener('mouseleave', () => {
                    heroSwiper.autoplay.start();
                });
            }
        }
    },*/

    initializeSwiper() {
            if (typeof Swiper !== 'undefined' && document.querySelector('.hero-swiper')) {
                const heroSwiper = new Swiper('.hero-swiper', {
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true
                    },
                    pagination: {
                        el: '.hero-swiper .swiper-pagination',
                        clickable: true,
                        dynamicBullets: true
                    },
                    navigation: {
                        nextEl: '.hero-swiper .swiper-button-next',
                        prevEl: '.hero-swiper .swiper-button-prev',
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    keyboard: {
                        enabled: true,
                        onlyInViewport: true
                    },
                    a11y: {
                        prevSlideMessage: 'Previous slide',
                        nextSlideMessage: 'Next slide',
                        paginationBulletMessage: 'Go to slide {{index}}'
                    }
                });
            }

            // ================= GALLERY SWIPER =================
            if (document.querySelector('.gallery-swiper')) {
                const gallerySwiper = new Swiper('.gallery-swiper', {
                    loop: true,
                    centeredSlides: true,
                    slidesPerView: 1,
                    spaceBetween: 30,

                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },

                    pagination: {
                        el: '.gallery-swiper .swiper-pagination',
                        clickable: true,
                    },

                    breakpoints: {
                        640: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 }
                    }
                });
            }
        },

    // Dark Mode Toggle
    setupThemeToggle() {
        const themeToggle = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        if (!themeToggle || !darkIcon || !lightIcon) return;

        // Check for saved theme preference or default to 'light'
        const currentTheme = localStorage.getItem('theme') || 'light';
        
        this.setTheme(currentTheme, darkIcon, lightIcon);

        themeToggle.addEventListener('click', () => {
            const isDark = document.documentElement.classList.contains('dark');
            const newTheme = isDark ? 'light' : 'dark';
            
            this.setTheme(newTheme, darkIcon, lightIcon);
            localStorage.setItem('theme', newTheme);
            
            // Dispatch custom event for theme change
            window.dispatchEvent(new CustomEvent('themeChanged', { 
                detail: { theme: newTheme } 
            }));
        });
    },

    // Set theme helper
    setTheme(theme, darkIcon, lightIcon) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
            darkIcon.classList.add('hidden');
            lightIcon.classList.remove('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
        }
    },


    // Navbar Background on Scroll
    handleNavbarScroll() {
        const navbar = document.getElementById('navbar');
        if (!navbar) return;

        if (window.scrollY > this.config.scrollOffset) {
            navbar.classList.add('bg-white/95', 'dark:bg-gray-900/95', 'backdrop-blur-md', 'shadow-lg');
            navbar.classList.remove('glass-effect');
        } else {
            navbar.classList.remove('bg-white/95', 'dark:bg-gray-900/95', 'backdrop-blur-md', 'shadow-lg');
            navbar.classList.add('glass-effect');
        }
    },

    // Smooth Scrolling for Navigation Links
    setupSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = anchor.getAttribute('href');
                const target = document.querySelector(targetId);
                
                if (target) {
                    const headerHeight = document.getElementById('navbar')?.offsetHeight || 0;
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    },

    // Scroll Animations
    setupAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    // Unobserve after animation to improve performance
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.card, section, .feature-card').forEach(el => {
            observer.observe(el);
        });
    },

    handleScrollAnimations() {
        // Add any additional scroll-based animations here
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax');
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    },

    // Form Handling
    setupForms() {
        // Newsletter Form
        const newsletterForm = document.getElementById('newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleNewsletterSubmission(newsletterForm);
            });
        }

        // Contact Forms
        document.querySelectorAll('.contact-form').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleContactFormSubmission(form);
            });
        });

        // Search Forms
        document.querySelectorAll('.search-form').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSearchFormSubmission(form);
            });
        });
    },

    handleNewsletterSubmission(form) {
        const email = form.querySelector('input[type="email"]').value;
        
        if (this.validateEmail(email)) {
            // Show loading state
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Subscribing...';
            submitButton.disabled = true;

            // Simulate API call
            setTimeout(() => {
                this.showNotification('Thank you for subscribing! आपल्या सबस्क्रिप्शनबद्दल धन्यवाद!', 'success');
                form.reset();
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }, 1500);
        } else {
            this.showNotification('Please enter a valid email address', 'error');
        }
    },

    handleContactFormSubmission(form) {
        const formData = new FormData(form);
        
        // Validate form
        if (this.validateContactForm(formData)) {
            // Show loading state
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Sending...';
            submitButton.disabled = true;

            // Simulate API call
            setTimeout(() => {
                this.showNotification('Your message has been sent successfully!', 'success');
                form.reset();
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }, 2000);
        }
    },

    handleSearchFormSubmission(form) {
        const query = form.querySelector('input[name="query"]').value.trim();
        
        if (query.length >= 3) {
            // Redirect to search results or handle search
            window.location.href = `search.php?q=${encodeURIComponent(query)}`;
        } else {
            this.showNotification('Please enter at least 3 characters to search', 'warning');
        }
    },

    // Form Validation
    validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    },

    validateContactForm(formData) {
        const name = formData.get('name');
        const email = formData.get('email');
        const message = formData.get('message');

        if (!name || name.trim().length < 2) {
            this.showNotification('Please enter a valid name', 'error');
            return false;
        }

        if (!this.validateEmail(email)) {
            this.showNotification('Please enter a valid email address', 'error');
            return false;
        }

        if (!message || message.trim().length < 10) {
            this.showNotification('Please enter a message with at least 10 characters', 'error');
            return false;
        }

        return true;
    },

    // Notification System
    showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => notification.remove());

        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification fixed top-4 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 alert alert-${type}`;
        notification.textContent = message;

        // Add to DOM
        document.body.appendChild(notification);

        // Show notification
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Auto hide after 5 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => notification.remove(), 300);
        }, 5000);

        // Click to dismiss
        notification.addEventListener('click', () => {
            notification.classList.add('translate-x-full');
            setTimeout(() => notification.remove(), 300);
        });
    },

    // Loading States
    setupLoadingStates() {
        // Show loading spinner on page load
        this.showLoadingSpinner();

        // Handle loading states for AJAX requests
        this.setupAjaxLoadingStates();
    },

    showLoadingSpinner() {
        if (!document.querySelector('.loading-spinner')) {
            const spinner = document.createElement('div');
            spinner.className = 'loading-spinner';
            document.body.appendChild(spinner);
        }
    },

    hideLoadingSpinner() {
        const spinner = document.querySelector('.loading-spinner');
        if (spinner) {
            spinner.remove();
        }
    },

    setupAjaxLoadingStates() {
        // You can add AJAX loading state handlers here
        // For example, show spinner during fetch requests
    },

    // Scroll Effects
    setupScrollEffects() {
        // Back to top button
    //    this.createBackToTopButton();
        
        // Progress bar
        this.createProgressBar();
    },

    createBackToTopButton() {
        const backToTop = document.createElement('button');
        backToTop.innerHTML = '<i class="fas fa-arrow-down"></i>';
        backToTop.className = 'fixed bottom-4 right-4 w-12 h-12 bg-primary text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 z-40 hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-accent';
        backToTop.setAttribute('aria-label', 'Back to top');
        
        document.body.appendChild(backToTop);

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
            }
        });
    },

    createProgressBar() {
        const progressBar = document.createElement('div');
        progressBar.className = 'fixed top-0 left-0 h-1 bg-accent z-50 transition-all duration-150';
        progressBar.style.width = '0%';
        
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            
            progressBar.style.width = `${Math.min(scrollPercent, 100)}%`;
        });
    },

    // Utility Functions
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    },

    // Handle resize events
    handleResize() {
        // Close mobile menu on resize to desktop
        if (window.innerWidth >= 1024) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            if (mobileMenu && mobileMenuButton) {
                this.closeMobileMenu(mobileMenu, mobileMenuButton);
            }
        }
    },

    // Error Handling
    handleError(error, context = '') {
        console.error(`Trekshitz App Error ${context}:`, error);
        
        // In production, you might want to send errors to a logging service
        // this.logErrorToService(error, context);
    }
};

// Initialize the app when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    try {
        TrekshitzApp.init();
    } catch (error) {
        TrekshitzApp.handleError(error, 'during initialization');
    }
});

// Export for potential module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = TrekshitzApp;
}