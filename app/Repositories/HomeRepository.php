<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Home;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;

class HomeRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function __construct(private Home $model, private Request $request)
    {
        parent::__construct($model, $request);
    }
}
