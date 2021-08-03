<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Room();
    }
}

