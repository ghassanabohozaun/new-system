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
                            <form class="forms-sample" action="{!! route('dashboard.roles.store') !!}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_ar">{!! __('roles.role_ar') !!}</label>
                                            <input type="text" class="form-control" id="role_ar" name="role[ar]"
                                                value="{!! old('role.ar') !!}" placeholder="{!! __('roles.enter_role_ar') !!}">
                                            @error('role.ar')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_en">{!! __('roles.role_en') !!}</label>
                                            <input type="text" class="form-control" id="role_en" name="role[en]"
                                                value="{!! old('role.en') !!}" placeholder="{!! __('roles.enter_role_en') !!}">
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
                                                                name="permissions[]" value="{!! $key !!}">
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
                                        <i class="ti-save me-1" style="font-size: 0.85rem;"></i> {!! __('general.save') !!}
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
