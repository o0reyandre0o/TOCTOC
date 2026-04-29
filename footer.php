    <section class="section_footer">
        <div class="padding-section-medium"></div>
        <div class="padding-global">
            <div class="container-medium">
                <div class="footer_layout">
                    <div class="footer_left">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="w-inline-block">
                            <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/690cf081d6ebd1dd46bb9f80_footer-logo.svg" loading="lazy" alt="" class="footer_logo"/>
                        </a>
                        <div>
                            <div>Subscribe to our newsletter</div>
                            <div class="spacer-xlarge"></div>
                            <div class="footer_form-block w-form">
                                <form id="email-form" name="email-form" method="get">
                                    <div class="footer_form">
                                        <input class="footer_field w-input" maxlength="256" name="Email" placeholder="Enter your email" type="email" id="Email"/>
                                        <div class="button_component"><div>Get Started</div></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="footer_right">
                        <div class="footer_column">
                            <div class="text-xl text-weight-medium">Pages</div>
                            <div class="footer_links">
                                <a href="#" class="footer_link w-inline-block"><div class="clip"><div class="link">Home V.1</div><div class="link-line"></div></div></a>
                                <a href="#" class="footer_link w-inline-block"><div class="clip"><div class="link">Home V.2</div><div class="link-line"></div></div></a>
                                <a href="#" class="footer_link w-inline-block"><div class="clip"><div class="link">Home V.3</div><div class="link-line"></div></div></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spacer"><div STYLE="height:7.5rem" class="spacer-desktop"></div></div>
                <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/690cf6fe1054e4e9ea5c7424_Catalis.svg" loading="lazy" alt="" class="footer_visual"/>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if GSAP is loaded
            if (typeof gsap !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);

                // Animation for badges and headings
                const animateElements = document.querySelectorAll('[animation="heading"], [animation="description"], [animation="large-heading"], [animation="badge"], [animation="card"]');
                
                animateElements.forEach((el) => {
                    gsap.set(el, { 
                        visibility: 'visible', 
                        opacity: 0, 
                        y: 30 
                    });

                    gsap.to(el, {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        ease: "power3.out",
                        scrollTrigger: {
                            trigger: el,
                            start: "top 85%",
                            toggleActions: "play none none none"
                        }
                    });
                });

                // Special animation for growth emphasis
                const growthElements = document.querySelectorAll('[animation="growth"]');
                growthElements.forEach((el) => {
                    gsap.fromTo(el, { scaleX: 0 }, {
                        scaleX: 1,
                        duration: 1.5,
                        ease: "power4.out",
                        scrollTrigger: {
                            trigger: el,
                            start: "top 90%"
                        }
                    });
                });
            }
        });
    </script>
</div><!-- .page-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
