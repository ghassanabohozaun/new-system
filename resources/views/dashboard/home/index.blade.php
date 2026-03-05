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





                    <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-3">
                        <ul class="nav nav-tabs border-0 custom-home-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="overview-tab" data-bs-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true">
                                    <i class="icon-grid me-2"></i> {{ __('dashboard.overview') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="charts-tab" data-bs-toggle="tab" href="#charts" role="tab"
                                    aria-controls="charts" aria-selected="false">
                                    <i class="icon-bar-graph me-2"></i> {{ __('dashboard.charts') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="stats-tab" data-bs-toggle="tab" href="#stats" role="tab"
                                    aria-selected="false">
                                    <i class="icon-stats-up me-2"></i> {{ __('dashboard.statistics') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content tab-content-basic">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            @include('dashboard.home.tabs.overview')
                        </div>

                        <!-- Charts Tab -->
                        <div class="tab-pane fade" id="charts" role="tabpanel" aria-labelledby="charts-tab">
                            @include('dashboard.home.tabs.charts')
                        </div>

                        <!-- Statistics Tab -->
                        <div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                            @include('dashboard.home.tabs.statistics')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function($) {
            'use strict';
            $(function() {
                if ($("#reservationsChart").length) {
                    var reservationsCanvas = $("#reservationsChart").get(0).getContext("2d");

                    // Premium Gradients
                    var flightGradient = reservationsCanvas.createLinearGradient(0, 0, 0, 400);
                    flightGradient.addColorStop(0, 'rgba(30, 115, 232, 0.2)');
                    flightGradient.addColorStop(1, 'rgba(30, 115, 232, 0)');

                    var ticketGradient = reservationsCanvas.createLinearGradient(0, 0, 0, 400);
                    ticketGradient.addColorStop(0, 'rgba(255, 71, 71, 0.2)');
                    ticketGradient.addColorStop(1, 'rgba(255, 71, 71, 0)');

                    var reservationsData = {
                        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT",
                            "NOV", "DEC"
                        ],
                        datasets: [{
                                label: '{{ __('dashboard.flight') }}',
                                data: {!! json_encode($flightReservationsData) !!},
                                backgroundColor: flightGradient,
                                borderColor: [
                                    '#1E73E8',
                                ],
                                borderWidth: 2,
                                fill: true,
                                pointBackgroundColor: "#1E73E8",
                                pointBorderColor: "#fff",
                                pointBorderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 6,
                                tension: 0.4
                            },
                            {
                                label: '{{ __('dashboard.ticket') }}',
                                data: {!! json_encode($ticketReservationsData) !!},
                                backgroundColor: ticketGradient,
                                borderColor: [
                                    '#FF4747',
                                ],
                                borderWidth: 2,
                                fill: true,
                                pointBackgroundColor: "#FF4747",
                                pointBorderColor: "#fff",
                                pointBorderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 6,
                                tension: 0.4
                            }
                        ]
                    };

                    var reservationsOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                align: 'end',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                    font: {
                                        size: 12,
                                        family: 'Cairo, sans-serif'
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#fff',
                                titleColor: '#1F3BB3',
                                bodyColor: '#525252',
                                borderColor: '#e1e1e1',
                                borderWidth: 1,
                                padding: 12,
                                displayColors: true,
                                usePointStyle: true,
                                callbacks: {
                                    label: function(context) {
                                        var label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += context.parsed.y;
                                        }
                                        return label;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                grid: {
                                    display: true,
                                    drawBorder: false,
                                    color: "#F0F0F0",
                                    zeroLineColor: "#F0F0F0",
                                },
                                ticks: {
                                    beginAtZero: true,
                                    autoSkip: true,
                                    maxTicksLimit: 5,
                                    color: "#6B778C",
                                    font: {
                                        size: 10,
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    color: "#6B778C",
                                    font: {
                                        size: 10,
                                    }
                                }
                            }
                        }
                    };

                    var reservationsChart = new Chart(reservationsCanvas, {
                        type: 'line',
                        data: reservationsData,
                        options: reservationsOptions
                    });
                }

                // 1. Service Distribution Chart (Doughnut)
                if ($("#serviceDistributionChart").length) {
                    var serviceCanvas = $("#serviceDistributionChart").get(0).getContext("2d");
                    var serviceData = {
                        labels: [
                            @foreach ($serviceDistribution as $key => $val)
                                "{{ __('dashboard.' . $key) }}",
                            @endforeach
                        ],
                        datasets: [{
                            data: {!! json_encode(array_values($serviceDistribution)) !!},
                            backgroundColor: ["#1F3BB3", "#52CDFF", "#FF4747", "#81DADA"],
                            borderColor: "#fff",
                            borderWidth: 2
                        }]
                    };
                    new Chart(serviceCanvas, {
                        type: 'doughnut',
                        data: serviceData,
                        options: {
                            animation: {
                                duration: 800
                            },
                            cutout: '70%',
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                // Custom plugin to show data in the middle or on segments
                                tooltip: {
                                    enabled: true
                                }
                            },
                            layout: {
                                padding: 10
                            }
                        },
                        plugins: [{
                            id: 'textCenter',
                            afterDraw: function(chart) {
                                var width = chart.width,
                                    height = chart.height,
                                    ctx = chart.ctx;

                                ctx.restore();

                                // 1. Draw Total in Center
                                var fontSize = (height / 160).toFixed(2);
                                ctx.font = "bold " + fontSize + "em Cairo";
                                ctx.textBaseline = "middle";
                                ctx.fillStyle = '#1F3BB3';

                                var total = chart.config.data.datasets[0].data.reduce((a,
                                    b) => a + b, 0);
                                var text = total;
                                var textX = Math.round((width - ctx.measureText(text)
                                    .width) / 2);
                                var textY = height / 2;
                                ctx.fillText(text, textX, textY);

                                // 2. Draw Values on Segments
                                chart.data.datasets.forEach(function(dataset, i) {
                                    var meta = chart.getDatasetMeta(i);
                                    meta.data.forEach(function(element, index) {
                                        ctx.fillStyle = '#fff';
                                        var fontSize = (height / 250)
                                            .toFixed(2);
                                        ctx.font = fontSize + "em Cairo";

                                        var dataString = dataset.data[index]
                                            .toString();
                                        if (dataset.data[index] > 0) {
                                            var position = element
                                                .tooltipPosition();
                                            ctx.fillText(dataString,
                                                position.x - (ctx
                                                    .measureText(
                                                        dataString)
                                                    .width / 2),
                                                position.y);
                                        }
                                    });
                                });

                                ctx.save();
                            }
                        }]
                    });
                }

                // 3. Top Nationalities Chart (Horizontal Bar)
                if ($("#nationalitiesChart").length) {
                    var natCanvas = $("#nationalitiesChart").get(0).getContext("2d");
                    new Chart(natCanvas, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode(array_keys($topNationalities)) !!},
                            datasets: [{
                                label: "{{ __('dashboard.top_nationalities') }}",
                                data: {!! json_encode(array_values($topNationalities)) !!},
                                backgroundColor: '#52CDFF',
                                barPercentage: 0.5
                            }]
                        },
                        options: {
                            animation: {
                                duration: 800
                            },
                            indexAxis: 'y',
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        title: function(context) {
                                            return context[0].label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    ticks: {
                                        font: {
                                            size: 10
                                        }
                                    }
                                },
                                y: {
                                    ticks: {
                                        font: {
                                            size: 9,
                                            family: 'Cairo'
                                        },
                                        callback: function(value, index, values) {
                                            var label = this.getLabelForValue(value);
                                            if (label.length > 15) {
                                                return label.substring(0, 15) + '...';
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                // 5. Most Viewed Flights Chart (Bar)
                if ($("#viewsChart").length) {
                    var viewsCanvas = $("#viewsChart").get(0).getContext("2d");
                    new Chart(viewsCanvas, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode(array_keys($mostViewedFlights)) !!},
                            datasets: [{
                                label: "{{ __('dashboard.most_viewed_flights') }}",
                                data: {!! json_encode(array_values($mostViewedFlights)) !!},
                                backgroundColor: '#1F3BB3',
                                barPercentage: 0.5,
                                borderRadius: 5
                            }]
                        },
                        options: {
                            animation: {
                                duration: 500
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    backgroundColor: '#fff',
                                    titleColor: '#1F3BB3',
                                    bodyColor: '#525252',
                                    borderColor: '#e1e1e1',
                                    borderWidth: 1,
                                    padding: 12,
                                    displayColors: true,
                                    usePointStyle: true,
                                    callbacks: {
                                        title: function(context) {
                                            return context[0].label; // Show full title on hover
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    ticks: {
                                        font: {
                                            size: 10,
                                            family: 'Cairo, sans-serif'
                                        },
                                        maxRotation: 0,
                                        minRotation: 0,
                                        callback: function(value, index, values) {
                                            var label = this.getLabelForValue(value);
                                            if (label.length > 25) {
                                                return label.substring(0, 25) +
                                                    '...'; // Truncate long names
                                            }
                                            return label;
                                        }
                                    },
                                    grid: {
                                        display: false,
                                        drawBorder: false
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        display: true,
                                        color: '#F0F0F0',
                                        drawBorder: false
                                    },
                                    ticks: {
                                        font: {
                                            size: 10
                                        },
                                        maxTicksLimit: 5
                                    }
                                }
                            }
                        }
                    });
                }
            });
        })(jQuery);
    </script>
@endpush
