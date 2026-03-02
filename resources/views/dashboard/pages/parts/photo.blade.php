@if (!empty($page->photo))
    <img src='{!! asset('/uploads/pages/' . $page->photo) !!}' width="50" height="50" class="rounded shadow-sm"
        style="object-fit: contain; background-color: #f8f9fa;">
@else
    No Image
@endif
