@if (count($offerIncludingItems) > 0)


    <div class="table-responsive">
        <table class="table table-hover table-bordered table-premium table-premium-responsive">
            <thead class="bg-light">
                <tr>
                    <th class="py-3 px-4">{!! __('flights.offer_including_text_ar') !!}</th>
                    <th class="py-3 px-4">{!! __('flights.offer_including_text_en') !!}</th>
                    <th class="py-3 px-4 text-center d-none d-md-table-cell column-actions-minimal">
                        {!! __('general.actions') !!}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offerIncludingItems as $index => $row)
                    <tr wire:key="row-{{ $index }}">
                        <td class="p-3">
                            <div class="form-group mb-0 theme-success">
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-translate"></i></span>
                                    <input type="text"
                                        wire:model="offerIncludingItems.{!! $index !!}.including_text_ar"
                                        class="form-control" placeholder="{!! __('flights.enter_offer_including_text_ar') !!}"
                                        @error('offerIncludingItems.' . $index . '.including_text_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>
                                </div>
                                @error('offerIncludingItems.' . $index . '.including_text_ar')
                                    <span class="text text-danger d-block mt-1 small">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>

                        <td class="p-3">
                            <div class="form-group mb-0 theme-success">
                                <div class="input-group-premium">
                                    <span class="input-group-text"><i class="mdi mdi-check-decagram-outline"></i></span>
                                    <input type="text"
                                        wire:model="offerIncludingItems.{!! $index !!}.including_text_en"
                                        class="form-control" placeholder="{!! __('flights.enter_offer_including_text_en') !!}"
                                        @error('offerIncludingItems.' . $index . '.including_text_en')  style="border-color: rgb(246, 78, 96)"  @enderror />
                                </div>
                                @error('offerIncludingItems.' . $index . '.including_text_en')
                                    <span class="text text-danger d-block mt-1 small">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>

                        <td class="p-3 text-center align-middle">
                            <button type="button" wire:click.prevent="addNewOfferIncluding"
                                class="btn btn-sm btn-gradient-primary btn-icon me-1">
                                <i class="mdi mdi-plus"></i>
                            </button>
                            <button type="button" wire:click.prevent="removeOfferIncluding({{ $index }})"
                                class="btn btn-sm btn-gradient-danger btn-icon">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>


    {{--
   @foreach ($offerIncludingItems as $index => $row)
       <div class="row mt-1" wire:key="row-{{ $index }}">

           <div class="col-md-1">
               <label class="sr-only" for=""></label>
               <button type="button" wire:click.prevent ="removeOfferIncluding({{ $index }})"
                   class="btn btn-danger btn-glow">
                   <li class="la la-trash"></li>
               </button>
           </div>

           <!-- begin: input  including_text_ar-->
           <div class="col-md-6">
               <div class="form-group">
                   <label class="sr-only" for="including_text_ar">{!! __('flights.offer_including_text_ar') !!} </label>
                   <input type="text" wire:model="offerIncludingItems.{!! $index !!}.including_text_ar"
                       class="form-control" placeholder="{!! __('flights.enter_including_text_ar') !!}"
                       @error('offerIncludingItems.' . $index . '.including_text_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>

                   @error('offerIncludingItems.' . $index . '.including_text_ar')
                       <span class="text text-danger">
                           <strong>{!! $message !!}</strong>
                       </span>
                   @enderror

               </div>
           </div>
           <!-- end: input  including_text_ar-->

           <!-- begin: input  including_text_en-->
           <div class="col-md-5">
               <div class="form-group">
                   <label class="sr-only" for="including_text_en">{!! __('flights.offer_including_text_en') !!} </label>
                   <input type="text" wire:model="offerIncludingItems.{!! $index !!}.including_text_en"
                       class="form-control" placeholder="{!! __('flights.enter_including_text_en') !!}"
                       @error('offerIncludingItems.' . $index . '.including_text_en')  style="border-color: rgb(246, 78, 96)"  @enderror>


                   @error('offerIncludingItems.' . $index . '.including_text_en')
                       <span class="text text-danger">
                           <strong>{!! $message !!}</strong>
                       </span>
                   @enderror

               </div>
           </div>
           <!-- end: input  including_text_en-->


       </div>
   @endforeach

   <hr style="background-color: rgb(167, 163, 163)">
   <button type="button" wire:click.prevent="addNewOfferIncluding" class="btn btn-success btn-glow">
       <li class="la la-plus"></li>
   </button> --}}
@endif
