<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <?php
    // Define page-specific meta data
    $page_name = basename($_SERVER['PHP_SELF'], '.php');
    $page_meta = [
        'index' => [
            'title' => 'IT Services & Solutions | Tech Scalify',
            'description' => 'Tech Scalify delivers scalable IT services, web development, cloud solutions, and digital transformation for businesses. Expert IT consulting and support.',
            'keywords' => 'IT services, web development, cloud solutions, IT consulting, digital transformation, Tech Scalify'
        ],
        'about' => [
            'title' => 'About Us | Tech Scalify - IT Services Company',
            'description' => 'Learn about Tech Scalify, a leading IT services company providing scalable digital solutions, web development, and IT consulting services.',
            'keywords' => 'about tech scalify, IT services company, web development company'
        ],
        'contact' => [
            'title' => 'Contact Us | Tech Scalify - Get IT Solutions',
            'description' => 'Contact Tech Scalify for IT services, web development, and digital solutions. Get a free quote today.',
            'keywords' => 'contact tech scalify, IT services contact'
        ],
        'service-web-development' => [
            'title' => 'Web Development Services | Tech Scalify',
            'description' => 'Professional web development services by Tech Scalify. We build fast, responsive, and SEO-optimized websites using modern technologies.',
            'keywords' => 'web development, website development, responsive web design'
        ],
        'service-app-development' => [
            'title' => 'App Development Services | Tech Scalify',
            'description' => 'Custom mobile app development for iOS and Android. Tech Scalify creates scalable mobile applications for your business.',
            'keywords' => 'app development, mobile app development, iOS Android apps'
        ],
        'service-software-development' => [
            'title' => 'Software Development Services | Tech Scalify',
            'description' => 'Custom software development solutions designed to streamline operations and support long-term business growth.',
            'keywords' => 'software development, custom software, enterprise software'
        ],
        'service-it-consulting' => [
            'title' => 'IT Strategy Consulting | Tech Scalify',
            'description' => 'Expert IT strategy consulting to align technology with business goals, improve scalability, and enable digital transformation.',
            'keywords' => 'IT consulting, IT strategy, technology consulting'
        ],
        'service-search-optimization' => [
            'title' => 'SEO & Digital Marketing | Tech Scalify',
            'description' => 'Data-driven SEO and digital marketing strategies that increase website traffic, improve search rankings, and generate high-quality leads.',
            'keywords' => 'SEO services, digital marketing, search engine optimization'
        ],
        'service-technical-support' => [
            'title' => 'Technical Support & Managed IT | Tech Scalify',
            'description' => 'Reliable 24/7 technical support and managed IT services to ensure system stability, security, and uninterrupted business operations.',
            'keywords' => 'technical support, managed IT services, IT support'
        ]
    ];
    
    $meta = $page_meta[$page_name] ?? $page_meta['index'];
    $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $base_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']));
    $current_url = rtrim($site_url . $base_path . '/' . basename($_SERVER['PHP_SELF']), '/');
    $og_image = $site_url . '/ITServices/assets/images/resources/about-1-1.jpg';
    ?>
    
    <title><?php echo htmlspecialchars($meta['title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($meta['keywords']); ?>" />
    <link rel="canonical" href="<?php echo htmlspecialchars($current_url); ?>" />
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo htmlspecialchars($current_url); ?>" />
    <meta property="og:title" content="<?php echo htmlspecialchars($meta['title']); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($meta['description']); ?>" />
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>" />
    <meta property="og:site_name" content="Tech Scalify" />
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo htmlspecialchars($current_url); ?>" />
    <meta name="twitter:title" content="<?php echo htmlspecialchars($meta['title']); ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($meta['description']); ?>" />
    <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>" />
    
    <!-- Favicons -->
    <base href="/ITServices/">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/techscalify.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/techscalify.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    
    <!-- DNS Prefetch & Preconnect -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    <!-- Fonts with display swap -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Yantramanav:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Critical CSS - Load immediately -->
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lotech.css?v=2" />
    
    <!-- Non-critical CSS - Load asynchronously -->
    <link rel="preload" href="assets/vendors/bootstrap-select/bootstrap-select.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css"></noscript>
    
    <link rel="preload" href="assets/vendors/animate/animate.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/animate/animate.min.css"></noscript>
    
    <link rel="preload" href="assets/vendors/fontawesome/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css"></noscript>
    
    <link rel="preload" href="assets/vendors/jquery-ui/jquery-ui.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css"></noscript>
    
    <link rel="preload" href="assets/vendors/date-time-picker/jquery.datetimepicker.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/date-time-picker/jquery.datetimepicker.min.css"></noscript>
    
    <link rel="preload" href="assets/vendors/jarallax/jarallax.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css"></noscript>
    
    <link rel="preload" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css"></noscript>
    
    <link rel="preload" href="assets/vendors/nouislider/nouislider.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css"></noscript>
    
    <link rel="preload" href="assets/vendors/nouislider/nouislider.pips.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css"></noscript>
    
    <link rel="preload" href="assets/vendors/tiny-slider/tiny-slider.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.css"></noscript>
    
    <link rel="preload" href="assets/vendors/lotech-icons/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/lotech-icons/style.css"></noscript>
    
    <link rel="preload" href="assets/vendors/slick/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/slick/slick.css"></noscript>
    
    <link rel="preload" href="assets/vendors/aos/aos.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/aos/aos.css"></noscript>
    
    <link rel="preload" href="assets/vendors/owl-carousel/css/owl.carousel.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css"></noscript>
    
    <link rel="preload" href="assets/vendors/owl-carousel/css/owl.theme.default.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.min.css"></noscript>
    
    <!-- Structured Data - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Tech Scalify",
        "url": "<?php echo $site_url; ?>/ITServices",
        "logo": "<?php echo $site_url; ?>/ITServices/img/tech_scalify_lg.png",
        "description": "Tech Scalify delivers scalable IT services, web development, cloud solutions, and digital transformation for businesses.",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Raipur",
            "addressRegion": "Chhattisgarh",
            "addressCountry": "IN"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-871-787-2372",
            "contactType": "customer service",
            "email": "techscalify.com"
        },
        "sameAs": [
            "https://facebook.com/",
            "https://x.com/",
            "https://instagram.com/",
            "https://www.youtube.com/"
        ]
    }
    </script>
    
    <!-- LoadCSS polyfill for async CSS -->
    <script>
    /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
    (function(w){"use strict";var loadCSS=function(href,before,media){var doc=w.document;var ss=doc.createElement("link");var ref;if(before){ref=before}else{var refs=(doc.body||doc.getElementsByTagName("head")[0]).childNodes;ref=refs[refs.length-1]}var sheets=doc.styleSheets;ss.rel="stylesheet";ss.href=href;ss.media="only x";function ready(cb){if(doc.body){return cb()}setTimeout(function(){ready(cb)})}ready(function(){ref.parentNode.insertBefore(ss,before?ref:ref.nextSibling)});var onloadcssdefined=function(cb){var resolvedHref=ss.href;var i=sheets.length;while(i--){if(sheets[i].href===resolvedHref){return cb()}}setTimeout(function(){onloadcssdefined(cb)})};ss.onloadcssdefined=onloadcssdefined;onloadcssdefined(function(){ss.media=media||"all"});return ss};if(typeof exports!=="undefined"){exports.loadCSS=loadCSS}else{w.loadCSS=loadCSS}}(typeof global!=="undefined"?global:this));
    </script>
</head>
<style>
/* ============================= */
/* EQUAL HEIGHT SERVICE CARDS */
/* ============================= */

/* Make owl stage flex */
.service-one__carousel .owl-stage {
    display: flex;
}

/* Make each owl item stretch */
.service-one__carousel .owl-item {
    display: flex;
    height: auto;
}

/* Make item wrapper full width */
.service-one__carousel .item {
    display: flex;
    width: 100%;
}

/* Make card full height */
.service-one__item {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 30px;
    background: #ffffff;
}

/* Push button to bottom */
.service-one__item__btn {
    margin-top: auto;
}
</style>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(img/techscalify.png);"></div>
    </div>

    <div class="page-wrapper">
        <div class="topbar">
            <div class="container">
                <div class="topbar__inner">
                    <a href="#" class="topbar__toggler main-header__toggler"><i><span></span><span></span><span></span></i>Menu</a>
                    <div class="topbar__logo">
                        <a href="index.php">
                            <img src="img/tech_scalify_lg.png" alt="Tech Scalify Logo" width="133" height="40" loading="eager">
                        </a>
                    </div>
                    <div class="topbar__social">
                        <p class="topbar__social__text">Follow Us</p>
                        <a href="https://facebook.com/">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://x.com/">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://instagram.com/">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="https://www.youtube.com/">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <header class="main-header sticky-header sticky-header--normal">
            <div class="container">
                <div class="main-header__inner">
                    <nav class="main-header__nav main-menu">
                        <ul class="main-menu__list">
                            <li>
                                <a href="index.php" data-title="Home"><span>Home</span></a>
                                
                            </li>
                            <li>
                                <a href="about.php" data-title="About"><span>About</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-title="Services"><span>Services</span></a>
                                <ul>
                                    <li><a href="service-web-development.php">Web Development</a></li>
                                    <li><a href="service-app-development.php">App Development</a></li>
                                    <li><a href="service-software-development.php">Software Development</a></li>
                                    <li><a href="service-it-consulting.php">IT Strategy Consulting</a></li>
                                    <li><a href="service-search-optimization.php">Search Growth Optimization</a></li>
                                    <li><a href="service-social-media-marketing.php">Social Media Marketing</a></li>
                                    <li><a href="service-technical-support.php">Technical Support</a></li>
                                    <!-- <li><a href="service-d-management.html">Cloud Management</a></li> -->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-title="Case Study"><span>Case</span></a>
                                <!-- <ul class="sub-menu">
                                    <li class="dropdown">
                                        <a href="#">Case Study grid 01</a>
                                        <ul class="sub-menu">
                                            <li><a href="case-study-grid.html">No sidebar</a></li>
                                            <li><a href="case-study-grid-left.html">Left sidebar</a></li>
                                            <li><a href="case-study-grid-right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Case Study grid 02</a>
                                        <ul class="sub-menu">
                                            <li><a href="case-study-grid-2.html">No sidebar</a></li>
                                            <li><a href="case-study-grid-2-left.html">Left sidebar</a></li>
                                            <li><a href="case-study-grid-2-right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Case Study Carousel</a>
                                        <ul class="sub-menu">
                                            <li><a href="case-study-carousel.html">Case Study carousel 01</a></li>
                                            <li><a href="case-study-carousel-2.html">Case Study carousel 02</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Case Study details</a>
                                        <ul class="sub-menu">
                                            <li><a href="case-study-details.html">No sidebar</a></li>
                                            <li><a href="case-study-details-left.html">Left sidebar</a></li>
                                            <li><a href="case-study-details-right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li class="dropdown">
                                <a href="#" data-title="Blog"><span>Blog</span></a>
                                <!-- <ul class="sub-menu">
                                    <li class="dropdown">
                                        <a href="#">Blog grid 01</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-grid.html">No sidebar</a></li>
                                            <li><a href="blog-grid-left.html">Left sidebar</a></li>
                                            <li><a href="blog-grid-right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Blog grid 02</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-grid-2.html">No sidebar</a></li>
                                            <li><a href="blog-grid-2-left.html">Left sidebar</a></li>
                                            <li><a href="blog-grid-2-right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Blog grid 03</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-grid-3.html">No sidebar</a></li>
                                            <li><a href="blog-grid-3-left.html">Left sidebar</a></li>
                                            <li><a href="blog-grid-3-right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Blog carousel</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-carousel.html">Blog carousel 01</a></li>
                                            <li><a href="blog-carousel-2.html">Blog carousel 02</a></li>
                                            <li><a href="blog-carousel-3.html">Blog carousel 03</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Blog details</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-details.html">No sidebar</a></li>
                                            <li><a href="blog-details-left.html">Left sidebar</a></li>
                                            <li><a href="blog-details-right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li>
                                <a href="contact.php" data-title="Contact"><span>Contact</span></a>
                            </li>
                        </ul>
                    </nav>
                    <div class="main-header__right">
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="#" class="search-toggler main-header__search">
                            <i class="flaticon-search" aria-hidden="true"></i>
                            <span class="sr-only">Search</span>
                        </a>
                        <a href="contact.php" class="lotech-btn main-header__btn">
                            <span>Get a Quote<span class="lotech-btn__icon"><i class="flaticon-up-right-arrow"></i><i class="flaticon-up-right-arrow"></i></span></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>