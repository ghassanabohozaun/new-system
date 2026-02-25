@extends('layouts.dashboard.app')

@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.roles.index') }}">{!! __('roles.roles') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('roles.create_new_role') !!}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! __('roles.create_new_role') !!}</h4>
                            <form class="forms-sample" id="role_form" action="{!! route('dashboard.roles.store') !!}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_ar">{!! __('roles.role_ar') !!}</label>
                                            <input type="text" class="form-control" id="role_ar" name="role[ar]"
                                                placeholder="{!! __('roles.enter_role_ar') !!}">
                                            <strong id="role_ar_error" class="text-danger small"></strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_en">{!! __('roles.role_en') !!}</label>
                                            <input type="text" class="form-control" id="role_en" name="role[en]"
                                                placeholder="{!! __('roles.enter_role_en') !!}">
                                            <strong id="role_en_error" class="text-danger small"></strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label class="mb-3">{!! __('roles.permissions') !!}</label>
                                        <div class="row">
                                            @foreach (config('global.permissions') as $key => $value)
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-check form-check-flat form-check-primary">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="permissions[]" value="{!! $key !!}">
                                                            {{ __(config('global.permissions.' . $key)) }}
                                                            <i class="input-helper"></i></label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <strong id="permissions_error" class="text-danger small d-block mt-2"></strong>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-icon-text me-2 text-white">
                                        <i class="ti-save me-1" style="font-size: 0.85rem;"></i> {!! __('general.save') !!}
                                        <span class="spinner-border spinner-border-sm d-none spinner_loading" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                    <a href="{{ route('dashboard.roles.index') }}" class="btn btn-light btn-icon-text">
                                        <i class="ti-close me-1" style="font-size: 0.85rem;"></i> {!! __('general.cancel') !!}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function clearErrors() {
            $('#role_form input').removeClass('is-invalid');
            $('#role_form strong.text-danger').text('');
        }

        $('#role_form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const data = new FormData(this);

            $.ajax({
                url: form.attr('action'),
                data: data,
                type: 'POST',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    clearErrors();
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status) {
                        flasher.success("{!! __('general.add_success_message') !!}");
                        setTimeout(() => {
                            window.location.href = "{!! route('dashboard.roles.index') !!}";
                        }, 1000);
                    }
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        const field = key.replace(/\./g, '_');
                        $(`#${field}`).addClass('is-invalid');
                        $(`#${field}_error`).text(value[0]);
                    });
                },
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });
        });
    </script>
@endpush
