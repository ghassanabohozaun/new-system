@if (!empty($page->photo))
    <img src='{!! asset('/uploads/pages/' . $page->photo) !!}' width="80" height="80" class="img-fluid">
@else
    <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' width="80" height="80" class="img-fluid">
@endif
