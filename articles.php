<?php
$page_title = 'Trekking Experiences & Articles | TreKshitiZ';
$meta_description = 'Read trekking experiences and articles by TreKshitiZ members in English and Marathi. Real trek stories, fort journeys, and Sahyadri memories.';
include './includes/header.php';
?>
<style>

.article-link {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #FAF0E6; /* cream-warm */
    padding: 12px 16px;
    border-radius: 6px;
    border-left: 4px solid #8B4513; /* primary */
    color: #8B4513;
    font-weight: 500;
    text-decoration: none;
}

.article-link:hover {
    background: #FFF8DC;
}

.pdf-tag {
    background: #D2691E; /* secondary */
    color: #FFFEF7;
    font-size: 12px;
    padding: 2px 8px;
    border-radius: 4px;
}


</style>

<main id="main-content">

<!-- ================= HERO / INTRO ================= -->
<section class="py-20 bg-gradient-to-r from-primary to-secondary text-white text-center">
    <h1 class="text-5xl font-bold mb-4">Trekking Experiences & Articles</h1>
    <p class="text-xl max-w-3xl mx-auto opacity-90">
        Real trekking stories and experiences shared by TreKshitiZ members — from Sahyadri forts to unforgettable journeys.
    </p>
</section>

    <!-- English Articles -->
    <section class="container mx-auto max-w-5xl px-4 py-10">
        <h2 class="text-2xl font-semibold text-primary mb-6 border-b border-mountain pb-2">
            English Articles
        </h2>

        <ul class="space-y-3">
            <li>
                <a href="./articles/Malshej visit.pdf" target="_blank"
                   class="article-link">
                    Malshej Visit – Abhijit Avalaskar
                    <span class="pdf-tag">PDF</span>
                </a>
            </li>

            <li>
                <a href="./articles/Mungi Tungi.html" class="article-link">
                    Mangi Tungi – Jitendra Gupta
                </a>
            </li>

            <li>
                <a href="./articles/cyclictrek.htm" class="article-link">
                    Cycling Trek – Sameer Kelkar
                </a>
            </li>

            <li>
                <a href="./articles/panhalgad_to_vishalgad__kaushal.htm" class="article-link">
                    Panhala to Vishalgad – Kaushal
                </a>
            </li>

            <li>
                <a href="./articles/supriya.htm" class="article-link">
                    A Wonderful Experience – Supriya Bhole
                </a>
            </li>

            <li>
                <a href="./articles/prasad_nikte.asp" class="article-link">
                    There is KshitiZ on the Horizon – Prasad Nikte
                </a>
            </li>

            <li>
                <a href="./articles/Peth_harshal.htm" class="article-link">
                    Peth – A Hilarious Account – Harshal Mahajan
                </a>
            </li>

            <li>
                <a href="./articles/Alang_madan.htm" class="article-link">
                    Trek to Alang–Madan – Harshal Mahajan
                </a>
            </li>

            <li>
                <a href="./articles/Party in a Avian World.pdf" target="_blank"
                   class="article-link">
                    Party in an Avian World – Abhijit Avalaskar
                    <span class="pdf-tag">PDF</span>
                </a>
            </li>

            <li>
                <a href="./articles/Thrill_karnala.htm" class="article-link">
                    Thrill at Karnala – Vinit Vartak
                </a>
            </li>
        </ul>
    </section>

    <!-- Marathi Articles -->
    <section class="container mx-auto max-w-5xl px-4 py-10">
        <h2 class="text-2xl font-semibold text-primary mb-6 border-b border-mountain pb-2 font-devanagari">
            मराठी लेख
        </h2>

        <ul class="space-y-3 font-devanagari text-lg">
            <li>
                <a href="./articles/Ankaai-Tankaai - Swatantrata Sangram Trek.pdf"
                   target="_blank"
                   class="article-link">
                    अंकाई–टंकाई (स्वातंत्र्य संग्राम ट्रेक) – निरंजन सराडे
                    <span class="pdf-tag">PDF</span>
                </a>
            </li>

            <li>
                <a href="./articles/niranjan_kavita.htm" class="article-link">
                    ५ वर्षे क्षितिज – कविता – निरंजन सराडे
                </a>
            </li>

            <li>
                <a href="./articles/vasota-nageshwar.pdf" target="_blank"
                   class="article-link">
                    वासोटा–नागेश्वर – निरंजन सराडे
                    <span class="pdf-tag">PDF</span>
                </a>
            </li>

            <li>
                <a href="./articles/fansad - korlai.pdf" target="_blank"
                   class="article-link">
                    फणसाड–कोर्लई – निरंजन सराडे
                    <span class="pdf-tag">PDF</span>
                </a>
            </li>

            <li>
                <a href="./articles/loh-vis.htm" class="article-link">
                    लोहगड–विसापूर : एक थरारक ट्रेक
                </a>
            </li>

            <li>
                <a href="./articles/Rajmachi.htm" class="article-link">
                    राजमाची – क्षितिज ग्रुप
                </a>
            </li>
        </ul>
    </section>

</main>

<?php include './includes/footer.php'; ?>
