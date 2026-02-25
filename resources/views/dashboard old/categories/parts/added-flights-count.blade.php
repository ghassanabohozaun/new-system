<a href="{!! route('dashboard.categories.get.flights', $category->id) !!}">
    <div class="badge badge-md badge-primary">
        {!! $category->flights()->count() !!}
    </div>
</a>
