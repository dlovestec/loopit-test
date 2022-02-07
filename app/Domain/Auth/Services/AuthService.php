<?php

namespace App\Domain\Auth\Services;

use App\Domain\Auth\DTO\Credential;
use App\Domain\Auth\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    public function __construct(protected readonly UserRepository $repository)
    {
    }

    public function attemptLogin(Credential $credential): User
    {
        $user = $this->repository->findOneByEmail($credential->email);

        abort_if(!password_verify($credential->password, $user->getPassword()), Response::HTTP_UNAUTHORIZED);

        Auth::login($user);

        session()->put('auth-token', $user->createToken('PAT')->plainTextToken);

        return $user;
    }
}
