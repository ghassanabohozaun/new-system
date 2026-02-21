@extends('layouts.dashboard.app')

@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <!--------------------  Start Breadcrumb  ---------------------------->
                    <div class="d-md-flex align-items-center justify-content-between border-bottom mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{!! __('roles.roles') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary text-white me-0">
                                <i class="icon-plus"></i> {!! __('roles.create_new_role') !!}
                            </a>
                        </div>
                    </div>
                    <!--------------------  End Breadcrumb  ---------------------------->

                    <!--------------------  Start Table  ---------------------------->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! __('roles.show_all_roles') !!}</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{!! __('roles.role_name') !!}</th>
                                            <th>{!! __('roles.permissions') !!}</th>
                                            <th class="text-center">{!! __('general.actions') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $role)
                                            <tr>
                                                <td>{!! $loop->iteration !!}</td>
                                                <td>{!! $role->role !!}</td>
                                                <td style="white-space: normal; min-width: 350px;">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @foreach (config('global.permissions') as $name => $value)
                                                            @if (in_array($name, $role->permissions))
                                                                <span class="badge badge-pill-info mb-1">
                                                                    {{ __(config('global.permissions.' . $name)) }}
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @include('dashboard.roles.parts.action')
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    {!! __('roles.no_roles_found') !!}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {!! $roles->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------  End Table  ---------------------------->
                </div>
            </div>
        </div>
    </div>
@endsection
