@if (count($notesItems) > 0)

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-premium table-premium-responsive">
            <thead class="bg-light">
                <tr>
                    <th class="py-3 px-4">{!! __('flights.note_text_ar') !!}</th>
                    <th class="py-3 px-4">{!! __('flights.note_text_en') !!}</th>
                    <th class="py-3 px-4 text-center d-none d-md-table-cell column-actions-minimal">
                        {!! __('general.actions') !!}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notesItems as $index => $row)
                    <tr wire:key="row-{{ $index }}">
                        <td class="p-3">
                            <div class="form-group mb-0 theme-primary">
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-translate"></i></span>
                                    <input type="text" wire:model="notesItems.{!! $index !!}.note_text_ar"
                                        class="form-control" placeholder="{!! __('flights.enter_note_text_ar') !!}"
                                        @error('notesItems.' . $index . '.note_text_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>
                                </div>
                                @error('notesItems.' . $index . '.note_text_ar')
                                    <span class="text text-danger d-block mt-1 small">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>

                        <td class="p-3">
                            <div class="form-group mb-0 theme-primary">
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-notebook-edit-outline"></i></span>
                                    <input type="text" wire:model="notesItems.{!! $index !!}.note_text_en"
                                        class="form-control" placeholder="{!! __('flights.enter_note_text_en') !!}"
                                        @error('notesItems.' . $index . '.note_text_en')  style="border-color: rgb(246, 78, 96)"  @enderror />
                                </div>
                                @error('notesItems.' . $index . '.note_text_en')
                                    <span class="text text-danger d-block mt-1 small">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>

                        <td class="p-3 text-center align-middle">
                            <button type="button" wire:click.prevent="addNewNote"
                                class="btn btn-sm btn-gradient-primary btn-icon me-1">
                                <i class="mdi mdi-plus"></i>
                            </button>
                            <button type="button" wire:click.prevent="removeNote({{ $index }})"
                                class="btn btn-sm btn-gradient-danger btn-icon">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- @foreach ($notesItems as $index => $row)
    <div class="row mt-1" wire:key="row-{{ $index }}">

        <!-- begin: input  note_text_ar-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="sr-only" for="note_text_ar">{!! __('flights.note_text_ar') !!} </label>
                <input type="text" wire:model="notesItems.{!! $index !!}.note_text_ar" class="form-control"
                    placeholder="{!! __('flights.enter_note_text_ar') !!}"
                    @error('notesItems.' . $index . '.note_text_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>

                @error('notesItems.' . $index . '.note_text_ar')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror

            </div>
        </div>
        <!-- end: input  note_text_ar-->

        <!-- begin: input  note_text_en-->
        <div class="col-md-5">
            <div class="form-group">
                <label class="sr-only" for="note_text_en">{!! __('flights.note_text_en') !!} </label>
                <input type="text" wire:model="notesItems.{!! $index !!}.note_text_en" class="form-control"
                    placeholder="{!! __('flights.enter_note_text_en') !!}"
                    @error('notesItems.' . $index . '.note_text_en')  style="border-color: rgb(246, 78, 96)"  @enderror>

                @error('notesItems.' . $index . '.note_text_en')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror

            </div>
        </div>
        <!-- end: input  note_text_en-->


        <div class="col-md-1">
            <label class="sr-only" for=""></label>
            <button type="button" wire:click.prevent ="removeNote({{ $index }})"
                class="btn btn-danger btn-glow ">
                <li class="la la-trash"></li>
            </button>
        </div>
    </div>
@endforeach

<hr style="background-color: rgb(167, 163, 163)">
<button type="button" wire:click.prevent="addNewNote" class="btn btn-success btn-glow ">
    <li class="la la-plus"></li>
</button> --}}
@endif
