<?php
// Set page specific variables
$page_title = 'Project Sudhagad | Fort Conservation | TrekshitiZ';
$meta_description = 'Project Sudhagad – a fort conservation initiative by TreKshitiZ to preserve the historic Sudhagad fort near Pali.';
$meta_keywords = 'Project Sudhagad, Sudhagad Fort, Fort Conservation, TrekshitiZ';

// Include header
include './includes/header.php';
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
            About Project Sudhagad
        </h1>

        <!-- Subtitle -->
        <p class="text-xl md:text-2xl text-green-100 mb-6">
            A Fort Conservation Initiative by TreKshitiZ
        </p>

        <!-- Short Description -->
        <p class="text-lg text-green-100/90 leading-relaxed max-w-3xl mx-auto">
            Project Sudhagad is a long-term conservation effort to prevent further
            deterioration of the historic Sudhagad Fort near Pali.
            The initiative focuses on protecting existing structures,
            minimizing damage, and preserving this invaluable heritage
            for future generations.
        </p>

        <!-- CTA -->
        <div class="mt-10 flex flex-wrap justify-center gap-4">

            <a href="#sudhagad-work"
               class="inline-flex items-center px-8 py-3 rounded-full bg-white text-green-800 font-semibold hover:bg-green-100 transition">
                Work Done
            </a>

            <a href="#sudhagad-media"
               class="inline-flex items-center px-8 py-3 rounded-full border border-white/70 text-white hover:bg-white/10 transition">
                View Media
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
        Structure of Sudhagad Project
      </h2>
      <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
        The Sudhagad Project is divided into multiple focused activities
        aimed at conservation, exploration, and community support.
      </p>
    </div>

    <!-- Content Cards -->
    <div class="space-y-10">

      <!-- A. Conservation -->
      <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          A. Conservation
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Conservation of Sudhagad fort is the primary aim of this project.
          Various factors such as growth of plants on ramparts, flow of water,
          accumulation of soil, and human intervention are causing gradual
          disintegration of the fort structures.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          The primary goal is to minimize further deterioration of structures
          that are still intact. Restoration is acknowledged as part of
          conservation; however, due to limitations such as lack of expertise,
          funding constraints, and restrictions on altering historical sites,
          restoration is presently not included in the project scope.
        </p>
      </div>

      <!-- B. Exploration -->
      <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          B. Exploration
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Although Sudhagad was well maintained until India’s independence,
          much of its construction is now covered by jungle. Several structures
          are buried under soil or have become inaccessible due to landslides.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          To conserve maximum structures, it is essential to first identify
          what exists on the fort. Therefore, exploration forms an important
          part of the project. Alongside conservation activities, special
          exploration treks are conducted to study and document the fort.
        </p>
      </div>

      <!-- C. Supporting Activities -->
      <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          C. Supporting Activities
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          A variety of supportive activities such as plantation and study of
          flora and fauna can be undertaken during visits to Sudhagad.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          Given the importance of plantation in today’s environment, the
          Sudhagad Project also includes such activities, which can be easily
          combined with fort conservation treks.
        </p>
      </div>

      <!-- D. Social Support -->
      <div class="nature-card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold text-green-800 mb-4">
          D. Social Support
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Many forts in the Sahyadris are located in remote regions where local
          residents often lack access to employment, education, and medical
          facilities.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          Conservation efforts that ignore surrounding communities would be
          inhumane. Hence, social activities are an integral part of the
          Sudhagad Project. For example, a library was established in
          Pachchhapur — the base village of Sudhagad — in November 2005.
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
      Future Activities
    </h2>

    <!-- Content Card -->
    <div class="bg-white/10 backdrop-blur rounded-2xl p-8 md:p-10 inline-block">

      <p class="text-lg md:text-xl text-green-100 mb-6">
        For future activities related to the Sudhagad Fort Conservation Project,
        please contact:
      </p>

      <p class="text-2xl font-semibold text-white mb-2">
        Rahul Meshram
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
    <div class="text-center mb-16">
      <div class="nature-indicator"></div>
      <h2 class="text-3xl md:text-4xl font-bold text-green-700 dark:text-green-400 mb-4">
        Activities Performed
      </h2>
      <p class="text-lg text-gray-600 dark:text-gray-300">
        Conservation and exploration efforts carried out by TreKshitiZ at Sudhagad
      </p>
    </div>

    <!-- Activities Grid -->
    <div class="grid md:grid-cols-2 gap-8">

      <!-- Soil Removal -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold mb-3 text-green-800">
          Soil Removal from Maha Darwaza
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Heavy monsoons caused landslides that filled the Maha Darwaza with soil
          and boulders, making passage extremely difficult. Initial soil removal
          was carried out in the late 1980s by <strong>Nisargamitra, Panvel</strong>.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          TreKshitiZ has taken this effort forward, with over <strong>50% of the
          debris already removed</strong>. The goal is complete restoration of
          the entrance. Contributions were also made by
          <strong>Paliwala College</strong> and <strong>Girimitra Pratishthan</strong>.
        </p>
      </div>

      <!-- Water Tank Cleaning -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold mb-3 text-green-800">
          Water Tank Cleaning
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Sudhagad has around <strong>15 historic water tanks</strong>. TreKshitiZ
          identified three major tanks on the southern face for cleaning.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          Organizations like <strong>Durgmitra (Panvel)</strong> and
          <strong>Durgmitra (Dombivli)</strong> have selflessly supported and
          continued these initiatives.
        </p>
      </div>

      <!-- Rampart Cleaning -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold mb-3 text-green-800">
          Cleaning of Ramparts
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Many walls and ramparts near the Maha Darwaza and Chor Darwaza are still
          intact. However, shrubs and large trees growing on them cause severe
          damage due to root pressure.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          Regular removal of such vegetation is undertaken to prevent further
          structural deterioration.
        </p>
      </div>

      <!-- Plantation -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold mb-3 text-green-800">
          Plantation Activities
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Every tree planted or saved is invaluable. Keeping this in mind,
          plantation drives are conducted during group treks, especially at the
          end of the summer season.
        </p>
      </div>

      <!-- Library -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold mb-3 text-green-800">
          Library at Pachchhapur
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          A library was established at <strong>Pachchhapur</strong>, the base
          village of Sudhagad, through joint efforts of TreKshitiZ and
          <strong>Paliwala College</strong>.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          Space for the library was generously provided by
          <strong>Shri Ghosalkar</strong>, who runs a school in the village.
        </p>
      </div>

      <!-- Exploration -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold mb-3 text-green-800">
          Exploration Work
        </h3>
        <ul class="list-disc pl-6 space-y-2 text-gray-700 dark:text-gray-300">
          <li>Discovery of an almost unknown Buruj on the eastern side</li>
          <li>Access to Dhondase-side Buruj with double construction and carvings</li>
          <li>Exploration near Chor Darwaza despite landslide challenges</li>
          <li>Identification of four routes to the fort top</li>
          <li>Sudhagad Pradakshina – an easy and scenic trek</li>
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
        How is the Sudhagad Project Executed?
      </h2>
      <p class="text-lg text-gray-600 dark:text-gray-300">
        Organized planning, collective effort, and community support
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
          Co-ordination Team
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          The Sudhagad Project is an official initiative undertaken by the
          <strong>Kshitiz Group</strong>. To ensure effective execution, a
          dedicated <strong>Co-ordination Team</strong> was formed in
          September 2005.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          This team meets regularly and handles planning, organization, and
          coordination of activities. Any individual — whether a Kshitiz member
          or not — can join, provided they are willing to contribute on a
          mid- or long-term basis.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          While planning is centralized, actual execution depends on
          participation from a large number of volunteers during activity treks.
        </p>
      </div>

      <!-- Financial Support -->
      <div class="nature-card rounded-2xl p-8">
        <div class="w-14 h-14 bg-emerald-700 rounded-full flex items-center justify-center mb-5">
          <i class="fas fa-hand-holding-heart text-xl text-white"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-green-900">
          Financial Support
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Fort conservation requires financial resources. In the initial phase,
          interested individuals contributed personally to execute tasks such as
          employing labor for soil removal at the Maha Darwaza.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          As the Kshitiz Group is now a <strong>registered NGO</strong>,
          individuals and organizations interested in fort conservation can
          donate directly to the group.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          All contributions are utilized specifically for conservation-related
          activities at Sudhagad.
        </p>
      </div>

      <!-- Local Support -->
      <div class="nature-card rounded-2xl p-8">
        <div class="w-14 h-14 bg-lime-700 rounded-full flex items-center justify-center mb-5">
          <i class="fas fa-handshake text-xl text-white"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-green-900">
          Local Support
        </h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
          Financial backing alone is not enough. A conservation project can
          succeed only with strong <strong>local support</strong>.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          The Sudhagad Project has been fortunate to receive consistent support
          from local residents. In particular,
          <strong>Shri Puranik</strong>, Vice-Principal of
          <strong>J. N. Paliwala College, Pali</strong>, and his students have been
          involved since the project’s early days.
        </p>
        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
          Without such local participation, continuation of the project would
          be unthinkable.
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
        Contacts
      </h2>
      <p class="text-lg text-gray-600 dark:text-gray-300">
        Get in touch with the people behind Project Sudhagad
      </p>
    </div>

    <!-- Contact Cards -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Sudhir Puranik -->
      <div class="nature-card rounded-2xl p-8">
        <h3 class="text-xl font-bold text-green-900 mb-2">
          Shree Sudhir Puranik
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
          Professor of Physics<br>
          J. N. Paliwala College, Pali
        </p>
        <p class="text-gray-700 dark:text-gray-300">
          📞 Tel: 02142 242033<br>
          <span class="text-sm">(From Mumbai dial 952142)</span>
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
          Rahul Meshram
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
          Member – TreKshitiz Sanstha
        </p>
        <p class="text-gray-700 dark:text-gray-300">
          📱 Mob: +91 99876 47607
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
          Prasad Nikte
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
          Member – TreKshitiz Sanstha
        </p>
        <p class="text-gray-700 dark:text-gray-300">
          📞 Tel: 022 2544 1072<br>
          📱 Mob: 098201 83101
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
        You can always write to us at
      </p>
      <p class="text-xl font-semibold">
        ✉️ <a href="mailto:harshal.r.mahajan@gmail.com"
              class="text-green-700 hover:underline">
          harshal.r.mahajan@gmail.com
        </a>
      </p>

      <p class="mt-6 text-gray-600 dark:text-gray-400">
        <strong>TreKshitiz Sanstha</strong><br>
        Dombivli
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
          Project Sudhagad
        </span>
      </h2>
      <p class="text-xl text-gray-600 dark:text-gray-300">
        Conservation initiative to protect and preserve Sudhagad Fort
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
            Project Sudhagad
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            Overview of the Sudhagad fort conservation initiative.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
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
            Project Structure
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            How the conservation project is structured and organized.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
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
                  Future Activities
                </h3>

                <p class="text-sm text-gray-600 mb-6">
                  Planned conservation and restoration activities.
                </p>

                <span class="text-green-700 font-semibold">
                  Open <i class="fas fa-arrow-right ml-1"></i>
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
            Activities Performed
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            Conservation work completed so far at Sudhagad.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
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
            How Executed
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            Methodology and execution process of the project.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
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
              Contact / Join
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              Be part of the Sudhagad conservation initiative.
            </p>

            <span class="text-green-700 font-semibold">
              Join <i class="fas fa-arrow-right ml-1"></i>
            </span>

          </div>
      </a>


    </div>
  </div>
</section>



</main>

<?php include './includes/footer.php'; ?>

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