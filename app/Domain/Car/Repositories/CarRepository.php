<?php

namespace App\Domain\Car\Repositories;

use App\Core\Repository\Contracts\AbstractRepository;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CarRepository extends AbstractRepository
{
    public function all(): Collection
    {
        return $this->builder()->get();
    }

    protected function getModel(): Model
    {
        return new Car();
    }
}
