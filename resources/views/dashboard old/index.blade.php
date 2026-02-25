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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('dashboard.dashboard') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->
            </div> <!-- end :content header -->

            <!-- begin: staticstics -->
            <div class="row">

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-wallet info font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! ticketsCount() !!}</h3>
                                        <span>{!! __('dashboard.tickets_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-paper-plane success font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! toursCount() !!}</h3>
                                        <span>{!! __('dashboard.tours_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="ficon ft-briefcase info font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! reservaitionsCount() !!}</h3>
                                        <span>{!! __('dashboard.reservatoins_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-plane warning font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! flightsCount() !!}</h3>
                                        <span>{!! __('dashboard.flights_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-basket-loaded info font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>0</h3>
                                        <span>{!! __('dashboard.payments_total') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-list dark font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! categoriesCount() !!}</h3>
                                        <span>{!! __('dashboard.categories_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-user-following danger font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! adminsCount() !!}</h3>
                                        <span>{!! __('dashboard.admins_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pointer primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! countriesCount() !!}</h3>
                                        <span>{!! __('dashboard.countries_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pointer danger font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! citiesCount() !!}</h3>
                                        <span>{!! __('dashboard.cities_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


            </div>
            <!-- end: staticstics -->


            <!--begin::chart-->
            <div class="card card-custom gutter-b">

                <div class="card-body py-2" style="">
                    <div class="container-fluid">
                        <div class="row">

                            <!--begin::flight reservations chart-->
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div style="width: 100% ; margin: auto">
                                        <canvas id="barChart1" width="1100" height="600"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--end::flight reservations chart-->

                            <!--begin::ticket reservations charts -->
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div style="width: 100% ; margin: auto">
                                        <canvas id="barChart2" width="1100" height="600"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--end::ticket reservations chart-->

                        </div>
                    </div>
                </div>

                <!--end::Body-->
            </div>
            <!--end::chart-->



            <!-- begin: flights -->
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">

                        <!-- begin:   -->
                        <div class="col-md-12">
                            <div class="card">
                                <!-- begin: card header -->
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-colored-form-control">
                                        {!! __('dashboard.latest_flights') !!}
                                    </h4>

                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: card header -->

                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <!--begin::Body-->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="table-responsive ">
                                                    <table class="table"
                                                        style="text-align: center;vertical-align: middle;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">{!! __('flights.photo') !!}</th>
                                                                <th scope="col">{!! __('flights.flight_name') !!}</th>
                                                                <th scope="col">{!! __('flights.country_id') !!}</th>
                                                                <th scope="col">{!! __('flights.city_id') !!}</th>
                                                                <th scope="col">{!! __('flights.category_id') !!}</th>
                                                                <th scope="col">{!! __('flights.days_num') !!}</th>
                                                                <th scope="col">{!! __('flights.nights_num') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($latestFlights as $key => $flight)
                                                                <tr>
                                                                    <td>{!! $loop->iteration !!}</td>
                                                                    <td>
                                                                        @if (!$flight->images->empty())
                                                                            <img src="{{ asset('uploads/flights/' . $flight->images->first()->file_name) }}"
                                                                                class="img-fluid img-thumbnail table-image " />
                                                                        @else
                                                                            <span>No Image</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{!! $flight->name !!} </td>
                                                                    <td>{!! $flight->country->name !!}</td>
                                                                    <td>{!! $flight->city->name !!}</td>
                                                                    <td>{!! $flight->category->name !!}</td>
                                                                    <td>{!! $flight->days_num !!}</td>
                                                                    <td>{!! $flight->days_num !!}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="8" class="text-center">
                                                                        {!! __('flights.no_flights_found') !!}
                                                                    </td>
                                                                </tr>
                                                            @endforelse

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Body-->
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div> <!-- end:   -->


                    </div><!-- end: row  -->
                </section><!-- end: sections  -->
            </div>
            <!-- end: flights  -->

            <!-- begin: tickets  -->
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">

                        <!-- begin: Tickets  -->
                        <div class="col-md-12">
                            <div class="card">
                                <!-- begin: card header -->
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-colored-form-control">
                                        {!! __('dashboard.latest_tickets') !!}
                                    </h4>

                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: card header -->

                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <!--begin::Body-->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="table-responsive ">
                                                    <table class="table"
                                                        style="text-align: center;vertical-align: middle;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">{!! __('tickets.photo') !!}</th>
                                                                <th scope="col">{!! __('tickets.title') !!}</th>
                                                                <th scope="col">{!! __('tickets.price') !!}</th>
                                                                <th scope="col">{!! __('tickets.from_country_id') !!}</th>
                                                                <th scope="col">{!! __('tickets.to_country_id') !!}</th>
                                                                <th scope="col">{!! __('tickets.from_city_id') !!}</th>
                                                                <th scope="col">{!! __('tickets.to_city_id') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($latestTickets as $key => $ticket)
                                                                <tr>
                                                                    <td>{!! $loop->iteration !!}</td>
                                                                    <td>
                                                                        @if ($ticket->photo)
                                                                            <img src="{{ asset('uploads/tickets/' . $ticket->photo) }}"
                                                                                class="img-fluid img-thumbnail table-image " />
                                                                        @else
                                                                            <span>No Image</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{!! $ticket->title !!} </td>
                                                                    <td>{!! $ticket->price !!}</td>
                                                                    <td>{!! $ticket->formCountry->name !!}</td>
                                                                    <td>{!! $ticket->formCity->name !!}</td>
                                                                    <td>{!! $ticket->toCountry->name !!}</td>
                                                                    <td>{!! $ticket->toCity->name !!}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="8" class="text-center">
                                                                        {!! __('tickets.no_tickets_found') !!}
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Body-->
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div> <!-- end: Tickets  -->


                    </div><!-- end: row  -->
                </section><!-- end: sections  -->
            </div>
            <!-- end: tickets  -->



            <!-- begin: tours  -->
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">

                        <!-- begin: Tickets  -->
                        <div class="col-md-12">
                            <div class="card">
                                <!-- begin: card header -->
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-colored-form-control">
                                        {!! __('dashboard.latest_tours') !!}
                                    </h4>

                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: card header -->

                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <!--begin::Body-->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="table-responsive ">
                                                    <table class="table"
                                                        style="text-align: center;vertical-align: middle;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">{!! __('tours.photo') !!}</th>
                                                                <th scope="col">{!! __('tours.name') !!}</th>
                                                                <th scope="col">{!! __('tours.title') !!}</th>
                                                                <th scope="col">{!! __('tours.price') !!}</th>
                                                                <th scope="col">{!! __('tours.country_id') !!}</th>
                                                                <th scope="col">{!! __('tours.city_id') !!}</th>
                                                                <th scope="col">{!! __('tours.tour_guide_name') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($latesTours as $key => $tour)
                                                                <tr>
                                                                    <td>{!! $loop->iteration !!}</td>
                                                                    <td>
                                                                        @if ($tour->photo)
                                                                            <img src="{{ asset('uploads/tours/' . $tour->photo) }}"
                                                                                class="img-fluid img-thumbnail table-image " />
                                                                        @else
                                                                            <span>No Image</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{!! $tour->name !!} </td>
                                                                    <td>{!! $tour->title !!}</td>
                                                                    <td>{!! $tour->price !!}</td>
                                                                    <td>{!! $tour->country->name !!}</td>
                                                                    <td>{!! $tour->city->name !!}</td>
                                                                    <td>{!! $tour->tour_guide_name !!}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="8" class="text-center">
                                                                        {!! __('tours.no_tours_found') !!}
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Body-->
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div> <!-- end: Tickets  -->


                    </div><!-- end: row  -->
                </section><!-- end: sections  -->
            </div>
            <!-- end: tickets  -->


        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
@endsection


@push('scripts')
    <script type="text/javascript" src="{!! asset('assets/dashbaord/js/scripts/Chart.bundle.min.js') !!}"></script>
    <script type="text/javascript">
        $(function() {
            var flightReservationsData = <?php echo json_encode($flightReservationsData); ?>;
            var barCanvas = $("#barChart1");
            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels: ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov',
                        'dec'
                    ],
                    datasets: [{
                        label: '{!! trans('dashboard.flights_count ') !!}',
                        data: flightReservationsData,
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'violet',
                            'purple', 'pink', 'indigo', 'silver', 'gold', 'brown'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxis: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });

        $(function() {
            var ticketReservationsData = <?php echo json_encode($ticketReservationsData); ?>;
            var barCanvas = $("#barChart2");
            var barChart = new Chart(barCanvas, {
                type: 'line', //bar
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: '{!! trans('dashboard.tickets_count') !!}',
                        data: ticketReservationsData,
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'violet',
                            'purple', 'pink', 'indigo', 'silver', 'gold', 'brown'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxis: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });
    </script>
@endpush
