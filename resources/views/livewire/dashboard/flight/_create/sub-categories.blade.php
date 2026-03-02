<div class="row g-4">
    <!-- Notes Card -->
    <div class="col-12 mb-2">
        <div class="card border-0 shadow-sm premium-glass-card overflow-hidden">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-4 px-4">
                <h4 class="text-info mb-0 fw-bold">
                    <i class="mdi mdi-notebook-multiple me-2"></i>{!! __('flights.notes') !!}
                </h4>
                <button type="button" wire:click.prevent="addNewNote"
                    class="btn btn-sm btn-gradient-primary btn-icon-text shadow-sm">
                    <i class="mdi mdi-plus btn-icon-prepend"></i> {!! __('general.add_new') !!}
                </button>
            </div>
            <div class="card-body p-4 pt-2">
                @include('livewire.dashboard.flight._create._subCategories.notes')
            </div>
        </div>
    </div>

    <!-- Including Card -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100 overflow-hidden premium-glass-card">
            <div
                class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-4 px-4">
                <h4 class="text-success mb-0 fw-bold">
                    <i class="mdi mdi-check-circle-outline me-2"></i>{!! __('flights.offer_including') !!}
                </h4>
                <button type="button" wire:click.prevent="addNewOfferIncluding"
                    class="btn btn-sm btn-gradient-success-light btn-icon-text shadow-sm">
                    <i class="mdi mdi-plus btn-icon-prepend"></i> {!! __('general.add_new') !!}
                </button>
            </div>
            <div class="card-body p-4 pt-2">
                @include('livewire.dashboard.flight._create._subCategories.including')
            </div>
        </div>
    </div>

    <!-- Not Including Card -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100 overflow-hidden premium-glass-card">
            <div
                class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-4 px-4">
                <h4 class="text-danger mb-0 fw-bold">
                    <i class="mdi mdi-close-circle-outline me-2"></i>{!! __('flights.offer_not_including') !!}
                </h4>
                <button type="button" wire:click.prevent="addNewOfferNotIncluding"
                    class="btn btn-sm btn-gradient-danger-light btn-icon-text shadow-sm">
                    <i class="mdi mdi-plus btn-icon-prepend"></i> {!! __('general.add_new') !!}
                </button>
            </div>
            <div class="card-body p-4 pt-2">
                @include('livewire.dashboard.flight._create._subCategories.notIncluding')
            </div>
        </div>
    </div>
</div>
