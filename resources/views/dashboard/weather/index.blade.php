@extends('layouts.dashboard.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/weather.css') }}">
@endpush

@section('title')
    {!! __('dashboard.weather') !!}
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
                                <li class="breadcrumb-item active" aria-current="page">{!! __('dashboard.weather') !!}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 d-flex align-items-center">
                                <span class="card-icon-premium me-3">
                                    <i class="mdi mdi-weather-partly-cloudy"></i>
                                </span>
                                {!! __('dashboard.weather') !!}
                            </h4>

                            <div class="weather-table-container">
                                <div class="weather-header-section">
                                    <div>
                                        <div class="weather-header-title">{!! __('weather.weather_forecast') !!}
                                            {{ isset($weatherData) ? ' - ' . $weatherData['location']['name'] : '' }}</div>
                                        @if ($weatherData && isset($weatherData['current']['last_updated']))
                                            <div class="weather-header-subtitle">{!! __('weather.last_updated') !!}
                                                {{ \Carbon\Carbon::parse($weatherData['current']['last_updated'])->translatedFormat('d F Y, h:i A') }}
                                            </div>
                                        @endif
                                    </div>

                                    <form action="{{ route('dashboard.weather.index') }}" method="GET"
                                        class="weather-search-form">
                                        <input type="text" name="city" value="{{ $city ?? '' }}"
                                            placeholder="{{ __('dashboard.search') }} {!! __('weather.search_city_placeholder') !!}"
                                            class="weather-search-input" required>
                                        <button type="submit" class="btn-weather-search">
                                            <i class="mdi mdi-magnify"></i> {!! __('weather.search_button') !!}
                                        </button>
                                    </form>
                                </div>

                                @if ($weatherData && isset($weatherData['forecast']['forecastday']))
                                    <div class="table-responsive">
                                        <table class="weather-table">
                                            <thead>
                                                <tr>
                                                    <th>{!! __('weather.day_and_date') !!}</th>
                                                    <th>{!! __('weather.condition') !!}</th>
                                                    <th>{!! __('weather.max_temp') !!}</th>
                                                    <th>{!! __('weather.min_temp') !!}</th>
                                                    <th>{!! __('weather.chance_of_rain') !!}</th>
                                                    <th>{!! __('weather.wind_speed') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($weatherData['forecast']['forecastday'] as $day)
                                                    <tr>
                                                        <td data-label="{!! __('weather.day_and_date') !!}">
                                                            <strong>{{ \Carbon\Carbon::parse($day['date'])->translatedFormat('l') }}</strong><br>
                                                            <span
                                                                style="font-size: 12px; color: #64748b;">{{ \Carbon\Carbon::parse($day['date'])->format('Y-m-d') }}</span>
                                                        </td>
                                                        <td data-label="{!! __('weather.condition') !!}">
                                                            <img src="{{ 'https:' . $day['day']['condition']['icon'] }}"
                                                                alt="Icon" class="weather-icon">
                                                            <span
                                                                class="condition-text">{{ $day['day']['condition']['text'] }}</span>
                                                        </td>
                                                        <td data-label="{!! __('weather.max_temp') !!}">
                                                            <span
                                                                class="temp-val temp-max">{{ round($day['day']['maxtemp_c']) }}&deg;C</span>
                                                        </td>
                                                        <td data-label="{!! __('weather.min_temp') !!}">
                                                            <span
                                                                class="temp-val temp-min">{{ round($day['day']['mintemp_c']) }}&deg;C</span>
                                                        </td>
                                                        <td data-label="{!! __('weather.chance_of_rain') !!}">
                                                            <span class="chance-rain"><i class="mdi mdi-water-percent"></i>
                                                                {{ $day['day']['daily_chance_of_rain'] }}%</span>
                                                        </td>
                                                        <td data-label="{!! __('weather.wind_speed') !!}">
                                                            <span
                                                                class="wind-speed">{{ round($day['day']['maxwind_kph']) }}</span>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @elseif($city && !$weatherData)
                                    <div class="weather-error-msg">
                                        {{ __('weather.error_not_found', ['city' => $city]) }}
                                    </div>
                                @else
                                    <div class="weather-empty-state"
                                        style="text-align: center; padding: 40px; color: #64748b;">
                                        <i class="mdi mdi-cloud-search-outline"
                                            style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px; display: block;"></i>
                                        <h5 style="font-weight: 600;">{!! __('weather.empty_state_title') !!}</h5>
                                        <p style="font-size: 14px; margin-top: 5px;">{!! __('weather.empty_state_desc') !!}</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.Translations = window.Translations || {};
        window.Translations.weather_searching = "{!! __('weather.searching') !!}";
    </script>
    <script src="{{ asset('assets/dashboard/js/weather.js') }}"></script>
@endpush
