
    <!-- Critical Scripts - Load with defer -->
    <script src="assets/vendors/jquery/jquery-3.7.0.min.js" defer></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js" defer></script>
    
    <!-- Non-critical Scripts - Load after page load for better performance -->
    <script>
    // Load non-critical scripts after page load
    window.addEventListener('load', function() {
        // Create script elements dynamically
        const scripts = [
            'assets/vendors/bootstrap-select/bootstrap-select.min.js',
            'assets/vendors/jarallax/jarallax.min.js',
            'assets/vendors/jquery-ui/jquery-ui.js',
            'assets/vendors/date-time-picker/jquery.datetimepicker.min.js',
            'assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js',
            'assets/vendors/jquery-appear/jquery.appear.min.js',
            'assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js',
            'assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js',
            'assets/vendors/jquery-validate/jquery.validate.min.js',
            'assets/vendors/nouislider/nouislider.min.js',
            'assets/vendors/tiny-slider/tiny-slider.js',
            'assets/vendors/wnumb/wNumb.min.js',
            'assets/vendors/owl-carousel/js/owl.carousel.min.js',
            'assets/vendors/aos/aos.js',
            'assets/vendors/imagesloaded/imagesloaded.min.js',
            'assets/vendors/isotope/isotope.js',
            'assets/vendors/slick/slick.min.js',
            'assets/vendors/countdown/countdown.min.js',
            'assets/vendors/jquery-circleType/jquery.circleType.js',
            'assets/vendors/jquery-lettering/jquery.lettering.min.js',
            'assets/vendors/gsap/gsap.js',
            'assets/vendors/gsap/scroll-smoother.js',
            'assets/vendors/gsap/scroll-trigger.js',
            'assets/vendors/gsap/scroll-to-plugin.js',
            'assets/vendors/gsap/split-text.js',
            'assets/vendors/gsap/gsap-lotech.js',
            'assets/js/lotech.js'
        ];
        
        scripts.forEach(function(src) {
            const script = document.createElement('script');
            script.src = src;
            script.async = true;
            document.body.appendChild(script);
        });
    });
    </script>
</body>

</html>