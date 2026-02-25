    <!-- header  -->
    <header class="hero-section">
        <!-- heroCarousel -->
        <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
            <div class="carousel-indicators mb-5">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
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
                                        <circle cx="50" cy="50" r="8" fill="#d4a34d" stroke="none" />
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
                                        <circle cx="50" cy="50" r="8" fill="#d4a34d" stroke="none" />
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

            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="search-container">
            <div class="search-box-animated reveal active">
                <form action="/search" method="GET" class="d-flex align-items-center flex-wrap flex-md-nowrap">
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
