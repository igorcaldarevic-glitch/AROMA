<?php
/**
 * Homepage Sections Partial — Aroma Slastičarna
 * Included by both index.php and front-page.php.
 * Contains all visible page content between <header> and </footer> (exclusive).
 */
$tdu = esc_url( get_template_directory_uri() );
?>

    <header id="hero" class="relative min-h-[50vh] md:min-h-screen flex items-center pt-24 md:pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <video id="hero-video" autoplay loop muted playsinline poster="<?= $tdu ?>/images/webp/hero.webp"
                class="w-full h-full object-cover object-center" fetchpriority="high" loading="lazy" preload="none">
                <source src="<?= $tdu ?>/images/1.webm" type="video/webm">
                <img src="<?= $tdu ?>/images/webp/hero.webp"
                    alt="Aroma Slastičarna Slavonski Brod - Premium gelato i sladoled u kornetu"
                    class="w-full h-full object-cover object-center">
            </video>
            <div
                class="absolute inset-0 bg-white/30 dark:bg-black/20 md:bg-gradient-to-r md:from-white/40 md:via-white/20 md:to-transparent md:dark:from-black/30 md:dark:via-black/10 md:dark:to-transparent">
            </div>
            <!-- Bulp Transition -->
            <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20">
                <svg class="relative block w-full h-[60px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0 Q600,120 1200,0 V120 H0 V0 Z" class="fill-[#f7fcf0] dark:fill-[#0f0f0f]"></path>
                </svg>
            </div>
        </div>

        <div class="container mx-auto px-6 grid md:grid-cols-[40%_60%] gap-12 items-center relative z-10">
            <div class="text-center md:text-left reveal-text">
                <!-- SEO Optimized H1 -->
                <h1 class="sr-only">Aroma Slastičarna Slavonski Brod - Premium Gelato, Torte i Kolači od 1923 - Trg
                    Ivane Brlić Mažuranić</h1>

                <span class="text-aroma-gold tracking-[0.4em] uppercase text-xs md:text-base font-bold mb-4 block"
                    data-i18n="hero_subtitle">Premium Gelato</span>
                <div class="font-serif text-4xl md:text-5xl lg:text-8xl font-bold leading-tight mb-6 kinetic-title"
                    role="heading" aria-level="2">
                    <span class="kinetic-word">Užitak</span>
                    <span class="kinetic-word">koji</span>
                    <span class="kinetic-word">se</span>
                    <br>
                    <span class="kinetic-word text-[#8B7355] dark:text-aroma-gold italic">Pamti.</span>
                </div>
                <p class="text-black dark:text-gray-200 text-base md:text-lg mb-8 max-w-md mx-auto md:mx-0 font-normal dark:font-light"
                    data-i18n="hero_desc">
                    Tradicija od 1923. Najfiniji sastojci, ručna izrada i okusi koji bude uspomene.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <a href="#ponuda"
                        class="inline-block px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-white/5 text-black dark:text-white uppercase tracking-widest w-auto text-center"
                        data-i18n="hero_btn">
                        Istraži Okuse
                    </a>
                    <a href="#dostava"
                        class="md:hidden inline-block px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl hover:shadow-black/5 dark:hover:shadow-white/5 text-black dark:text-white uppercase tracking-widest w-auto font-bold text-center"
                        data-i18n="nav_order">
                        Naruči
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section id="o-nama" class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="relative reveal-up group">
                    <div
                        class="absolute inset-0 border-2 border-aroma-gold rounded-2xl transform translate-x-4 translate-y-4 -z-10 transition-transform duration-500 group-hover:translate-x-2 group-hover:translate-y-2">
                    </div>
                    <img src="<?= $tdu ?>/images/webp/aroma-in.webp"
                        alt="Unutrašnjost Aroma Slastičarne Slavonski Brod - moderno uređen prostor" width="600"
                        height="450"
                        class="w-full h-auto object-cover rounded-2xl shadow-2xl border-2 border-aroma-gold"
                        loading="lazy">
                </div>
                <div class="about-text-reveal">
                    <span class="text-aroma-gold tracking-[0.2em] uppercase text-sm font-bold mb-4 block"
                        data-i18n="about_subtitle">Tradicija od 1923.</span>
                    <h2 class="font-serif text-4xl md:text-5xl mb-8 leading-tight text-black dark:text-white"
                        data-i18n="about_title">Više od stoljeća <br> <span class="text-aroma-gold italic">slatkih
                            uspomena.</span></h2>
                    <p class="text-gray-900 dark:text-gray-300 text-lg mb-6 font-normal leading-relaxed"
                        data-i18n="about_p1">
                        Priča o slastičarni Aroma započinje davne 1923. godine. Ono što je tada krenulo kao mala,
                        obiteljska radionica vođena ljubavlju prema slasticama, danas je postalo simbol kvalitete u srcu
                        Slavonskog Broda.
                    </p>
                    <p class="text-gray-900 dark:text-gray-300 text-lg mb-6 font-normal leading-relaxed"
                        data-i18n="about_p2">
                        Kroz generacije obitelji Aliti, mijenjala su se vremena, mode i okusi, ali jedna stvar ostala je
                        netaknuta – naša posvećenost izvrsnosti. Naši recepti nisu samo popis sastojaka; oni su
                        naslijeđe koje se prenosi s koljena na koljeno, čuvano poput najvrjednijeg blaga.
                    </p>
                    <p class="text-gray-900 dark:text-gray-300 text-lg mb-6 font-normal leading-relaxed"
                        data-i18n="about_p3">
                        Vjerujemo da slastica mora biti doživljaj. Zato i danas, nakon više od 100 godina, biramo samo
                        najkvalitetnije namirnice, miješamo ih s pažnjom i poslužujemo s ponosom. Od mirisa svježe
                        kuhane vanilije do hrskavosti ručno rađenih korneta – svaki detalj je posveta tradiciji koja
                        živi.
                    </p>
                    <p class="text-gray-900 dark:text-gray-300 text-lg mb-8 font-normal leading-relaxed"
                        data-i18n="about_p4">
                        Hvala vam što ste dio naše priče.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="h-px w-12 bg-aroma-gold"></div>
                            <span class="font-serif text-xl italic text-gray-900 dark:text-white"
                                data-i18n="about_sign">Obitelj Aroma</span>
                        </div>
                        <img src="<?= $tdu ?>/images/webp/amblem.webp" alt="Aroma Slastičarna logo amblem - tradicija od 1923"
                            width="192" height="192" class="w-32 md:w-48 opacity-90" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
        <!-- Bulp Transition (O Nama -> Torte) -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20">
            <svg class="relative block w-full h-[60px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 Q600,120 1200,0 V120 H0 V0 Z" class="fill-gray-50 dark:fill-[#121212]"></path>
            </svg>
        </div>
    </section>

    <section id="torte-po-narudzbi" class="py-24 relative bg-gray-50 dark:bg-[#121212] overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 scroll-fade-up">
                <span class="text-aroma-gold tracking-[0.2em] uppercase text-sm font-bold mb-4 block"
                    data-i18n="custom_subtitle">Vaša mašta, naše ruke</span>
                <h2 class="font-serif text-4xl md:text-5xl mb-6 text-black dark:text-white" data-i18n="custom_title">
                    Torte po <span class="text-aroma-gold italic">Narudžbi</span></h2>
                <p class="text-black dark:text-gray-200 text-lg max-w-2xl mx-auto leading-relaxed"
                    data-i18n="custom_desc">
                    Svaka proslava zaslužuje tortu koja oduzima dah. Bilo da se radi o vjenčanju, rođendanu ili
                    godišnjici, naš tim slastičara pretvorit će vaše želje u slatku stvarnost. Koristimo samo najfinije
                    sastojke kako bi okus bio jednako impresivan kao i izgled.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4 h-auto md:h-[600px]">
                <!-- Image 1: Large Left -->
                <div class="lg:col-span-3 lg:row-span-2 relative group overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold cake-hover-trigger cursor-pointer scroll-image-left"
                    data-title="Torta po narudžbi" data-desc="Unikatna torta izrađena prema vašim željama.">
                    <img src="<?= $tdu ?>/images/webp/1.webp" alt="Luksuzna torta sa čokoladom i voćem - Aroma Slavonski Brod"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-500"></div>
                </div>
                <!-- Image 2: Top Right -->
                <div class="lg:col-span-3 lg:row-span-1 relative group overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold cake-hover-trigger cursor-pointer scroll-image-right"
                    data-title="Torta po narudžbi" data-desc="Unikatna torta izrađena prema vašim željama.">
                    <img src="<?= $tdu ?>/images/webp/2.webp" alt="Rođendanska torta sa svježim jagodama - slaštičarna Aroma"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-500"></div>
                </div>
                <!-- Image 3: Bottom Right 1 -->
                <div class="lg:col-span-1 lg:row-span-1 relative group overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold cake-hover-trigger cursor-pointer scroll-scale-up"
                    data-title="Torta po narudžbi" data-desc="Unikatna torta izrađena prema vašim željama.">
                    <img src="<?= $tdu ?>/images/webp/3.webp"
                        alt="Vjenčana torta bijela elegantna - torti po narudžbi Slavonski Brod"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-500"></div>
                </div>
                <!-- Image 4: Bottom Right 2 -->
                <div class="lg:col-span-1 lg:row-span-1 relative group overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold cake-hover-trigger cursor-pointer scroll-scale-up"
                    data-title="Torta po narudžbi" data-desc="Unikatna torta izrađena prema vašim željama.">
                    <img src="<?= $tdu ?>/images/webp/4.webp" alt="Čokoladna torta sa malinama premium kolač Aroma"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-500"></div>
                </div>
                <!-- Image 5: Bottom Right 3 -->
                <div class="lg:col-span-1 lg:row-span-1 relative group overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold cake-hover-trigger cursor-pointer scroll-scale-up"
                    data-title="Torta po narudžbi" data-desc="Unikatna torta izrađena prema vašim željama.">
                    <img src="<?= $tdu ?>/images/webp/5.webp" alt="Moderna torta sa voćem i kremom najbolji kolači Slavonski Brod"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-500"></div>
                </div>
            </div>

            <div id="torte" class="mt-24 mb-12 relative z-50">
                <!-- Carousel Scroll Buttons -->
                <button id="scroll-left" aria-label="Pomakni lijevo"
                    class="absolute left-2 top-1/2 -translate-y-1/2 z-20 flex items-center justify-center w-11 h-11 rounded-full bg-white/70 dark:bg-black/70 backdrop-blur-md border border-black/10 dark:border-white/10 shadow-lg text-black dark:text-white hover:bg-white dark:hover:bg-black hover:scale-110 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button id="scroll-right" aria-label="Pomakni desno"
                    class="absolute right-2 top-1/2 -translate-y-1/2 z-20 flex items-center justify-center w-11 h-11 rounded-full bg-white/70 dark:bg-black/70 backdrop-blur-md border border-black/10 dark:border-white/10 shadow-lg text-black dark:text-white hover:bg-white dark:hover:bg-black hover:scale-110 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                <!-- Scroll Container -->
                <div id="cakes-scroll-container" class="flex overflow-x-auto no-scrollbar w-full py-12 group gap-6">
                    <!-- Group 1 -->
                    <div class="flex gap-6 animate-loop-scroll flex-shrink-0">
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Dubai Torta"
                            data-desc="Luksuzna torta s aromatičnom aromom od pistacija i voćem. Premijum izbor.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/dubai-torta2.webp" alt="Dubai Torta"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Cheesecake"
                            data-desc="Nježna cheesecake torta sa preljevanom od jagoda. Savršena kombinacija okusa.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/cheesecake2.webp" alt="Cheesecake"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Kremšnita"
                            data-desc="Tradicionalna kremšnita sa vanilla kremom i listićima tijesta. Najpoznatiji kolač naše kulture.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/krempita2.webp" alt="Kremšnita"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Šumska Čarolija"
                            data-desc="Magična kombinacija šumskog voća i čokolade. Kao pravo čaranje u ustima.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/sumska-carolija.webp" alt="Šumska Čarolija"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Dubai Tiramisu"
                            data-desc="Sofisticirani tiramisu sa pistacijom. Italija i Bliski istok u jednom zalogaju.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/pistacio-tiramisu2.webp" alt="Dubai Tiramisu"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                    </div>
                    <!-- Group 2 (Duplicate for Loop) -->
                    <div class="flex gap-6 animate-loop-scroll flex-shrink-0" aria-hidden="true">
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Dubai Torta"
                            data-desc="Luksuzna torta s aromatičnom aromom od pistacija i voćem. Premijum izbor.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/dubai-torta2.webp" alt="Dubai Torta"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Cheesecake"
                            data-desc="Nježna cheesecake torta sa preljevanom od jagoda. Savršena kombinacija okusa.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/cheesecake2.webp" alt="Cheesecake"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Kremšnita"
                            data-desc="Tradicionalna kremšnita sa vanilla kremom i listićima tijesta. Najpoznatiji kolač naše kulture.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/krempita2.webp" alt="Kremšnita"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Šumska Čarolija"
                            data-desc="Magična kombinacija šumskog voća i čokolade. Kao pravo čaranje u ustima.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/sumska-carolija.webp" alt="Šumska Čarolija"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                        <div class="relative w-fit h-fit flex-shrink-0 cake-hover-trigger transition-all duration-500 hover:scale-105 cursor-pointer rounded-2xl overflow-hidden shadow-lg border-2 border-aroma-gold"
                            data-title="Dubai Tiramisu"
                            data-desc="Sofisticirani tiramisu sa pistacijom. Italija i Bliski istok u jednom zalogaju.">
                            <img src="<?= $tdu ?>/images/webp/web-slike/pistacio-tiramisu2.webp" alt="Dubai Tiramisu"
                                class="block max-w-[250px] md:max-w-[350px] h-auto">
                        </div>
                    </div>
                </div>

                <!-- Cake Modal Overlay -->
                <div id="cake-modal"
                    class="fixed inset-0 z-[100] flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
                    <div id="modal-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
                    <div id="modal-content"
                        class="relative bg-white dark:bg-[#1a1a1a] w-full max-w-6xl mx-4 rounded-3xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300 flex flex-col md:flex-row max-h-[85vh]">
                        <button id="modal-close"
                            class="absolute top-4 left-4 z-50 p-3 rounded-full bg-white/80 dark:bg-black/80 hover:bg-white dark:hover:bg-black transition-colors shadow-lg backdrop-blur-sm"
                            aria-label="Zatvori galeriju">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-black dark:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div
                            class="w-full md:w-1/2 h-72 md:h-auto bg-gray-50 dark:bg-gray-800/50 relative flex items-center justify-center p-4 md:p-8 shrink-0">
                            <img id="modal-img" src="" alt="Cake" class="w-full h-full object-contain">
                        </div>
                        <div
                            class="w-full md:w-1/2 p-6 md:p-12 flex flex-col justify-center text-center md:text-left overflow-y-auto flex-1">
                            <span class="text-aroma-gold tracking-[0.2em] uppercase text-xs font-bold mb-4 block">Aroma Premium</span>
                            <h3 id="modal-title" class="font-serif text-3xl md:text-4xl mb-6 text-black dark:text-white leading-tight"></h3>
                            <p id="modal-desc" class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed mb-8"></p>
                            <button onclick="closeModal(); document.getElementById('order-cake-btn').click();"
                                class="px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl text-black dark:text-white font-bold uppercase tracking-wider self-center md:self-start shrink-0"
                                aria-label="Naruči tortu">
                                Naruči
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button id="order-cake-btn"
                    class="inline-block px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-aroma-gold text-black backdrop-blur-xl shadow-lg transition-all hover:bg-aroma-gold/80 hover:scale-105 hover:shadow-xl font-bold uppercase tracking-widest mr-4"
                    data-i18n="order_cake" aria-label="Naruči tortu po narudžbi">
                    Naruči Tortu
                </button>
                <a href="#lokacija" id="contact-btn"
                    class="inline-block px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:border-black/20 dark:hover:border-white/20 hover:shadow-xl text-black dark:text-white uppercase tracking-widest"
                    data-i18n="contact_us">
                    Kontaktirajte Nas
                </a>
            </div>
        </div>
        <!-- Bulp Transition (Torte -> Ponuda) -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20">
            <svg class="relative block w-full h-[60px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 Q600,120 1200,0 V120 H0 V0 Z" class="fill-white/30 dark:fill-black/30"></path>
            </svg>
        </div>
    </section>

    <!-- Cake Order Modal -->
    <div id="cake-order-modal"
        class="fixed inset-0 z-[20000] flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 p-4 overflow-y-auto">
        <div id="order-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
        <div id="order-modal-content" class="relative w-full max-w-md mx-auto my-8 transform scale-95 transition-all duration-300">
            <div class="relative">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[85%] h-16 bg-gradient-to-b from-aroma-gold/30 to-aroma-gold/20 backdrop-blur-xl border-2 border-aroma-gold/40 rounded-t-3xl"></div>
                <div class="absolute top-12 left-1/2 -translate-x-1/2 w-[92%] h-16 bg-gradient-to-b from-white/25 to-white/15 dark:from-black/25 dark:to-black/15 backdrop-blur-xl border-2 border-aroma-gold/30"></div>
                <div class="relative mt-24 bg-white/20 dark:bg-black/20 backdrop-blur-xl border-2 border-aroma-gold/30 rounded-b-3xl shadow-2xl overflow-hidden">
                    <button id="order-close"
                        class="absolute top-4 right-4 z-50 p-2 rounded-full bg-white/80 dark:bg-black/80 hover:bg-white dark:hover:bg-black transition-colors shadow-lg"
                        aria-label="Zatvori formu za narudžbu">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-black dark:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="p-8 pt-12">
                        <div class="text-center mb-6">
                            <div class="text-6xl mb-3">🎂</div>
                            <h3 class="font-serif text-3xl text-black dark:text-white mb-2" data-i18n="order_cake_title">Naruči Tortu</h3>
                            <p class="text-gray-700 dark:text-gray-300 text-sm" data-i18n="order_cake_desc">Ispunite formu i kontaktirat ćemo vas uskoro!</p>
                        </div>
                        <form id="cake-order-form" class="space-y-4" action="https://formspree.io/f/mqedavwb"
                            method="POST" novalidate>
                            <input type="text" name="_gotcha" style="display:none" tabindex="-1" autocomplete="off">
                            <div class="hidden" aria-hidden="true">
                                <label for="website">Ostavite ovo polje praznim</label>
                                <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                            </div>
                            <div>
                                <input type="text" name="name" required placeholder="Ime i prezime *" autocomplete="name"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/40 dark:bg-black/40 backdrop-blur-sm border border-white/50 dark:border-white/20 text-black dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-aroma-gold transition-all">
                            </div>
                            <div>
                                <input type="tel" name="phone" required placeholder="Telefon *" autocomplete="tel"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/40 dark:bg-black/40 backdrop-blur-sm border border-white/50 dark:border-white/20 text-black dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-aroma-gold transition-all">
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Email (opciono)" autocomplete="email"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/40 dark:bg-black/40 backdrop-blur-sm border border-white/50 dark:border-white/20 text-black dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-aroma-gold transition-all">
                            </div>
                            <div>
                                <select name="cake-type" required
                                    class="w-full px-4 py-3 rounded-2xl bg-white/40 dark:bg-black/40 backdrop-blur-sm border border-white/50 dark:border-white/20 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-aroma-gold transition-all">
                                    <option value="">Tip torte *</option>
                                    <option value="birthday">Rođendanska torta</option>
                                    <option value="wedding">Vjenčana torta</option>
                                    <option value="anniversary">Godišnjica</option>
                                    <option value="custom">Posebna prilika</option>
                                </select>
                            </div>
                            <div>
                                <input type="number" name="servings" min="1" placeholder="Broj osoba" autocomplete="off"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/40 dark:bg-black/40 backdrop-blur-sm border border-white/50 dark:border-white/20 text-black dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-aroma-gold transition-all">
                            </div>
                            <div>
                                <textarea name="message" rows="3" placeholder="Dodatne želje i detalji..." autocomplete="off"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/40 dark:bg-black/40 backdrop-blur-sm border border-white/50 dark:border-white/20 text-black dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-aroma-gold transition-all resize-none"></textarea>
                            </div>
                            <div class="flex items-start gap-3">
                                <input type="checkbox" name="gdpr_consent" id="gdpr_consent" required
                                    class="mt-1 w-5 h-5 rounded border-white/50 dark:border-white/20 bg-white/40 dark:bg-black/40 text-aroma-gold focus:ring-2 focus:ring-aroma-gold transition-all cursor-pointer">
                                <label for="gdpr_consent"
                                    class="text-xs text-gray-700 dark:text-gray-300 leading-relaxed cursor-pointer">
                                    Slanjem ove forme pristajete na obradu osobnih podataka u svrhu obrade vaše narudžbe.
                                    Pročitajte našu
                                    <a href="<?= esc_url( home_url('/politika-privatnosti') ) ?>" target="_blank" rel="noopener noreferrer"
                                        class="text-aroma-gold hover:underline font-medium">Politiku privatnosti</a>. *
                                </label>
                            </div>
                            <div style="position:absolute;left:-5000px;top:-5000px;" aria-hidden="true">
                                <input type="text" name="website_url" id="website_extra" tabindex="-1" autocomplete="nope">
                                <input type="text" name="phone_backup" tabindex="-1" autocomplete="off">
                                <input type="email" name="email_confirm" tabindex="-1" autocomplete="off">
                            </div>
                            <button type="submit"
                                class="w-full px-6 py-3 rounded-full bg-aroma-gold text-black font-bold uppercase tracking-wider shadow-lg hover:bg-aroma-gold/80 hover:scale-105 transition-all"
                                aria-label="Pošalji narudžbu">
                                Pošalji Narudžbu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thank You Message Modal -->
    <div id="thank-you-modal"
        class="fixed inset-0 z-[20001] flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
        <div class="relative bg-white dark:bg-[#1a1a1a] rounded-3xl p-8 max-w-md mx-4 text-center shadow-2xl transform scale-95 transition-all duration-300"
            id="thank-you-content">
            <div class="text-6xl mb-4">🎉</div>
            <h3 class="font-serif text-3xl text-black dark:text-white mb-3">Hvala vam!</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Vaša narudžba je primljena. Kontaktirat ćemo vas uskoro kako bismo potvrdili detalje.</p>
            <button id="thank-you-close"
                class="px-8 py-3 rounded-full bg-aroma-gold text-black font-bold uppercase tracking-wider hover:bg-aroma-gold/80 transition-all"
                aria-label="Zatvori poruku">
                U redu
            </button>
        </div>
    </div>

    <section id="ponuda"
        class="py-32 relative backdrop-blur-md bg-white/30 dark:bg-black/30 border-y border-aroma-gold/20 z-30 overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('<?= $tdu ?>/images/webp/mrvice.webp')] bg-cover bg-center bg-no-repeat opacity-5 dark:opacity-0 pointer-events-none">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20 scroll-fade-up">
                <h2 class="font-serif text-4xl md:text-5xl mb-4" data-i18n="offer_title">Naša Remek Djela</h2>
                <div class="w-24 h-1 bg-aroma-gold mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="group bg-white/50 dark:bg-black/50 border border-black/5 dark:border-white/5 p-6 hover:border-aroma-gold/30 transition-all duration-300 rounded-sm">
                    <div class="h-48 mb-6 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-aroma-gold/5 to-transparent rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="<?= $tdu ?>/images/webp/cokolada1.webp" alt="Čokolada"
                            class="h-full w-auto object-contain group-hover:-translate-y-2 transition-transform duration-500" loading="lazy">
                    </div>
                    <h3 class="font-serif text-xl mb-2 text-black dark:text-white font-bold group-hover:text-aroma-gold transition-colors"
                        data-i18n="offer_choc">Kraljevska Čokolada</h3>
                    <p class="text-black dark:text-gray-200 text-sm font-medium" data-i18n="offer_choc_desc">Belgijska čokolada s komadićima lješnjaka.</p>
                </div>
                <div class="group bg-white/50 dark:bg-black/50 border border-black/5 dark:border-white/5 p-6 hover:border-aroma-gold/30 transition-all duration-300 rounded-sm">
                    <div class="h-48 mb-6 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-500/5 to-transparent rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="<?= $tdu ?>/images/webp/sumsko.webp" alt="Šumsko voće"
                            class="h-full object-contain scale-[1.8] group-hover:-translate-y-2 transition-transform duration-500" loading="lazy">
                    </div>
                    <h3 class="font-serif text-xl mb-2 text-black dark:text-white font-bold group-hover:text-aroma-gold transition-colors"
                        data-i18n="offer_berry">Šumsko Voće</h3>
                    <p class="text-black dark:text-gray-200 text-sm font-medium" data-i18n="offer_berry_desc">Svježe bobičasto voće na kremastoj podlozi.</p>
                </div>
                <div class="group bg-white/50 dark:bg-black/50 border border-black/5 dark:border-white/5 p-6 hover:border-aroma-gold/30 transition-all duration-300 rounded-sm">
                    <div class="h-48 mb-6 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-orange-500/5 to-transparent rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="<?= $tdu ?>/images/webp/slana-karamela.webp" alt="Karamela"
                            class="h-full object-contain group-hover:-translate-y-2 transition-transform duration-500" loading="lazy">
                    </div>
                    <h3 class="font-serif text-xl mb-2 text-black dark:text-white font-bold group-hover:text-aroma-gold transition-colors"
                        data-i18n="offer_caramel">Slana Karamela</h3>
                    <p class="text-black dark:text-gray-200 text-sm font-medium" data-i18n="offer_caramel_desc">Domaća karamela s prstohvatom morske soli.</p>
                </div>
                <div class="group bg-white/50 dark:bg-black/50 border border-black/5 dark:border-white/5 p-6 hover:border-aroma-gold/30 transition-all duration-300 rounded-sm">
                    <div class="h-48 mb-6 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-green-500/5 to-transparent rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="<?= $tdu ?>/images/webp/pistacio.webp" alt="Pistacio"
                            class="h-full object-contain group-hover:-translate-y-2 transition-transform duration-500" loading="lazy">
                    </div>
                    <h3 class="font-serif text-xl mb-2 text-black dark:text-white font-bold group-hover:text-aroma-gold transition-colors"
                        data-i18n="offer_pistachio">Sicilijanski Pistacio</h3>
                    <p class="text-black dark:text-gray-200 text-sm font-medium" data-i18n="offer_pistachio_desc">100% pasta od pistacija sa Sicilije.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="dostava" class="relative h-[600px] flex items-center overflow-hidden bg-[#f7fcf0] dark:bg-[#0f0f0f]">
        <div class="absolute top-0 left-0 w-full overflow-hidden leading-none z-20 rotate-180">
            <svg class="relative block w-full h-[60px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 Q600,120 1200,0 V120 H0 V0 Z" class="fill-white/30 dark:fill-black/30"></path>
            </svg>
        </div>
        <div class="absolute inset-0 z-0">
            <img src="<?= $tdu ?>/images/webp/wolt.webp" alt="Delivery Background"
                class="w-full h-full object-cover object-center opacity-60 dark:opacity-30" loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-t from-[#d5e8b3]/80 via-white/20 to-[#f7fcf0]/80 dark:from-[#0f0f0f] dark:via-[#0f0f0f]/50 dark:to-[#0f0f0f]"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="font-serif text-5xl md:text-7xl mb-6 reveal-up font-bold" data-i18n="delivery_title">Želite
                slatko <br><span class="text-aroma-gold">odmah?</span></h2>
            <p class="text-xl text-gray-900 dark:text-gray-300 mb-12 reveal-up font-light tracking-wide"
                data-i18n="delivery_desc">Naručite dostavu na kućnu adresu.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-6 reveal-up">
                <a href="https://wolt.com/hr/hrv/slavonski-brod/restaurant/aroma-slasticarnica" target="_blank"
                    rel="noopener noreferrer"
                    class="px-10 py-4 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:shadow-xl text-black dark:text-white font-bold uppercase tracking-wider"
                    data-i18n="delivery_wolt">
                    Naruči na Wolt
                </a>
                <a href="https://glovoapp.com/hr/hr/slavonski-brod/aroma-slasticarnica-slb/" target="_blank"
                    rel="noopener noreferrer"
                    class="px-10 py-4 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:shadow-xl text-black dark:text-white font-bold uppercase tracking-wider"
                    data-i18n="delivery_glovo">
                    Naruči na Glovo
                </a>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20">
            <svg class="relative block w-full h-[60px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 Q600,120 1200,0 V120 H0 V0 Z" class="fill-[#fdfdfd] dark:fill-[#0f0f0f]"></path>
            </svg>
        </div>
    </section>

    <section id="kolaci" class="py-24 relative bg-transparent dark:bg-transparent z-30">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl mb-4" data-i18n="cakes_title">Kolači</h2>
                <div class="w-24 h-1 bg-aroma-gold mx-auto"></div>
                <p class="mt-4 text-gray-700 dark:text-gray-300 max-w-2xl mx-auto" data-i18n="cakes_desc">Svaki zalogaj je mala simfonija okusa. Ručno rađeni s ljubavlju.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group relative overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold">
                    <img src="<?= $tdu ?>/images/webp/web-slike/tiramisu.webp" alt="Tiramisu"
                        class="w-full h-64 object-cover object-[30%] transition-transform duration-500 scale-[1.15] group-hover:scale-125" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="text-white font-serif text-2xl mb-1" data-i18n="cake_tiramisu">Tiramisu</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0"
                            data-i18n="cake_tiramisu_desc">Talijanski klasik s mascarpone kremom i piškotama natopljenim kavom.</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold">
                    <img src="<?= $tdu ?>/images/webp/web-slike/pistacio-tiramisu2.webp" alt="Dubai Tiramisu"
                        class="w-full h-64 object-cover transition-transform duration-500 scale-[1.15] group-hover:scale-125" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="text-white font-serif text-2xl mb-1">Dubai Tiramisu</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">Sofisticirani tiramisu sa pistacijom. Italija i Bliski istok u jednom zalogaju.</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg border-2 border-aroma-gold">
                    <img src="<?= $tdu ?>/images/webp/web-slike/medovik.webp" alt="Medovik"
                        class="w-full h-64 object-cover transition-transform duration-500 scale-[1.15] group-hover:scale-125" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                        <h3 class="text-white font-serif text-2xl mb-1" data-i18n="cake_medovik">Medovik</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0"
                            data-i18n="cake_medovik_desc">Tradicionalna torta s medenim korama i laganom kremom.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="palacinke" class="py-24 relative bg-transparent dark:bg-transparent z-30 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-aroma-gold/5 skew-x-12 transform origin-top-right"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="md:w-1/2 pancakes-text-reveal">
                    <span class="text-aroma-gold tracking-[0.2em] uppercase text-sm font-bold mb-4 block"
                        data-i18n="pancakes_subtitle">Slatki Doručak ili Večera</span>
                    <h2 class="font-serif text-4xl md:text-5xl mb-6 leading-tight" data-i18n="pancakes_title">Palačinke
                        <br> <span class="text-aroma-gold italic">iz snova.</span></h2>
                    <p class="text-black dark:text-gray-200 text-lg mb-6 leading-relaxed" data-i18n="pancakes_desc">
                        Naše palačinke su mekane, tople i bogato punjene. Bilo da volite klasičnu čokoladu, domaći džem
                        ili modernu kombinaciju s pistacijom i bijelom čokoladom, imamo savršen izbor za vas.
                    </p>
                    <ul class="space-y-4 mb-8 pancakes-list">
                        <li class="flex items-center gap-3 text-black dark:text-gray-200 font-medium pancake-item">
                            <span class="w-2 h-2 bg-aroma-gold rounded-full"></span>
                            <span data-i18n="pancakes_item1">Nutella & Plazma</span>
                        </li>
                        <li class="flex items-center gap-3 text-black dark:text-gray-200 font-medium pancake-item">
                            <span class="w-2 h-2 bg-aroma-gold rounded-full"></span>
                            <span data-i18n="pancakes_item2">Bijela Čokolada & Šumsko Voće</span>
                        </li>
                        <li class="flex items-center gap-3 text-black dark:text-gray-200 font-medium pancake-item">
                            <span class="w-2 h-2 bg-aroma-gold rounded-full"></span>
                            <span data-i18n="pancakes_item3">Kinder Bueno Special</span>
                        </li>
                    </ul>
                    <a href="#dostava"
                        class="inline-block px-8 py-3 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-xl shadow-lg transition-all hover:bg-black/10 dark:hover:bg-white/10 hover:shadow-xl text-black dark:text-white font-medium uppercase tracking-widest"
                        data-i18n="pancakes_btn">Naruči Odmah</a>
                </div>
                <div class="md:w-1/2 relative pancakes-image-reveal">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-500 border-2 border-aroma-gold">
                        <img src="<?= $tdu ?>/images/webp/web-slike/palacinke2.webp" alt="Palačinke" class="w-full h-auto object-cover" loading="lazy">
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-full h-full border-2 border-aroma-gold rounded-2xl -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="recenzije" class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 scroll-fade-up">
                <span class="text-aroma-gold tracking-[0.2em] uppercase text-sm font-bold mb-4 block">Povjerenje naših gostiju</span>
                <h2 class="font-serif text-4xl md:text-5xl mb-6 text-black dark:text-white text-balance">
                    Doživljaj koji se <span class="text-aroma-gold italic">dijeli.</span>
                </h2>
                <div class="w-24 h-1 bg-aroma-gold mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="scroll-scale-up group bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-black/5 dark:border-white/10 p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="flex items-center gap-1 text-aroma-gold mb-6 text-lg">★★★★★</div>
                    <p class="text-gray-800 dark:text-gray-300 italic mb-8 leading-relaxed">
                        "Definitivno najbolji sladoled u gradu, ali i šire. Okus pistacije je nevjerojatan, a porcije su i više nego velikodušne. Osoblje je iznimno ljubazno."
                    </p>
                    <div class="flex items-center justify-between border-t border-black/5 dark:border-white/10 pt-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-aroma-gold rounded-full flex items-center justify-center text-white font-serif text-xl">D</div>
                            <div>
                                <h4 class="font-bold text-sm dark:text-white uppercase tracking-wider">Davor J.</h4>
                                <p class="text-[10px] text-gray-500 uppercase tracking-widest">Google Local Guide</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll-scale-up group bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-black/5 dark:border-white/10 p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition-all duration-500" style="transition-delay: 150ms;">
                    <div class="flex items-center gap-1 text-aroma-gold mb-6 text-lg">★★★★★</div>
                    <p class="text-gray-800 dark:text-gray-300 italic mb-8 leading-relaxed">
                        "Slastičarnica s dušom i tradicijom. Kolači su uvijek svježi i domaći, a ambijent na Korzu je neponovljiv. Mjesto gdje se rado vraćamo s djecom."
                    </p>
                    <div class="flex items-center justify-between border-t border-black/5 dark:border-white/10 pt-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-aroma-gold rounded-full flex items-center justify-center text-white font-serif text-xl">E</div>
                            <div>
                                <h4 class="font-bold text-sm dark:text-white uppercase tracking-wider">Elena B.</h4>
                                <p class="text-[10px] text-gray-500 uppercase tracking-widest">Prije mjesec dana</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll-scale-up group bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-black/5 dark:border-white/10 p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition-all duration-500" style="transition-delay: 300ms;">
                    <div class="flex items-center gap-1 text-aroma-gold mb-6 text-lg">★★★★★</div>
                    <p class="text-gray-800 dark:text-gray-300 italic mb-8 leading-relaxed">
                        "Aroma je institucija Slavonskog Broda. Od usluge do kvalitete namirnica, sve je na vrhunskoj razini. Topla preporuka za sve koji posjete Brod."
                    </p>
                    <div class="flex items-center justify-between border-t border-black/5 dark:border-white/10 pt-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-aroma-gold rounded-full flex items-center justify-center text-white font-serif text-xl">M</div>
                            <div>
                                <h4 class="font-bold text-sm dark:text-white uppercase tracking-wider">Marko K.</h4>
                                <p class="text-[10px] text-gray-500 uppercase tracking-widest">Lokalni poznavatelj</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="lokacija" class="py-16 bg-white dark:bg-[#0f0f0f]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="w-full lg:w-1/3 space-y-8">
                    <div>
                        <h2 class="font-serif text-3xl md:text-4xl mb-4" data-i18n="location_title">Posjetite nas</h2>
                        <div class="w-16 h-1 bg-aroma-gold mb-6"></div>
                        <p class="text-gray-700 dark:text-gray-300" data-i18n="location_desc">Uživajte u ambijentu naše slastičarne u samom centru grada.</p>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4 group">
                            <div class="p-3 bg-aroma-gold/10 rounded-full text-aroma-gold group-hover:bg-aroma-gold group-hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-serif text-lg font-bold mb-1" data-i18n="location_address_title">Adresa</h3>
                                <p class="text-gray-700 dark:text-gray-300">Trg Ivane Brlić Mažuranić 6<br>35000 Slavonski Brod</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="p-3 bg-aroma-gold/10 rounded-full text-aroma-gold group-hover:bg-aroma-gold group-hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-serif text-lg font-bold mb-1" data-i18n="location_phone_title">Telefon</h3>
                                <p class="text-gray-700 dark:text-gray-300"><a href="tel:+38535352034" class="hover:text-aroma-gold transition-colors">+385 35 352 034</a></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div class="p-3 bg-aroma-gold/10 rounded-full text-aroma-gold group-hover:bg-aroma-gold group-hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-serif text-lg font-bold mb-1" data-i18n="location_email_title">Email</h3>
                                <p class="email-link text-gray-700 dark:text-gray-300"
                                   data-user="info"
                                   data-domain="aroma-since-1923"
                                   data-tld="hr">
                                    [učitavanje email-a...]
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/3 h-[400px] relative grayscale hover:grayscale-0 transition-all duration-500 rounded-2xl overflow-hidden shadow-2xl border border-gray-100 dark:border-gray-800">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2813.665554990515!2d18.009614176593264!3d45.15337085412353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475db9ff38438257%3A0x2e78c97207c2b57f!2sSlasti%C4%8Darnica%20Aroma%20since%201923!5e0!3m2!1shr!2sde!4v1770481252941!5m2!1shr!2sde"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Google mapa lokacije Aroma Slastičarna"></iframe>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20">
            <svg class="relative block w-full h-[60px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 Q600,120 1200,0 V120 H0 V0 Z" class="fill-gray-100 dark:fill-black"></path>
            </svg>
        </div>
    </section>
