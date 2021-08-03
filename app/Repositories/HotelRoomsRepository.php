<?php

namespace App\Repositories;

use App\Models\Rooms;

class HotelRoomsRepository
{
    public function __construct()
    {
        $this->model = new Rooms();
    }
}
