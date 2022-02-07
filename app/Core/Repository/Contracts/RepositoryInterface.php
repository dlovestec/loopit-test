<?php

namespace App\Core\Repository\Contracts;


use Illuminate\Database\Eloquent\Builder;

interface RepositoryInterface
{
    public function builder(): Builder;
}
