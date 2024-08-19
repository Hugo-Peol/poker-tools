<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface BaseRepositoryInterface
{
    public function findAll();

    public function create(Request $request);

    public function findOne(int $id);

    public function edit(Request $request, int $id);

    public function delete(int $id);
}
