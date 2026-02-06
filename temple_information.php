<?php
// SEO
$page_title = 'Temples in Maharashtra | Trekshitz';
$meta_description = 'Complete information about famous temples in Maharashtra including deity, history, importance and architecture.';
$meta_keywords = 'temples in maharashtra, indian temples, hindu temples, pilgrimage';

require_once './config/database.php';
include './includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch temples with front image
$query = "
    SELECT t.*, p.PIC_NAME
    FROM ei_tbltempleinfo t
    LEFT JOIN pm_tbltemplephotos p
        ON t.TempleName = p.TempleName AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY t.TempleName ASC
";
$result = $conn->query($query);

$temples = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $temples[] = $row;
    }
}

// Slug helper
function templeSlug($name) {
    return strtolower(str_replace(' ', '-', trim($name)));
}
?>

<style>
/* Enhanced Fort-specific styles */
.fort-card {
    background: white;
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.dark .fort-card {
    background: #1f2937;
    border-color: #374151;
}

.fort-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: var(--accent-color);
}

.difficulty-badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 1rem;
    font-weight: 600;
}

.difficulty-easy { background-color: #10b981; color: white; }
.difficulty-medium { background-color: #f59e0b; color: white; }
.difficulty-hard { background-color: #ef4444; color: white; }
.difficulty-extreme { background-color: #8b5cf6; color: white; }

.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin-bottom: 2rem;
}

.alphabet-btn {
    padding: 0.5rem 1rem;
    border: 2px solid var(--primary-color);
    background: transparent;
    color: var(--primary-color);
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 1.1rem;
    min-width: 45px;
    text-align: center;
}

.alphabet-btn:hover,
.alphabet-btn.active {
    background: var(--primary-color);
    color: white;
    transform: scale(1.05);
}

.search-filter-card {
    background: white;
    border: 1px solid #e5e7eb;
}

.dark .search-filter-card {
    background: #1f2937;
    border-color: #374151;
}

@media (max-width: 768px) {
    .alphabet-filter {
        gap: 0.25rem;
    }
    
    .alphabet-btn {
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        min-width: 40px;
    }
}
</style>
<main id="main-content">

<!-- HERO -->
<section class="relative py-24 bg-gradient-to-r from-orange-700 to-red-600 text-white overflow-hidden">
    <div class="container mx-auto px-6 relative z-10 text-center">

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Temples of <span class="text-accent">Maharashtra</span>
        </h1>

        <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto">
            Discover ancient temples, sacred architecture, and spiritual heritage across Maharashtra
        </p>

    </div>

    <!-- subtle pattern -->
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,white_1px,transparent_1px)] bg-[length:40px_40px]"></div>
    </div>
</section>

<!-- LISTING -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4">

<?php if (count($temples) > 0): ?>
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

<?php foreach ($temples as $temple): ?>
<a href="./temple/index.php?slug=<?php echo templeSlug($temple['TempleName']); ?>"
   class="group h-full">

<article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col">

    <!-- IMAGE -->
    <div class="relative h-60 bg-gray-200 overflow-hidden">
        <img
            src="../assets/images/Photos/Temple/<?php echo htmlspecialchars($temple['PIC_NAME'] ?? 'default-temple.jpg'); ?>"
            alt="<?php echo htmlspecialchars($temple['TempleName']); ?>"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >

        <?php if (!empty($temple['MainDeity'])): ?>
        <span class="absolute bottom-3 left-3 bg-black/60 text-white text-xs px-3 py-1 rounded-full backdrop-blur">
            <?php echo htmlspecialchars($temple['MainDeity']); ?>
        </span>
        <?php endif; ?>
    </div>

    <!-- CONTENT -->
    <div class="p-6 flex flex-col flex-1">

        <!-- TEXT CONTENT -->
        <div>
            <h3 class="text-xl font-bold text-gray-800 dark:text-white leading-snug mb-2">
                <?php echo htmlspecialchars($temple['TempleName']); ?>
            </h3>

            <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center">
                <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                <?php echo htmlspecialchars($temple['District']); ?>
            </p>
        </div>

        <!-- CTA ALWAYS AT BOTTOM -->
        <div class="mt-auto pt-6">
            <span class="block text-center w-full bg-primary hover:bg-secondary text-white py-2.5 rounded-lg font-semibold transition-colors">
                View Details
            </span>
        </div>

    </div>

</article>
</a>
<?php endforeach; ?>

</div>

<?php else: ?>
<p class="text-center text-gray-600 dark:text-gray-300 text-lg">
    Temple information is currently unavailable.
</p>
<?php endif; ?>

</div>
</section>

</main>
<script>
    const style = document.createElement('style');
style.textContent = `
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
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
    
    .suggestion-item.highlighted {
        background-color: var(--accent-color) !important;
        color: white !important;
    }
    
    .suggestion-item.highlighted mark {
        background-color: rgba(255, 255, 255, 0.3);
        color: white;
    }
    
    .suggestion-item mark {
        background-color: rgba(255, 255, 0, 0.3);
        color: inherit;
        padding: 0;
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
    
    /* Smooth transitions for filter changes */
    .searchable-fort {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    
    .searchable-fort.hidden {
        opacity: 0;
        transform: scale(0.95);
    }
    
    /* Enhanced alphabet buttons */
    .alphabet-btn.opacity-30 {
        background-color: #f3f4f6;
        border-color: #d1d5db;
    }
    
    .dark .alphabet-btn.opacity-30 {
        background-color: #374151;
        border-color: #4b5563;
    }
`;
document.head.appendChild(style);
    </script>
<?php include './includes/footer.php'; ?>