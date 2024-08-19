<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Traits\RestExceptionHandlerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class BaseRepository implements BaseRepositoryInterface
{

    public function __construct(private $model, private Request $request)
    {
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(Request|array $request): Model
    {
        $data = $request instanceof Request ? $request->all() : $request;
        return $this->model->create($data);
    }

    public function findOne(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function edit(Request $request, int $id): Model
    {
        $row = $this->model->findOrFail($id);
        $row->update($this->request->all());

        return $row;
    }

    public function createOrUpdate(Request|array $request, int $id = null): Model
    {
        $data = $request instanceof Request ? $request->all() : $request;

        if ($id) {
            $row = $this->model->findOrFail($id);
            $row->update($data);
        } else {
            $row = $this->model->create($data);
        }

        return $row;
    }

    public function delete(int $id): JsonResponse|Model|Collection|Builder
    {
        $row = $this->model->findOrFail($id);
        $row->delete();

        return $row;
    }

       public function createMany(array $data): bool
    {
        return $this->model->insert($data);
    }

    public function findMany(array $ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }

    public function findAllByIds(array $ids, array $with = [])
    {
        return $this->model::with($with)->whereIn('id', $ids)->get()->keyBy('id');
    }
}
