<?php

namespace App\Services;

use App\Repositories\RoomRepository;

class RoomService
{
    /**
     * @return \App\Repositories\HotelRepository
     */
    protected function getRepository(): RoomRepository
    {
        return new RoomRepository();
    }
}
