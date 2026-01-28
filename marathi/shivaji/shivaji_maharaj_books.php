<?php
// Set page specific variables
$page_title = 'Books & Literature on Shivaji Maharaj | Historical Books & Literature | Trekshitz';
$meta_description = 'A complete collection of historical books, novels, and literature on Chhatrapati Shivaji Maharaj, including classical works, modern research, and biographical publications.';
$meta_keywords = 'Shivaji Maharaj books, historical literature, Maratha history books, Shivaji biography, Maratha literature, research publications';

$books_marathi = [
    ["title" => "राजा शिवछत्रपती", "author" => "बाळाजी देशपांडे"],
    ["title" => "दोन्ही शिवमहात्म्याचा", "author" => "श्रीधर सावरकर"],
    ["title" => "आज्ञापत्र", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "शिवशाहीचा शोध", "author" => "वसंत कानेटकर"],
    ["title" => "श्री शिवछत्रपती आणि त्यांचा प्रभाव", "author" => "सेतू माधवराव पगडे"],
    ["title" => "आग्रा", "author" => "वा. स. इन्नामदार"],
    ["title" => "महासम्राट", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "मराठ्यांचा युद्धइतिहास", "author" => "ब्रिगेडियर एफ. जी. पिट्रे"],
    ["title" => "पावनखिंड", "author" => "रणजित देसाई"],
    ["title" => "गड आला पण सिंह गेला", "author" => "हरिनारायण आपटे"],
    ["title" => "पन्हाळगड", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "रायगड", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "राजगड", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "सिंहगड", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "प्रतापगड", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "चाकण", "author" => "बाबासाहेब पुरंदरे"],
    ["title" => "पुरंदरची लढाई", "author" => "कर्नल भा. शं. परांजपे"],
    ["title" => "प्रतापगडचे युद्ध", "author" => "ग. वा. मोडक"],
    ["title" => "किल्ले पुरंदर", "author" => "कृ. बा. पुरंदरे"],
    ["title" => "मुरुड-जंजिरा", "author" => "अ. रा. पाटील"],
    ["title" => "जंजिरा संस्थानाचा इतिहास", "author" => "बा. कं. भोसले"],
    ["title" => "कान्होजी आंग्रे", "author" => "सौ. शिला सरस्वडे"],
    ["title" => "पत्रसंग्रह", "author" => "संपादक: सुनील चिचोळेकर"],
    ["title"=>"छत्रपती भाग १ ते ४","author"=>"मनमोहन"],
    ["title"=>"छत्रपतींच्या छायेत","author"=>"वा. पु. डांगरे"],
    ["title"=>"छत्रपतींचे नेतृत्व","author"=>"म. वि. गोगटे"],
    ["title"=>"छत्रपती आणि त्यांचा प्रभाव","author"=>"सेतुमाधवराव"],
    ["title"=>"छत्रपतींना सवाल","author"=>"वि. वि. हडप"],
    ["title"=>"छत्रपती शिवराय","author"=>"यशवंत पेंढारकर"],
    ["title"=>"छत्रपती शिवाजी","author"=>"भाकर माचवे"],
    ["title"=>"छत्रपती शिवाजी","author"=>"हर्दास बाळशास्त्री"],
    ["title"=>"छत्रपती शिवाजी आणि समर्थ रामदास","author"=>"भट वा. वा."],
    ["title"=>"छत्रपती शिवाजी महाराज","author"=>"रा. रा. भागवत"],
    ["title"=>"छत्रपती शिवाजी महाराज","author"=>"दि. वि. काळे"],
    ["title"=>"छत्रपती शिवाजी महाराज","author"=>"घोसाळबुद्धे"],
    ["title"=>"छत्रपती शिवाजी महाराज","author"=>"केळुसकर"],
    ["title"=>"छत्रपती शिवाजी महाराज – जीवन रहस्य","author"=>"नहार कुंडकर"],
    ["title"=>"छत्रपती शिवाजी महाराज किल्ले","author"=>"महाराष्ट्र शासन"],
    ["title"=>"छत्रपती शिवाजी राजे","author"=>"शं. ना. जोशी"],
    ["title"=>"राजा शिवाजी","author"=>"महादेव कुंटे"],
    ["title"=>"राज्यारोहण","author"=>"ग. ओ. आगाशे"],
    ["title"=>"राज्यारोहणोत्सव","author"=>"ना. अ. चिटणीस"],
    ["title"=>"राजा शिवछत्रपती","author"=>"बाबासाहेब पुरंदरे"],
    ["title"=>"राजा शिवछत्रपती","author"=>"कमलाकर नाडकर्णी"],
    ["title"=>"राजा शिवाजी","author"=>"गो. रा. सरदेसाई"],
    ["title"=>"राजा शिवाजी","author"=>"डॉ. मो. कुंटे"],
    ["title"=>"राजा शिवाजी","author"=>"कुमुद ओगले"],
    ["title"=>"राजा संभाजी छत्रपती","author"=>"विजय देशमुख"],
    ["title"=>"आग्र्याहून सुटका","author"=>"ना. रा. इनामदार"],
    ["title"=>"रामदास आणि शिवाजी","author"=>"हरी. पं. बोकिल"],
    ["title"=>"शिवकल्याण राजा","author"=>"बाळ सामंत"],
    ["title"=>"शिवकालातील स्त्रीजीवन","author"=>"देशमुख"],
    ["title"=>"शिवकालीन कागदपत्रे","author"=>"हरी. जी. खोब्रागडे"],
    ["title"=>"शिवकालीन तटबंदी","author"=>"धो. मु. देशपांडे"],
    ["title"=>"शिवकालीन महाराष्ट्र","author"=>"वा. कृ. भावे"],
    ["title"=>"शिवकालीन पत्रे","author"=>"सार संग्रह संदर्भ"],
    ["title"=>"शिवकालीन काव्य","author"=>"वा. भा. भावे"],
    ["title"=>"शिवकालीन महाराष्ट्र","author"=>"अ. रा. कुलकर्णी"],
    ["title"=>"शिवचरित्र","author"=>"सेतुमाधवराव"],
    ["title"=>"शिवचरित्र कथनमाला","author"=>"ग. शं. खोले"],
    ["title"=>"शिवचरित्र कथनमाला","author"=>"बाबासाहेब पुरंदरे"],
    ["title"=>"शिवचरित्र","author"=>"ग. ह. खरे"],
    ["title"=>"शिवचरित्र – प्रदीप दिवेकर","author"=>"आपटे"],
    ["title"=>"शिवचरित्र","author"=>"निबंधावली"],
    ["title"=>"शिवचरित्र – दस्तऐवज संग्रह","author"=>"पां. भि. देशाई"],
    ["title"=>"शिवचरित्र – साहित्य","author"=>"शं. ना. जोशी"],
    ["title"=>"शिवचरित्र – साहित्य","author"=>"कृ. वा. पुरंदरे"],
    ["title"=>"शिवचरित्राचे पैलू","author"=>"द. वा. पोतदार"],
    ["title"=>"शिवचिंतन सुधारक","author"=>"भोगलेदार"],
   ["title"=>"शिवछत्रपती","author"=>"प. रा. खांडेकर"],
    ["title"=>"शिवछत्रपती","author"=>"वा. पु. साठे"],
    ["title"=>"शिवछत्रपती","author"=>"भा. रा. केळकर"],
    ["title"=>"शिवछत्रपती","author"=>"रा. का. सभासद"],
    ["title"=>"शिवछत्रपती इतिहास आणि चरित्र","author"=>"य. दि. फडके"],
    ["title"=>"शिवछत्रपतींचे १०९ कलमी बखर","author"=>"रा. ना. देशपांडे"],
    ["title"=>"शिवछत्रपतींचे ९१ कलमी बखर","author"=>"वि. रा. वाकसकर"],
    ["title"=>"शिवछत्रपतींचे चरित्र","author"=>"रा. का. सभासद"],
    ["title"=>"शिवछत्रपती","author"=>"म. रा. केळकर"],
    ["title"=>"शिवछत्रपती चरित्र","author"=>"का. ना. साने"],
    ["title"=>"शिवछत्रपती महाराज","author"=>"—"],
    ["title"=>"शिवछत्रपतींच्या आयाम","author"=>"बा. का. पाटवर्धन"],
    ["title"=>"शिवछत्रपती राज्याभिषेक","author"=>"कृष्णा माटे"],
    ["title"=>"शिवछत्रपती विजय","author"=>"अ. म. जोशी"],
    ["title"=>"शिवजन्मोत्सव","author"=>"—"],
    ["title"=>"शिवजयंती महोत्सव","author"=>"—"],
    ["title"=>"शिवकल्याण राजा","author"=>"भास्कर मराठे"],
    ["title"=>"शिव दिव्यविजय","author"=>"रा. चि. ठोरे"],
    ["title"=>"शिवनेर्याची नांदी","author"=>"यशवंतराव चव्हाण"],
    ["title"=>"शिवस्मारक","author"=>"वि. ना. वाड"],
    ["title"=>"शिवनाभारती नाटक","author"=>"श्री. का. कोल्हटकर"],
    ["title"=>"शिवरायांचे शिलेदार","author"=>"गो. नि. दांडगेकर"],
    ["title"=>"शिवराज्याभिषेक काव्य","author"=>"श्री. गो. प्रभु"],
    ["title"=>"शिवयोगी शिवशाही","author"=>"गं. शं. खोले"],
    ["title"=>"शिवराज्यसंपदा","author"=>"गा. गा. भट"],
    ["title"=>"शिवराज्यभूषण","author"=>"दु. आ. तिवारी"],
    ["title"=>"शिवरायांचा आठवावा प्रताप","author"=>"तु. वि. जाधव"],
    ["title"=>"शिवरायांचा जयजयकार","author"=>"भास्कर राणे"],
    ["title"=>"शिवशाही","author"=>"म. य. देशमुख"],
    ["title"=>"शिवशाहीचा अर्थ","author"=>"वि. वा. हडप"],
    ["title"=>"शिवशाहीचा अंत","author"=>"—"],
    ["title"=>"शिवशाहीचा परिणाम","author"=>"—"],
    ["title"=>"शिवशाहीचा बोलणावळ","author"=>"आ. बा. जोशी-चांदोडकर"],
    ["title"=>"शिवशाहीचा शिरोमणी","author"=>"आबासाहेब आचरेकर"],
    ["title"=>"शिवशाहीचे शत्रू","author"=>"वि. वा. हडप"],
    ["title"=>"शिवशाहीचा शोध","author"=>"वसंत कानेटकर"],
    ["title"=>"शिवशाहीचा सुवर्णकाळ","author"=>"वि. वा. हडप"],
    ["title"=>"शिवशाही ते पेशवाई","author"=>"ग. रामसाने"],
    ["title"=>"शिवसंग्राम","author"=>"श्री. गो. प्रभु"],
    ["title"=>"शिवसंदेश","author"=>"मोरोपंत कर"],
    ["title"=>"शिवसंभव","author"=>"वा. वा. खरे"],
    ["title"=>"शिवगाथा नरनारी","author"=>"कदम"],
    ["title"=>"शिवनेरी","author"=>"बा. पुरंदरे"],
    ["title"=>"शिवनिष्ठा येसूबाई","author"=>"सौ. लता खेडकर"],
    ["title"=>"शिवसंकल्प","author"=>"नाथ माधव"],
    ["title"=>"शिवसमुदय","author"=>"वा. ए. कोल्हटकर"],
    ["title"=>"शिवाजी महाराज","author"=>"कानेटकर"],
    ["title"=>"शिवाजी संगीत","author"=>"वागले ह. प."],
    ["title"=>"शिवाजी (इंग्रजीत)","author"=>"जे. एल. मानकर"],
    ["title"=>"शिवाजी आणि चंद्रराव मोरे","author"=>"चि. वि. वैद्य"],
    ["title"=>"शिवाजी आणि शिवकाल","author"=>"विलास भोईर"],
    ["title"=>"शिवाजी आणि शिवयुग","author"=>"सदानंद आठवले"],
    ["title"=>"शिवाजी चरित्र","author"=>"श्यामकुमार लोह"],
    ["title"=>"शिवाजीचे योगदान","author"=>"ई. बी. अठावले"],
    ["title"=>"शिवाजी कोण","author"=>"शं. पां. जोशी"],
    ["title"=>"शिवाजी महाराज परंपरा","author"=>"गो. गो. देशाई"],
    ["title"=>"शिवाजी महाराजांची योग्यता","author"=>"ह. रा. भागवत"],
    ["title"=>"शिवाजी महाराजांचे चरित्र","author"=>"—"],
    ["title"=>"शिवाजी महाराजांची मावळे","author"=>"सौ. सुभद्रा"],
    ["title"=>"शिवाजी महाराजांचे कारकीर्द","author"=>"—"],
    ["title"=>"शिवाजी राजा वर्णन","author"=>"—"],
    ["title"=>"ओमकार राजा","author"=>"१८ पुरंदरे"],
    ["title"=>"श्रीमान योगी","author"=>"रणजित देसाई"],
    ["title"=>"श्री शिवछत्रपतीचे चरित्र","author"=>"दत्तात्रय भगवत"],
    ["title"=>"राजा शिवछत्रपती","author"=>"बाबासाहेब पुरंदरे"],
    ["title"=>"शिवछत्रपती इतिहास आणि चरित्र","author"=>"संपादक मंडळ"],
    ["title"=>"श्री राजा शिवछत्रपती (खंड १ व २)","author"=>"ग. भा. मेहेंदळे"],
    ["title"=>"शिवशाहीचा शोध","author"=>"वसंत कानेटकर"],
    ["title"=>"दोन्ही शिवमहात्म्याचा","author"=>"श्रीनिवास सावंत"],
    ["title"=>"महाराज","author"=>"बाबासाहेब पुरंदरे"]
];

// Include header
include './../includes/header.php';
?>

<style>
/* Custom styles for Shivaji Maharaj theme */
            .hero-slider {
                position: relative;
                height: 100vh;
                overflow: hidden;
            }

            .slide {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                transition: opacity 1s ease-in-out;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .slide.active {
                opacity: 1;
            }

            .slide::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(220, 38, 38, 0.8), rgba(255, 153, 51, 0.6));
                z-index: 1;
            }

            .slide-content {
                position: relative;
                z-index: 2;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                color: white;
            }

            .royal-card {
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 153, 51, 0.3);
                transition: all 0.3s ease;
            }

            .royal-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(220, 38, 38, 0.2);
                border-color: #ff9933;
            }

            .section-indicator {
                width: 60px;
                height: 4px;
                background: linear-gradient(90deg, #dc2626, #ff9933);
                margin: 0 auto 2rem;
            }

            .maratha-pattern {
                background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="maratha" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="2" fill="%23ff9933" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23maratha)"/></svg>');
            }

            .timeline-item {
                border-left: 3px solid #ff9933;
                position: relative;
            }

            .timeline-item::before {
                content: '';
                position: absolute;
                left: -8px;
                top: 1rem;
                width: 13px;
                height: 13px;
                border-radius: 50%;
                background: #dc2626;
                border: 3px solid #ff9933;
            }

            .saffron {
                color: #ff9933;
            }

            .maratha {
                color: #dc2626;
            }

            .bg-saffron {
                background-color: #ff9933;
            }

            .bg-maratha {
                background-color: #dc2626;
            }

            .text-saffron {
                color: #ff9933;
            }

            .text-maratha {
                color: #dc2626;
            }

            .hover\:text-saffron:hover {
                color: #ff9933;
            }

            .hover\:text-maratha:hover {
                color: #dc2626;
            }

            .hover\:bg-saffron:hover {
                background-color: #ff9933;
            }

            .hover\:bg-maratha:hover {
                background-color: #dc2626;
            }

            .from-maratha {
                --tw-gradient-from: #dc2626;
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(220, 38, 38, 0));
            }

            .to-saffron {
                --tw-gradient-to: #ff9933;
            }

            .from-saffron {
                --tw-gradient-from: #ff9933;
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(255, 153, 51, 0));
            }

            .to-maratha {
                --tw-gradient-to: #dc2626;
            }

            @media (max-width: 768px) {
                .hero-slider {
                    height: 70vh;
                }
            }
</style>
<main id="main-content" class="">
<section class="relative py-20 bg-gradient-to-br from-red-700 via-yellow-600 to-orange-500 text-white overflow-hidden">

    <!-- Floating Decorative Elements -->
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-5xl mx-auto">

            <!-- Title -->
            <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up mt-6">
           Books & Literature on Chhatrapati Shivaji Maharaj    </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl mb-4 opacity-95">
                Historical Books & Literature on Shivaji Maharaj
                </p>

            <!-- Tagline -->
            <p class="text-lg md:text-xl mb-8 opacity-85">
                Warfare and Strategic Battle Tactics
            </p>

            <!-- Key Highlights -->
            <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-fort-awesome mr-2"></i>
                    Classical Works
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-flag mr-2"></i>
                    Modern Research
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-calendar-alt mr-2"></i>
                   Biographical Literature
                </span>

             

            </div>

        </div>
    </div>
</section>


        
<div class="container mx-auto px-4 py-10">
    <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Books Of Chhatrapati Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
            List of Books
            </p>
    </div>

    <div class="overflow-x-auto royal-card rounded-xl">
        <table class="min-w-full border border-gray-200 dark:border-gray-700">
            <thead class="bg-gradient-to-r from-red-700 to-yellow-600 text-white">
                <tr>
      <th width="5%">No</th>
      <th width="45%" id="thTitle">Book Title</th>
      <th width="50%" id="thAuthor">Author</th>
    </tr>
            </thead>

            <tbody id="booksBody" class="bg-white dark:bg-gray-900">
                <!-- JS will inject rows here -->
            </tbody>
        </table>
    </div>

    <!-- Pagination Controls -->
    <div class="flex justify-between items-center mt-6">
        <button id="prevBtn"
            class="px-6 py-2 bg-gray-300 dark:bg-gray-700 rounded disabled:opacity-50">
            Previous
        </button>

        <span id="pageInfo" class="text-sm text-gray-600 dark:text-gray-300"></span>

        <button id="nextBtn"
            class="px-6 py-2 bg-red-600 text-white rounded hover:bg-yellow-600">
            Next
        </button>
    </div>

</div>


<!-- Information Cards Section -->
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Information about Chhatrapati Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Detailed insights into the life, administration, warfare, and legacy of the great Maratha ruler
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <!-- Battles -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-sword text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Battles of Shivaji Maharaj
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Detailed accounts of the major battles fought by Shivaji Maharaj, including strategies and outcomes.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Battles-of-Shivaji-Maharaj1.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Books -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-teal-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-book text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Books & Literature
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Historical books, novels, and literary works written on the life and achievements of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Historical-Books-Novels-on-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Economic Policy -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-yellow-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-coins text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Economic Policy
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Economic reforms, trade systems, taxation methods, and financial administration of the Maratha Empire.
                </p>
                <a href="https://trekshitiz.com/Shivaji/ECONOMIC-POLICY-OF-SHIVAJI-MAHARAJ.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Photos -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-camera text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Photographs & Paintings
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Historic photographs, portraits, paintings, and artistic depictions of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Shivaji-Maharaj-Photos.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Navy -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-ship text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Maratha Navy
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The powerful naval force established by Shivaji Maharaj to protect the western coastline.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Aarmar-Navey-of-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Spy Network -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-eye text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Intelligence & Spy Network
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The efficient intelligence system that played a vital role in military and administrative success.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Herkhate-Spy-Department-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Army -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Maratha Army
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Military organization, discipline, and the legendary structure of the Maratha army.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Lashkar-Army-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Justice -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-balance-scale text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Justice System
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Judicial system, legal reforms, and policies implemented during Shivaji Maharaj’s rule.
                </p>
                <a href="https://trekshitiz.com/Shivaji/NyayNiti-Policy-of-Justice-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Factories -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-industry text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Industries & Workshops
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Industrial activities, production centers, and trade establishments during the Maratha period.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Karkhane-Factories-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Palaces -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-600 to-pink-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-landmark text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Palaces & Residences
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Royal palaces, architectural marvels, and residential complexes of the Maratha Empire.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Mahal-Palaces-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Unknown Facts -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-violet-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-question-circle text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Lesser-known Facts
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Rare, lesser-known, and interesting facts about Chhatrapati Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Unknown-Information-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Songs -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-music text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Songs & Poetry
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Songs, poems, and musical tributes dedicated to the bravery and legacy of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Songs-of-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Shivbawani -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-amber-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-scroll text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Shivbawani – by Kavi Bhushan
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Classical poetry by Kavi Bhushan glorifying the valor and achievements of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Shivbawni-Kavi-Bhushan.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Shivbawani Part 2 -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-feather-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Shivbawani – Part II
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The second part of the famous Shivbawani poetry composed by the renowned poet Kavi Bhushan.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Shiv-bawani2-Kavi-Bhushan.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- Legacy Section -->
<section id="legacy" class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Eternal Legacy
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Timeless inspiration — ideals of Shivaji Maharaj that continue to live on
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Swarajya -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-flag text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Concept of Swarajya
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    The revolutionary idea of Swarajya (self-rule) introduced by Shivaji Maharaj later became the foundation of India’s freedom movement.
                </p>
            </div>

            <!-- Religious Tolerance -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-red-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-heart text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Religious Tolerance
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Principles of religious harmony and secular governance that ensured unity and respect among diverse communities within the empire.
                </p>
            </div>

            <!-- Welfare of People -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-users text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Welfare of the People
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Governance centered on public welfare — a ruler’s foremost duty — a philosophy that continues to inspire modern democratic values.
                </p>
            </div>

        </div>
    </div>
</section>



</main>

<?php include './../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hero Slider functionality
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-white', i === index);
            dot.classList.toggle('bg-white/50', i !== index);
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }
    
    // Auto slide every 5 seconds
    const slideInterval = setInterval(nextSlide, 5000);
    
    // Pause auto-slide on hover
    const heroSlider = document.querySelector('.hero-slider');
    if (heroSlider) {
        heroSlider.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        heroSlider.addEventListener('mouseleave', () => {
            setInterval(nextSlide, 5000);
        });
    }
    
    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
    
    // Initialize first slide
    showSlide(0);
    
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = 80;
                const targetPosition = target.offsetTop - headerHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Animate cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all cards
    document.querySelectorAll('.royal-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
    
    // Add parallax effect to hero background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallax = scrolled * 0.5;
        
        slides.forEach(slide => {
            slide.style.transform = `translateY(${parallax}px)`;
        });
    });
    
    // Add typing effect to hero title
    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    
    // Initialize typing effect for main title after page load
    setTimeout(() => {
        const mainTitle = document.querySelector('.slide.active h1');
        if (mainTitle) {
            const originalText = mainTitle.textContent;
            typeWriter(mainTitle, originalText, 80);
        }
    }, 1000);
    
    console.log('Shivaji Maharaj page loaded successfully');
});

// Add CSS for better animations
const style = document.createElement('style');
style.textContent = `
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
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeInUp 1s ease-out;
    }
    
    .royal-card {
        position: relative;
        overflow: hidden;
    }
    
    .royal-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transform: rotate(45deg);
        transition: all 0.6s;
        opacity: 0;
    }
    
    .royal-card:hover::before {
        animation: shimmer 1.5s ease-in-out;
    }
    
    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>
<script>
    const booksData = <?php echo json_encode($books_marathi); ?>;
</script>
<script>
    const rowsPerPage = 15;
    let currentPage = 1;
    let currentLang = 'mr'; // mr | en

    function renderBooksTable() {
        const tbody = document.getElementById('booksBody');
        tbody.innerHTML = '';

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageData = booksData.slice(start, end);

        pageData.forEach((book, index) => {
            const i = start + index + 1;

            const title  =  book.title ;
            const author =  book.author ;

            const row = `
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="px-4 py-2">${i}</td>
                    <td class="px-4 py-2 font-semibold">${title}</td>
                    <td class="px-4 py-2">${author}</td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        updateBooksControls();
    }

    function updateBooksControls() {
        const totalPages = Math.ceil(booksData.length / rowsPerPage);

        document.getElementById('pageInfo').innerText =
            `Page ${currentPage} of ${totalPages}`;

        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = currentPage === totalPages;
    }

    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderBooksTable();
        }
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        const totalPages = Math.ceil(booksData.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderBooksTable();
        }
    });

    function switchBooksLanguage(lang) {
        currentLang = lang;
        renderBooksTable();
    }

    // Initial Load
    renderBooksTable();
</script>



