<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * The repository model
     *
     * @var Model
     */
    protected $model;


    /**
     * @param array|null $criteria
     * @return array
     */
    public function all(array $criteria = null, $pluck = null): array
    {
        if (!empty($pluck)) {
            return $this->get($criteria)->pluck($pluck)->all();
        }
        return $this->get($criteria)->all();
    }

    /**
     * Get all the specified model records in the database
     *
     * @param array|null $criteria
     * @param int $limit
     * @param string|null $orderField
     * @param string $orderDirection
     * @return Collection
     */
    public function get(array $criteria = null, int $limit = 10, string $orderField = null, string $orderDirection = 'asc'): Collection
    {
        $model = $this->getModel();
        if (!empty($criteria)) {
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

    /**
     * @return Model
     */
    protected function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Count the number of specified model records in the database
     *
     * @param array|null $criteria
     * @return int
     */
    public function count(array $criteria = null): int
    {
        return $this->get($criteria)->count();
    }

    /**
     * Create one or more new model records in the database
     *
     * @param array $data
     *
     * @return Collection
     */
    public function createMultiple(array $data): Collection
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
     * @return Model
     */
    public function create(array $data): Model
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
    public function deleteById($id): ?bool
    {
        return $this->getById($id)->delete();
    }

    /**
     * Get the specified model record from the database
     *
     * @param $id
     *
     * @return Model
     */
    public function getById($id): Model
    {
        return $this->getModel()->findOrFail($id);
    }

    /**
     * Get the first specified model record from the database
     *
     * @return Model
     */
    public function first(): Model
    {
        return $this->getModel()->firstOrFail();
    }
}
