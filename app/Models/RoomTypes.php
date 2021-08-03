<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    use HasFactory;

    protected $table = 'room_types';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'number_of_beds',
        'bed_size',
        'number_of_adults',
        'notes'
    ];
}
