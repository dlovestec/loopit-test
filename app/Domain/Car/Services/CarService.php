<?php

namespace App\Domain\Car\Services;

use App\Domain\Car\Repositories\CarRepository;
use Illuminate\Database\Eloquent\Collection;

class CarService
{
    public function __construct(protected readonly CarRepository $repository)
    {
    }

    public function getCars(): Collection
    {
        return $this->repository->all();
    }
}
