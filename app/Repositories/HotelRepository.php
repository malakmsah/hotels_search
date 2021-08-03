<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository
{
    public function __construct()
    {
        $this->model = new Hotel();
    }
}
