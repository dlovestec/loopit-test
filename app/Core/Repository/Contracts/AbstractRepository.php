<?php

namespace App\Core\Repository\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    public function builder(): Builder
    {
        return $this->getModel()->newQuery();
    }

    abstract protected function getModel(): Model;
}
