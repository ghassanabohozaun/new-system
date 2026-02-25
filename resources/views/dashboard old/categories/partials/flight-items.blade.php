@forelse ($flights as $flight)
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card" style="100%">
            <div class="card-content">
                @if (!$flight->images->empty())
                    <img class="card-img-top img-fluid" src="{!! asset('uploads/flights/' . $flight->images->first()->file_name) !!}" alt="Card image cap">
                @else
                    <div class="col-12 px-5 py-5">
                        <span>No Image</span>
                    </div>
                @endif
                <div class="card-body">

                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                            {{-- edit --}}
                            <a href="{!! route('dashboard.flights.edit', $flight->id) !!}" class="btn btn-sm btn-outline-primary"
                                title="{!! __('general.edit') !!}">
                                <i class="la la-edit"></i>
                            </a>
                            {{-- show --}}
                            <a href="{!! route('dashboard.flights.show', $flight->id) !!}" class="btn btn-sm btn-outline-success"
                                title="{!! __('general.show') !!}">
                                <i class="la la-eye"></i>
                            </a>

                            {{-- delete --}}
                            <button class="btn btn-sm btn-outline-danger delete_flight_btn"
                                title="{!! __('general.delete') !!}" data-id="{!! $flight->id !!}">
                                <i class="la la-trash"></i>
                            </button>

                            {{-- change status --}}
                            <a href="#" class="btn btn-sm btn-outline-dark">
                                <input type="checkbox" id="input-15" class="change_status btn-lg" aria-busy=""
                                    id="change_status" {{ $flight->status == 1 ? 'checked' : '' }}
                                    data-id="{{ $flight->id }}" />
                            </a>


                        </div>
                    </div>


                    <h4 class="card-title mt-2">{!! $flight->name !!}</h4>

                    <div class="badge badge-md {!! $flight->status == 1 ? 'badge-success' : 'badge-danger' !!} flight_status_{!! $flight->id !!}">
                        {!! $flight->status == 1 ? __('general.enable') : __('general.disabled') !!}
                    </div>

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

                    <p class="card-text
                        mt-1">{!! $flight->details !!}</p>
                </div>
            </div>
        </div>

    </div>
@empty

    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card" style="100%">
            <div class="card-content text-center text-danger px-2 py-2">

                <span class="text-danger" style="font-size: 2.5rem"> {!! __('flights.no_flights_found') !!}</span>



            </div>
        </div>
    </div>
@endforelse
