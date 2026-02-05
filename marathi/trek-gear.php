<?php
// Set page specific variables
$page_title = 'ट्रेकिंग साहित्य मार्गदर्शक | ट्रेकशित्झ - सुरक्षित ट्रेकिंगसाठी आवश्यक साधने';
$meta_description = 'ट्रेकिंगसाठी आवश्यक साहित्य आणि उपकरणांची संपूर्ण माहिती. एकदिवसीय ट्रेक, बहुदिवसीय मोहिमा आणि पावसाळी ट्रेकसाठी काय सोबत न्यावे हे जाणून घ्या. किल्ले भेटींसाठी आवश्यक सुरक्षितता सूचना आणि करावयाच्या व टाळावयाच्या गोष्टी.';
$meta_keywords = 'ट्रेकिंग साहित्य, ट्रेकिंग उपकरणे, हायकिंग साहित्य मार्गदर्शक, एकदिवसीय ट्रेक आवश्यक वस्तू, पावसाळी ट्रेकिंग, सुरक्षितता सूचना, किल्ला भेट मार्गदर्शक, महाराष्ट्र ट्रेकिंग साहित्य';
// Include header
require_once './../config/database.php';
include './../includes/header_marathi.php';
?>

<style>
/* Trek Gear page specific styles – TreKshitiZ Brown & Cream Theme */

.gear-card {
    background: #FFFEF7; /* cream-light */
    border: 1px solid #DEB887; /* mountain */
    border-radius: 0.75rem;
    padding: 1.5rem;
    transition: box-shadow 0.25s ease;
}

.dark .gear-card {
    background: #1f2937;
    border-color: #8B4513; /* primary */
}

.gear-card:hover {
    box-shadow: 0 10px 28px rgba(139, 69, 19, 0.18);
}

/* Gear icon */
.gear-icon {
    width: 56px;
    height: 56px;
    background: #8B4513; /* primary */
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFF8DC; /* cream-medium */
    font-size: 22px;
    margin: 0 auto 16px;
}

/* Season badge (subtle, no gradients) */
.season-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    background: #F5F5DC; /* cream-dark */
    color: #8B4513; /* primary */
    margin-left: 6px;
}

/* Gear item blocks (Do / Don't / Forest items) */
.gear-item {
    background: #FAF0E6; /* cream-warm */
    border-left: 4px solid #8B4513; /* primary */
    padding: 12px 16px;
    margin: 8px 0;
    border-radius: 0.375rem;
}

.dark .gear-item {
    background: #111827;
    border-left-color: #D2691E; /* secondary */
}

/* Do & Don't color distinction (still subtle) */
.dos-item {
    border-left-color: #8B4513; /* primary */
}

.donts-item {
    border-left-color: #A0522D; /* earth */
}

/* Checklist items */
.checklist-item {
    display: flex;
    align-items: center;
    padding: 6px 0;
    border-bottom: 1px solid #F5F5DC; /* cream-dark */
}

.dark .checklist-item {
    border-color: #374151;
}

/* Checklist icon */
.checklist-icon {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #D2691E; /* secondary */
    color: #FFFEF7;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    font-size: 12px;
}

/* Remove hover gimmicks – heritage friendly */
.gear-card:hover,
.gear-item:hover,
.checklist-item:hover {
    transform: none;
}

/* Print friendly */
@media print {
    .gear-card {
        box-shadow: none !important;
        border: 1px solid #A0522D !important;
        background: #ffffff !important;
    }

    h1, h2, h3 {
        color: #000 !important;
    }
}
</style>


<main id="main-content">   
    <!-- Hero Section -->
   <section class="py-20 bg-gradient-to-r from-primary to-secondary text-white text-center">
     <div class="container mx-auto max-w-6xl text-center">
            <div class="mb-8">
            <h1 class="text-5xl font-bold dark:text-white mb-4 mt-8">
                ट्रेकिंग साहित्य व <span class="text-yellow-300">नियोजन मार्गदर्शक</span>
                </h1>
                <p class="max-w-4xl text-xl mx-auto">
                उपयुक्त ट्रेकिंग साहित्य यादी, ऋतूनुसार मार्गदर्शन आणि <br>
                महाराष्ट्रभर ट्रेकशित्झ ट्रेकर्सद्वारे पाळली जाणारी किल्ला शिस्त
                </p>
                        
            </div>
                        
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mb-12">
                <div class="text-center opacity-90">
                <div class="text-4xl font-bold">30+</div>
                <div>आवश्यक साहित्य</div>
                </div>

                <div class="text-center opacity-90">
                <div class="text-4xl font-bold">3</div>
                <div>ट्रेक प्रकार</div>
                </div>

                <div class="text-center opacity-90">
                <div class="text-4xl font-bold">10+</div>
                <div>सुरक्षितता मार्गदर्शक तत्त्वे</div>
                </div>
            </div>
        </div>
    </section>

    <!-- When to Go Section -->
    <section class="py-16 px-4 bg-white dark:bg-gray-800">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary dark:text-white mb-4">
                <i class="fas fa-calendar-alt text-primary-600 mr-3"></i>
                ट्रेकिंगसाठी योग्य वेळ
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Summer Season -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                <div class="gear-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 text-center">
                    उन्हाळा
                    <span class="season-badge season-summer">मार्च - मे</span>
                </h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                    सुट्टीतील सहलींसाठी योग्य काळ. ज्या ठिकाणी पाण्याची टंचाई नसते
                    अशा ट्रेकसाठी हा ऋतू आदर्श आहे.
                    स्वच्छ हवामानामुळे आजूबाजूच्या परिसराचे विस्तीर्ण दृश्य पाहता येते.
                </p>
                <div class="space-y-2">
                    <div class="flex items-center text-sm text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    स्वच्छ दृश्यता
                    </div>
                    <div class="flex items-center text-sm text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    सुट्टीसाठी अनुकूल
                    </div>
                    <div class="flex items-center text-sm text-orange-600">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    पाण्याची उपलब्धता तपासा
                    </div>
                </div>
                </div>

                <!-- Monsoon Season -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                <div class="gear-icon">
                    <i class="fas fa-cloud-rain"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 text-center">
                    पावसाळा
                    <span class="season-badge season-monsoon">जून - सप्टेंबर</span>
                </h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                    हिरव्यागार जंगलं आणि डोंगररांगांच्या सौंदर्यासह निसर्गाचा मनमोहक अनुभव.
                    प्रखर उन्हाचा त्रास नसल्यामुळे वातावरण आल्हाददायक असते,
                    जे निसर्गप्रेमींसाठी उत्तम आहे.
                </p>
                <div class="space-y-2">
                    <div class="flex items-center text-sm text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    हिरवळ भरलेली निसर्गसृष्टी
                    </div>
                    <div class="flex items-center text-sm text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    आल्हाददायक हवामान
                    </div>
                    <div class="flex items-center text-sm text-blue-600">
                    <i class="fas fa-info-circle mr-2"></i>
                    अतिरिक्त साहित्य आवश्यक
                    </div>
                </div>
                </div>

                <!-- Winter Season -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                <div class="gear-icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 text-center">
                    हिवाळा
                    <span class="season-badge season-winter">ऑक्टोबर - फेब्रुवारी</span>
                </h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                    सर्व ऋतूंमध्ये सर्वोत्तम काळ.
                    प्रखर उष्णता नसल्यामुळे हवामान सुखद असते आणि दृश्यता उत्कृष्ट असते.
                    पाण्याची कोणतीही अडचण नसून देशभर ट्रेकसाठी हा ऋतू अत्यंत योग्य आहे.
                    ऑक्टोबर ते जानेवारी हा काळ विशेषतः आदर्श मानला जातो.
                </p>
                <div class="space-y-2">
                    <div class="flex items-center text-sm text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    आदर्श हवामान
                    </div>
                    <div class="flex items-center text-sm text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    उत्कृष्ट दृश्यता
                    </div>
                    <div class="flex items-center text-sm text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    पाण्याची अडचण नाही
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gear Lists Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                <i class="fas fa-backpack text-green-600 mr-3"></i>
                आवश्यक ट्रेकिंग साहित्य यादी
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- One Day Trek -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                <div class="gear-icon">
                    <i class="fas fa-hiking"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                    एकदिवसीय ट्रेकसाठी आवश्यक साहित्य
                </h3>
                
                <div class="space-y-3">
                    <div class="checklist-item">
                    <div class="checklist-icon">1</div>
                    <span class="text-gray-700 dark:text-gray-300">पाण्याची बाटली (किमान २ लिटर)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">2</div>
                    <span class="text-gray-700 dark:text-gray-300">टोपी किंवा कॅप (उन्हापासून संरक्षणासाठी)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">3</div>
                    <span class="text-gray-700 dark:text-gray-300">हंटर बूट (पावसाळ्यात स्पोर्ट्स शूज)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">4</div>
                    <span class="text-gray-700 dark:text-gray-300">कोरडे अन्न (बिस्किटे, तेलकट पदार्थ टाळावेत)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">5</div>
                    <span class="text-gray-700 dark:text-gray-300">अतिरिक्त कपडे (१–२ जोड)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">6</div>
                    <span class="text-gray-700 dark:text-gray-300">कटिंग चाकू</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">7</div>
                    <span class="text-gray-700 dark:text-gray-300">टॉर्च (शक्यतो कमांडर टॉर्च)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">8</div>
                    <span class="text-gray-700 dark:text-gray-300">पेन आणि वही</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">9</div>
                    <span class="text-gray-700 dark:text-gray-300">सुरक्षित माचिस</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">10</div>
                    <span class="text-gray-700 dark:text-gray-300">प्रथमोपचार पेटी</span>
                    </div>
                </div>
                </div>

                <!-- Multi Day Trek -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                <div class="gear-icon">
                    <i class="fas fa-campground"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                    बहुदिवसीय ट्रेकसाठी आवश्यक साहित्य
                </h3>
                
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-center">
                    एकदिवसीय ट्रेकच्या साहित्याव्यतिरिक्त खालील वस्तू आवश्यक:
                </p>
                
                <div class="space-y-3">
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">टूथब्रश आणि टूथपेस्ट</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">मेणबत्त्या आणि माचिस</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">स्टोव्ह किंवा क्लिक्स</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">रॉकेल (इंधन)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">झोपण्याचे साहित्य (स्लीपिंग मॅट, स्लीपिंग बॅग)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">ताट, चमचा, ग्लास</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">कच्चे अन्नधान्य (तांदूळ, मॅगी इ.)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">लहान बादली</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">ट्रेकिंग दोरी (सुमारे ५० मीटर)</span>
                    </div>
                    <div class="checklist-item">
                    <div class="checklist-icon">+</div>
                    <span class="text-gray-700 dark:text-gray-300">जुनी वर्तमानपत्रे</span>
                    </div>
                </div>
                </div>
            </div>

            <!-- Monsoon Special Gear -->
            <div class="mt-8">
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="text-center mb-6">
                    <div class="gear-icon mx-auto">
                        <i class="fas fa-umbrella"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                        पावसाळ्यासाठी विशेष साहित्य
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        पावसाळी ट्रेकिंगसाठी अतिरिक्त आवश्यक वस्तू
                    </p>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <div class="checklist-item">
                        <div class="checklist-icon" style="background: #4834d4;">☂</div>
                        <span class="text-gray-700 dark:text-gray-300">रेनकोट किंवा विंडचीटर</span>
                        </div>
                        <div class="checklist-item">
                        <div class="checklist-icon" style="background: #4834d4;">📱</div>
                        <span class="text-gray-700 dark:text-gray-300">कॅमेरा सुरक्षित ठेवण्यासाठी छत्री</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="checklist-item">
                        <div class="checklist-icon" style="background: #4834d4;">🗄</div>
                        <span class="text-gray-700 dark:text-gray-300">जास्त संख्येने प्लास्टिक पिशव्या</span>
                        </div>
                        <div class="checklist-item">
                        <div class="checklist-icon" style="background: #4834d4;">🧭</div>
                        <span class="text-gray-700 dark:text-gray-300">चुंबकीय होकायंत्र</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border-l-4 border-blue-500">
                    <p class="text-blue-800 dark:text-blue-200 text-sm">
                        <i class="fas fa-info-circle mr-2"></i>
                        <strong>महत्त्वाचे:</strong> पावसाळ्यात साहित्य ओले होऊ नये यासाठी
                        सर्व वस्तू प्लास्टिक पिशव्यांमध्ये नीट पॅक करा.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Do's and Don'ts Section -->
    <section class="py-16 px-4 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                <i class="fas fa-fort-awesome text-green-600 mr-3"></i>
                किल्ला भेट मार्गदर्शक सूचना
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
                <p class="text-lg text-gray-600 dark:text-gray-300 mt-4 max-w-3xl mx-auto">
                किल्ले हे केवळ जुन्या वास्तू नाहीत,
                तर आपल्या पूर्वजांच्या आठवणी आणि
                छत्रपती शिवाजी महाराजांच्या गौरवशाली इतिहासाचे साक्षीदार आहेत.
                चला, हा अमूल्य वारसा पुढील पिढ्यांसाठी जतन करूया.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Do's -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="text-center mb-6">
                        <div class="gear-icon mx-auto" style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-green-600 dark:text-green-400">
                        करावयाच्या गोष्टी – उत्तम पद्धती
                        </h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-camera text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                प्रवेशद्वार, बुरुज, कोरीवकाम आणि शिल्पकलेसारख्या महत्त्वाच्या वास्तूंची छायाचित्रे घ्या
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-leaf text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                गट छायाचित्रांसोबत निसर्ग छायाचित्रणावरही लक्ष केंद्रित करा
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-scroll text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                कोरीवकामावरील ऐतिहासिक शिलालेखांची नोंद घ्या किंवा त्याची प्रत लिहून ठेवा
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-broom text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                परिसर स्वच्छ ठेवा आणि कचऱ्याची योग्य पद्धतीने विल्हेवाट लावा
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-shield-alt text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                साप, उंदीर आणि वन्य प्राण्यांपासून संरक्षणाची योग्य खबरदारी घ्या
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-map-marked text-green-600 mr-3 mt-1"></i>
                                    <span class="text-gray-700 dark:text-gray-300">
                                    वाट चुकू नये यासाठी ओळखण्याजोगी कायमस्वरूपी खुणा ठेवा
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Don'ts -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="text-center mb-6">
                        <div class="gear-icon mx-auto" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                            <i class="fas fa-thumbs-down"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-red-600 dark:text-red-400">
                        टाळावयाच्या गोष्टी – करू नका
                        </h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="gear-item donts-item">
                            <div class="flex items-start">
                                <i class="fas fa-volume-up text-red-600 mr-3 mt-1"></i>
                                    <span class="text-gray-700 dark:text-gray-300">
                                    संगीत यंत्रणा किंवा गोंगाट करून शांत वातावरणाचा भंग करू नका
                                    </span>
                            </div>
                        </div>
                        
                        <div class="gear-item donts-item">
                            <div class="flex items-start">
                                <i class="fas fa-trash text-red-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                प्लास्टिक कचरा पसरवू नका. तो गोळा करून शहरात योग्य ठिकाणी टाका
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item donts-item">
                            <div class="flex items-start">
                                <i class="fas fa-smoking-ban text-red-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                धूम्रपान आणि मद्यपान करू नका. बाटल्या फोडू नका, कारण त्यातून इतरांना इजा होऊ शकते
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Forest Precautions Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-4xl">
            <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-tree text-green-600 mr-3"></i>
                    जंगलातील सुरक्षितता खबरदारी
                    </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="gear-card rounded-2xl p-8 shadow-xl">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-cut text-orange-600 mr-3 mt-1"></i>
                                    <span class="text-gray-700 dark:text-gray-300">
                                    आपत्कालीन परिस्थितीसाठी शिकारी चाकू किंवा कुऱ्हाड सोबत ठेवा
                                    </span>
                            </div>
                        </div>
                        
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-tshirt text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                आजूबाजूच्या वातावरणात मिसळणारे कपडे घाला. प्राण्यांचे लक्ष वेधून घेणारे भडक रंग टाळा
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-oil-can text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                सरपटणाऱ्या प्राण्यांपासून दूर राहण्यासाठी आणि आग पेटविण्यास मदत म्हणून इंजिन ऑइल सोबत ठेवा
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-fire text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                जंगलात आग लागण्याचा धोका टाळण्यासाठी अनावश्यक आग पेटवू नका
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-bug text-orange-600 mr-3 mt-1"></i>
                                            <span class="text-gray-700 dark:text-gray-300">
                                कीटक चावण्यापासून बचावासाठी पूर्ण पँट आणि शर्ट परिधान करा
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Engine Oil Uses -->
                <div class="mt-6 p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg border-l-4 border-orange-500">
                    <h4 class="font-semibold text-orange-800 dark:text-orange-200 mb-2">
                        <i class="fas fa-info-circle mr-2"></i>इंजिन ऑइलचे उपयोग:
                    </h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex items-center text-orange-700 dark:text-orange-300">
                        <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                        सरपटणारे प्राणी आणि धोकादायक कीटक दूर ठेवण्यासाठी
                        </div>
                        <div class="flex items-center text-orange-700 dark:text-orange-300">
                        <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                        आपत्कालीन परिस्थितीत आग पेटविण्यास मदत करण्यासाठी
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel Information Section -->
        <section class="py-16 px-4 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto max-w-4xl">
            <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                <i class="fas fa-bus text-green-600 mr-3"></i>
                प्रवास माहिती
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="gear-card rounded-2xl p-8 shadow-xl text-center">
            <div class="gear-icon mx-auto mb-6">
                <i class="fas fa-route"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                सर्वोत्तम प्रवास पर्याय
            </h3>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                खासगी वाहनाने प्रवास करणे सोयीचे असले तरी भाडे महाग पडू शकते.
                किमान खर्चात प्रवासासाठी <strong>एस.टी. बस</strong> हा सर्वोत्तम पर्याय आहे.
                महाराष्ट्रभर पसरलेल्या विस्तृत जाळ्यामुळे एस.टी. बस
                राज्याच्या जवळजवळ प्रत्येक भागात पोहोचते.
            </p>
            
            <div class="grid md:grid-cols-2 gap-6 mt-8">
                <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                <i class="fas fa-bus text-green-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-green-800 dark:text-green-200">एस.टी. बस</h4>
                <p class="text-sm text-green-700 dark:text-green-300">
                    किफायतशीर, विस्तृत सेवा जाळे
                </p>
                </div>
                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                <i class="fas fa-car text-blue-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-blue-800 dark:text-blue-200">खासगी वाहन</h4>
                <p class="text-sm text-blue-700 dark:text-blue-300">
                    सोयीस्कर पण खर्चिक पर्याय
                </p>
                </div>
            </div>
            </div>
        </div>
        </section>

    <!-- Quick Tips Section -->
        <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                <i class="fas fa-icon text-green-600 mr-3"></i>
                नवख्या ट्रेकर्ससाठी झटपट सूचना
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                <div class="gear-icon mx-auto mb-4">
                <i class="fas fa-info"></i>
                </div>
                <h3 class="font-bold text-gray-800 dark:text-white mb-2">
                योग्य सॅक (बॅकपॅक)
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                पाठीवर ताण न येता जास्तीत जास्त साहित्य मावेल असा
                योग्य ट्रेकिंग सॅक निवडा
                </p>
            </div>

            <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                <div class="gear-icon mx-auto mb-4">
                <i class="fas fa-tint"></i>
                </div>
                <h3 class="font-bold text-gray-800 dark:text-white mb-2">
                पाणी प्या
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                नेहमी पुरेसे पाणी सोबत ठेवा आणि तहान लागली नसली
                तरी नियमितपणे पाणी प्या
                </p>
            </div>

            <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                <div class="gear-icon mx-auto mb-4">
                <i class="fas fa-shoe-prints"></i>
                </div>
                <h3 class="font-bold text-gray-800 dark:text-white mb-2">
                योग्य पादत्राणे
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                योग्य शूज वापरा – कोरड्या हवामानात हंटर शूज
                आणि पावसाळ्यात स्पोर्ट्स शूज
                </p>
            </div>

            <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                <div class="gear-icon mx-auto mb-4">
                <i class="fas fa-first-aid"></i>
                </div>
                <h3 class="font-bold text-gray-800 dark:text-white mb-2">
                सुरक्षिततेला प्राधान्य
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                नेहमी प्रथमोपचार पेटी सोबत ठेवा
                आणि आपल्या ट्रेकच्या नियोजनाबद्दल
                कोणाला तरी नक्की कळवा
                </p>
            </div>
            </div>
        </div>
        </section>

  <!-- Call to Action Section -->
        <section class="py-16 px-4 bg-primary text-cream-light">
        <div class="container mx-auto max-w-4xl text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
            तुमच्या पुढील साहसासाठी तयार आहात का?
            </h2>

            <p class="text-lg md:text-xl mb-6 text-cream-medium">
            आता ट्रेकसाठी काय सोबत न्यावे हे तुम्हाला माहीत आहे.
            चला, आमच्या आगामी ट्रेक्समध्ये सहभागी व्हा आणि
            सह्याद्री पर्वतरांगांचे अप्रतिम सौंदर्य अनुभवायला या.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="./trek_schedule.php"
                class="bg-cream-light text-primary px-8 py-3 rounded-full font-semibold
                        hover:bg-cream-medium transition-colors duration-200 shadow-md">
                <i class="fas fa-calendar-check mr-2"></i>
                ट्रेक वेळापत्रक पहा
            </a>

            <a href="./contact-us.php"
                class="border border-cream-light text-cream-light px-8 py-3 rounded-full font-semibold
                        hover:bg-cream-light hover:text-primary transition-colors duration-200">
                <i class="fas fa-phone mr-2"></i>
                आमच्याशी संपर्क साधा
            </a>
            </div>
        </div>
        </section>

</main>

<?php include './../includes/footer_marathi.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Trek Gear page loaded');
    
    // Gear card hover effects
    const gearCards = document.querySelectorAll('.gear-card');
    
    gearCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Checklist item interactive effects
    const checklistItems = document.querySelectorAll('.checklist-item');
    
    checklistItems.forEach(item => {
        item.addEventListener('click', function() {
            const icon = this.querySelector('.checklist-icon');
            if (icon) {
                icon.style.background = '#10b981';
                icon.innerHTML = '✓';
                setTimeout(() => {
                    icon.style.background = '#7fb069';
                    const originalText = icon.getAttribute('data-original') || icon.textContent;
                    if (!icon.getAttribute('data-original')) {
                        icon.setAttribute('data-original', icon.textContent);
                    }
                    icon.innerHTML = originalText;
                }, 2000);
            }
        });
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            
            if (!targetId || targetId === '#' || targetId.length <= 1) {
                e.preventDefault();
                return;
            }
            
            try {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const headerHeight = 80;
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            } catch (error) {
                console.warn('Invalid selector:', targetId);
                e.preventDefault();
            }
        });
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all gear cards
    gearCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.animationDelay = `${index * 0.1}s`;
        observer.observe(card);
    });
    
    // Add CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes checkComplete {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
        
        .gear-item:hover {
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            0% { transform: translateX(0); }
            50% { transform: translateX(8px); }
            100% { transform: translateX(8px); }
        }
    `;
    document.head.appendChild(style);
    

    
    // Gear list completion tracker
    let completedItems = 0;
    const totalItems = checklistItems.length;
    

    
    // Update progress when items are clicked
    checklistItems.forEach(item => {
        item.addEventListener('click', function() {
            if (!this.classList.contains('completed')) {
                this.classList.add('completed');
                completedItems++;
                updateProgress();
            }
        });
    });
    
    function updateProgress() {
        const percentage = (completedItems / totalItems) * 100;
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        
        if (progressBar) progressBar.style.width = `${percentage}%`;
        if (progressText) progressText.textContent = `${completedItems}/${totalItems} items`;
        
        if (completedItems === totalItems) {
            progressDiv.classList.add('animate-pulse');
            setTimeout(() => {
                progressDiv.classList.remove('animate-pulse');
            }, 3000);
        }
    }
    
    console.log('Trek Gear page: All functionality initialized');
});

// Export functions for debugging
window.trekGearDebug = {
    completeAllItems: function() {
        document.querySelectorAll('.checklist-item').forEach(item => {
            item.click();
        });
    },
    resetProgress: function() {
        document.querySelectorAll('.checklist-item').forEach(item => {
            item.classList.remove('completed');
        });
        completedItems = 0;
        updateProgress();
    },
    printGearList: function() {
        window.print();
    }
};
</script>

<!-- Additional CSS for enhanced animations and print styles -->
<style>
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

.fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

/* Print styles */
@media print {
    .fixed, nav, footer, button {
        display: none !important;
    }
    
    .gear-card {
        break-inside: avoid;
        box-shadow: none !important;
        border: 1px solid #ccc !important;
    }
    
    .checklist-item {
        font-size: 12px;
        margin: 2px 0;
    }
    
    h1, h2, h3 {
        color: #000 !important;
    }
    
    .gear-icon {
        background: #7fb069 !important;
        -webkit-print-color-adjust: exact;
    }
}

/* Enhanced hover effects */
.gear-card:hover .gear-icon {
    animation: iconFloat 2s ease-in-out infinite;
}

@keyframes iconFloat {
    0%, 100% {
        transform: translateY(0) rotateY(0deg);
    }
    50% {
        transform: translateY(-5px) rotateY(180deg);
    }
}

/* Responsive improvements */
@media (max-width: 640px) {
    .gear-card {
        padding: 1rem;
    }
    
    .gear-icon {
        width: 50px;
        height: 50px;
        font-size: 20px;
    }
    
    .checklist-item {
        padding: 6px 0;
    }
    
    .fixed.bottom-6.right-6 {
        bottom: 2rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
    
    .fixed.top-24.right-6 {
        top: 6rem;
        right: 1rem;
        padding: 0.75rem;
    }
}

/* Dark mode improvements */
.dark .season-badge {
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.dark .gear-item {
    border-left-color: #7fb069;
}

.dark .checklist-icon {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

/* Accessibility improvements */
.gear-card:focus-within {
    outline: 2px solid #7fb069;
    outline-offset: 2px;
}

.checklist-item:focus {
    outline: 1px solid #7fb069;
    outline-offset: 2px;
}

/* Loading animation for gear cards */
.gear-card.loading {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}
</style>