<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Hotel();
    }
}
