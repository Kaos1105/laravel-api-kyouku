<?php

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface
{
    public function getAll(string $order, string $by);

    public function getAllWithPaginate(string $order, string $by, int $perPage);

    public function create(array $data);

    public function save(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);

    public function find(int $id, string $order, string $by);

    public function findOrFail(int $id, string $order, string $by);

    public function getModel();
}