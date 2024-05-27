<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function with($relations)
    {
        $this->model = $this->model->with($relations);
        return $this;
    }
    public function orderBy($column, $direction = 'asc')
    {
        $this->model = $this->model->orderBy($column, $direction);
        return $this;
    }
    public function update(Model $model, array $data)
    {
        if (!$model instanceof Model) {
            return false;
        }

        $model->fill($data);
        $model->save();

        return $model;
    }
    public function getByIdOrFail($id)
    {
        $model = $this->model->findOrFail($id);
        return $model;
    }
    public function getBy($column, $value = null)
    {
        if (is_array($column)) {
            $query = $this->model;
            foreach ($column as $key => $val) {
                $query = $query->where($key, $val);
            }
            $models = $query->get();
        } else {
            $models = $this->model->where($column, $value)->get();
        }

        return $models;
    }

    public function getByOrFail($column, $value = null)
    {
        if (is_array($column)) {
            $query = $this->model;
            foreach ($column as $key => $val) {
                $query = $query->where($key, $val);
            }
            $model = $query->firstOrFail();
        } else {
            $model = $this->model->where($column, $value)->firstOrFail();
        }

        return $model;
    }

    public function delete(Model $model)
    {
        if (!$model instanceof Model) {
            return false;
        }
        $record = $this->getByIdOrFail($model->id);
        return $record->delete();
    }
}
