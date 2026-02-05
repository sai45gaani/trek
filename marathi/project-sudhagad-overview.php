<?php
// Set page specific variables
$page_title = 'प्रकल्प सुधागड | किल्ला संवर्धन | ट्रेकशित्झ';
$meta_description = 'प्रकल्प सुधागड – पालीनजीक असलेल्या ऐतिहासिक सुधागड किल्ल्याचे जतन व संवर्धन करण्यासाठी ट्रेकशित्झद्वारे राबविण्यात येणारा उपक्रम.';
$meta_keywords = 'प्रकल्प सुधागड, सुधागड किल्ला, किल्ला संवर्धन, ट्रेकशित्झ';

// Include header
include './../includes/header_marathi.php';
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

/* =========================
   Project Sudhagad – Nature Theme
   ========================= */

.nature-indicator {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #166534, #4d7c0f);
    margin: 0 auto 2rem;
}

.nature-card {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(22, 101, 52, 0.25);
    border-radius: 1.25rem;
    transition: all 0.3s ease;
}

.dark .nature-card {
    background: rgba(17, 24, 39, 0.9);
    border-color: rgba(74, 222, 128, 0.25);
}

.nature-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 35px rgba(22, 101, 52, 0.15);
}

.nature-gradient {
    background: linear-gradient(135deg, #166534, #4d7c0f);
}

html {
    scroll-behavior: smooth;
}

@media (max-width: 768px) {
    .hero-slider {
        height: 70vh;
    }
}

.section-sudhagad {
  padding: 5rem 0;
}

.section-sudhagad h2 {
  font-size: 2rem;
  font-weight: 700;
}

.section-sudhagad p {
  font-size: 1.05rem;
  line-height: 1.75;
}

.nature-card {
  background: linear-gradient(180deg, #ffffff, #f7fbf7);
  border: 1px solid rgba(16, 185, 129, 0.15);
  border-radius: 1.5rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.nature-card h2 {
  font-size: 1.75rem;
  font-weight: 700;
}

.nature-card p,
.nature-card li {
  font-size: 1.05rem;
  line-height: 1.75;
}


</style>
<main id="main-content" class="">


<!-- Project Sudhagad – Hero Section -->
<!-- About Project Sudhagad – Hero Section -->
<section id="sudhagad-overview"
         class="relative pt-32 pb-20 bg-gradient-to-br from-green-900 via-green-800 to-emerald-700 text-white overflow-hidden">

    <!-- Subtle Nature Texture -->
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.25),transparent_70%)]"></div>

    <div class="container mx-auto max-w-5xl px-4 relative z-10 text-center">

        <!-- Indicator -->
        <div class="nature-indicator bg-white/70 mx-auto mb-6"></div>

        <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
            प्रकल्प सुधागड विषयी
          </h1>

          <!-- Subtitle -->
          <p class="text-xl md:text-2xl text-green-100 mb-6">
            ट्रेकशित्झद्वारे राबविण्यात येणारा किल्ला संवर्धन उपक्रम
          </p>

          <!-- Short Description -->
          <p class="text-lg text-green-100/90 leading-relaxed max-w-3xl mx-auto">
            प्रकल्प सुधागड हा पालीनजीक असलेल्या ऐतिहासिक सुधागड किल्ल्याची पुढील झीज रोखण्यासाठी
            राबविण्यात येणारा दीर्घकालीन संवर्धन उपक्रम आहे.
            विद्यमान वास्तूंचे संरक्षण करणे, होणारे नुकसान कमी करणे
            आणि हा अमूल्य वारसा पुढील पिढ्यांसाठी जतन करणे
            हे या उपक्रमाचे मुख्य उद्दिष्ट आहे.
          </p>

          <!-- CTA -->
          <div class="mt-10 flex flex-wrap justify-center gap-4">

            <a href="#sudhagad-work"
              class="inline-flex items-center px-8 py-3 rounded-full bg-white text-green-800 font-semibold hover:bg-green-100 transition">
              केलेली कामे
            </a>

            <a href="#sudhagad-media"
              class="inline-flex items-center px-8 py-3 rounded-full border border-white/70 text-white hover:bg-white/10 transition">
              माध्यमे पहा
            </a>

          </div>

    </div>
</section>


<section id="sudhagad-structure"
         class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto max-w-5xl px-4">

    <!-- Section Header -->
    <div class="text-center mb-14">
      <div class="nature-indicator"></div>
       <h2 class="text-3xl md:text-4xl font-bold text-green-700 dark:text-green-400">
        सुधागड प्रकल्पाची रचना
      </h2>
      <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
        सुधागड प्रकल्प संवर्धन, संशोधन आणि समाजसहाय्य या उद्दिष्टांसाठी
        विविध केंद्रित उपक्रमांमध्ये विभागलेला आहे.
      </p>
    </div>

    <!-- Content Cards -->
    <div class="space-y-10">

      <!-- A. Conservation -->
 <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          अ. संवर्धन
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          सुधागड किल्ल्याचे संवर्धन हे या प्रकल्पाचे मुख्य उद्दिष्ट आहे.
          तटबंदीवर वाढणाऱ्या वनस्पती, पाण्याचा प्रवाह, माती साचणे
          आणि मानवी हस्तक्षेप यांमुळे किल्ल्याच्या रचनांची हळूहळू झीज होत आहे.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          सध्या सुस्थितीत असलेल्या वास्तूंची पुढील झीज थांबवणे
          हे या प्रकल्पाचे प्रमुख ध्येय आहे.
          पुनर्संचयित कार्य हे संवर्धनाचा भाग मानले जाते;
          मात्र तांत्रिक मर्यादा, निधीअभाव
          आणि ऐतिहासिक स्थळांमध्ये बदल करण्यावरील निर्बंधांमुळे
          सध्या पुनर्संचयित कार्य या प्रकल्पाच्या कक्षेत समाविष्ट नाही.
        </p>
      </div>

      <!-- B. Exploration -->
      <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          ब. संशोधन
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          भारताच्या स्वातंत्र्यापर्यंत सुधागड चांगल्या स्थितीत होता;
          मात्र आज किल्ल्याचा मोठा भाग जंगलाने वेढलेला आहे.
          अनेक वास्तू मातीखाली गाडल्या गेल्या आहेत
          किंवा दरडी कोसळल्यामुळे दुर्गम झाल्या आहेत.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          जास्तीत जास्त वास्तूंचे संवर्धन करण्यासाठी
          प्रथम किल्ल्यावर नेमके काय अस्तित्वात आहे हे शोधणे आवश्यक आहे.
          त्यामुळे संशोधन हा या प्रकल्पाचा महत्त्वाचा भाग आहे.
          संवर्धन उपक्रमांसोबतच विशेष संशोधन मोहिमा राबवून
          किल्ल्याचा अभ्यास आणि दस्तऐवजीकरण केले जाते.
        </p>
      </div>

      <!-- C. Supporting Activities -->
      <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          क. पूरक उपक्रम
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          सुधागड भेटीदरम्यान वृक्षारोपण,
          तसेच स्थानिक वनस्पती आणि प्राणीजीवनाचा अभ्यास
          यांसारखे विविध पूरक उपक्रम राबवता येतात.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          आजच्या पर्यावरणीय परिस्थितीत वृक्षारोपणाचे महत्त्व लक्षात घेता,
          सुधागड प्रकल्पामध्ये हे उपक्रम समाविष्ट करण्यात आले आहेत,
          जे किल्ला संवर्धन मोहिमांसोबत सहजपणे राबवता येतात.
        </p>
      </div>

      <!-- D. Social Support -->
         <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          ड. सामाजिक सहाय्य
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          सह्याद्रीतील अनेक किल्ले दुर्गम भागात असून
          तेथील स्थानिक रहिवाशांना रोजगार,
          शिक्षण आणि वैद्यकीय सुविधांचा अभाव असतो.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          आसपासच्या समाजाकडे दुर्लक्ष करून केलेले संवर्धन अमानवी ठरेल.
          म्हणूनच सामाजिक उपक्रम हे सुधागड प्रकल्पाचा अविभाज्य भाग आहेत.
          उदाहरणार्थ, नोव्हेंबर २००५ मध्ये
          सुधागडाच्या पायथ्याशी असलेल्या पाच्छापूर गावात
          एक ग्रंथालय स्थापन करण्यात आले.
        </p>
      </div>

    </div>

  </div>
</section>

<section id="sudhagad-future"
         class="py-20 bg-gradient-to-br from-green-800 to-emerald-700 text-white">
  <div class="container mx-auto max-w-4xl px-4 text-center">

    <!-- Section Indicator -->
    <div class="nature-indicator bg-white/70 mb-6"></div>

    <!-- Heading -->
    <h2 class="text-3xl md:text-4xl font-bold mb-6">
      आगामी उपक्रम
    </h2>

    <!-- Content Card -->
    <div class="bg-white/10 backdrop-blur rounded-2xl p-8 md:p-10 inline-block">

      <p class="text-lg md:text-xl text-green-100 mb-6">
        सुधागड किल्ला संवर्धन प्रकल्पाशी संबंधित आगामी उपक्रमांबाबत
        अधिक माहितीसाठी संपर्क साधा:
      </p>

      <p class="text-2xl font-semibold text-white mb-2">
        राहुल मेश्राम
      </p>

      <p class="text-xl text-green-100">
        📞 <a href="tel:+919987647607"
              class="underline hover:text-white transition">
            +91 99876 47607
          </a>
      </p>

    </div>

  </div>
</section>


<section id="sudhagad-activities"
         class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto max-w-6xl px-4">

    <!-- Section Header -->
   <!-- Section Header -->
<div class="text-center mb-16">
  <div class="nature-indicator"></div>
  <h2 class="text-3xl md:text-4xl font-bold text-green-700 dark:text-green-400 mb-4">
    आतापर्यंत केलेले उपक्रम
  </h2>
  <p class="text-lg text-gray-600 dark:text-gray-300">
    ट्रेकशित्झद्वारे सुधागडावर राबविण्यात आलेले संवर्धन आणि संशोधन उपक्रम
  </p>
</div>

    <!-- Activities Grid -->
    <div class="grid md:grid-cols-2 gap-8">

      <!-- Soil Removal -->
  <div class="nature-card rounded-2xl p-8">
    <h3 class="text-xl font-bold mb-3 text-green-800">
      महादरवाज्यातील माती हटविणे
    </h3>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
      मुसळधार पावसामुळे झालेल्या दरडी कोसळून महादरवाज्यात माती आणि मोठे दगड साचले,
      ज्यामुळे ये-जा अत्यंत कठीण झाली होती.
      <strong>निसर्गमित्र, पनवेल</strong> यांनी १९८० च्या दशकाच्या उत्तरार्धात
      प्राथमिक स्वच्छतेचे कार्य केले.
    </p>
    <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
      ट्रेकशित्झने हे कार्य पुढे चालू ठेवले असून
      <strong>५० टक्क्यांहून अधिक मलबा हटविण्यात आला आहे</strong>.
      प्रवेशद्वार पूर्णतः पूर्ववत करणे हे अंतिम उद्दिष्ट आहे.
      या उपक्रमात <strong>पालीवाला कॉलेज</strong> आणि
      <strong>गिरीमित्र प्रतिष्ठान</strong> यांचेही योगदान आहे.
    </p>
  </div>

      <!-- Water Tank Cleaning -->
  <div class="nature-card rounded-2xl p-8">
    <h3 class="text-xl font-bold mb-3 text-green-800">
      पाण्याच्या टाक्यांची स्वच्छता
    </h3>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
      सुधागडावर सुमारे <strong>१५ ऐतिहासिक पाण्याच्या टाक्या</strong> आहेत.
      त्यापैकी दक्षिण बाजूवरील तीन प्रमुख टाक्या स्वच्छतेसाठी
      ट्रेकशित्झने निवडल्या.
    </p>
    <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
      <strong>दुर्गमित्र (पनवेल)</strong> आणि
      <strong>दुर्गमित्र (डोंबिवली)</strong> यांसारख्या संस्थांनी
      निस्वार्थपणे या उपक्रमांना पाठिंबा दिला आहे.
    </p>
  </div>

      <!-- Rampart Cleaning -->
  <div class="nature-card rounded-2xl p-8">
    <h3 class="text-xl font-bold mb-3 text-green-800">
      तटबंदी स्वच्छता
    </h3>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
      महादरवाजा आणि चोरदरवाज्याजवळील अनेक भिंती आणि तटबंदी
      आजही सुस्थितीत आहेत.
      मात्र त्यावर वाढणारी झुडपे आणि मोठी झाडे
      मुळांच्या दाबामुळे मोठे नुकसान करतात.
    </p>
    <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
      या कारणामुळे होणारी झीज रोखण्यासाठी
      अशा वनस्पतींचे नियमितपणे निर्मूलन केले जाते.
    </p>
  </div>

      <!-- Plantation -->
  <div class="nature-card rounded-2xl p-8">
    <h3 class="text-xl font-bold mb-3 text-green-800">
      वृक्षारोपण उपक्रम
    </h3>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
      लावलेले किंवा वाचवलेले प्रत्येक झाड अमूल्य आहे.
      ही बाब लक्षात घेऊन समूह ट्रेकदरम्यान,
      विशेषतः उन्हाळ्याच्या शेवटी,
      वृक्षारोपण मोहिमा राबविण्यात येतात.
    </p>
  </div>

      <!-- Library -->
  <div class="nature-card rounded-2xl p-8">
    <h3 class="text-xl font-bold mb-3 text-green-800">
      पाच्छापूर येथील ग्रंथालय
    </h3>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
      सुधागडाच्या पायथ्याशी असलेल्या <strong>पाच्छापूर</strong> गावात
      ट्रेकशित्झ आणि <strong>पालीवाला कॉलेज</strong> यांच्या संयुक्त प्रयत्नातून
      एक ग्रंथालय स्थापन करण्यात आले.
    </p>
    <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
      गावातील शाळा चालवणारे <strong>श्री. घोसाळकर</strong> यांनी
      ग्रंथालयासाठी जागा उदारपणे उपलब्ध करून दिली.
    </p>
  </div>

      <!-- Exploration -->
  <div class="nature-card rounded-2xl p-8">
    <h3 class="text-xl font-bold mb-3 text-green-800">
      संशोधन कार्य
    </h3>
    <ul class="list-disc pl-6 space-y-2 text-gray-700 dark:text-gray-300">
      <li>पूर्व बाजूस असलेल्या जवळजवळ अज्ञात बुरुजाचा शोध</li>
      <li>ढोंडसे बाजूच्या दुहेरी बांधकाम व कोरीवकाम असलेल्या बुरुजापर्यंत पोहोच</li>
      <li>दरडी असूनही चोरदरवाज्याजवळील संशोधन</li>
      <li>किल्ल्याच्या माथ्यापर्यंत जाणाऱ्या चार मार्गांची ओळख</li>
      <li>सुधागड प्रदक्षिणा – सोपी आणि निसर्गरम्य भटकंती</li>
    </ul>
  </div>

    </div>

  </div>
</section>

<section id="sudhagad-execution"
         class="py-20 bg-green-50 dark:bg-gray-800">
  <div class="container mx-auto max-w-6xl px-4">

    <!-- Section Header -->
<div class="text-center mb-16">
  <div class="nature-indicator"></div>
  <h2 class="text-3xl md:text-4xl font-bold text-green-800 dark:text-green-400 mb-4">
    सुधागड प्रकल्पाची अंमलबजावणी कशी केली जाते?
  </h2>
  <p class="text-lg text-gray-600 dark:text-gray-300">
    नियोजित आराखडा, सामूहिक प्रयत्न आणि स्थानिक समाजाचा सहभाग
  </p>
</div>

    <!-- Execution Cards -->
    <div class="grid md:grid-cols-3 gap-8">

      <!-- Coordination Team -->
      <div class="nature-card rounded-2xl p-8">
        <div class="w-14 h-14 bg-green-700 rounded-full flex items-center justify-center mb-5">
          <i class="fas fa-users-cog text-xl text-white"></i>
        </div>
          <h3 class="text-xl font-bold mb-3 text-green-900">
            समन्वय समिती
          </h3>

          <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
            सुधागड प्रकल्प हा <strong>क्षितिज समूह</strong> यांच्या वतीने राबविण्यात येणारा
            अधिकृत उपक्रम आहे. प्रकल्पाची प्रभावी अंमलबजावणी सुनिश्चित करण्यासाठी
            सप्टेंबर २००५ मध्ये एक स्वतंत्र <strong>समन्वय समिती</strong> स्थापन करण्यात आली.
          </p>

          <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
            ही समिती नियमितपणे बैठक घेऊन नियोजन, आयोजन आणि उपक्रमांचे समन्वय कार्य करते.
            कोणताही व्यक्ती — तो क्षितिजचा सदस्य असो वा नसो —
            मध्यम किंवा दीर्घकालीन योगदान देण्याची तयारी असल्यास
            या समितीत सहभागी होऊ शकतो.
          </p>

          <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
            नियोजन केंद्रिय पातळीवर केले जाते,
            मात्र प्रत्यक्ष अंमलबजावणी ही उपक्रम मोहिमांदरम्यान
            मोठ्या संख्येने सहभागी होणाऱ्या स्वयंसेवकांवर अवलंबून असते.
          </p>
      </div>

      <!-- Financial Support -->
      <div class="nature-card rounded-2xl p-8">
        <div class="w-14 h-14 bg-emerald-700 rounded-full flex items-center justify-center mb-5">
          <i class="fas fa-hand-holding-heart text-xl text-white"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-green-900">
          आर्थिक सहाय्य
        </h3>

        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          किल्ला संवर्धनासाठी आर्थिक साधनसामग्रीची आवश्यकता असते.
          प्रारंभीच्या टप्प्यात इच्छुक व्यक्तींनी स्वतःहून आर्थिक योगदान देऊन
          महादरवाज्यातील माती हटविण्यासाठी मजूर नियुक्त करण्यासारखी कामे पूर्ण केली.
        </p>

        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          सध्या <strong>क्षितिज समूह</strong> ही <strong>नोंदणीकृत स्वयंसेवी संस्था</strong> असल्यामुळे,
          किल्ला संवर्धनात रस असलेल्या व्यक्ती आणि संस्था
          थेट समूहाला आर्थिक मदत करू शकतात.
        </p>

        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          मिळालेली सर्व आर्थिक मदत
          केवळ सुधागडावरील संवर्धनाशी संबंधित उपक्रमांसाठीच वापरण्यात येते.
        </p> 
     </div>

      <!-- Local Support -->
      <div class="nature-card rounded-2xl p-8">
        <div class="w-14 h-14 bg-lime-700 rounded-full flex items-center justify-center mb-5">
          <i class="fas fa-handshake text-xl text-white"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-green-900">
          स्थानिक सहाय्य
        </h3>

        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          केवळ आर्थिक पाठबळ पुरेसे नसते.
          मजबूत <strong>स्थानिक सहभाग</strong> असल्याशिवाय
          कोणताही संवर्धन प्रकल्प यशस्वी होऊ शकत नाही.
        </p>

        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          सुधागड प्रकल्पाला स्थानिक नागरिकांचे सातत्यपूर्ण सहकार्य लाभले आहे.
          विशेषतः <strong>श्री. पुराणिक</strong>,
          <strong>जे. एन. पालीवाला कॉलेज, पाली</strong> येथील उपप्राचार्य,
          तसेच त्यांचे विद्यार्थी
          प्रकल्पाच्या सुरुवातीपासून सक्रियपणे सहभागी आहेत.
        </p>

        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          अशा स्थानिक सहभागाविना
          या प्रकल्पाची सातत्यपूर्ण अंमलबजावणी अशक्य ठरेल.
        </p>
      </div>

    </div>

  </div>
</section>

<section id="sudhagad-contacts"
         class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto max-w-6xl px-4">

    <!-- Section Header -->
    <div class="text-center mb-16">
      <div class="nature-indicator"></div>
      <h2 class="text-3xl md:text-4xl font-bold text-green-700 dark:text-green-400 mb-4">
        संपर्क
      </h2>
      <p class="text-lg text-gray-600 dark:text-gray-300">
        प्रकल्प सुधागडमागील व्यक्तींशी संपर्क साधा
      </p>
    </div>

    <!-- Contact Cards -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Sudhir Puranik -->
        <div class="nature-card rounded-2xl p-8">
          <h3 class="text-xl font-bold text-green-900 mb-2">
            श्री. सुधीर पुराणिक
          </h3>
          <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            भौतिकशास्त्र प्राध्यापक<br>
            जे. एन. पालीवाला कॉलेज, पाली
          </p>
          <p class="text-gray-700 dark:text-gray-300">
            📞 दूरध्वनी: ०२१४२ २४२०३३<br>
            <span class="text-sm">(मुंबईहून डायल करताना ९५२१४२ लावा)</span>
          </p>
          <p class="mt-3 text-gray-700 dark:text-gray-300">
            ✉️ <a href="mailto:sudhirpuranik@hotmail.com"
                  class="text-green-700 hover:underline">
              sudhirpuranik@hotmail.com
            </a>
          </p>
        </div>
      <!-- Rahul Meshram -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold text-green-900 mb-2">
          राहुल मेश्राम
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
          सदस्य – ट्रेकशित्झ संस्था
        </p>
        <p class="text-gray-700 dark:text-gray-300">
          📱 मोबाईल: +91 99876 47607
        </p>
        <p class="mt-3 text-gray-700 dark:text-gray-300">
          ✉️ <a href="mailto:rahul.mesh@gmail.com"
                class="text-green-700 hover:underline">
            rahul.mesh@gmail.com
          </a>
        </p>
      </div>

      <!-- Prasad Nikte -->
        <div class="nature-card rounded-2xl p-8">
          <h3 class="text-xl font-bold text-green-900 mb-2">
            प्रसाद निकटे
          </h3>
          <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            सदस्य – ट्रेकशित्झ संस्था
          </p>
          <p class="text-gray-700 dark:text-gray-300">
            📞 दूरध्वनी: ०२२ २५४४ १०७२<br>
            📱 मोबाईल: ०९८२०१ ८३१०१
          </p>
          <p class="mt-3 text-gray-700 dark:text-gray-300">
            ✉️ <a href="mailto:Prasad.Nikte@siemens.com"
                  class="text-green-700 hover:underline">
              Prasad.Nikte@siemens.com
            </a>
          </p>
        </div>

    </div>

    <!-- General Contact -->
      <div class="mt-16 text-center">
          <p class="text-lg text-gray-700 dark:text-gray-300 mb-2">
            तुम्ही आम्हाला नेहमी खालील ई-मेलवर संपर्क करू शकता
          </p>
          <p class="text-xl font-semibold">
            ✉️ <a href="mailto:harshal.r.mahajan@gmail.com"
                  class="text-green-700 hover:underline">
              harshal.r.mahajan@gmail.com
            </a>
          </p>

          <p class="mt-6 text-gray-600 dark:text-gray-400">
            <strong>ट्रेकशित्झ संस्था</strong><br>
            डोंबिवली
          </p>
        </div>

  </div>
</section>


<section class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4">

    <!-- Header -->
    <div class="text-center mb-16">
      <div class="nature-indicator"></div>
      <h2 class="text-4xl md:text-5xl font-bold mb-6">
        <span class="text-green-700 dark:text-green-400">
       प्रकल्प सुधागड
        </span>
      </h2>
      <p class="text-xl text-gray-600 dark:text-gray-300">
          सुधागड किल्ल्याचे संरक्षण आणि संवर्धनासाठीची उपक्रम योजना
      </p>
    </div>

    <!-- Cards Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Project Sudhagad -->
      <a href="project-sudhagad-main.php#sudhagad-overview" class="block focus:outline-none">
        <div class="nature-card p-6 text-center hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-green-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-leaf text-white text-2xl"></i>
          </div>

          <h3 class="text-xl font-bold mb-3">
              प्रकल्प सुधागड
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              सुधागड किल्ला संवर्धन उपक्रमाचा आढावा.
            </p>

            <span class="text-green-700 font-semibold">
              उघडा <i class="fas fa-arrow-right ml-1"></i>
            </span>

        </div>
      </a>


      <!-- Project Structure -->
      <a href="#sudhagad-structure" class="block focus:outline-none group">
        <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-lime-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-sitemap text-white text-2xl"></i>
          </div>

          <h3 class="text-xl font-bold mb-3">
              प्रकल्प रचना
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              संवर्धन प्रकल्पाची रचना आणि कार्यपद्धती.
            </p>

            <span class="text-green-700 font-semibold">
              उघडा <i class="fas fa-arrow-right ml-1"></i>
            </span>

        </div>
      </a>


            <!-- Future Activities -->
            <a href="#sudhagad-future" class="block focus:outline-none group">
              <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
                
                <div class="w-16 h-16 bg-teal-700 rounded-full flex items-center justify-center mx-auto mb-6">
                  <i class="fas fa-seedling text-white text-2xl"></i>
                </div>

                <h3 class="text-xl font-bold mb-3">
                  आगामी उपक्रम
                </h3>

                <p class="text-sm text-gray-600 mb-6">
                  नियोजित संवर्धन आणि पुनर्संचयित उपक्रम.
                </p>

                <span class="text-green-700 font-semibold">
                  उघडा <i class="fas fa-arrow-right ml-1"></i>
                </span>

              </div>
      </a>


      <!-- Activities Performed -->
      <a href="#sudhagad-activities" class="block focus:outline-none group">
        <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-green-800 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-hands-helping text-white text-2xl"></i>
          </div>

          <h3 class="text-xl font-bold mb-3">
              आतापर्यंत केलेले उपक्रम
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              सुधागडावर आतापर्यंत पूर्ण करण्यात आलेली संवर्धन कामे.
            </p>

            <span class="text-green-700 font-semibold">
              उघडा <i class="fas fa-arrow-right ml-1"></i>
            </span>

        </div>
      </a>


      <!-- How Executed -->
      <a href="#sudhagad-execution" class="block focus:outline-none group">
        <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-emerald-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-cogs text-white text-2xl"></i>
          </div>

           <h3 class="text-xl font-bold mb-3">
            अंमलबजावणी पद्धत
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            प्रकल्पाची कार्यपद्धती आणि अंमलबजावणी प्रक्रिया.
          </p>

          <span class="text-green-700 font-semibold">
            उघडा <i class="fas fa-arrow-right ml-1"></i>
          </span>

        </div>
      </a>


      <!-- Contact Us -->
      <a href="#sudhagad-contacts" class="block focus:outline-none group">
          <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
            
            <div class="w-16 h-16 bg-green-900 rounded-full flex items-center justify-center mx-auto mb-6">
              <i class="fas fa-user-plus text-white text-2xl"></i>
            </div>

            <h3 class="text-xl font-bold mb-3">
                संपर्क / सहभागी व्हा
              </h3>

              <p class="text-sm text-gray-600 mb-6">
                सुधागड संवर्धन उपक्रमाचा भाग बना.
              </p>

              <span class="text-green-700 font-semibold">
                सहभागी व्हा <i class="fas fa-arrow-right ml-1"></i>
              </span>


          </div>
      </a>


    </div>
  </div>
</section>



</main>

<?php include './../includes/footer_marathi.php'; ?>

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