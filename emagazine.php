<?php
$page_title = 'Kshitizians eMagazine | TreKshitiZ';
$meta_description = 'Read and download Kshitizians eMagazine by TreKshitiZ. Explore trekking stories, articles, poetry, and Sahyadri experiences.';
include './includes/header.php';
?>

<main id="main-content">

<!-- ================= HERO / INTRO ================= -->
<section class="py-20 bg-gradient-to-r from-primary to-secondary text-white text-center">
    <h1 class="text-5xl font-bold mb-6 mt-4">Kshitizians <span class="text-yellow-300">eMagazine </span></h1>
    <p class="text-2xl max-w-3xl mx-auto opacity-90 mb-4">
        A digital magazine by TreKshitiZ members.
    </p>
    <p class="text-xl max-w-3xl mx-auto opacity-90 mb-8">
        featuring trekking experiences,Sahyadri stories, poetry, articles, and memories.
    </p>
    <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-mountain mr-2"></i>
                        350+ Forts
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-users mr-2"></i>
                        1000+ Trekkers
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-calendar mr-2"></i>
                        Since 2000
                    </span>
    </div>
    

</section>




    <!-- Magazine Viewer -->
    <section class="container mx-auto max-w-6xl px-4 py-10">
        <div class="bg-cream-warm border border-mountain rounded-lg p-6">

            <!-- Magazine Title -->
            <h2 class="text-2xl font-semibold text-primary text-center mb-4">
                Kshitizians – January 2021
            </h2>

            <!-- Download Button -->
            <div class="text-center mb-6">
                <a href="https://www.trekshitiz.com/emagazine/pdfs/Kshitizians Jan 2021.pdf"
                   target="_blank"
                   class="inline-block bg-primary text-cream-light px-6 py-3 rounded-full font-semibold
                          hover:bg-secondary transition-colors duration-200">
                    <i class="fas fa-download mr-2"></i>
                    Download eMagazine (PDF)
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
                    Download Kshitizians – January 2021 (PDF)
                </a>
            </div>

        </div>
    </section>

    <!-- Future Issues Section (Optional / Scalable) -->
    <section class="container mx-auto max-w-5xl px-4 py-12">
        <h3 class="text-xl font-semibold text-primary mb-4">
            Upcoming Editions
        </h3>
        <p class="text-earth">
            Stay tuned for upcoming editions of Kshitizians eMagazine featuring
            more trek stories, forts, poetry, and Sahyadri experiences.
        </p>
    </section>

</main>

<?php include './includes/footer.php'; ?>
