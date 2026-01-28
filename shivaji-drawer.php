<!-- Mobile Drawer -->
<div id="shivajiDrawer" class="fixed inset-0 z-50 hidden">

    <!-- Overlay -->
    <div id="shivajiOverlay"
         class="absolute inset-0 bg-black/50 backdrop-blur-sm">
    </div>

    <!-- Drawer Panel -->
    <aside class="absolute left-0 top-0 h-full w-72 bg-cream-warm shadow-xl p-5 overflow-y-auto">
        
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-primary font-devanagari">
                शिवाजी महाराज
            </h3>

            <button id="shivajiCloseBtn" class="text-2xl text-primary">&times;</button>
        </div>

        <!-- SAME LINKS AS SIDEBAR -->
        <?php include 'shivaji-sidebar-links.php'; ?>

    </aside>
</div>
