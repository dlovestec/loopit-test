<?php

namespace App\Domain\Auth\Request;

use App\Domain\Auth\DTO\Credential;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function getCredential(): Credential
    {
        return new Credential(
            email: $this->get('email'),
            password: $this->get('password'),
            remember: $this->boolean('remember', false),
        );
    }
}
