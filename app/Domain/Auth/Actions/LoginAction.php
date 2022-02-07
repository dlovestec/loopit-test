<?php

namespace App\Domain\Auth\Actions;

use App\Domain\Auth\Request\LoginRequest;
use App\Domain\Auth\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class LoginAction extends Controller
{
    public function __invoke(LoginRequest $request, AuthService $service): JsonResponse
    {
        $user = $service->attemptLogin($request->getCredential());

        return response()->json([
            'user' => $user,
            'token' => session()->get('auth-token'),
        ]);
    }
}
