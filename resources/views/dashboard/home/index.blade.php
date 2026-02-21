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
                                <li class="breadcrumb-item active" aria-current="page">{!! __('dashboard.home') !!}</li>
                            </ol>
                        </nav>
                        <div class="btn-wrapper mt-3 mt-sm-0">
                            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i>
                                {!! __('general.share') !!}</a>
                            <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i>
                                {!! __('general.print') !!}</a>
                            <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i>
                                {!! __('general.export') !!}</a>
                        </div>
                    </div>
                    <!--------------------  End Breadcrumb  ---------------------------->


                    <div class="col-lg-6 d-flex flex-column">
                        <div class="row flex-grow">
                            @livewire('tasks.todo-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
