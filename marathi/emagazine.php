<?php
$page_title = 'Kshitizians eMagazine | TreKshitiZ';
$meta_description = 'Read and download Kshitizians eMagazine by TreKshitiZ. Explore trekking stories, articles, poetry, and Sahyadri experiences.';
require_once './../config/database.php';
include './../includes/header_marathi.php';
?>

<main id="main-content">

<!-- ================= HERO / INTRO ================= -->
<section class="py-20 bg-gradient-to-r from-primary to-secondary text-white text-center">
    <h1 class="text-5xl font-bold mb-6 mt-4">
        क्षितिजियन्स <span class="text-yellow-300">ई-मॅगझिन</span>
    </h1>

    <p class="text-2xl max-w-3xl mx-auto opacity-90 mb-4">
        ट्रेकशितीज सदस्यांनी तयार केलेले एक डिजिटल मासिक.
    </p>

    <p class="text-xl max-w-3xl mx-auto opacity-90 mb-8">
        ट्रेकिंग अनुभव, सह्याद्रीतील गड-किल्ल्यांच्या कथा, कविता, लेख आणि अविस्मरणीय आठवणी यांचा संग्रह.
    </p>

    <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
        <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
            ३५०+ गड-किल्ले
        </span>

        <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
            १०००+ ट्रेकर्स
        </span>

        <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
            सन २००० पासून
        </span>
    </div>
</section>




    <!-- Magazine Viewer -->
<!-- Magazine Viewer -->
<section class="container mx-auto max-w-6xl px-4 py-10">
    <div class="bg-cream-warm border border-mountain rounded-lg p-6">

        <!-- Magazine Title -->
        <h2 class="text-2xl font-semibold text-primary text-center mb-4">
            क्षितिजियन्स – जानेवारी २०२१ ई-मॅगझिन
        </h2>

        <!-- Download Button -->
        <div class="text-center mb-6">
            <a href="https://www.trekshitiz.com/emagazine/pdfs/Kshitizians Jan 2021.pdf"
               target="_blank"
               class="inline-block bg-primary text-cream-light px-6 py-3 rounded-full font-semibold
                      hover:bg-secondary transition-colors duration-200">
                <i class="fas fa-download mr-2"></i>
                ई-मॅगझिन डाउनलोड करा (PDF)
            </a>
        </div>

        <!-- PDF Embed -->
        <div class="w-full overflow-hidden rounded-md border border-cream-dark">
            <iframe
                src="https://www.trekshitiz.com/emagazine/pdfs/Kshitizians Jan 2021.pdf"
                class="w-full"
                style="height: 80vh;"
                loading="lazy">
            </iframe>
        </div>

        <!-- Download (Bottom CTA) -->
        <div class="text-center mt-6">
            <a href="https://www.trekshitiz.com/emagazine/pdfs/Kshitizians Jan 2021.pdf"
               target="_blank"
               class="text-primary font-semibold hover:underline">
                क्षितिजियन्स जानेवारी २०२१ PDF डाउनलोड करा
            </a>
        </div>

    </div>
</section>


    <!-- Future Issues Section (Optional / Scalable) -->
<section class="container mx-auto max-w-5xl px-4 py-12">
    <h3 class="text-xl font-semibold text-primary mb-4">
        आणखी अंक लवकरच येत आहेत
    </h3>
    <p class="text-earth">
        क्षितिजियन्स ई-मॅगझिनच्या आगामी अंकांसाठी तयार रहा — ज्यामध्ये ट्रेक कथा,
        किल्ले, कविता आणि सह्याद्रीतील रोमांचक अनुभव वाचायला मिळतील.
    </p>
</section>


</main>

<?php include './../includes/footer_marathi.php'; ?>
