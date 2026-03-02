<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Services\Dashboard\CategoryService;
use App\Services\Dashboard\FlightService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryService;
    protected $flightService;

    public function __construct(CategoryService $categoryService, FlightService $flightService)
    {
        $this->categoryService = $categoryService;
        $this->flightService = $flightService;
    }

    public function index(Request $request)
    {
        $filters = $request->all();
        $categories = $this->categoryService->getCategories($filters);
        $allCategories = $this->categoryService->getAllCategories();

        if ($request->ajax()) {
            return view('dashboard.categories.partials._table', compact('categories'))->render();
        }
        return view('dashboard.categories.index', compact('categories', 'allCategories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = $this->categoryService->store($data);

        if (!$category) {
            return response()->json(['status' => false, 'message' => __('messages.error')], 500);
        }

        return response()->json(['status' => true, 'message' => __('messages.success'), 'data' => $category], 200);
    }



    public function update(CategoryRequest $request, string $id)
    {

        $data = $request->only(['id', 'name', 'slug', 'parent', 'status', 'icon']);

        $category = $this->categoryService->update($data);

        if (!$category) {
            return response()->json(['status' => false, 'message' => __('messages.error')], 500);
        }

        return response()->json(['status' => true, 'message' => __('messages.success'), 'data' => $category], 200);
    }

    public function destroy(Request $request)
    {
        $category = $this->categoryService->destroy($request->id);
        if (!$category) {
            return response()->json(['status' => false, 'message' => __('messages.error')], 500);
        }

        return response()->json(['status' => true, 'message' => __('messages.success')], 200);
    }

    public function changeStatus(Request $request)
    {
        $category = $this->categoryService->changeStatus($request->id, $request->statusSwitch);

        if (!$category) {
            return response()->json(['status' => false, 'message' => __('messages.error')], 500);
        }

        return response()->json(['status' => true, 'message' => __('messages.success'), 'data' => $category], 200);
    }

    public function getAll()
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json(['status' => true, 'data' => $categories]);
    }

    public function getFlights($category_id)
    {
        $category = $this->categoryService->getCategory($category_id);
        if (!$category) {
            abort(404);
        }

        $flights = $this->flightService->getFlightsPaginated(3, ['category_id' => $category_id]);
        $title = __('categories.flights') . ' - ' . $category->name;

        return view('dashboard.categories.flights', compact('category', 'flights', 'title', 'category_id'));
    }

    public function flightPaging(Request $request)
    {
        $category_id = $request->category_id;
        $category = $this->categoryService->getCategory($category_id);
        $flights = $this->flightService->getFlightsPaginated(3, ['category_id' => $category_id]);

        if ($flights->count() > 0) {
            $html = view('dashboard.categories.partials.flight-items', compact('flights', 'category'))->render();
            return response()->json([
                'html' => $html,
                'status' => true,
                'has_more' => $flights->hasMorePages()
            ]);
        }

        return response()->json(['html' => '', 'status' => false]);
    }
}
