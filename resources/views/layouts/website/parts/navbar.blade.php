    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top py-1 noqat-navbar" id="mainNavbar">
        <div class="container-fluid px-4">

            <a class="navbar-brand m-0 p-0 brand-hover" href="index.html">
                <img src="{!! asset('assets/website/images/4.png') !!}" alt="نقاط للسفر والسياحة" class="main-logo-responsive">
            </a>


            <button class="navbar-toggler border-0 shadow-none custom-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-start mt-3 mt-lg-0 noqat-nav-links">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">
                            <i class="bi bi-house-door-fill"></i>
                            الصفحة الرئيسية
                        </a>
                    </li>

                    <li class="nav-item dropdown custom-dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-airplane-fill"></i>
                            <span>الرحلات السياحية</span>
                            <i class="bi bi-chevron-down ms-1 dropdown-indicator"></i>
                        </a>
                        <ul class="dropdown-menu text-start border-0 shadow-lg rounded-4 drop-menu-glass">
                            <li><a class="dropdown-item py-2" href="trips.html">الكل</a></li>
                            <li><a class="dropdown-item py-2" href="#">رحلات داخلية</a></li>
                            <li><a class="dropdown-item py-2" href="#">رحلات خارجية</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="tours.html">
                            <i class="bi bi-geo-alt-fill"></i> الجولات السياحية
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="tickets.html">
                            <i class="bi bi-ticket-perforated-fill"></i> تذاكر الطيران
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.html">
                            <i class="bi bi-info-circle-fill"></i> عن نقاط
                        </a>
                    </li>
                </ul>

                <div class="d-flex flex-column flex-lg-row align-items-center gap-4 mt-4 mt-lg-0">

                    <div class="noqat-lang-pill {{ app()->getLocale() == 'en' ? 'is-english' : '' }}"
                        id="luxuryLangToggle">
                        <div class="active-indicator"></div>

                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                            class="lang-item ar-item {{ app()->getLocale() == 'ar' ? 'active' : '' }}">
                            <img src="{!! asset('assets/website/images/external/external_1.png') !!}">
                            <span>العربية</span>
                        </a>

                        <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                            class="lang-item en-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                            <img src="{!! asset('assets/website/images/external/external_2.png') !!}">
                            <span>English</span>
                        </a>
                    </div>

                    <div class="magnetic-wrap">
                        <a href="contact.html"
                            class="btn btn-gold-nav btn-magnetic px-4 py-2 w-100 w-lg-auto fw-bold d-flex align-items-center justify-content-center gap-2 contact-animated-btn">
                            <span>تواصل معنا</span>
                            <i class="bi bi-headset fs-5 ringing-icon"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </nav>
