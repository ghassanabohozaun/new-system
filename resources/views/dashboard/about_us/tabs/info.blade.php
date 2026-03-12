    <div class="tab-pane fade" id="general" role="tabpanel">
        <form id="about_us_form" action="{{ route('dashboard.about_us.update') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                {{-- Section 1: Vision --}}
                <div class="col-12 theme-primary">
                    <div class="card shadow-sm border-0 card-settings-premium">
                        <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
                            <span class="settings-section-icon bg-primary-subtle text-primary rounded-2 p-2">
                                <i class="mdi mdi-eye-outline fs-5"></i>
                            </span>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark">{{ __('about.vision_section') }} /
                                    {{ $about->vision_title }}</h6>
                                <small class="text-muted">{{ __('about.vision_edit_hint') }}</small>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label-premium">{{ __('about.title_ar') }}</label>
                                    <input type="text" name="vision_title[ar]"
                                        value="{{ $about->getTranslation('vision_title', 'ar') }}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">{{ __('about.title_en') }}</label>
                                    <input type="text" name="vision_title[en]"
                                        value="{{ $about->getTranslation('vision_title', 'en') }}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">{{ __('about.text_ar') }}</label>
                                    <textarea name="vision_description[ar]" class="form-control" rows="4">{{ $about->getTranslation('vision_description', 'ar') }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">{{ __('about.text_en') }}</label>
                                    <textarea name="vision_description[en]" class="form-control" rows="4">{{ $about->getTranslation('vision_description', 'en') }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <x-dashboard.file-input name="vision_image" id="vision_image_input"
                                        label="{{ __('about.vision_image') }}" placeholderIcon="mdi-image-outline"
                                        currentImageUrl="{{ $about->vision_image ? asset($about->vision_image) : null }}"
                                        isRequired="false" errorId="vision_image_error" />
                                </div>

                                <div class="col-12">
                                    <label class="fw-bold mb-3 border-bottom pb-2 d-block">{{ __('about.vision_list_hint') }}</label>
                                    <div class="row g-3">
                                        @foreach (['ar', 'en'] as $lang)
                                            <div class="col-md-6">
                                                <label
                                                    class="small text-muted mb-2">{{ $lang == 'ar' ? __('about.list_ar') : __('about.list_en') }}</label>
                                                <input type="text" name="vision_list[{{ $lang }}][0]"
                                                    value="{{ $about->getTranslation('vision_list', $lang)[0] ?? '' }}"
                                                    class="form-control mb-2" placeholder="{{ __('about.item_1') }}">
                                                <input type="text" name="vision_list[{{ $lang }}][1]"
                                                    value="{{ $about->getTranslation('vision_list', $lang)[1] ?? '' }}"
                                                    class="form-control" placeholder="{{ __('about.item_2') }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Section 2: Mission --}}
                <div class="col-12 theme-success">
                    <div class="card shadow-sm border-0 card-settings-premium">
                        <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
                            <span class="settings-section-icon bg-success-subtle text-success rounded-2 p-2">
                                <i class="mdi mdi-target fs-5"></i>
                            </span>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark">{{ __('about.mission_section') }} /
                                    {{ $about->mission_title }}</h6>
                                <small class="text-muted">{{ __('about.mission_edit_hint') }}</small>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label-premium">العنوان (بالعربي)</label>
                                    <input type="text" name="mission_title[ar]"
                                        value="{{ $about->getTranslation('mission_title', 'ar') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">Title (English)</label>
                                    <input type="text" name="mission_title[en]"
                                        value="{{ $about->getTranslation('mission_title', 'en') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">الوصف (بالعربي)</label>
                                    <textarea name="mission_description[ar]" class="form-control" rows="4">{{ $about->getTranslation('mission_description', 'ar') }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">Description (English)</label>
                                    <textarea name="mission_description[en]" class="form-control" rows="4">{{ $about->getTranslation('mission_description', 'en') }}</textarea>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label-premium">{{ __('about.stat_1_value') }}</label>
                                    <input type="text" name="stat_1_value" value="{{ $about->stat_1_value }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-premium">{{ __('about.stat_1_label') }} ({{ __('about.title_ar') }})</label>
                                    <input type="text" name="stat_1_label[ar]"
                                        value="{{ $about->getTranslation('stat_1_label', 'ar') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-premium">{{ __('about.stat_1_label') }} ({{ __('about.title_en') }})</label>
                                    <input type="text" name="stat_1_label[en]"
                                        value="{{ $about->getTranslation('stat_1_label', 'en') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <label class="form-label-premium">{{ __('about.stat_2_value') }}</label>
                                    <input type="text" name="stat_2_value" value="{{ $about->stat_2_value }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-premium">{{ __('about.stat_2_label') }} ({{ __('about.title_ar') }})</label>
                                    <input type="text" name="stat_2_label[ar]"
                                        value="{{ $about->getTranslation('stat_2_label', 'ar') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-premium">{{ __('about.stat_2_label') }} ({{ __('about.title_en') }})</label>
                                    <input type="text" name="stat_2_label[en]"
                                        value="{{ $about->getTranslation('stat_2_label', 'en') }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 mt-4">
                                    <x-dashboard.file-input name="mission_image" id="mission_image_input"
                                        label="{{ __('about.mission_image') }}" placeholderIcon="mdi-image-outline"
                                        currentImageUrl="{{ $about->mission_image ? asset($about->mission_image) : null }}"
                                        isRequired="false" errorId="mission_image_error" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Section 3: Why Us --}}
                <div class="col-12 theme-warning">
                    <div class="card shadow-sm border-0 card-settings-premium">
                        <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
                            <span class="settings-section-icon bg-warning-subtle text-warning rounded-2 p-2">
                                <i class="mdi mdi-star-face fs-5"></i>
                            </span>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark">{{ __('about.why_us_section') }} /
                                    {{ $about->why_us_title }}</h6>
                                <small class="text-muted">{{ __('about.why_us_edit_hint') }}</small>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label-premium">العنوان (بالعربي)</label>
                                    <input type="text" name="why_us_title[ar]"
                                        value="{{ $about->getTranslation('why_us_title', 'ar') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">Title (English)</label>
                                    <input type="text" name="why_us_title[en]"
                                        value="{{ $about->getTranslation('why_us_title', 'en') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">الوصف (بالعربي)</label>
                                    <textarea name="why_us_description[ar]" class="form-control" rows="3">{{ $about->getTranslation('why_us_description', 'ar') }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">Description (English)</label>
                                    <textarea name="why_us_description[en]" class="form-control" rows="3">{{ $about->getTranslation('why_us_description', 'en') }}</textarea>
                                </div>

                                {{-- Feature 1 --}}
                                <div class="col-md-6 border-start border-2">
                                    <label class="fw-bold mb-2">{{ __('about.feature_1') }}</label>
                                    <div class="mb-2">
                                        <input type="text" name="feature_1_title[ar]" placeholder="العنوان (عربي)"
                                            value="{{ $about->getTranslation('feature_1_title', 'ar') }}"
                                            class="form-control mb-1">
                                        <input type="text" name="feature_1_title[en]" placeholder="Title (EN)"
                                            value="{{ $about->getTranslation('feature_1_title', 'en') }}"
                                            class="form-control">
                                    </div>
                                    <div>
                                        <textarea name="feature_1_description[ar]" placeholder="الوصف (عربي)" class="form-control mb-1">{{ $about->getTranslation('feature_1_description', 'ar') }}</textarea>
                                        <textarea name="feature_1_description[en]" placeholder="Description (EN)" class="form-control">{{ $about->getTranslation('feature_1_description', 'en') }}</textarea>
                                    </div>
                                </div>

                                {{-- Feature 2 --}}
                                <div class="col-md-6 border-start border-2">
                                    <label class="fw-bold mb-2">{{ __('about.feature_2') }}</label>
                                    <div class="mb-2">
                                        <input type="text" name="feature_2_title[ar]" placeholder="العنوان (عربي)"
                                            value="{{ $about->getTranslation('feature_2_title', 'ar') }}"
                                            class="form-control mb-1">
                                        <input type="text" name="feature_2_title[en]" placeholder="Title (EN)"
                                            value="{{ $about->getTranslation('feature_2_title', 'en') }}"
                                            class="form-control">
                                    </div>
                                    <div>
                                        <textarea name="feature_2_description[ar]" placeholder="الوصف (عربي)" class="form-control mb-1">{{ $about->getTranslation('feature_2_description', 'ar') }}</textarea>
                                        <textarea name="feature_2_description[en]" placeholder="Description (EN)" class="form-control">{{ $about->getTranslation('feature_2_description', 'en') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <x-dashboard.file-input name="why_us_image" id="why_us_image_input"
                                        label="{{ __('about.why_us_image') }}" placeholderIcon="mdi-image-outline"
                                        currentImageUrl="{{ $about->why_us_image ? asset($about->why_us_image) : null }}"
                                        isRequired="false" errorId="why_us_image_error" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <x-dashboard.command-hud formId="about_us_form" />
    </div>
