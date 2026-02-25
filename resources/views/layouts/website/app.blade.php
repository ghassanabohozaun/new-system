<!DOCTYPE html>
<html lang="{{ Lang() }}" dir="{{ Lang() == 'ar' ? 'rtl' : 'ltr' }}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{!! asset('assets/website/css/bootstrap.rtl.min.css') !!}">
    @else
        <link rel="stylesheet" href="{!! asset('assets/website/css/bootstrap.min.css') !!}">
    @endif
    <link rel="stylesheet" href="{!! asset('assets/website/css/fonts.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/website/css/bootstrap-icons.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/website/css/swiper-bundle.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/website/css/style.css') !!}">
    <link rel="shortcut icon" href="{!! setting()->favicon
        ? asset('uploads/settings/' . setting()->favicon)
        : asset('assets/website/images/logo-mini.png') !!}" />

    @stack('css')
</head>

<body class="bg-light">

    @include('layouts.website.parts.preloader')
    @include('layouts.website.parts.scroll-progress-bar')


    <div class="container-fluid bg-white p-0">
        <div class="row justify-content-center m-0">
            <div class="col-12 col-lg-10 p-0 position-relative shadow-sm">


                @include('layouts.website.parts.navbar')

                <!-- header  -->
                <header class="hero-section">
                    <!-- heroCarousel -->
                    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
                        <div class="carousel-indicators mb-5">
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0"
                                class="active"></button>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                        </div>

                        <div class="carousel-inner h-100">
                            <div class="carousel-item active" style="background-image: url('{!! asset('assets/website/images/external/external_8.jpg') !!}');">
                                <div class="hero-overlay">
                                    <div class="container text-center text-white pb-5">
                                        <div class="mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="80"
                                                height="80">
                                                <g stroke="#ffffff" stroke-width="4" fill="none">
                                                    <path d="M50 10 L50 90 M10 50 L90 50" opacity="0.5" />
                                                    <rect x="30" y="30" width="40" height="40" rx="10" />
                                                    <circle cx="50" cy="50" r="8" fill="#d4a34d"
                                                        stroke="none" />
                                                </g>
                                            </svg>
                                        </div>
                                        <h1 class="display-3 fw-bold mb-3" style="color: var(--brand-gold);">استكشف
                                            جمال الطبيعة</h1>
                                        <p class="lead fs-4">باقات حصرية تناسب تطلعاتك</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item " style="background-image: url('{!! asset('assets/website/images/external/external_7.jpg') !!}');">
                                <div class="hero-overlay">
                                    <div class="container text-center text-white pb-5">
                                        <div class="mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="80"
                                                height="80">
                                                <g stroke="#ffffff" stroke-width="4" fill="none">
                                                    <path d="M50 10 L50 90 M10 50 L90 50" opacity="0.5" />
                                                    <rect x="30" y="30" width="40" height="40" rx="10" />
                                                    <circle cx="50" cy="50" r="8" fill="#d4a34d"
                                                        stroke="none" />
                                                </g>
                                            </svg>
                                        </div>
                                        <h1 class="display-3 fw-bold mb-3" style="color: var(--brand-gold);">يلا نبدأ
                                            المغامرة</h1>
                                        <p class="lead fs-4">تصفح أفضل الرحلات السياحية حول العالم بأسعار تناسب
                                            ميزانيتك وخططك</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <div class="search-container">
                        <div class="search-box-animated reveal active">
                            <form action="/search" method="GET"
                                class="d-flex align-items-center flex-wrap flex-md-nowrap">
                                <div class="d-flex align-items-center flex-grow-1 pe-3 search-input-group">
                                    <i class="bi bi-search text-muted fs-4 ms-3 search-icon-pulse"></i>
                                    <input type="text" name="query"
                                        class="form-control border-0 shadow-none bg-transparent text-start search-input-premium"
                                        placeholder="ابحث عن رحلتك القادمة ...">
                                </div>

                                <button class="btn btn-navy-search-glow mt-3 mt-md-0" type="submit">
                                    <span>بحث</span>
                                    <i class="bi bi-send-fill ms-2 search-btn-icon"></i>
                                </button>
                            </form>
                        </div>
                    </div>


                </header>

                <section class="services-section mt-md-5">
                    <div class="container text-center mt-1 pt-1">
                        <h2 class="fw-bold mb-3" style="color: var(--brand-navy);">خدماتنا المتنوعة</h2>
                        <p class="text-muted mb-5 mx-auto" style="max-width: 800px;">
                            انضم إلى آلاف المسافرين الذين اختاروا هذه الرحلات المميزة. من تجارب المغامرة إلى الجولات
                            الثقافية، نوفر لك فرصاً لحجز رحلات لا تُنسى بسهولة وأمان.
                        </p>

                        <div class="row justify-content-center g-4 noqat-unified-services">

                            <div class="col-6 col-md-4 col-lg">
                                <div class="luxury-kinetic-card" data-glow="#dda53b">
                                    <div class="card-glass"></div>
                                    <div class="card-body-content">
                                        <div class="icon-orb"><i class="bi bi-map"></i></div>
                                        <h6 class="service-title">السياحة الداخلية</h6>
                                        <p class="service-text">استكشف جمال الوطن برحلات عائلية مميزة.</p>
                                        <a href="#" class="view-btn">عرض الكل <i
                                                class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 col-lg">
                                <div class="luxury-kinetic-card" data-glow="#1DA1F2">
                                    <div class="card-glass"></div>
                                    <div class="card-body-content">
                                        <div class="icon-orb"><i class="bi bi-globe-americas"></i></div>
                                        <h6 class="service-title">السياحة الخارجية</h6>
                                        <p class="service-text">سافر لأجمل وجهات العالم بخدمات VIP.</p>
                                        <a href="#" class="view-btn">عرض الكل <i
                                                class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 col-lg">
                                <div class="luxury-kinetic-card" data-glow="#dda53b">
                                    <div class="card-glass"></div>
                                    <div class="card-body-content">
                                        <div class="icon-orb"><i class="bi bi-backpack4"></i></div>
                                        <h6 class="service-title">الرحلات السياحية</h6>
                                        <p class="service-text">مغامرات وأنشطة ترفيهية تناسب الجميع.</p>
                                        <a href="#" class="view-btn">عرض الكل <i
                                                class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 col-lg">
                                <div class="luxury-kinetic-card" data-glow="#28a745">
                                    <div class="card-glass"></div>
                                    <div class="card-body-content">
                                        <div class="icon-orb"><i class="bi bi-ticket-perforated"></i></div>
                                        <h6 class="service-title">تذاكر الطيران</h6>
                                        <p class="service-text">أفضل عروض الحجز على كافة الخطوط.</p>
                                        <a href="#" class="view-btn">عرض الكل <i
                                                class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 col-lg">
                                <div class="luxury-kinetic-card" data-glow="#dda53b">
                                    <div class="card-glass"></div>
                                    <div class="card-body-content">
                                        <div class="icon-orb"><i class="bi bi-moon-stars"></i></div>
                                        <h6 class="service-title">الحج والعمرة</h6>
                                        <p class="service-text">رحلات إيمانية ميسرة بأعلى معايير الراحة.</p>
                                        <a href="#" class="view-btn">عرض الكل <i
                                                class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="py-5 bg-white reveal">
                    <div class="container pb-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold mb-3" style="color: var(--brand-navy);">اكتشف الوجهات الأكثر طلباً</h2>
                            <p class="text-muted">اختر وجهتك القادمة من بين مجموعة مختارة من أجمل الأماكن حول العالم
                            </p>
                        </div>

                        <div class="row g-4 reveal tilt-container">


                            <div class="col-md-6 col-lg-4 tilt-container">
                                <div class="card dest-card tilt-card shadow-sm h-100 border-0">
                                    <div class="overflow-hidden position-relative img-shine-container">
                                        <img src="{!! asset('assets/website/images/external/external_9.jpg') !!}" class="dest-img" alt="الرياض">
                                        <span
                                            class="badge position-absolute top-0 end-0 m-3 px-3 py-2 bg-gold text-white fw-bold">الأكثر
                                            مبيعاً</span>
                                    </div>
                                    <div class="card-body p-4 text-start">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted small"><i
                                                    class="bi bi-geo-alt-fill text-warning me-1"></i> الرياض،
                                                السعودية</span>
                                            <span class="text-muted small"><i
                                                    class="bi bi-clock-history text-warning me-1"></i> 4 أيام / 3
                                                ليالي</span>
                                        </div>
                                        <h5 class="card-title fw-bold text-dark mb-3">منتجع موفنبيك نعمه باي</h5>
                                        <p class="text-muted small mb-4">استمتع بإقامة فاخرة مع إطلالات ساحرة وخدمات
                                            فندقية عالمية متكاملة.</p>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <span class="fs-4 fw-bold"
                                                        style="color: var(--brand-gold);">15,300</span>
                                                    <small class="text-muted fw-bold">ر.س</small>
                                                </div>
                                                <button type="button" class="btn-calc-launcher-premium"
                                                    onclick="openDeluxeCalculator(15300, 'SAR')" title="محول العملات">
                                                    <i class="bi bi-calculator-fill"></i>
                                                </button>
                                            </div>

                                            <a href="#" class="btn btn-outline-navy btn-sm px-3 fw-bold">عرض
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 col-lg-4 tilt-card">
                                <div class="card dest-card shadow-sm h-100 border-0">
                                    <div class="overflow-hidden position-relative img-shine-container">
                                        <img src="{!! asset('assets/website/images/external/external_10.jpg') !!}" class="dest-img" alt="دبي">
                                    </div>
                                    <div class="card-body p-4 text-start">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted small"><i
                                                    class="bi bi-geo-alt-fill text-warning me-1"></i> دبي،
                                                الإمارات</span>
                                            <span class="text-muted small"><i
                                                    class="bi bi-clock-history text-warning me-1"></i> 5 أيام / 4
                                                ليالي</span>
                                        </div>
                                        <h5 class="card-title fw-bold text-dark mb-3">فندق أتلانتس النخلة</h5>
                                        <p class="text-muted small mb-4">مغامرة لا تُنسى في عالم المجمعات المائية
                                            والرفاهية المطلقة في قلب دبي.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="fs-4 fw-bold"
                                                    style="color: var(--brand-gold);">21,000</span>
                                                <small class="text-muted fw-bold">ر.س</small>
                                            </div>
                                            <a href="#" class="btn btn-outline-navy btn-sm px-3 fw-bold">عرض
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 tilt-card">
                                <div class="card dest-card shadow-sm h-100 border-0">
                                    <div class="overflow-hidden position-relative img-shine-container">
                                        <img src="{!! asset('assets/website/images/external/external_11.jpg') !!}" class="dest-img" alt="المالديف">
                                    </div>
                                    <div class="card-body p-4 text-start">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted small"><i
                                                    class="bi bi-geo-alt-fill text-warning me-1"></i> جزر
                                                المالديف</span>
                                            <span class="text-muted small"><i
                                                    class="bi bi-clock-history text-warning me-1"></i> 7 أيام / 6
                                                ليالي</span>
                                        </div>
                                        <h5 class="card-title fw-bold text-dark mb-3">منتجع جزيرة كوراماتي</h5>
                                        <p class="text-muted small mb-4">استرخاء تام في المحيط الهندي مع شواطئ رملية
                                            بيضاء ومياه فيروزية صافية.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="fs-4 fw-bold"
                                                    style="color: var(--brand-gold);">32,500</span>
                                                <small class="text-muted fw-bold">ر.س</small>
                                            </div>
                                            <a href="#" class="btn btn-outline-navy btn-sm px-3 fw-bold">عرض
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-5 reveal" style="background-color: #fcfcfc;">
                    <div class="container-fluid px-lg-5">
                        <div class="text-center mb-5">
                            <h6 class="text-muted fw-bold mb-2">السياحة الخارجية</h6>
                            <h2 class="fw-bold mb-3" style="color: var(--brand-navy);">وجهاتنا نحو الخارج</h2>
                            <p class="text-muted mx-auto" style="max-width: 800px;">استكشف العالم معنا من خلال رحلاتنا
                                المنظمة لأجمل الوجهات العالمية</p>
                        </div>

                        <div class="position-relative px-4">
                            <div class="swiper internationalSwiper">
                                <div class="swiper-wrapper reveal tilt-container">

                                    <div class="swiper-slide p-2 tilt-card ">
                                        <div class="card dest-card shadow-sm border-0 h-100">
                                            <div class="overflow-hidden position-relative img-shine-container">
                                                <img src="{!! asset('assets/website/images/external/external_12.jpg') !!}" class="dest-img" alt="Dubai">
                                                <span
                                                    class="badge position-absolute top-0 end-0 m-3 px-3 py-2 bg-gold text-white fw-bold">Best
                                                    Seller</span>
                                            </div>
                                            <div class="card-body p-3 text-start">
                                                <h6 class="fw-bold text-dark mb-2">دبي - فندق أتلانتس</h6>
                                                <p class="text-muted mb-3 small">إقامة فاخرة شاملة الخدمات مع إطلالة
                                                    بحرية.</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold text-gold">21,000 ر.س</span>
                                                    <a href="#" class="btn btn-outline-navy btn-sm">التفاصيل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide p-2 tilt-card">
                                        <div class="card dest-card shadow-sm border-0 h-100">
                                            <div class="overflow-hidden position-relative img-shine-container">
                                                <img src="{!! asset('assets/website/images/external/external_13.jpg') !!}" class="dest-img" alt="Maldives">
                                            </div>
                                            <div class="card-body p-3 text-start">
                                                <h6 class="fw-bold text-dark mb-2">جزر المالديف - منتجع كورومبا</h6>
                                                <p class="text-muted mb-3 small">استرخاء تام في قلب المحيط الهندي.</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold text-gold">18,500 ر.س</span>
                                                    <a href="#" class="btn btn-outline-navy btn-sm">التفاصيل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide p-2 tilt-card">
                                        <div class="card dest-card shadow-sm border-0 h-100">
                                            <div class="overflow-hidden position-relative img-shine-container">
                                                <img src="{!! asset('assets/website/images/external/external_14.jpg') !!}" class="dest-img" alt="Istanbul">
                                            </div>
                                            <div class="card-body p-3 text-start">
                                                <h6 class="fw-bold text-dark mb-2">إسطنبول - جولة تاريخية</h6>
                                                <p class="text-muted mb-3 small">استكشف جمال العمارة العثمانية والأسواق
                                                    الشهيرة.</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold text-gold">12,400 ر.س</span>
                                                    <a href="#" class="btn btn-outline-navy btn-sm">التفاصيل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide p-2 tilt-card">
                                        <div class="card dest-card shadow-sm border-0 h-100">
                                            <div class="overflow-hidden position-relative img-shine-container">
                                                <img src="{!! asset('assets/website/images/external/external_15.jpg') !!}" class="dest-img" alt="Paris">
                                            </div>
                                            <div class="card-body p-3 text-start">
                                                <h6 class="fw-bold text-dark mb-2">باريس - مدينة الأضواء</h6>
                                                <p class="text-muted mb-3 small">رحلة رومانسية تشمل زيارة برج إيفل
                                                    ومتحف اللوفر.</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold text-gold">24,000 ر.س</span>
                                                    <a href="#" class="btn btn-outline-navy btn-sm">التفاصيل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide p-2 tilt-card">
                                        <div class="card dest-card shadow-sm border-0 h-100">
                                            <div class="overflow-hidden position-relative img-shine-container">
                                                <img src="{!! asset('assets/website/images/external/external_16.jpg') !!}" class="dest-img" alt="London">
                                            </div>
                                            <div class="card-body p-3 text-start">
                                                <h6 class="fw-bold text-dark mb-2">لندن - جولة ضبابية</h6>
                                                <p class="text-muted mb-3 small">استمتع بتجربة التسوق الفاخر في شارع
                                                    أكسفورد.</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold text-gold">22,800 ر.س</span>
                                                    <a href="#" class="btn btn-outline-navy btn-sm">التفاصيل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide p-2 tilt-card">
                                        <div class="card dest-card shadow-sm border-0 h-100">
                                            <img src="{!! asset('assets/website/images/external/external_17.jpg') !!}" class="dest-img" alt="Bali">
                                            <div class="card-body p-3 text-start">
                                                <h6 class="fw-bold text-dark mb-2">بالي - منتجع الغابة</h6>
                                                <p class="text-muted mb-3 small">هدوء الطبيعة الخلابة بين الغابات
                                                    والشلالات.</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold text-gold">14,200 ر.س</span>
                                                    <a href="#" class="btn btn-outline-navy btn-sm">التفاصيل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide p-2 tilt-card">
                                        <div class="card dest-card shadow-sm border-0 h-100">
                                            <img src="{!! asset('assets/website/images/external/external_18.jpg') !!}" class="dest-img">
                                            <div class="card-body p-3 text-start">
                                                <h6 class="fw-bold text-dark mb-2">بوكيت - تايلاند</h6>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold text-gold">9,500 ر.س</span>
                                                    <a href="#" class="btn btn-outline-navy btn-sm">التفاصيل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-button-prev custom-nav-btn shadow-sm"></div>
                            <div class="swiper-button-next custom-nav-btn shadow-sm"></div>
                        </div>
                    </div>
                </section>


                <section class="py-5 booking-section reveal">
                    <div class="container">

                        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-5 border border-light booking-panel">

                            <div
                                class="d-flex align-items-start align-items-md-center flex-column flex-md-row mb-5 reveal">

                                <div
                                    class="icon-circle-large shadow-sm rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-md-4 mb-3 mx-3 mb-md-0">
                                    <i class="bi bi-airplane-fill fs-1 plane-icon-header"></i>
                                </div>

                                <div class="text-start flex-grow-1">
                                    <span class="text-muted small d-block mb-1">تذاكر الطيران</span>
                                    <h2 class="fw-bold mb-2 text-navy">تذاكر بسعر أوفر</h2>
                                    <p class="text-muted mb-0 booking-desc">
                                        انضم إلى آلاف المسافرين الذين اختاروا هذه الرحلات المميزة. من تجارب المغامرة إلى
                                        الجولات الثقافية، نوفر لك فرصاً لحجز رحلات لا تُنسى بسهولة وأمان.
                                    </p>
                                </div>
                            </div>

                            <hr class="text-muted opacity-10 mb-5">





                            <div class="row align-items-center mb-5 mt-5 text-start reveal active">

                                <div class="col-md-4 mb-4 mb-md-0 position-relative stat-divider-line">
                                    <div class="d-flex align-items-center justify-content-center" style="gap: 15px;">
                                        <div class="flex-shrink-0" style="width: 60px; height: 60px;">
                                            <svg width="60" height="60" viewBox="0 0 64 64" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="32" cy="32" r="22" stroke="#d4a34d"
                                                    stroke-width="2.5" fill="#fcf8f2" />
                                                <path d="M32 10c-7 0-12 10-12 22s5 22 12 22 12-10 12-22-5-22-12-22z"
                                                    stroke="#d4a34d" stroke-width="2.5" />
                                                <path d="M10 32h44" stroke="#d4a34d" stroke-width="2.5" />
                                                <path
                                                    d="M22 20c-2.5 0-4.5 2-4.5 4.5 0 3.5 4.5 9.5 4.5 9.5s4.5-6 4.5-9.5C26.5 22 24.5 20 22 20z"
                                                    fill="#1b3651" />
                                                <path
                                                    d="M42 24c-2.5 0-4.5 2-4.5 4.5 0 3.5 4.5 9.5 4.5 9.5s4.5-6 4.5-9.5C46.5 26 44.5 24 42 24z"
                                                    fill="#1b3651" />
                                                <path
                                                    d="M36 42c-2.5 0-4.5 2-4.5 4.5 0 3.5 4.5 9.5 4.5 9.5s4.5-6 4.5-9.5C40.5 44 38.5 42 36 42z"
                                                    fill="#1b3651" />
                                            </svg>
                                        </div>
                                        <div class="d-flex align-items-center" style="gap: 12px;">
                                            <span class="fw-bolder m-0 p-0"
                                                style="color: #d4a34d; font-size: 2.6rem; line-height: 1;">120</span>
                                            <span class="text-muted small m-0 p-0"
                                                style="line-height: 1.3; white-space: nowrap;">دولة<br>ووجهة</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 mb-md-0 position-relative stat-divider-line">
                                    <div class="d-flex align-items-center justify-content-center" style="gap: 15px;">
                                        <div class="flex-shrink-0" style="width: 60px; height: 60px;">
                                            <svg width="60" height="60" viewBox="0 0 64 64" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g transform="rotate(15 32 32)">
                                                    <rect x="12" y="20" width="40" height="24" rx="4"
                                                        stroke="#d4a34d" stroke-width="2.5" fill="#fcf8f2" />
                                                    <path d="M38 20v24" stroke="#d4a34d" stroke-width="2.5"
                                                        stroke-dasharray="4 4" />
                                                    <path d="M32 30l-6 6h-4l2-2-6-2-2-4 4 1 4-4 8 2 2 3z"
                                                        fill="#1b3651" />
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex align-items-center" style="gap: 12px;">
                                            <div class="d-flex align-items-baseline" style="gap: 6px;">
                                                <span class="fw-bolder m-0 p-0"
                                                    style="color: #d4a34d; font-size: 2.6rem; line-height: 1;">24</span>
                                                <span class="fw-bold m-0 p-0"
                                                    style="color: #d4a34d; font-size: 1.2rem;">ألف</span>
                                            </div>
                                            <span class="text-muted small m-0 p-0"
                                                style="line-height: 1.3; white-space: nowrap;">رحلة<br>مقدمة</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 mb-md-0 position-relative">
                                    <div class="d-flex align-items-center justify-content-center" style="gap: 15px;">
                                        <div class="flex-shrink-0" style="width: 60px; height: 60px;">
                                            <svg width="60" height="60" viewBox="0 0 64 64" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20 50h24v4H20v-4zm4-26h16v22H24V24zm-4 8h-4v14h4V32zm24 0h4v14h-4V32z"
                                                    fill="#d4a34d" />
                                                <path d="M26 24V12c0-3.5 3-6 6-6s6 2.5 6 6v12H26z" fill="#d4a34d" />
                                                <circle cx="48" cy="18" r="12" fill="#1b3651" />
                                                <path d="M44 20l6-6-1-1-6 2-3-3 1.5-1.5 3 3 6-2 1.5 1.5-4 6-1-1z"
                                                    fill="#d4a34d" />
                                            </svg>
                                        </div>
                                        <div class="d-flex align-items-center" style="gap: 12px;">
                                            <span class="fw-bolder m-0 p-0"
                                                style="color: #d4a34d; font-size: 2.6rem; line-height: 1;">03</span>
                                            <span class="text-muted small m-0 p-0"
                                                style="line-height: 1.3; white-space: nowrap;">درجات<br>سياحية</span>
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="booking-form-area mt-5 pt-4 border-top border-light reveal">
                                <h6 class="fw-bold text-navy mb-4 text-start">الوجهة السياحية</h6>

                                <div
                                    class="row g-3 align-items-end text-start {{ app()->getLocale() == 'en' ? 'flex-row-reverse' : '' }}">

                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label text-navy fw-bold small mb-2">من وجهة</label>
                                        <div class="d-flex gap-2">
                                            <select class="form-select bg-white border-light text-muted shadow-none">
                                                <option>الدولة</option>
                                            </select>
                                            <select class="form-select bg-white border-light text-muted shadow-none">
                                                <option>المدينة</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label text-navy fw-bold small mb-2">إلى وجهة</label>
                                        <div class="d-flex gap-2">
                                            <select class="form-select bg-white border-light text-muted shadow-none">
                                                <option>الدولة</option>
                                            </select>
                                            <select class="form-select bg-white border-light text-muted shadow-none">
                                                <option>المدينة</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label text-navy fw-bold small mb-2">درجة الطيران</label>
                                        <select class="form-select bg-white border-light text-muted shadow-none">
                                            <option>درجة الطيران</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <button class="btn btn-slate w-100 py-2 rounded-3 text-white fw-bold">عرض
                                            التذاكر المتوفرة</button>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="ticket-details-box mt-5 rounded-4 d-flex flex-column flex-lg-row position-relative overflow-hidden reveal">

                                <div class="p-4 p-lg-5 flex-grow-1 w-100">
                                    <div
                                        class="d-flex justify-content-between align-items-center h-100 {{ app()->getLocale() == 'en' ? 'flex-row-reverse' : '' }}">

                                        <div class="text-start ticket-time-wrapper">
                                            <span class="text-muted small d-block mb-1">الخروج</span>
                                            <h3 class="fw-bold text-navy mb-1 ticket-time">20:15</h3>
                                            <span class="text-muted d-block ticket-date">4 أكتوبر 2025</span>
                                            <span class="text-muted d-block mt-1 ticket-location">السعودية ، جدة ، مطار
                                                جدة الدولي</span>
                                        </div>

                                        <div class="flex-grow-1 px-3 px-md-4 text-center">
                                            <div class="duration-badge-wrapper">
                                                <div class="ticket-timeline-line"></div>
                                                <span
                                                    class="badge rounded-pill px-4 py-2 position-relative fw-bold text-gold duration-badge">12
                                                    ساعة ، 30 دقيقة</span>
                                            </div>
                                            <span class="text-muted d-block mt-1 stops-text">محطة توقف 2</span>
                                        </div>

                                        <div class="text-end ticket-time-wrapper">
                                            <span class="text-muted small d-block mb-1">القدوم</span>
                                            <h3 class="fw-bold text-navy mb-1 ticket-time">12:25</h3>
                                            <span class="text-muted d-block ticket-date">5 أكتوبر 2025</span>
                                            <span class="text-muted d-block mt-1 ticket-location">مصر ، القاهرة ، مطار
                                                القاهرة الدولي</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="ticket-divider d-none d-lg-block position-relative"></div>

                                <div class="p-4 p-lg-5 w-100 ticket-passenger-section">
                                    <div
                                        class="row g-3 h-100 align-items-center {{ app()->getLocale() == 'en' ? 'flex-row-reverse' : '' }}">

                                        <div class="col-6 text-start">
                                            <div class="mb-4">
                                                <span
                                                    class="text-navy fw-bold d-block mb-1 ticket-meta-title">الاسم</span>
                                                <span class="text-muted ticket-meta-value">سالم أحمد سليم حمدان</span>
                                            </div>
                                            <div>
                                                <span class="text-navy fw-bold d-block mb-1 ticket-meta-title">رقم جواز
                                                    السفر</span>
                                                <span class="text-muted ticket-meta-value">231756489</span>
                                            </div>
                                        </div>

                                        <div class="col-6 text-start">
                                            <div class="mb-4">
                                                <span
                                                    class="badge bg-white border border-2 text-muted px-3 py-1 rounded-2 fw-normal flight-class-badge">الدرجة
                                                    السياحية</span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="text-navy fw-bold d-block mb-1 ticket-meta-title">كود خط
                                                    الطيران</span>
                                                <span class="text-muted ticket-meta-value">G13BZZ</span>
                                            </div>
                                            <div>
                                                <span class="text-navy fw-bold d-block mb-1 ticket-meta-title">البريد
                                                    الالكتروني</span>
                                                <span class="text-muted ticket-meta-value">pureIT@gmail.com</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>

                <section class="py-5 contact-section bg-light-gray reveal">
                    <div class="container">
                        <div class="contact-premium-wrapper shadow-lg">
                            <div class="row g-0">

                                <div class="col-lg-7 p-4 p-md-5 text-start bg-white">
                                    <div class="contact-branding mb-4">
                                        <span class="contact-badge">مركز الاتصال الموحد</span>
                                        <h2 class="fw-bold text-navy mt-2">مكاتبنا متوفرة في <span
                                                class="text-gold">جميع أنحاء المملكة</span></h2>
                                        <div class="gold-line-accent"></div>
                                    </div>

                                    <div class="contact-grid">
                                        <div class="contact-info-tile mb-4">
                                            <div class="d-flex align-items-start">
                                                <div class="stellar-item micro me-4 ms-0"
                                                    style="--stellar-color: #d4a34d; --stellar-glow: rgba(212, 163, 77, 0.3);">
                                                    <div class="stellar-ring"></div>
                                                    <div class="stellar-core"><i class="bi bi-geo-alt-fill"></i></div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="fw-bold text-navy mb-2">مواقع الفروع</h6>
                                                    <div class="branch-listing">
                                                        <div class="single-branch mb-2">
                                                            <i class="bi bi-check2-circle text-gold ms-1"></i>
                                                            <span class="text-muted small"><strong>الفرع
                                                                    الرئيسي:</strong> التجمع الخامس، ش التسعين الجنوبي،
                                                                هلا مول.</span>
                                                        </div>
                                                        <div class="single-branch mb-2">
                                                            <i class="bi bi-check2-circle text-gold ms-1"></i>
                                                            <span class="text-muted small"><strong>المهندسين:</strong>
                                                                80 محيى الدين أبو العز، أمام نادي الصيد.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="contact-info-tile h-100">
                                                    <div class="d-flex align-items-center">
                                                        <div class="stellar-item micro me-3 ms-0"
                                                            style="--stellar-color: #1b3651; --stellar-glow: rgba(27, 54, 81, 0.2);">
                                                            <div class="stellar-ring"></div>
                                                            <div class="stellar-core"><i
                                                                    class="bi bi-telephone-fill"></i></div>
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-bold text-navy mb-1 small">خدمة العملاء</h6>
                                                            <p class="text-gold fw-bold mb-0 small" dir="ltr">00
                                                                966 123 456</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="contact-info-tile h-100">
                                                    <div class="d-flex align-items-center">
                                                        <div class="stellar-item micro me-3 ms-0"
                                                            style="--stellar-color: #d4a34d; --stellar-glow: rgba(212, 163, 77, 0.2);">
                                                            <div class="stellar-ring"></div>
                                                            <div class="stellar-core"><i
                                                                    class="bi bi-envelope-at-fill"></i></div>
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-bold text-navy mb-1 small">البريد الرسمي</h6>
                                                            <p class="text-muted mb-0 small">Neqat.tours@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 position-relative">
                                    <div class="map-full-height h-100">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.647!2d31.427!3d30.016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDAwJzU3LjYiTiAzMcKwMjUnMzcuMiJF!5e0!3m2!1sen!2seg!4v1700000000000!5m2!1sen!2seg"
                                            class="w-100 h-100 border-0" allowfullscreen="" loading="lazy"></iframe>
                                        <div class="map-overlay-gradient d-lg-none"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>


                @include('layouts.website.parts.newsletter-section-index')
                @include('layouts.website.parts.footer')


            </div>
        </div>
    </div>

    @include('layouts.website.parts.scroll-top')
    @include('layouts.website.modals.currency-modal')

    <script src="{!! asset('assets/website/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/website/js/swiper-bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/website/js/script.js') !!}"></script>

    <!-- Configure Swiper Layout Dynamically based on server locale -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiperDirection = "{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}";

            var internationalSwiper = new Swiper(".internationalSwiper", {
                direction: 'horizontal',
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },
                }
            });

            // Set direction property onto the swiper wrapper element natively for swiper to pick up CSS translations
            document.querySelector(".internationalSwiper").setAttribute("dir", swiperDirection);
        });
    </script>

    @stack('js')
</body>

</html>
