<?php

namespace App\Domain\Auth\DTO;

final class Credential
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly bool $remember = false,
    ) {
    }
}
