<?php

namespace App\Http\Controllers;

use App\Http\Resources\Gambling\GamblingHistoryCollectionResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function abilityPage(Request $request): \Illuminate\View\View
    {
        $token = $request->input('token');

        return view('user-page.index', ['token' => $token, 'user' => $this->user]);
    }

    public function history(UserService $userService): GamblingHistoryCollectionResource
    {
        $history = $userService->getHistory($this->user);

        return new GamblingHistoryCollectionResource($history);
    }
}
