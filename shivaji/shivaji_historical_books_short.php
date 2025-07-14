<?php
// Set page specific variables
$page_title = 'पुस्तके व साहित्य - शिवाजी महाराज | Historical Books & Literature | Trekshitz';
$meta_description = 'Complete collection of historical books, novels, and literature about Chhatrapati Shivaji Maharaj. Classical works, modern research, and biographical literature.';
$meta_keywords = 'Shivaji books, historical literature, Maratha literature, शिवाजी साहित्य, biographical works, research publications';

// Include header
include '../includes/header.php';
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-16 bg-gradient-to-r from-red-600 to-yellow-500 text-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">
                    <span class="font-devanagari">पुस्तके व</span> <span class="text-yellow-300">साहित्य</span>
                </h1>
                <p class="text-xl md:text-2xl mb-6 opacity-90">
                    Historical Books & Literature on Shivaji Maharaj
                </p>
                <p class="text-lg opacity-80 font-devanagari">
                    शिवरायांवरील ऐतिहासिक ग्रंथ आणि साहित्य संग्रह
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-4">
                    <div class="text-3xl font-bold text-red-600 mb-2 animate-number" data-target="200">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Books Published</div>
                </div>
                <div class="p-4">
                    <div class="text-3xl font-bold text-yellow-600 mb-2 animate-number" data-target="12">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Languages</div>
                </div>
                <div class="p-4">
                    <div class="text-3xl font-bold text-green-600 mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Years Literature</div>
                </div>
                <div class="p-4">
                    <div class="text-3xl font-bold text-purple-600 mb-2 animate-number" data-target="50">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Major Authors</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Classical Works (17th-18th Century) -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        क्लासिकल ग्रंथ (१७-१८ शतक)
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Contemporary and Early Historical Works</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- Shivbharat -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900 dark:to-red-900 rounded-2xl p-6 border">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">शिवभारत - परमानंद</h3>
                        <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">Sanskrit</span>
                    </div>
                    <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                        <div><i class="fas fa-calendar text-red-500 mr-2"></i>17th Century | Paramanand Newaskar</div>
                        <div><i class="fas fa-scroll text-red-500 mr-2"></i>Epic Poetry</div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        First comprehensive biography written during Shivaji's lifetime, providing authentic contemporary perspective.
                    </p>
                </div>

                <!-- Shivcharitra -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900 dark:to-emerald-900 rounded-2xl p-6 border">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">शिवचरित्र - सभासद</h3>
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Marathi</span>
                    </div>
                    <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                        <div><i class="fas fa-calendar text-red-500 mr-2"></i>1697 | Krishnaji Anant Sabhasad</div>
                        <div><i class="fas fa-book text-red-500 mr-2"></i>Historical Biography</div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Most reliable contemporary source, written by court chronicler who witnessed Shivaji's administration firsthand.
                    </p>
                </div>

                <!-- Shivbawani -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900 dark:to-indigo-900 rounded-2xl p-6 border">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">शिवबावनी - कवि भूषण</h3>
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm">Hindi</span>
                    </div>
                    <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                        <div><i class="fas fa-calendar text-red-500 mr-2"></i>17th Century | Kavi Bhushan</div>
                        <div><i class="fas fa-feather text-red-500 mr-2"></i>Heroic Poetry</div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Classical Hindi poetry celebrating Shivaji's valor, inspiring generations of freedom fighters.
                    </p>
                </div>

                <!-- Shivrajvilas -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 dark:from-purple-900 dark:to-violet-900 rounded-2xl p-6 border">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">शिवराजविलास - चितनीस</h3>
                        <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm">Marathi</span>
                    </div>
                    <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                        <div><i class="fas fa-calendar text-red-500 mr-2"></i>1695 | Balaji Avaji Chitnis</div>
                        <div><i class="fas fa-crown text-red-500 mr-2"></i>Court Chronicle</div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Detailed account of court life, administrative policies, and royal ceremonies by court official.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Literature & Research -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Modern Literature & Research
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    आधुनिक साहित्य आणि संशोधन
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- English Works -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border">
                    <h3 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-graduation-cap text-blue-500 mr-3"></i>
                        English Academic Works
                    </h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-bold">"Shivaji and His Times" - Jadunath Sarkar</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Scholarly historical analysis</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4">
                            <h4 class="font-bold">"The Life of Shivaji Maharaj" - K.A. Keluskar</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Comprehensive biography</p>
                        </div>
                        <div class="border-l-4 border-purple-500 pl-4">
                            <h4 class="font-bold">"Military System of the Marathas" - Surendra Nath Sen</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Military organization analysis</p>
                        </div>
                    </div>
                </div>

                <!-- Marathi Works -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border">
                    <h3 class="text-2xl font-bold mb-6 flex items-center font-devanagari">
                        <i class="fas fa-book-open text-red-500 mr-3"></i>
                        मराठी साहित्य
                    </h3>
                    <div class="space-y-4">
                        <div class="border-l-4 border-red-500 pl-4">
                            <h4 class="font-bold font-devanagari">"राजा शिवछत्रपती" - बाबासाहेब पुरंदरे</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Popular historical biography</p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-4">
                            <h4 class="font-bold font-devanagari">"श्रीमान योगी" - रियासतकार</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Classic historical novel</p>
                        </div>
                        <div class="border-l-4 border-indigo-500 pl-4">
                            <h4 class="font-bold font-devanagari">"शिवकालीन प्रशासन" - डॉ. वि. का. राजवाडे</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Administrative analysis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Folk Literature -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        लोकसाहित्य आणि मौखिक परंपरा
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Folk Literature & Oral Traditions</p>
            </div>

            <!-- Folk Literature Types -->
            <div class="grid md:grid-cols-4 gap-6 mb-12">
                <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-red-100 dark:from-orange-900 dark:to-red-900 rounded-xl">
                    <i class="fas fa-music text-orange-500 text-3xl mb-3"></i>
                    <h3 class="font-bold font-devanagari">पोवाडे</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Heroic ballads</p>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900 dark:to-emerald-900 rounded-xl">
                    <i class="fas fa-theater-masks text-green-500 text-3xl mb-3"></i>
                    <h3 class="font-bold font-devanagari">लावणी</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Folk songs</p>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900 dark:to-indigo-900 rounded-xl">
                    <i class="fas fa-scroll text-blue-500 text-3xl mb-3"></i>
                    <h3 class="font-bold font-devanagari">कथा</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Folk tales</p>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-violet-100 dark:from-purple-900 dark:to-violet-900 rounded-xl">
                    <i class="fas fa-quote-right text-purple-500 text-3xl mb-3"></i>
                    <h3 class="font-bold font-devanagari">म्हणी</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Proverbs</p>
                </div>
            </div>

            <!-- Famous Powadas -->
            <div class="bg-gradient-to-r from-orange-50 to-red-50 dark:from-orange-900 dark:to-red-900 rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-center mb-6 font-devanagari">प्रसिद्ध पोवाडे</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl">
                        <h4 class="font-bold font-devanagari mb-2">अफझल खानाचा पोवाडा</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Epic encounter at Pratapgad</p>
                        <div class="bg-gray-50 dark:bg-gray-700 p-2 rounded italic text-sm font-devanagari">
                            "गड आला पण सिंह गेला..."
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl">
                        <h4 class="font-bold font-devanagari mb-2">सिंहगडाचा पोवाडा</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Tanaji's heroic sacrifice</p>
                        <div class="bg-gray-50 dark:bg-gray-700 p-2 rounded italic text-sm font-devanagari">
                            "मी गेलो गड झाला..."
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Digital Resources -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Digital Resources & Archives
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    डिजिटल साधने आणि अभिलेखागार
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border text-center">
                    <i class="fas fa-laptop text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-3">E-Books & Publications</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Digital manuscripts and online publications</p>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border text-center">
                    <i class="fas fa-database text-green-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-3 font-devanagari">डिजिटल अभिलेखागार</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Historical documents and collections</p>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border text-center">
                    <i class="fas fa-podcast text-purple-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-3">Audio & Video</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Documentaries and multimedia content</p>
                </div>
            </div>

            <!-- Access Statistics -->
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <div class="text-center p-4 bg-white dark:bg-gray-900 rounded-lg">
                    <div class="text-2xl font-bold text-blue-600 mb-1 counter" data-target="5000">0</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Digital Books</div>
                </div>
                <div class="text-center p-4 bg-white dark:bg-gray-900 rounded-lg">
                    <div class="text-2xl font-bold text-green-600 mb-1 counter" data-target="1200">0</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Research Papers</div>
                </div>
                <div class="text-center p-4 bg-white dark:bg-gray-900 rounded-lg">
                    <div class="text-2xl font-bold text-purple-600 mb-1 counter" data-target="800">0</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Manuscripts</div>
                </div>
                <div class="text-center p-4 bg-white dark:bg-gray-900 rounded-lg">
                    <div class="text-2xl font-bold text-orange-600 mb-1 counter" data-target="50">0</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Languages</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Topics -->
    <section class="py-16 bg-gradient-to-r from-red-600 to-yellow-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6 font-devanagari">इतर संबंधित विषय</h2>
            <p class="text-xl mb-8 opacity-90">Explore more aspects of Chhatrapati Shivaji Maharaj's legacy</p>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <a href="/shivaji/battles" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-sword mr-2"></i>Battles
                </a>
                <a href="/shivaji/songs-poetry" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-music mr-2"></i>Songs & Poetry
                </a>
                <a href="/shivaji/shivbawani-part-1" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-scroll mr-2"></i>Shivbawani
                </a>
                <a href="/shivaji/unknown-facts" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-question-circle mr-2"></i>Unknown Facts
                </a>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Number animation
    function animateNumber(element, target) {
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 50);
    }
    
    // Animate numbers on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.target);
                animateNumber(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.animate-number, .counter').forEach(el => {
        observer.observe(el);
    });
    
    // Card animations
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                cardObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.bg-gradient-to-br, .bg-white').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        cardObserver.observe(card);
    });
    
    // Enhanced hover effects
    document.querySelectorAll('.bg-white.dark\\:bg-gray-900').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    console.log('Optimized Shivaji Books page loaded');
});
</script>

<style>
.bg-clip-text {
    background-clip: text;
    -webkit-background-clip: text;
}

.text-transparent {
    color: transparent;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.transition-colors {
    transition-property: color, background-color, border-color;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}

.hover\:bg-opacity-30:hover {
    background-color: rgba(255, 255, 255, 0.3);
}
</style>