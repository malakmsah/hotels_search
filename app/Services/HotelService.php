<?php

namespace App\Services;

use App\Repositories\HotelRepository;

class HotelService
{
    /**
     * @return \App\Repositories\HotelRepository
     */
    protected function getRepository(): HotelRepository
    {
        return new HotelRepository();
    }

}
