<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PageRequest;
use App\Services\Dashboard\PageService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $pageService;

    // __construct
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    // index
    public function index()
    {
        $title = __('pages.pages');
        return view('dashboard.pages.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->pageService->getAll();
    }

    // create
    public function create()
    {
        $title = __('pages.create_new_page');
        return view('dashboard.pages.create', compact('title'));
    }

    // store
    public function store(PageRequest $request)
    {
        $data = $request->only(['title', 'details', 'photo', 'status']);
        $page = $this->pageService->store($data);
        if (!$page) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $page = $this->pageService->getPage($id);
        if (!$page) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.faqs.edit');
        }
        $title = __('pages.update_page');
        return view('dashboard.pages.edit', compact('title', 'page'));
    }

    // update
    public function update(PageRequest $request, string $id)
    {
        $data = $request->only(['id', 'title', 'details', 'photo', 'status']);
        $page = $this->pageService->update($data);
        if (!$page) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // destroy
    public function destroy(string $id)
    {
        $page = $this->pageService->destroy($id);
        if (!$page) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // destroy
    public function changeStatus(Request $request)
    {
        $page = $this->pageService->changeStatus($request->id, $request->statusSwitch);
        if (!$page) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // delete photo
    public function deletePhoto(Request $request)
    {
        $page = $this->pageService->deletePhoto($request->id);
        if (!$page) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
}
