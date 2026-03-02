<form class="form" wire:submit.prevent="submitForm">
    <div class="form-body">
        @if (!empty($successMessage))
            <div class="container-fluid">
                <div class="alert alert-success">
                    {!! $successMessage !!}
                </div>
            </div>
        @endif

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-0">
                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered custom-form-tabs mb-0" id="flightCreateTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link @if ($activeTab == 'general') active @endif py-3 px-4 border-bottom-0 position-relative"
                            wire:click="setTab('general')" type="button" role="tab">
                            <i class="mdi mdi-information-outline me-2 text-primary"></i>{!! __('flights.basic_info') !!}
                            @if ($this->hasErrorInTab('general'))
                                <span class="tab-error-dot"></span>
                            @endif
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link @if ($activeTab == 'services') active @endif py-3 px-4 border-bottom-0 position-relative"
                            wire:click="setTab('services')" type="button" role="tab">
                            <i class="mdi mdi-room-service-outline me-2 text-info"></i>{!! __('flights.services') !!}
                            @if ($this->hasErrorInTab('services'))
                                <span class="tab-error-dot"></span>
                            @endif
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link @if ($activeTab == 'pricing') active @endif py-3 px-4 border-bottom-0 position-relative"
                            wire:click="setTab('pricing')" type="button" role="tab">
                            <i class="mdi mdi-currency-usd me-2 text-success"></i>{!! __('flights.pricing') !!}
                            @if ($this->hasErrorInTab('pricing'))
                                <span class="tab-error-dot"></span>
                            @endif
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link @if ($activeTab == 'policies') active @endif py-3 px-4 border-bottom-0 position-relative"
                            wire:click="setTab('policies')" type="button" role="tab">
                            <i class="mdi mdi-layers-outline me-2 text-warning"></i>{!! __('flights.additional_info') !!}
                            @if ($this->hasErrorInTab('policies'))
                                <span class="tab-error-dot"></span>
                            @endif
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link @if ($activeTab == 'media') active @endif py-3 px-4 border-bottom-0 position-relative"
                            wire:click="setTab('media')" type="button" role="tab">
                            <i class="mdi mdi-image-multiple-outline me-2 text-secondary"></i>{!! __('flights.media_gallery') !!}
                            @if ($this->hasErrorInTab('media'))
                                <span class="tab-error-dot"></span>
                            @endif
                        </button>
                    </li>
                </ul>

                <!-- Tab Panes -->
                <div class="tab-content p-4" id="flightCreateTabsContent">
                    <!-- Tab 1: General Info -->
                    <div class="tab-pane fade @if ($activeTab == 'general') show active @endif" id="general"
                        role="tabpanel">
                        @include('livewire.dashboard.flight._create.basic')
                    </div>

                    <!-- Tab 2: Services -->
                    <div class="tab-pane fade @if ($activeTab == 'services') show active @endif" id="services"
                        role="tabpanel">
                        @include('livewire.dashboard.flight._create.services')
                    </div>

                    <!-- Tab 3: Pricing -->
                    <div class="tab-pane fade @if ($activeTab == 'pricing') show active @endif" id="pricing"
                        role="tabpanel">
                        @include('livewire.dashboard.flight._create.prices')
                    </div>

                    <!-- Tab 4: Policies -->
                    <div class="tab-pane fade @if ($activeTab == 'policies') show active @endif" id="policies"
                        role="tabpanel">
                        @include('livewire.dashboard.flight._create.sub-categories')
                    </div>

                    <!-- Tab 5: Media -->
                    <div class="tab-pane fade @if ($activeTab == 'media') show active @endif" id="media"
                        role="tabpanel">
                        @include('livewire.dashboard.flight._create.images')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Livewire-Native Floating HUD -->
    <div class="livewire-hud-container">
        <div class="hud-capsule-glass d-flex align-items-center justify-content-between">
            {{-- Left: Status & Loading Indicator --}}
            <div class="livewire-hud-status-info border-end pe-3">
                <div wire:loading.remove wire:target="submitForm"
                    class="livewire-hud-pulse-orb {{ $this->getHudColor() }}">
                </div>
                <div wire:loading wire:target="submitForm" class="spinner-border spinner-border-sm text-primary"
                    role="status"></div>

                <div class="livewire-hud-text-content">
                    <span wire:loading.remove wire:target="submitForm"
                        class="livewire-hud-main-label">{!! $this->getHudStatus() !!}</span>
                    <span wire:loading wire:target="submitForm"
                        class="livewire-hud-main-label">{!! __('general.saving') !!}...</span>
                    <span class="livewire-hud-sub-label">{!! __('general.unsaved_changes_detected') !!}</span>
                </div>
            </div>

            {{-- Right: Actions --}}
            <div class="livewire-hud-actions ps-3 d-flex gap-2">
                <button type="button" wire:click="back" class="btn-livewire-hud-secondary">
                    <i class="mdi mdi-close me-1"></i>{!! __('general.discard') !!}
                </button>

                <button type="submit" wire:loading.attr="disabled" wire:target="submitForm"
                    class="btn-livewire-hud-primary">
                    <i wire:loading.remove wire:target="submitForm" class="mdi mdi-check-all me-1"></i>
                    @if ($this->isFormComplete())
                        {!! __('general.submit') !!}
                    @else
                        {!! __('general.save_changes') !!}
                    @endif
                </button>
            </div>
        </div>
    </div>
</form>
