<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\BaseServiceInterface;
use App\Http\Resources\HomeResource;
use App\Repositories\HomeRepository;

class HomeService extends BaseService implements BaseServiceInterface
{
    public function __construct(private HomeRepository $repository)
    {
        $this->resource = HomeResource::class;

        parent::__construct($this->resource, $repository);
    }

}
