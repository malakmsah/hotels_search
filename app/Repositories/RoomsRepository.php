<?php

namespace App\Repositories;

use App\Models\Rooms;

class RoomsRepository
{
    public function __construct()
    {
        $this->model = new Rooms();
    }
}
