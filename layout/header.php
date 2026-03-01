<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <?php
    // Get current page name
    $page_name = basename($_SERVER['PHP_SELF'], '.php');
    if ($page_name == 'index') $page_name = 'home';
    
    // Define base URL - Update this with your actual domain
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
    $current_url = $base_url . $_SERVER['REQUEST_URI'];
    
    // Page-specific SEO data
    $page_meta = [
        'home' => [
            'title' => 'IT Services & Solutions | Tech Scalify - Web Development, Cloud Solutions & IT Consulting',
            'description' => 'Tech Scalify delivers scalable IT services, web development, cloud solutions, and digital transformation for businesses. Expert IT consulting, app development, and 24/7 technical support.',
            'keywords' => 'IT services, web development, cloud solutions, IT consulting, digital transformation, app development, software development, SEO services, technical support, Tech Scalify',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'about' => [
            'title' => 'About Us | Tech Scalify - Leading IT Services Company',
            'description' => 'Learn about Tech Scalify, a leading IT services company with 25+ years of experience providing scalable digital solutions, web development, and IT consulting services.',
            'keywords' => 'about tech scalify, IT services company, web development company, IT consulting firm',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'contact' => [
            'title' => 'Contact Us | Tech Scalify - Get IT Solutions & Free Quote',
            'description' => 'Contact Tech Scalify for IT services, web development, and digital solutions. Get a free quote today. Located in Raipur, Chhattisgarh, India.',
            'keywords' => 'contact tech scalify, IT services contact, get IT quote, IT consulting contact',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'service-web-development' => [
            'title' => 'Web Development Services | Tech Scalify - Responsive & SEO-Optimized Websites',
            'description' => 'Professional web development services by Tech Scalify. We build fast, responsive, and SEO-optimized websites using modern technologies.',
            'keywords' => 'web development, website development, responsive web design, custom websites',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'service-app-development' => [
            'title' => 'Mobile App Development Services | Tech Scalify',
            'description' => 'Expert mobile app development services for iOS and Android. Custom mobile applications designed for your business needs.',
            'keywords' => 'app development, mobile app development, iOS app, Android app',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'service-software-development' => [
            'title' => 'Custom Software Development | Tech Scalify',
            'description' => 'Custom software solutions designed to streamline operations, improve efficiency, and support long-term business growth.',
            'keywords' => 'software development, custom software, enterprise software',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'service-it-consulting' => [
            'title' => 'IT Strategy Consulting | Tech Scalify',
            'description' => 'Expert IT strategy consulting to align technology with business goals, improve scalability, and enable digital transformation.',
            'keywords' => 'IT consulting, IT strategy, technology consulting',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'service-search-optimization' => [
            'title' => 'SEO & Digital Marketing Services | Tech Scalify',
            'description' => 'Data-driven SEO and digital marketing strategies that increase website traffic, improve search rankings, and generate high-quality leads.',
            'keywords' => 'SEO services, digital marketing, search engine optimization',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ],
        'service-technical-support' => [
            'title' => 'Technical Support & Managed IT Services | Tech Scalify',
            'description' => 'Reliable 24/7 technical support and managed IT services to ensure system stability, security, and uninterrupted business operations.',
            'keywords' => 'technical support, managed IT, IT support services, 24/7 IT support',
            'og_image' => $base_url . '/assets/images/og-image.jpg'
        ]
    ];
    
    // Get meta for current page or default to home
    $meta = $page_meta[$page_name] ?? $page_meta['home'];
    ?>
    
    <!-- Primary Meta Tags -->
    <title><?php echo htmlspecialchars($meta['title']); ?></title>
    <meta name="title" content="<?php echo htmlspecialchars($meta['title']); ?>" />
    <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($meta['keywords']); ?>" />
    <meta name="author" content="Tech Scalify" />
    <meta name="robots" content="index, follow" />
    <meta name="language" content="English" />
    <meta name="revisit-after" content="7 days" />
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo htmlspecialchars($current_url); ?>" />
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo htmlspecialchars($current_url); ?>" />
    <meta property="og:title" content="<?php echo htmlspecialchars($meta['title']); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($meta['description']); ?>" />
    <meta property="og:image" content="<?php echo htmlspecialchars($meta['og_image']); ?>" />
    <meta property="og:site_name" content="Tech Scalify" />
    <meta property="og:locale" content="en_US" />
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo htmlspecialchars($current_url); ?>" />
    <meta name="twitter:title" content="<?php echo htmlspecialchars($meta['title']); ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($meta['description']); ?>" />
    <meta name="twitter:image" content="<?php echo htmlspecialchars($meta['og_image']); ?>" />
    
    <!-- Favicons -->
    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/techscalify.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/techscalify.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Tech Scalify",
      "url": "<?php echo $base_url; ?>",
      "logo": "<?php echo $base_url; ?>/img/tech_scalify_lg.png",
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
        "areaServed": "IN",
        "availableLanguage": "English"
      },
      "sameAs": [
        "https://facebook.com/",
        "https://x.com/",
        "https://instagram.com/",
        "https://www.youtube.com/"
      ]
    }
    </script>
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Tech Scalify",
      "image": "<?php echo $base_url; ?>/img/tech_scalify_lg.png",
      "@id": "<?php echo $base_url; ?>",
      "url": "<?php echo $base_url; ?>",
      "telephone": "+91-871-787-2372",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Raipur",
        "addressLocality": "Raipur",
        "addressRegion": "Chhattisgarh",
        "postalCode": "",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 21.2514,
        "longitude": 81.6296
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday"
        ],
        "opens": "09:00",
        "closes": "18:00"
      }
    }
    </script>
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Tech Scalify",
      "url": "<?php echo $base_url; ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo $base_url; ?>?s={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Yantramanav:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/date-time-picker/jquery.datetimepicker.min.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.css" />
    <link rel="stylesheet" href="assets/vendors/lotech-icons/style.css" />
    <link rel="stylesheet" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" href="assets/vendors/aos/aos.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/lotech.css?v=2" />
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
                        <a href="index.php" aria-label="Tech Scalify Home">
                            <img src="img/tech_scalify_lg.png" alt="Tech Scalify - IT Services & Solutions" width="133" height="40">
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