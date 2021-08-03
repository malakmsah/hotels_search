<?php

namespace App\Repositories;

use App\Models\Provider;

class ProviderRepository
{
    public function __construct()
    {
        $this->model = new Provider();
    }
}
