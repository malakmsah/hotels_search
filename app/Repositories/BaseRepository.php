<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * The repository model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * @param array|null $criteria
     * @return array
     */
    public function all(array $criteria = null, $pluck = null)
    {
        if (!empty($pluck)) {
            return $this->get($criteria)->pluck($pluck)->all();
        }
        return $this->get($criteria)->all();
    }

    /**
     * Get all the specified model records in the database
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get($criteria = null, $limit = 10, $orderField = null, $orderDirection = 'asc')
    {
        $model = $this->getModel();
        if (!emptyArray($criteria)) {
            foreach ($criteria as $field => $value) {
                $model->where($field, $value);
            }
        }

        if (!empty($orderField)) {
            $model->orderBy($orderField, $orderDirection);
        }

        $model->limit($limit);
        return $model->get();
    }

    protected function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Count the number of specified model records in the database
     *
     * @return int
     */
    public function count(array $criteria = null)
    {
        return $this->get($criteria)->count();
    }

    /**
     * Create one or more new model records in the database
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function createMultiple(array $data)
    {
        $models = new Collection();
        foreach ($data as $d) {
            $models->push($this->create($d));
        }
        return $models;
    }

    /**
     * Create a new model record in the database
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }

    /**
     * Delete the specified model record from the database
     *
     * @param $id
     *
     * @return bool|null
     * @throws \Exception
     */
    public function deleteById($id)
    {
        return $this->getById($id)->delete();
    }

    /**
     * Get the specified model record from the database
     *
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    /**
     * Get the first specified model record from the database
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function first()
    {
        return $this->getModel()->firstOrFail();
    }
}
