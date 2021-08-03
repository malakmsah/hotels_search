<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'hotel_id',
        'room_type_id',
        'number_of_rooms',
        'number_of_active_reservations',
        'number_of_adults',
        'fare',
        'amenities',
        'notes'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'amenities' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roomType()
    {
        return $this->hasOne(RoomTypes::class);
    }
}
