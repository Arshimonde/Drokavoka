    
    <!-- NOTE: all styles are just temprorary -->
    
    <footer class="position-absolute w-100" style="bottom:0">
        <!-- FOOTER CONTENT HERE !!!!!!!!!!! -->
        <?php if(get_current_page() != "dashboard" && get_current_page() != "account"): ?>
        <div class="bg-dark text-center mb-0">
            <h5 class="mb-0">THIS FOOTER</h5>
        </div>
        <?php endif; ?>
    </footer>
</body>
</html>