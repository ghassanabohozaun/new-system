@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">

        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">
                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('flights.flights') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.flights.index') !!}">
                                        {!! __('flights.flights') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="{!! route('dashboard.flights.show', $flight->id) !!}">
                                        {!! $flight->name !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-2">
                        <a href="{!! route('dashboard.flights.edit', $flight->id) !!}" class="btn btn-primary btn-glow px-2">
                            {!! __('flights.update_flight') !!}
                        </a>
                        <a href="{!! route('dashboard.flights.create') !!}" class="btn btn-info btn-glow px-2">
                            {!! __('flights.create_new_flight') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="content-body">

                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- begin: card header -->
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload-form"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: card header -->

                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <div class="container-fluid">


                                            <!-- begin: basic info div -->
                                            <div class="row">

                                                <!-- begin: right div -->
                                                <div class="col-md-6 col-sm-12">
                                                    <!-- flight_name -->
                                                    <p>
                                                    <h2 class="text-muted">{!! $flight->name !!}</h2>
                                                    </p>

                                                    <!-- flight_desc -->
                                                    <p>
                                                        {!! $flight->details !!}
                                                    </p>
                                                    <br />
                                                    <br />

                                                    <p>
                                                        @if ($flight->status == 1)
                                                            <span
                                                                class="badge badge-sm  badge-success">{!! __('general.enable') !!}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-sm badge-danger">{!! __('general.disabled') !!}</span>
                                                        @endif

                                                    </p>


                                                    <p>
                                                        <li class="la la-calendar text-success"></li>
                                                        <span>{!! __('flights.offer_duration_from') !!} : </span>
                                                        <span>{!! $flight->offer_duration_from !!}</span>
                                                    </p>

                                                    <p>
                                                        <li class="la la-calendar text-primary"></li>
                                                        <span>{!! __('flights.offer_duration_to') !!} : </span>
                                                        <span>{!! $flight->offer_duration_to !!}</span>
                                                    </p>
                                                    <p>
                                                        <li class="la la-calendar-check-o text-danger"></li>
                                                        <span>{!! __('flights.days_num') !!} : </span>
                                                        <span>{!! $flight->days_num !!}</span>
                                                    </p>
                                                    <p>
                                                        <li class="la la-calendar-check-o text-warning"></li>
                                                        <span>{!! __('flights.nights_num') !!} : </span>
                                                        <span>{!! $flight->nights_num !!}</span>
                                                    </p>

                                                    <p>
                                                        <li class="la la-list-alt text-info"></li>
                                                        <span>{!! __(key: 'flights.category_id') !!} : </span>
                                                        <span>{!! $flight->category->name !!}</span>
                                                    </p>

                                                    <p>
                                                        <li class="la la-flag text-warning"></li>
                                                        <span>{!! __('flights.country_id') !!} : </span>
                                                        <span>{!! $flight->country->name !!}</span>
                                                    </p>

                                                    <p>
                                                        <li class="la la-flag text-dark"></li>
                                                        <span>{!! __('flights.city_id') !!} : </span>
                                                        <span>{!! $flight->city->name !!}</span>
                                                    </p>


                                                </div>
                                                <!-- end: right div -->

                                                <!-- begin: left div  slider-->
                                                <div class="col-md-6 col-sm-12">
                                                    <!-- begin: slider-->
                                                    <div class="text-center">
                                                        <div id="carouselExampleControls" class="carousel slide"
                                                            data-ride="carousel" style="width: 100%">
                                                            <div class="carousel-inner">
                                                                @foreach ($flight->images as $key => $image)
                                                                    <div class="carousel-item {!! $key == 0 ? 'active' : '' !!}">
                                                                        <img src="{!! asset('uploads/flights/' . $image->file_name) !!}"
                                                                            class="d-block w-100"
                                                                            style="max-width: 100%  ; max-height: 80%"
                                                                            alt="{!! $flight->name !!}">
                                                                    </div>
                                                                @endforeach

                                                                <a href="#carouselExampleControls"
                                                                    class="carousel-control-prev" type="button"
                                                                    data-target="#carouselExampleControls"
                                                                    data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">{!! __('general.previous') !!}</span>
                                                                </a>
                                                                <a href="#carouselExampleControls"
                                                                    class="carousel-control-next" type="button"
                                                                    data-target="#carouselExampleControls"
                                                                    data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">{!! __('general.next') !!}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end: slider-->
                                                </div>
                                                <!-- end: left div slider -->


                                            </div>
                                            <!-- end: basic info div -->



                                            <!-- begin: services and prices div -->
                                            <div class="row mt-4 mb-3">
                                                <!-- begin:  services -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="table-responsive ">
                                                        @if (!$flight->flightServices->isEmpty())
                                                            <table class="table" id='myTable'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>{!! __('flights.service_name_ar') !!}</th>
                                                                        <th>{!! __('flights.service_name_en') !!}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($flight->flightServices as $key=> $service)
                                                                        <tr>
                                                                            <td class="col-lg-1 col-md-1 col-sm-1">
                                                                                {!! $loop->iteration !!}
                                                                            </td>
                                                                            <td class="col-lg-5 col-md-5 col-sm-5">
                                                                                {!! $service->getTranslation('name', 'ar') !!}
                                                                            </td>
                                                                            <td class="col-lg-5 col-md-5 col-sm-5">
                                                                                {!! $service->getTranslation('name', 'en') !!}
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="3" class="text-center">
                                                                                {!! __('flights.no_services_found') !!}
                                                                            </td>
                                                                        </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- end:  services -->

                                                <!-- begin:  prices -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="table-responsive "></div>
                                                    @if (!$flight->flightPrices->isEmpty())
                                                        <table class="table" id='myTable'>
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{!! __('flights.price_text_ar') !!}</th>
                                                                    <th>{!! __('flights.price_text_en') !!}</th>
                                                                    <th>{!! __('flights.price') !!}</th>
                                                                    <th>{!! __('flights.main_option') !!}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($flight->flightPrices as $key=> $price)
                                                                    <tr>
                                                                        <td class="col-lg-1 col-md-1 col-sm-1">
                                                                            {!! $loop->iteration !!}
                                                                        </td>
                                                                        <td class="col-lg-3 col-md-3 col-sm-3">
                                                                            {!! $price->getTranslation('text', 'ar') !!}
                                                                        </td>
                                                                        <td class="col-lg-3 col-md-3 col-sm-3">
                                                                            {!! $price->getTranslation('text', 'en') !!}
                                                                        </td>
                                                                        <td class="col-lg-3 col-md-3 col-sm-3">
                                                                            {!! $price->price !!}
                                                                        </td>
                                                                        <td class="col-lg-1 col-md-1 col-sm-1">
                                                                            <input type="checkbox" class="form-controll"
                                                                                {!! $price->main_option == 1 ? 'checked' : '' !!} disabled />
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">
                                                                            {!! __('flights.no_prices_found') !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end:  prices -->

                                        </div>
                                        <!-- end: services and prices div -->


                                        <!-- begin: flight notes -->
                                        <div class="row mt-4 mb-3">
                                            <!-- begin:  flight Includings -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    @if (!$flight->flightNotes->isEmpty())
                                                        <table class="table" id='myTable'>
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{!! __('flights.note_text_ar') !!}</th>
                                                                    <th>{!! __('flights.note_text_en') !!}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($flight->flightNotes as $key=> $item)
                                                                    <tr>
                                                                        <td class="col-lg-1 col-md-1 col-sm-1">
                                                                            {!! $loop->iteration !!}
                                                                        </td>
                                                                        <td class="col-lg-5 col-md-5 col-sm-5">
                                                                            {!! $item->getTranslation('text', 'ar') !!}
                                                                        </td>
                                                                        <td class="col-lg-5 col-md-5 col-sm-5">
                                                                            {!! $item->getTranslation('text', 'en') !!}
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="2" class="text-center">
                                                                            {!! __('flights.no_offer_including_found') !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end:  flight notes -->
                                        </div>
                                        <!-- end: flight notes div -->


                                        <!-- begin: flight Includings and flight Not Includings div -->
                                        <div class="row mt-4 mb-3">
                                            <!-- begin:  flight Includings -->
                                            <div class="col-md-6 col-sm-12 mt-2">
                                                <div class="table-responsive ">
                                                    @if (!$flight->flightIncludings->isEmpty())
                                                        <table class="table" id='myTable'>
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{!! __('flights.including_text_ar') !!}</th>
                                                                    <th>{!! __('flights.including_text_en') !!}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($flight->flightIncludings as $key=> $item)
                                                                    <tr>
                                                                        <td class="col-lg-1 col-md-1 col-sm-1">
                                                                            {!! $loop->iteration !!}
                                                                        </td>
                                                                        <td class="col-lg-5 col-md-5 col-sm-5">
                                                                            {!! $item->getTranslation('text', 'ar') !!}
                                                                        </td>
                                                                        <td class="col-lg-5 col-md-5 col-sm-5">
                                                                            {!! $item->getTranslation('text', 'en') !!}
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="2" class="text-center">
                                                                            {!! __('flights.no_offer_including_found') !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end:  flight Includings -->

                                            <!-- begin:  flight Not Includings -->
                                            <div class="col-md-6 col-sm-12 mt-2">
                                                <div class="table-responsive ">
                                                    @if (!$flight->flightNotIncludings->isEmpty())
                                                        <table class="table" id='myTable'>
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{!! __('flights.not_including_text_ar') !!}</th>
                                                                    <th>{!! __('flights.not_including_text_en') !!}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($flight->flightNotIncludings as $key=> $item)
                                                                    <tr>
                                                                        <td class="col-lg-1 col-md-1 col-sm-1">
                                                                            {!! $loop->iteration !!}
                                                                        </td>
                                                                        <td class="col-lg-5 col-md-5 col-sm-5">
                                                                            {!! $item->getTranslation('text', 'ar') !!}
                                                                        </td>
                                                                        <td class="col-lg-5 col-md-5 col-sm-5">
                                                                            {!! $item->getTranslation('text', 'en') !!}
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">
                                                                            {!! __('flights.no_offer_not_including_found') !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end:  prices -->

                                        </div>
                                        <!-- end: flight Includings and flight Not Includings div -->

                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div> <!-- end: card  -->
                    </div><!-- end: row  -->
            </div>
            </section><!-- end: sections  -->
        </div><!-- end: content body  -->
    </div> <!-- end: content wrapper  -->

    </div><!-- end: content app  -->
@endsection
