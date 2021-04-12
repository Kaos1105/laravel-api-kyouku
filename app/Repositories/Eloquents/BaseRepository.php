<?php

namespace App\Repositories\Eloquents;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function getAll(string $order = 'id', string $by = 'desc')
    {
        return $this->model->orderBy($order, $by)->get()->appends(request()->query());
    }

    public function getAllWithPaginate(string $order = 'id', string $by = 'desc', int $perPage = 1)
    {
        return $this->model->orderBy($order, $by)->paginate($perPage)->appends(request()->query());
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function save(array $data): int
    {
        $model = $this->model->create($data);
        return $model->id;
    }

    public function update(array $data, int $id)
    {
        return $this->model->where("id", "=", $id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }

    public function find(int $id, string $order, string $by)
    {
        return $this->model->find($id)->orderBy($order, $by);
    }

    public function findOrFail(int $id, string $order, string $by)
    {
        return $this->model->findOrFail($id)->orderBy($order, $by);
    }

    public function getModel()
    {
        return $this->model;
    }
}