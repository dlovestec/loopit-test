<?php

namespace App\Domain\Auth\Repositories;

use App\Core\Repository\Contracts\AbstractRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends AbstractRepository
{
    protected function getModel(): Model
    {
        return new User();
    }

    public function findOneByEmail(string $email): User
    {
        /** @var User $user */
        $user = $this->builder()->where(User::EMAIL_COLUMN, '=', $email)->firstOrFail();

        return $user;
    }
}
