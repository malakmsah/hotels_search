<?php

namespace App\Repositories;

use App\Models\Reservation;

class ReservationRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Reservation();
    }
}

