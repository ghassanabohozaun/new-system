@extends('layouts.website.app')
@section('title', $title)
@section('content')
    <main id="aboutMainContent">

        <header class="hero-section">
            <div class="w-100 h-100"
                style="background-image: url('{!! asset('assets/website/images/external/external_3.jpg') !!}'); background-size: cover; background-position: center;">
                <div class="hero-overlay">
                    <div class="container text-center text-white pb-5">
                        <div class="mb-4">
                            <i class="bi bi-geo-alt text-gold display-4"></i>
                        </div>
                        <h1 class="display-3 fw-bold mb-3" style="color: var(--brand-gold); letter-spacing: -1px;">
                            عن نقاط ... <span class="text-white">قصة أكثر من رحلة</span>
                        </h1>
                        <p class="lead fs-5 fw-light mx-auto" style="max-width: 800px; line-height: 1.8;">
                            منذ البداية، رسمنا طريقنا لنكون شريكك الأول في استكشاف العالم.. شغفنا هو صناعة
                            ذكرياتك، واحترافيتنا هي ضمان راحتك في كل نقطة.
                        </p>
                    </div>
                </div>
            </div>

            <div class="search-container">
                <div class="search-box">
                    <form action="/search" method="GET" class="d-flex align-items-center flex-wrap flex-md-nowrap">
                        <div class="d-flex align-items-center flex-grow-1 pe-3">
                            <i class="bi bi-search text-muted fs-4 ms-3"></i>
                            <input type="text" name="query"
                                class="form-control border-0 shadow-none bg-transparent text-start search-input"
                                placeholder="ابحث عن وجهتك القادمة مع نقاط ...">
                        </div>
                        <button class="btn btn-navy-search mt-3 mt-md-0" type="submit">بحث</button>
                    </form>
                </div>
            </div>
        </header>

        <section class="py-5 overflow-hidden">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 reveal">
                        <div class="section-number">01</div>
                        <h6 class="text-gold fw-bold mb-2">{{ __('website.our_ambition') }}</h6>
                        <h2 class="fw-bold mb-4 text-navy display-5">{{ $about->vision_title }}</h2>
                        <p class="text-muted mb-4 fs-5 leading-relaxed">
                            {{ $about->vision_description }}
                        </p>
                        <ul class="list-unstyled">
                            @if ($about->vision_list)
                                @foreach ($about->vision_list as $item)
                                    <li class="mb-3 d-flex align-items-center gap-3">
                                        <i class="bi bi-patch-check-fill text-gold fs-4"></i>
                                        <span class="fw-bold">{{ $item }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-lg-6 reveal">
                        <div class="image-stack">
                            <img src="{!! asset($about->vision_image) !!}" class="img-fluid rounded-5 shadow-lg main-img"
                                alt="Vision">
                            <div class="image-glass-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="py-5 bg-light-gold overflow-hidden">
            <div class="container">
                <div class="row align-items-center g-5 flex-lg-row-reverse">
                    <div class="col-lg-6 reveal">
                        <div class="section-number">02</div>
                        <h6 class="text-gold fw-bold mb-2">{{ __('website.our_commitment') }}</h6>
                        <h2 class="fw-bold mb-4 text-navy display-5">{{ $about->mission_title }}</h2>
                        <p class="text-muted mb-4 fs-5 leading-relaxed">
                            {{ $about->mission_description }}
                        </p>
                        <div class="mission-stats d-flex gap-4 mt-4">
                            <div class="stat-item">
                                <h4 class="fw-bold text-gold mb-0">{{ $about->stat_1_value }}</h4>
                                <small class="text-muted">{{ $about->stat_1_label }}</small>
                            </div>
                            <div class="stat-divider"></div>
                            <div class="stat-item">
                                <h4 class="fw-bold text-gold mb-0">{{ $about->stat_2_value }}</h4>
                                <small class="text-muted">{{ $about->stat_2_label }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 reveal">
                        <div class="image-frame">
                            <img src="{!! asset($about->mission_image) !!}" class="img-fluid rounded-5 shadow-lg" alt="Mission">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 overflow-hidden">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 reveal">
                        <div class="section-number">03</div>
                        <h6 class="text-gold fw-bold mb-2">{{ __('website.what_sets_us_apart') }}</h6>
                        <h2 class="fw-bold mb-4 text-navy display-5">{{ $about->why_us_title }}</h2>
                        <p class="text-muted mb-5 fs-5">
                            {{ $about->why_us_description }}
                        </p>

                        <div class="features-grid">
                            <div class="feature-item-pro">
                                <div class="icon-wrap"><i class="bi {{ $about->feature_1_icon }}"></i></div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $about->feature_1_title }}</h6>
                                    <p class="small text-muted mb-0">{{ $about->feature_1_description }}</p>
                                </div>
                            </div>
                            <div class="feature-item-pro mt-4">
                                <div class="icon-wrap"><i class="bi {{ $about->feature_2_icon }}"></i></div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $about->feature_2_title }}</h6>
                                    <p class="small text-muted mb-0">{{ $about->feature_2_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 reveal">
                        <div class="luxury-card-stack">
                            <div class="gold-box"></div>
                            <img src="{!! asset($about->why_us_image) !!}" class="img-fluid rounded-5 shadow-lg" alt="Distinctive">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-5 timeline-compact-section">
            <div class="container py-2">

                <div class="text-center mb-5 reveal">
                    <h2 class="fw-bold text-navy mb-2 fs-3">عقد من <span class="text-gold">الريادة</span>
                    </h2>
                    <p class="text-muted small">رحلة بدأت بشغف وتستمر بابتكار</p>
                </div>

                <div class="compact-timeline-wrapper">
                    <div class="slim-path-base">
                        <div class="slim-path-fill"></div>
                    </div>

                    <div class="timeline-nodes">
                        @if($timelines && $timelines->count() > 0)
                            @foreach($timelines as $index => $node)
                                <div class="node-box {{ $index % 2 == 0 ? 'right' : 'left' }}" data-aos="fade-up">
                                    <div class="node-dot"></div>
                                    <div class="node-content-slim">
                                        <span class="n-year">{{ $node->year }}</span>
                                        <h6 class="fw-bold mb-1">{{ $node->title }}</h6>
                                        <p class="n-text">{{ $node->text }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
