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
                                <li class="breadcrumb-item active" aria-current="page">{!! __('roles.update_role') !!}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! __('roles.update_role') !!}</h4>
                            <form class="forms-sample" action="{!! route('dashboard.roles.update', $role->id) !!}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $role->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_ar">{!! __('roles.role_ar') !!}</label>
                                            <input type="text" class="form-control form-control-sm" id="role_ar"
                                                name="role[ar]" value="{!! old('role.ar', $role->getTranslation('role', 'ar')) !!}"
                                                placeholder="{!! __('roles.enter_role_ar') !!}">
                                            @error('role.ar')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_en">{!! __('roles.role_en') !!}</label>
                                            <input type="text" class="form-control form-control-sm" id="role_en"
                                                name="role[en]" value="{!! old('role.en', $role->getTranslation('role', 'en')) !!}"
                                                placeholder="{!! __('roles.enter_role_en') !!}">
                                            @error('role.en')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
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
                                                                name="permissions[]" value="{!! $key !!}"
                                                                @checked(in_array($key, $role->permissions))>
                                                            {{ __(config('global.permissions.' . $key)) }}
                                                            <i class="input-helper"></i></label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('permissions')
                                            <span class="text-danger small d-block mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-icon-text me-2 text-white">
                                        <i class="ti-save me-1" style="font-size: 0.85rem;"></i> {!! __('general.update') !!}
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
