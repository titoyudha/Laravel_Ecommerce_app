<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;


class BaseRepository implements BaseContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attribute)
    {
        return $this->model->create($attribute);
    }

    public function update(array $attribute, int $id):bool   
    {
        return $this->find($id)->update($attribute);
    }

    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }

    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    public function delete(int $id) : bool
    {
        return $this->model->find($id)->delete();
    }
}