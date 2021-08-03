<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository
{
    public function __construct()
    {
        $this->model = new Room();
    }
}

