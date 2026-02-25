  <div class="card">
      <!-- begin: card header -->
      <div class="card-header">
          <h4 class="card-title" id="basic-layout-colored-form-control">
              {!! __('reservations.show_all_reservations') !!}
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
              <div class="table-responsive"></div>
              <table id="yajra-datatable" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>{!! __('reservations.flight_id') !!}</th>
                          <th>{!! __('reservations.service') !!}</th>
                          <th>{!! __('reservations.client_name') !!}</th>
                          <th>{!! __('reservations.client_passport_number') !!}</th>
                          <th>{!! __('reservations.depature_country_id') !!}</th>
                          <th>{!! __('reservations.depature_date') !!}</th>
                          <th>{!! __('reservations.return_date') !!}</th>
                          <th>{!! __('reservations.economy_class_type') !!}</th>
                          <th>{!! __('reservations.ticket_id') !!}</th>
                          <th>{!! __('reservations.created_at') !!}</th>
                          {{-- <th>{!! __('reservations.status') !!}</th>
            <th>{!! __('reservations.manage_status') !!}</th> --}}
                          <th>{!! __('general.actions') !!}</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>

          </div>
      </div>
  </div>
  <!-- end: card content -->
