<!DOCTYPE html>
<html id="top" <?php language_attributes(); ?> class="scroll-smooth overflow-x-hidden">

<head>
    <!-- Dark Mode Flicker Prevention -->
    <script>
        (function () {
            const theme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (theme === 'dark' || (!theme && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description"
        content="Aroma Slastičarna - Najbolji gelato, sladoled i kolači u Slavonskom Brodu. Tradicija od 1923. Trg Ivane Brlić Mažuranić 6. Dostava Wolt/Glovo. 📍 Trg IB Mažuranić 6, 35000 Slavonski Brod ☎ +385 35 352 034">
    <meta name="keywords"
        content="slastičarna Slavonski Brod, gelato Slavonski Brod, najbolji kolači Slavonski Brod, najbolja slastičarna Brod, sladoled Brod, torte po narudžbi, kolači Slavonski Brod, Aroma slastičarna, gelato Trg Ivane Brlić Mažuranić, torti Slavonski Brod, palačinke, dostava sladoleda Wolt Glovo">

    <!-- Geo Meta Tags for Local SEO -->
    <meta name="geo.region" content="HR-12">
    <meta name="geo.placename" content="Slavonski Brod">
    <meta name="geo.position" content="45.158449;18.015278">
    <meta name="ICBM" content="45.158449, 18.015278">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url( home_url('/') ); ?>">
    <meta property="og:title" content="Aroma Slastičarna - Slavonski Brod">
    <meta property="og:description" content="Domaći kolači i sladoled na glavnom brodskom trgu. Vidimo se u Aromi!">
    <meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/og-image.jpg">
    <meta property="og:locale" content="hr_HR">

    <!-- Security Headers -->
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="SAMEORIGIN">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <!-- CSP -->
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://formspree.io; style-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com; img-src 'self' data: https:; font-src 'self' data:; connect-src 'self' https://formspree.io; frame-src https://www.google.com;">

    <!-- Preload Critical Resources -->
    <link rel="preload" as="image" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/webp/hero.webp">
    <link rel="preload" as="font" href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/playfair-display-v40-latin-regular.woff2" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/montserrat-v31-latin-400.woff2" type="font/woff2" crossorigin>

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo esc_url( get_permalink() ); ?>">

    <!-- Hreflang Tags for International SEO -->
    <link rel="alternate" hreflang="hr" href="<?php echo esc_url( home_url('/') ); ?>" />
    <link rel="alternate" hreflang="en" href="<?php echo esc_url( home_url('/en') ); ?>" />
    <link rel="alternate" hreflang="de" href="<?php echo esc_url( home_url('/de') ); ?>" />
    <link rel="alternate" hreflang="x-default" href="<?php echo esc_url( home_url('/') ); ?>" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico">
    <link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/webp/amblem.webp">

    <!-- Preconnect hints for performance -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://formspree.io">
    <link rel="dns-prefetch" href="https://www.google.com">

    <!-- TailwindCSS CDN — mora biti PRIJE tailwind.config bloka -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Local Font Faces */
        @font-face {
            font-family: 'Playfair Display';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/playfair-display-v40-latin-regular.woff2') format('woff2');
        }

        @font-face {
            font-family: 'Playfair Display';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/playfair-display-v40-latin-italic.woff2') format('woff2');
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/montserrat-v31-latin-300.woff2') format('woff2');
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/montserrat-v31-latin-400.woff2') format('woff2');
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/montserrat-v31-latin-600.woff2') format('woff2');
        }
    </style>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'aroma-bg': '#0f0f0f',
                        'aroma-gold': '#C5A059',
                    },
                    fontFamily: {
                        'serif': ['"Playfair Display"', 'serif'],
                        'sans': ['"Montserrat"', 'sans-serif'],
                    },
                    animation: {
                        'loop-scroll': 'loop-scroll 25s linear infinite',
                        'blob': 'blob 7s infinite',
                    },
                    keyframes: {
                        'loop-scroll': {
                            from: { transform: 'translateX(0)' },
                            to: { transform: 'translateX(-100%)' },
                        },
                        'blob': {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(5px, -10px) scale(1.05)' },
                            '66%': { transform: 'translate(-5px, 5px) scale(0.95)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Screen Reader Only - for SEO H1 */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .floating-element {
            position: absolute;
            z-index: 40;
            pointer-events: none;
            filter: drop-shadow(15px 10px 15px rgba(0, 0, 0, 0.6));
        }

        /* Pause animation on hover */
        .group:hover .animate-loop-scroll {
            animation-play-state: paused !important;
        }

        /* Kinetic Typography Animation */
        .kinetic-word {
            display: inline-block;
            will-change: transform, opacity;
        }

        .kinetic-title {
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        /* Hover effect for kinetic words */
        .kinetic-word {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .kinetic-word:hover {
            transform: translateY(-5px) scale(1.05);
        }

        /* Cookie Banner Styles - Cookie Shape */
        #cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            transform: translateY(100%);
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        #cookie-banner.show {
            transform: translateY(0);
        }

        @media (max-width: 767px) {
            #cookie-banner {
                border-radius: 24px 24px 0 0;
            }
        }

        @media (min-width: 768px) {
            #cookie-banner {
                bottom: 24px;
                left: 50%;
                right: auto;
                transform: translateX(-50%) translateY(150%);
                max-width: 440px;
                border-radius: 50%;
                aspect-ratio: 1 / 1;
            }

            #cookie-banner.show {
                transform: translateX(-50%) translateY(0);
            }

            #cookie-banner::before {
                content: '';
                position: absolute;
                top: 15%;
                right: 10%;
                width: 35px;
                height: 35px;
                background: inherit;
                border-radius: 50% 0 50% 50%;
                opacity: 0.8;
            }

            #cookie-banner::after {
                content: '';
                position: absolute;
                bottom: 20%;
                left: 5%;
                width: 45px;
                height: 45px;
                background: inherit;
                border-radius: 50% 50% 0 50%;
                opacity: 0.7;
            }
        }

        /* was-validated: visual red-border feedback on invalid required fields */
        #cake-order-form.was-validated input:invalid,
        #cake-order-form.was-validated select:invalid,
        #cake-order-form.was-validated textarea:invalid,
        #cake-order-form.was-validated input[type="checkbox"]:invalid {
            border-color: rgb(239 68 68) !important;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.25) !important;
        }

        /* Tablet Optimizations (768px - 1024px) */
        @media (min-width: 768px) and (max-width: 1024px) {
            .kinetic-title {
                font-size: 5rem !important;
                line-height: 1.1 !important;
                letter-spacing: -0.02em;
            }

            .kinetic-title+p {
                font-size: 1.25rem !important;
                line-height: 1.6 !important;
                margin-bottom: 2.5rem !important;
            }

            #o-nama .reveal-up img {
                min-height: 500px;
                object-fit: cover;
            }

            #o-nama .grid {
                gap: 3rem !important;
            }

            #o-nama h2 {
                font-size: 3.5rem !important;
                line-height: 1.2 !important;
            }

            #o-nama p {
                font-size: 1.125rem !important;
                line-height: 1.75 !important;
            }

            section {
                padding-top: 5rem !important;
                padding-bottom: 5rem !important;
            }
        }

        /* ✅ Image Protection - Prevent Download/Copy */
        img {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-user-drag: none;
            -khtml-user-drag: none;
            -moz-user-drag: none;
            -o-user-drag: none;
            pointer-events: auto;
        }

        .menu-card, .stack-card-wrapper, nav img, .pancakes-image, .image-container {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            pointer-events: none;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased font-sans relative bg-gradient-to-br from-[#f7fcf0] via-[#e6f5d0] to-[#d5e8b3] min-h-screen text-gray-900 dark:bg-none dark:bg-[#0f0f0f] dark:text-white transition-colors duration-300'); ?>>

    <?php wp_body_open(); ?>

    <!-- Background Texture -->
    <div class="fixed inset-0 z-0 opacity-5 dark:opacity-5 pointer-events-none mix-blend-multiply dark:mix-blend-normal"
        style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/papira.png'); background-repeat: repeat; background-size: 500px;"></div>

    <!-- Schema.org LocalBusiness JSON-LD for Local SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Bakery",
      "@id": "<?php echo esc_url( home_url('/') ); ?>#bakery",
      "name": "Aroma Slastičarna",
      "description": "Premium slastičarna u Slavonskom Brodu s tradicijom od 1923. Specijalizirani za gelato, torte po narudžbi, kolače i palačinke.",
      "image": "<?php echo esc_url( get_template_directory_uri() ); ?>/images/webp/aroma-in.webp",
      "logo": "<?php echo esc_url( get_template_directory_uri() ); ?>/images/webp/AROMA.webp",
      "url": "<?php echo esc_url( home_url('/') ); ?>",
      "telephone": "+38535352034",
      "email": "info@aroma-since-1923.hr",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Trg Ivane Brlić Mažuranić 6",
        "addressLocality": "Slavonski Brod",
        "postalCode": "35000",
        "addressRegion": "Brodsko-posavska županija",
        "addressCountry": "HR"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "45.158449",
        "longitude": "18.015278"
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
          "opens": "08:00",
          "closes": "24:00"
        }
      ],
      "priceRange": "$$",
      "servesCuisine": "Desserts, Gelato, Cakes, Pastries",
      "foundingDate": "1923",
      "slogan": "Tradicija od 1923",
      "areaServed": {
        "@type": "City",
        "name": "Slavonski Brod"
      },
      "hasMenu": "<?php echo esc_url( home_url('/#ponuda') ); ?>",
      "acceptsReservations": "True",
      "paymentAccepted": "Cash, Credit Card",
      "currenciesAccepted": "EUR",
      "sameAs": [
        "https://www.facebook.com/p/AROMA-SLASTI%C4%8CARNICA-Slavonski-Brod-61568685900060/",
        "https://www.instagram.com/aroma.slasticarnica/",
        "https://wolt.com/hr/hrv/slavonski-brod/restaurant/aroma-slasticarnica",
        "https://glovoapp.com/hr/hr/slavonski-brod/aroma-slasticarnica-slb/"
      ]
    }
    </script>

    <!-- Schema.org Reviews JSON-LD for Rich Snippets -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "LocalBusiness",
      "name": "Slastičarnica Aroma since 1923",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.0",
        "reviewCount": "120"
      },
      "review": [
        {
          "@type": "Review",
          "author": {
            "@type": "Person",
            "name": "Davor J."
          },
          "reviewRating": {
            "@type": "Rating",
            "ratingValue": "5"
          },
          "reviewBody": "Definitivno najbolji sladoled u gradu, ali i šire. Okus pistacije je nevjerojatan, a porcije su i više nego velikodušne. Osoblje je iznimno ljubazno."
        },
        {
          "@type": "Review",
          "author": {
            "@type": "Person",
            "name": "Elena B."
          },
          "reviewRating": {
            "@type": "Rating",
            "ratingValue": "5"
          },
          "reviewBody": "Aroma je institucija Slavonskog Broda. Od usluge do kvalitete namirnica, sve je na vrhunskoj razini. Topla preporuka za sve koji posjete Brod."
        },
        {
          "@type": "Review",
          "author": {
            "@type": "Person",
            "name": "Marko K."
          },
          "reviewRating": {
            "@type": "Rating",
            "ratingValue": "5"
          },
          "reviewBody": "Slastičarnica s dušom i tradicijom. Kolači su uvijek svježi i domaći, a ambijent na Korzu je neponovljiv. Mjesto gdje se rado vraćamo s djecom."
        }
      ]
    }
    </script>

    <nav class="fixed top-0 z-[10000] w-full py-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <!-- Left: Logo -->
            <a href="<?php echo esc_url( home_url('/') ); ?>#top" class="block w-24 relative group flex-shrink-0 -ml-[280px]"
                aria-label="Aroma Slastičarna - Početna stranica" title="Povratak na početak">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/webp/AROMA.webp" alt="AROMA Logo" width="96" height="40"
                    class="w-full h-auto brightness-0 dark:brightness-100 transition-all duration-300">
            </a>

            <!-- Center: The Cloud Menu -->
            <div class="hidden lg:flex items-center justify-center absolute left-1/2 -translate-x-1/2">
                <div
                    class="px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg flex space-x-8 transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-white/5">
                    <a href="#o-nama"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        data-i18n="nav_about">O nama</a>
                    <a href="#ponuda"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        data-i18n="nav_icecream">Sladoledi</a>
                    <a href="#kolaci"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        data-i18n="nav_cakes">Kolači</a>
                    <a href="#torte-po-narudzbi"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        data-i18n="nav_custom_cakes">Torte</a>
                    <a href="#palacinke"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        data-i18n="nav_pancakes">Palačinke</a>
                    <a href="<?php echo esc_url( home_url('/menu') ); ?>"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        data-i18n="nav_pricelist">Cjenik</a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden relative z-[10000] p-2 text-black dark:text-white mr-4"
                aria-label="Otvori izbornik" aria-expanded="false">
                <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 transition-all">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 hidden transition-all">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Right: CTA Button & Theme Toggle -->
            <div class="hidden lg:flex items-center gap-2">
                <!-- Language Switcher -->
                <div
                    class="hidden lg:flex items-center gap-2 px-4 py-2 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-white/5">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        aria-label="Promijeni jezik na hrvatski">HR</a>
                    <a href="<?php echo esc_url( home_url('/en') ); ?>"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        aria-label="Change language to English">EN</a>
                    <a href="<?php echo esc_url( home_url('/de') ); ?>"
                        class="text-[13px] font-medium text-gray-800 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors"
                        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;"
                        aria-label="Sprache auf Deutsch ändern">DE</a>
                </div>

                <button id="theme-toggle"
                    class="px-4 py-2 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-white/5 flex items-center justify-center"
                    aria-label="Prebaci tamnu/svijetlu temu">
                    <!-- Sun Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 hidden dark:block text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>
                    <!-- Moon Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 block dark:hidden text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>
                </button>

                <div class="hidden lg:block flex-shrink-0 group relative">
                    <a href="#dostava"
                        class="px-6 py-2.5 rounded-full bg-black/5 dark:bg-white/5 backdrop-blur-xl border border-black/10 dark:border-white/10 text-black dark:text-white font-medium text-sm hover:bg-black/10 dark:hover:bg-white/10 transition-all hover:scale-105 shadow-lg shadow-black/5 dark:shadow-white/5 flex items-center gap-2"
                        aria-label="Naruči dostavu">
                        <span data-i18n="nav_order">Naruči</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-3 h-3 transition-transform group-hover:rotate-180">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </a>

                    <div
                        class="absolute right-0 top-full mt-2 w-40 bg-white/90 dark:bg-[#1a1a1a]/90 backdrop-blur-xl border border-black/10 dark:border-white/10 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="https://wolt.com/hr/hrv/slavonski-brod/restaurant/aroma-slasticarnica" target="_blank"
                            rel="noopener noreferrer"
                            class="flex items-center gap-3 px-5 py-3 text-sm text-gray-600 dark:text-gray-300 hover:bg-black/5 dark:hover:bg-white/10 hover:text-[#00c2e8] transition-colors border-b border-black/5 dark:border-white/5 first:rounded-t-2xl">
                            Wolt
                        </a>
                        <a href="https://glovoapp.com/hr/hr/slavonski-brod/aroma-slasticarnica-slb/" target="_blank"
                            rel="noopener noreferrer"
                            class="flex items-center gap-3 px-5 py-3 text-sm text-gray-600 dark:text-gray-300 hover:bg-black/5 dark:hover:bg-white/10 hover:text-[#ffc244] transition-colors last:rounded-b-2xl">
                            Glovo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 bg-white/95 dark:bg-black/95 backdrop-blur-xl z-[9999] transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center space-y-8">
        <a href="#o-nama" class="mobile-link text-2xl font-serif text-black dark:text-white"
            data-i18n="nav_about">O nama</a>
        <a href="#ponuda" class="mobile-link text-2xl font-serif text-black dark:text-white"
            data-i18n="nav_icecream">Sladoledi</a>
        <a href="#kolaci" class="mobile-link text-2xl font-serif text-black dark:text-white"
            data-i18n="nav_cakes">Kolači</a>
        <a href="#torte-po-narudzbi" class="mobile-link text-2xl font-serif text-black dark:text-white"
            data-i18n="nav_custom_cakes">Torte</a>
        <a href="#palacinke" class="mobile-link text-2xl font-serif text-black dark:text-white"
            data-i18n="nav_pancakes">Palačinke</a>
        <a href="<?php echo esc_url( home_url('/menu') ); ?>" class="mobile-link text-2xl font-serif text-black dark:text-white"
            data-i18n="nav_pricelist">Cjenik</a>

        <div class="flex flex-col items-center gap-6 mt-4">
            <div class="flex items-center gap-4">
                <a href="<?php echo esc_url( home_url('/') ); ?>"
                    class="w-10 h-10 rounded-full bg-black/5 dark:bg-white/5 backdrop-blur-xl border border-black/10 dark:border-white/10 text-xs font-bold shadow-lg text-black dark:text-white hover:bg-black/10 dark:hover:bg-white/10 flex items-center justify-center"
                    aria-label="Promijeni jezik na hrvatski">HR</a>
                <a href="<?php echo esc_url( home_url('/en') ); ?>"
                    class="w-10 h-10 rounded-full bg-black/5 dark:bg-white/5 backdrop-blur-xl border border-black/10 dark:border-white/10 text-xs font-bold shadow-lg text-black dark:text-white hover:bg-black/10 dark:hover:bg-white/10 flex items-center justify-center"
                    aria-label="Change language to English">EN</a>
                <a href="<?php echo esc_url( home_url('/de') ); ?>"
                    class="w-10 h-10 rounded-full bg-black/5 dark:bg-white/5 backdrop-blur-xl border border-black/10 dark:border-white/10 text-xs font-bold shadow-lg text-black dark:text-white hover:bg-black/10 dark:hover:bg-white/10 flex items-center justify-center"
                    aria-label="Sprache auf Deutsch ändern">DE</a>
            </div>
            <button id="mobile-theme-toggle"
                class="w-12 h-12 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-white/5 flex items-center justify-center"
                aria-label="Prebaci tamnu/svijetlu temu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 hidden dark:block text-gray-300">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 block dark:hidden text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                </svg>
            </button>
            <a href="#dostava"
                class="mobile-link px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-white/5 text-black dark:text-white font-bold text-lg uppercase tracking-widest"
                data-i18n="nav_order">Naruči</a>
        </div>
    </div>
