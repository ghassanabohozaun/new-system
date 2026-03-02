<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MailingRequest;
use App\Services\Dashboard\MailingBoxService;
use Illuminate\Http\Request;

class MailingBoxController extends Controller
{
    protected $mailingBoxService;
    //__construct
    public function __construct(MailingBoxService $mailingBoxService)
    {
        $this->mailingBoxService = $mailingBoxService;
    }
    // index
    public function index()
    {
        $title = __('mailing.mailing');
        $mailings = $this->mailingBoxService->getAll();
        return view('dashboard.mailing.index', compact('title', 'mailings'));
    }

    // get all
    public function getAll()
    {
        return $this->mailingBoxService->getAll();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MailingRequest $request)
    {
        $data = $request->only(['email']);
        $mail = $this->mailingBoxService->create($data);
        if (!$mail) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mail = $this->mailingBoxService->destroy($id);
        if (!$mail) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // changeStatus
    public function changeStatus(Request $request)
    {
        $mail = $this->mailingBoxService->changeStatus($request['id']);
        if (!$mail) {
            return response()->json(['status' => false], 500);
        }

        // Add translated labels and classes for the custom status handler
        $mail->status_label = __('mailing.' . $mail->status);
        $mail->status_class = $mail->status == 'contacted' ? 'badge-pill-success' : 'badge-pill-danger';

        return response()->json(['status' => true, 'data' => $mail], 200);
    }
}
