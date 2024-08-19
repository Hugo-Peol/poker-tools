<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface BaseServiceInterface
{
    public function findAll();

    public function create(Request $request);

    public function findOne(int $id);

    public function edit(Request $request, int $id);

    public function delete(int $id);
}
