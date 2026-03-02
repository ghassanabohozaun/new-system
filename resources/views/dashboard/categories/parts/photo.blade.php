@if ($category->icon)
    <img src="{{ asset('uploads/categories/' . $category->icon) }}" alt="{{ $category->name }}"
        class="img-sm rounded-circle border" style="width: 40px; height: 40px; object-fit: cover;">
@else
    <div class="img-sm rounded-circle bg-light border d-flex align-items-center justify-content-center text-muted"
        style="width: 40px; height: 40px;">
        <i class="mdi mdi-shape-outline"></i>
    </div>
@endif
