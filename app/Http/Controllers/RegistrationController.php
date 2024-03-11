<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\AbilityPage\AbilityPageResource;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function registrationForm(): \Illuminate\View\View
    {
        return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, RegistrationService $registrationService): AbilityPageResource
    {
        $newUser = $registrationService->registerUser($request->validated());
        $token = auth()->login($newUser);

        return new AbilityPageResource($token);
    }
}
