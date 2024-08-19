<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Services\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Ramsey\Collection\Collection;

class BaseService implements BaseServiceInterface
{

    public function __construct(private $resource, private $repository)
    {
    }

    public function findAll(): ResourceCollection
    {
        $results = $this->repository->findAll();

        return $this->resource::collection($results);
    }

    public function create(Request $request): JsonResource
    {
        $result = $this->repository->create($request);

        return new $this->resource($result);
    }

    public function findOne(int $id): JsonResource
    {
        $result = $this->repository->findOne($id);

        return new $this->resource($result);
    }

    public function edit(Request $request, int $id): JsonResource
    {
        $result = $this->repository->edit($request, $id);

        return new $this->resource($result);
    }

    public function delete(int $id): JsonResponse|Model|Collection
    {
        return $this->repository->delete($id);
    }

}
