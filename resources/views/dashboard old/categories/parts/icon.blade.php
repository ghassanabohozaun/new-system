<div class="text-center" style="width: 150px;">

    <div class="position-relative d-inline-block">
        @if (!empty($category->icon))
            <img src='{!! asset('/uploads/categories/' . $category->icon) !!}' width="80" height="50" class="img-fluid img-responsive">
        @else
            <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' width="80" height="50" class="img-fluid img-responsive">
        @endif
    </div>
</div>
