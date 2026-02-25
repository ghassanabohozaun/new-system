<div class="modal fade" id="governoraties_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="exampleModalLabel">{!! __('world.governorates') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            <div class="modal-body">

                <!--begin::table-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table-wrapper">
                            <table class="table  table-hover test_answers_table" id="test_answers_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-2">#</th>
                                        <th scope="col" class="col-10">{{ __('world.governorate_name') }}</th>
                                    </tr>
                                </thead>
                                <tbody id='governoraties_tbody'></tbody>

                            </table>
                        </div>
                    </div>

                    <!--end: form-->
                </div>
                <!--end::table-->
            </div>


            <div class="modal-footer">
                <button type="button" id="cancel_governoraties_btn" class="btn btn-light-dark font-weight-bold">
                    {{ trans('general.cancel') }}
                </button>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        // function drawTestAnswersTable(data) {

        //     flag = 'stored'

        //     trHTML = "";
        //     if (!$.trim(data)) {
        //         $("#test_answers_tbody").empty();
        //         trHTML += '<tr class="notfound" id="notfound">' +
        //             '<td colspan="10">' + '{{ __('general.no_record_found') }}' + '</td>' +
        //             '</tr>';
        //     } else {
        //         $("#test_answers_tbody").empty();
        //         $.each(data, function(i, item) {
        //             trHTML += '<tr id="row_' + item.id +
        //                 '"><td class="col-1"><span class="label label-info label-inline mr-2">' + flag +
        //                 '</span></td>' +
        //                 '<td class="col-1">' + item.id + '</td>' +
        //                 '<td class="col-6">' + item.answer_text + '</td>' +
        //                 '<td class="col-2">' + item.answer_value + '</td>' +
        //                 '<td class="col-2"> <a href = "#" id="edit_test_answer_btn" class="btn btn-hover-info btn-icon btn-pill edit_test_answer_btn" data-id="' +
        //                 item.id +
        //                 '" data-text="' + item.answer_text +
        //                 '" data-value="' + item.answer_value +
        //                 '""><i class="fa fa-edit fa-1x"></i></a> <a href = "#" id="delete_test_answer_btn"  class="btn btn-hover-danger btn-icon btn-pill delete_test_answer_btn"  data-id="' +
        //                 item.id +
        //                 '"><i class="fa fa-trash fa-1x"></i></a></td>' +
        //                 '</tr>';
        //         });
        //     }

        //     $('#test_answers_tbody').append(trHTML);
        // };


        // cancel governoraties btn

        $('body').on('click', '#cancel_governoraties_btn', function(e) {
            console.log('rest');
            $('#governoraties_modal').modal('hide');
        });

        // hide governoraties modal
        $('#governoraties_modal').on('hidden.bs.modal', function(e) {
            $('#governoraties_modal').modal('hide');
        });
    </script>
@endpush
@push('css')
    <style>
        .table-wrapper {
            max-height: 350px;
            overflow: auto;
            display: inline-block;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #EBEDF3;
        }

        .notfound {
            text-align: center;
            font-size: 12px;
            font-weight: bolder;
        }
    </style>
@endpush
