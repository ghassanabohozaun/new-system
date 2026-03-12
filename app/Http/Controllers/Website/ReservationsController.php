<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\RegistrationRequest;
use App\Services\Website\ResevationService;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    protected $resevationService;
    // Create a new class instance.
    public function __construct(ResevationService $resevationService)
    {
        $this->resevationService = $resevationService;
    }

    // store registration
    public function store(RegistrationRequest $request)
    {
        $registration = $this->resevationService->store($request->validated());
        return $registration;
    }
}
