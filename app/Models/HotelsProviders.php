<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsProviders extends Model
{
    use HasFactory;

    protected $table = 'hotels_providers';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'hotel_id',
        'provider_id',
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
    public function provider()
    {
        return $this->hasOne(Provider::class);
    }
}
