    <footer>
        <div class="container">
            <div style="margin-bottom: 2rem;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" style="justify-content: center;">
                    TOCTOC<span>.</span>
                </a>
            </div>
            <p>&copy; <?php echo date('Y'); ?> TocToc Marketing. Based in the Cayman Islands.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('[data-animate]').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>
