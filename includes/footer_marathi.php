<!-- Footer Component for Trekshitz Website -->
<!-- Complete Footer with all functionality from index.php -->
<footer class="bg-gray-900 text-white pt-16 pb-8 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"mountain\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"10,5 15,15 5,15\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23mountain)\"/></svg>');"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Main Footer Content -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            
            <!-- Company Info Section -->
            <div class="lg:col-span-2">
                <!-- Logo and Tagline -->
                <div class="flex items-center mb-6">
                    <i class="fas fa-mountain text-4xl text-accent mr-4"></i>
                    <div>
                        <h3 class="text-3xl font-bold">Trekshitz</h3>
                     <!--   <p class="text-lg text-gray-400 font-devanagari">ट्रेकशित्ज़ संस्था</p>-->
                        <p class="text-sm text-accent">अन्वेषण • शोध • साहस</p>
                    </div>
                </div>
                
                <!-- Description -->
                <p class="text-gray-300 mb-6 max-w-md leading-relaxed">
            सह्याद्री पर्वतरांगांमधील अप्रतिम निसर्गात ट्रेकिंगचा आनंद घ्या.
    आमच्यासोबत ३५० हून अधिक किल्ल्यांची सविस्तर माहिती जाणून घ्या
    आणि निसर्गाच्या सान्निध्यात साहसी अनुभव घ्या.
    उत्साही ट्रेकर्सच्या समुदायात सामील व्हा आणि पश्चिम घाटाचे सौंदर्य अनुभवा.
</p>
                
                <!-- Newsletter Signup -->
                <!--<div class="mb-6">
                    <h4 class="text-lg font-semibold mb-3 text-accent">Stay Updated</h4>
                    <div class="flex max-w-sm footer-newsletter">
                        <input type="email" placeholder="Your email address" class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-l-lg text-white focus:outline-none focus:border-accent transition-colors footer-email-input">
                        <button class="bg-accent hover:bg-primary px-6 py-2 rounded-r-lg font-semibold transition-colors footer-subscribe-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Get updates about upcoming treks and events</p>
                </div>-->
                
                <!-- Social Media Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-3 text-accent">आम्हाला फॉलो करा</h4>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/groups/trekshitiz/" target="_blank" class="group social-link">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center group-hover:bg-blue-700 transition-all duration-300 transform group-hover:scale-110">
                                <i class="fab fa-facebook-f text-lg"></i>
                            </div>
                        </a>
                        <a href="https://www.instagram.com/trekshitiz_ts/" target="_blank" class="group social-link">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center group-hover:from-purple-700 group-hover:to-pink-700 transition-all duration-300 transform group-hover:scale-110">
                                <i class="fab fa-instagram text-lg"></i>
                            </div>
                        </a>
                        <a href="https://www.youtube.com/channel/UCfcgOwwtNbKxZZEGZG8ndgg" target="_blank" class="group social-link">
                            <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center group-hover:bg-red-700 transition-all duration-300 transform group-hover:scale-110">
                                <i class="fab fa-youtube text-lg"></i>
                            </div>
                        </a>
                        <a href="#" class="group social-link">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center group-hover:bg-green-700 transition-all duration-300 transform group-hover:scale-110">
                                <i class="fab fa-whatsapp text-lg"></i>
                            </div>
                        </a>
                        <a href="#" class="group social-link">
                            <div class="w-12 h-12 bg-blue-400 rounded-full flex items-center justify-center group-hover:bg-blue-500 transition-all duration-300 transform group-hover:scale-110">
                                <i class="fab fa-twitter text-lg"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links Section -->
            <div>
                <h4 class="text-xl font-semibold mb-6 text-accent border-b border-gray-700 pb-2">
                    <i class="fas fa-link mr-2"></i>जलद दुवे
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="<?= BASE_URL ?>marathi/index.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-home mr-2 group-hover:translate-x-1 transition-transform"></i>
                            मुख्यपृष्ठ
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/trek_schedule.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-hiking mr-2 group-hover:translate-x-1 transition-transform"></i>
                            आगामी ट्रेक्स
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/fort_information.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-fort-awesome mr-2 group-hover:translate-x-1 transition-transform"></i>
                            किल्ला माहिती
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/gallery/fort-gallery.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-images mr-2 group-hover:translate-x-1 transition-transform"></i>
                            छायाचित्र संग्रह
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/project-sudhagad-main.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-comments mr-2 group-hover:translate-x-1 transition-transform"></i>
                            सुधागड प्रकल्प
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/trek-gear.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-tools mr-2 group-hover:translate-x-1 transition-transform"></i>
                           ट्रेकिंग साहित्य
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Resources Section -->
            <div>
                <h4 class="text-xl font-semibold mb-6 text-accent border-b border-gray-700 pb-2">
                    <i class="fas fa-book mr-2"></i>संसाधने
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="<?= BASE_URL ?>>marathi/gallery/map-gallery.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-map mr-2 group-hover:translate-x-1 transition-transform"></i>
                            नकाशे
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/articles.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-newspaper mr-2 group-hover:translate-x-1 transition-transform"></i>
                            लेख
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/emagazine.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-newspaper mr-2 group-hover:translate-x-1 transition-transform"></i>
                           ई-मासिक
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-phone-alt mr-2 group-hover:translate-x-1 transition-transform"></i>
                            मदत केंद्र
                        </a>
                    </li>
                   <!-- <li>
                        <a href="<?= BASE_URL ?>" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-mountain mr-2 group-hover:translate-x-1 transition-transform"></i>
                            रॉक क्लायम्बिंग
                        </a>
                    </li>-->
                    <li>
                        <a href="<?= BASE_URL ?>marathi/gallery/sketches-gallery.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-palette mr-2 group-hover:translate-x-1 transition-transform"></i>
                            रेखाचित्रे
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>marathi/shivaji_maharaja.php" class="text-gray-300 hover:text-accent transition-colors duration-300 flex items-center group footer-link">
                            <i class="fas fa-crown mr-2 group-hover:translate-x-1 transition-transform"></i>
                            छत्रपती शिवाजी महाराज
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Contact Info Bar -->
        <div class="border-t border-gray-700 pt-8 mb-8">
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Location -->
                <div class="text-center md:text-left group">
                    <div class="flex items-center justify-center md:justify-start mb-2">
                        <div class="w-12 h-12 bg-accent/20 rounded-full flex items-center justify-center mr-4 group-hover:bg-accent/30 transition-colors">
                            <i class="fas fa-map-marker-alt text-accent text-xl"></i>
                        </div>
                        <div>
                        <p class="text-sm text-gray-400 uppercase tracking-wide">स्थान</p>
                        <p class="text-white font-semibold">डोंबिवली</p>
                        <p class="text-xs text-gray-400">महाराष्ट्र, भारत</p>

                        </div>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="text-center md:text-left group">
                    <div class="flex items-center justify-center md:justify-start mb-2">
                        <div class="w-12 h-12 bg-accent/20 rounded-full flex items-center justify-center mr-4 group-hover:bg-accent/30 transition-colors">
                            <i class="fas fa-envelope text-accent text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400 uppercase tracking-wide">ई-मेल</p>
                            <a href="mailto:info@trekshitz.com" class="text-white font-semibold hover:text-accent transition-colors">
                                info@trekshitz.com
                            </a>
                            <p class="text-xs text-gray-400">२४x७ सेवा उपलब्ध</p>
                        </div>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="text-center md:text-left group">
                    <div class="flex items-center justify-center md:justify-start mb-2">
                        <div class="w-12 h-12 bg-accent/20 rounded-full flex items-center justify-center mr-4 group-hover:bg-accent/30 transition-colors">
                            <i class="fas fa-phone text-accent text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400 uppercase tracking-wide">संपर्क</p>
                            <a href="tel:+919876543210" class="text-white font-semibold hover:text-accent transition-colors">
                                +91 98765 43210
                            </a>
                            <p class="text-xs text-gray-400">सोम-रवि सकाळी ८ ते रात्री ८</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Section -->
        <div class="border-t border-gray-700 pt-8 mb-8">
            <div class="grid grid-cols-3 md:grid-cols-3 gap-6 text-center">
                <div class="group">
                    <div class="text-3xl font-bold text-accent mb-2 group-hover:scale-110 transition-transform footer-stat" data-target="350">0</div>
                    <div class="text-gray-400 text-sm">किल्ले</div>
                    <div class="text-xs text-gray-500">नोंदवलेले किल्ले</div>
                </div>
                <div class="group">
                    <div class="text-3xl font-bold text-accent mb-2 group-hover:scale-110 transition-transform footer-stat" data-target="30">0</div>
                    <div class="text-gray-400 text-sm">वार्षिक ट्रेक्स</div>
                    <div class="text-xs text-gray-500">नियमित साहसी उपक्रम</div>
                </div>
                <div class="group">
                    <div class="text-3xl font-bold text-accent mb-2 group-hover:scale-110 transition-transform footer-stat" data-target="25">0</div>
                    <div class="text-gray-400 text-sm">वर्षांचा अनुभव</div>
                    <div class="text-xs text-gray-500">२००० पासून</div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Footer -->
        <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                
                <!-- Copyright and Credits -->
                <div class="text-center lg:text-left">
                    <p class="text-gray-400 mb-2">
                        &copy; 2025 <span class="text-accent font-semibold">Trekshitz.com</span>. सर्व हक्क राखीव.
                    </p>

                </div>
                
                <!-- Language Switcher -->
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400 text-sm">Language:</span>
                                    <div class="flex space-x-2">
                                        <a href="<?= BASE_URL ?>index.php"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded">
                                            EN
                                        </a>

                                        <a href="<?= BASE_URL ?>marathi/index.php"
                                        class="px-3 py-1 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                                            मराठी
                                        </a>
                                    </div>
                </div>
                
                <!-- Footer Navigation Links -->
                <div class="flex flex-wrap justify-center lg:justify-end space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors duration-300 hover:underline footer-link">
                        गोपनीयता धोरण
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors duration-300 hover:underline footer-link">
                        सेवा अटी
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors duration-300 hover:underline footer-link">
                        कुकी धोरण
                    </a>
                    <a href="#contact" class="text-gray-400 hover:text-accent transition-colors duration-300 hover:underline footer-link">
                        संपर्क करा
                    </a>
                </div>
            </div>
            
          
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="back-to-top" class="back-to-top fixed bottom-8 right-8 w-12 h-12 bg-accent hover:bg-primary text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 transform hover:scale-110 z-50" aria-label="Back to top">
    <i class="fas fa-chevron-up"></i>
</button>

<!-- Footer-specific CSS -->
<!-- Footer-specific CSS -->
<style>
/* Custom scrollbar for webkit browsers - UPDATED COLORS */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #1f2937;
}

::-webkit-scrollbar-thumb {
    background: #F4A460;  /* Updated to Sandy Brown (was #7fb069) */
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #D2691E;  /* Updated to Chocolate Orange (was #4a7c23) */
}

/* Smooth animations */
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: .5;
    }
}

/* Social media hover effects */
.social-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

/* Back to top button visibility */
.back-to-top-visible {
    opacity: 1 !important;
    visibility: visible !important;
}

/* Footer link hover effects */
.footer-link:hover i {
    transform: translateX(4px);
}

/* Newsletter form styling */
.footer-newsletter {
    border-radius: 0.5rem;
    overflow: hidden;
}

/* Newsletter focus effect - UPDATED COLOR */
.footer-email-input:focus {
    box-shadow: 0 0 0 3px rgba(244, 164, 96, 0.3);  /* Updated to Sandy Brown (was rgba(127, 176, 105, 0.3)) */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-newsletter {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .footer-email-input {
        border-radius: 0.5rem;
    }
    
    .footer-subscribe-btn {
        border-radius: 0.5rem;
    }
}

/* Enhanced footer animations */
.footer-stat {
    transition: transform 0.3s ease;
}

.footer-stat:hover {
    transform: scale(1.1);
}

/* Language button active state - UPDATED COLORS */
.footer-lang-btn.active {
    background-color: #F4A460 !important;  /* Sandy Brown (was green) */
    color: white !important;
}

.footer-lang-btn:hover {
    background-color: #D2691E !important;  /* Chocolate Orange (was green) */
    color: white !important;
}
</style>

<!-- Footer-specific JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Newsletter subscription in footer
    const footerEmailInput = document.querySelector('.footer-email-input');
    const footerSubscribeBtn = document.querySelector('.footer-subscribe-btn');
    
    if (footerEmailInput && footerSubscribeBtn) {
        footerSubscribeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            handleFooterNewsletter();
        });
        
        footerEmailInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                handleFooterNewsletter();
            }
        });
    }
    
    function handleFooterNewsletter() {
        const email = footerEmailInput.value.trim();
        
        if (!email) {
            showFooterMessage('कृपया ईमेल पत्ता प्रविष्ट करा / Please enter email address', 'error');
            return;
        }
        
        if (!isValidEmail(email)) {
            showFooterMessage('कृपया वैध ईमेल पत्ता प्रविष्ट करा / Please enter valid email address', 'error');
            return;
        }
        
        // Show loading state
        const originalHTML = footerSubscribeBtn.innerHTML;
        footerSubscribeBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        footerSubscribeBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            showFooterMessage('धन्यवाद! आपण यशस्वीरित्या सबस्क्राइब केले आहे / Thank you! Successfully subscribed!', 'success');
            footerEmailInput.value = '';
            footerSubscribeBtn.innerHTML = originalHTML;
            footerSubscribeBtn.disabled = false;
        }, 2000);
    }
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    function showFooterMessage(message, type) {
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.footer-message');
        existingMessages.forEach(msg => msg.remove());
        
        // Create message element
        const messageEl = document.createElement('div');
        messageEl.className = `footer-message fixed top-20 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-x-full`;
        
        // Set type-specific styling
        switch (type) {
            case 'success':
                messageEl.classList.add('bg-green-500', 'text-white');
                messageEl.innerHTML = `<i class="fas fa-check-circle mr-2"></i>${message}`;
                break;
            case 'error':
                messageEl.classList.add('bg-red-500', 'text-white');
                messageEl.innerHTML = `<i class="fas fa-exclamation-circle mr-2"></i>${message}`;
                break;
            default:
                messageEl.classList.add('bg-blue-500', 'text-white');
                messageEl.innerHTML = `<i class="fas fa-info-circle mr-2"></i>${message}`;
        }
        
        document.body.appendChild(messageEl);
        
        // Show message
        setTimeout(() => {
            messageEl.classList.remove('translate-x-full');
        }, 100);
        
        // Hide message after 5 seconds
        setTimeout(() => {
            messageEl.classList.add('translate-x-full');
            setTimeout(() => {
                if (messageEl.parentNode) {
                    messageEl.parentNode.removeChild(messageEl);
                }
            }, 300);
        }, 5000);
    }
    
    // Back to top button functionality
    const backToTopButton = document.getElementById('back-to-top');
    
    if (backToTopButton) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('back-to-top-visible');
            } else {
                backToTopButton.classList.remove('back-to-top-visible');
            }
        });
        
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Smooth scrolling for footer links
    document.querySelectorAll('footer a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            
            // Check if href is just '#' or empty
            if (!targetId || targetId === '#' || targetId.length <= 1) {
                e.preventDefault();
                return;
            }
            
            try {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const headerHeight = 80; // Account for fixed header
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            } catch (error) {
                console.warn('Invalid selector in footer:', targetId);
                e.preventDefault();
            }
        });
    });
    
    // Language switcher functionality in footer
    const footerLanguageButtons = document.querySelectorAll('.footer-lang-btn');
    footerLanguageButtons.forEach(button => {
        button.addEventListener('click', function() {
            const language = this.getAttribute('data-language');
            
            // Remove active class from all footer language buttons
            footerLanguageButtons.forEach(btn => {
                btn.classList.remove('bg-accent', 'text-white');
                btn.classList.add('text-gray-400', 'hover:text-white', 'hover:bg-gray-700');
            });
            
            // Add active class to clicked button
            this.classList.add('bg-accent', 'text-white');
            this.classList.remove('text-gray-400', 'hover:text-white', 'hover:bg-gray-700');
            
            // Also update header language buttons if they exist
            const headerLanguageButtons = document.querySelectorAll('[data-language]');
            headerLanguageButtons.forEach(btn => {
                if (btn.getAttribute('data-language') === language) {
                    btn.classList.add('bg-primary', 'text-white');
                    btn.classList.remove('text-gray-400', 'hover:text-white', 'hover:bg-gray-700');
                } else {
                    btn.classList.remove('bg-primary', 'text-white');
                    btn.classList.add('text-gray-400', 'hover:text-white', 'hover:bg-gray-700');
                }
            });
            
            // Save language preference
            localStorage.setItem('language', language);
            
            // Trigger language change event
            window.dispatchEvent(new CustomEvent('languageChanged', { detail: { language } }));
            
            console.log('Language switched to:', language);
        });
    });
    
    // Set initial language state for footer
    const savedLanguage = localStorage.getItem('language') || 'en';
    const activeFooterLangButton = document.querySelector(`.footer-lang-btn[data-language="${savedLanguage}"]`);
    if (activeFooterLangButton) {
        activeFooterLangButton.classList.add('bg-accent', 'text-white');
        activeFooterLangButton.classList.remove('text-gray-400', 'hover:text-white', 'hover:bg-gray-700');
    }
    
    // Animate stats on scroll
    const footerStatsElements = document.querySelectorAll('.footer-stat');
    const footerStatsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateFooterNumber(entry.target);
                footerStatsObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    });
    
    footerStatsElements.forEach(element => {
        footerStatsObserver.observe(element);
    });
    
    // Number animation function for footer stats
    function animateFooterNumber(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const text = element.textContent;
        const suffix = text.replace(/[0-9]/g, '');
        
        if (isNaN(target)) return;
        
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + (suffix || '');
        }, 30);
    }
    
    // Add hover effects to social media links
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Loading animation for external links
    const externalLinks = document.querySelectorAll('footer a[target="_blank"]');
    externalLinks.forEach(link => {
        link.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon && !icon.classList.contains('fa-spinner')) {
                const originalClass = icon.className;
                icon.className = 'fas fa-spinner fa-spin';
                setTimeout(() => {
                    icon.className = originalClass;
                }, 1000);
            }
        });
    });
    
    // Add loading state to footer subscribe button
    if (footerSubscribeBtn) {
        footerSubscribeBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        footerSubscribeBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    }
    
    // Handle form submission properly
    const footerNewsletterForm = document.querySelector('.footer-newsletter');
    if (footerNewsletterForm) {
        footerNewsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            handleFooterNewsletter();
        });
    }
});

// Initialize footer functionality when main.js is loaded
window.addEventListener('load', function() {
    // Additional initialization if needed
    console.log('Footer loaded and initialized');
});
</script>

<!-- Structured Data for SEO -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Trekshitz",
  "alternateName": "ट्रेकशित्ज़ संस्था",
  "availableLanguage": ["Marathi", "English"],
  "url": "https://www.trekshitz.com",
  "logo": "https://www.trekshitz.com/assets/images/logo.png",
  "description": "सह्याद्री पर्वतरांगांमधील किल्ले, ट्रेकिंग आणि निसर्ग अनुभवण्यासाठी Trekshitz सोबत जुडा.",
  "sameAs": [
    "https://www.facebook.com/groups/trekshitiz/",
    "https://www.instagram.com/trekshitiz_ts/",
    "https://www.youtube.com/channel/UCfcgOwwtNbKxZZEGZG8ndgg"
  ],
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91-98765-43210",
    "contactType": "customer service",
    "availableLanguage": ["English", "Marathi"],
    "areaServed": "IN",
    "availableChannel": {
      "@type": "ServiceChannel",
      "serviceUrl": "https://www.trekshitz.com/contact",
      "serviceType": "customer service"
    }
  },
  "address": {
    "@type": "PostalAddress",
    "addressRegion": "Maharashtra",
    "addressCountry": "IN",
    "description": "Western Ghats Region"
  },
  "founder": {
    "@type": "Organization",
    "name": "Trekshitz Sanstha"
  },
  "foundingDate": "2010",
  "numberOfEmployees": "15+",
  "areaServed": {
    "@type": "Place",
    "name": "Sahyadri Mountains, Western Ghats, Maharashtra, India"
  },
  "knowsAbout": [
    "Trekking",
    "Fort History",
    "Sahyadri Mountains",
    "Adventure Tourism",
    "Nature Photography",
    "Rock Climbing"
  ],
  "offers": {
    "@type": "Service",
    "name": "Trekking and Adventure Services",
    "description": "Guided treks, fort exploration, nature photography, and adventure activities in the Sahyadri mountains"
  }
}
</script>