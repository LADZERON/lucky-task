<?php

namespace App\Http\Controllers;
use App\Http\Resources\AbilityPage\AbilityPageResource;

class AuthController extends Controller
{
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(): AbilityPageResource
    {
        $newToken = auth()->refresh();

        return new AbilityPageResource($newToken);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
