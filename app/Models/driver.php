<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'license_plate',
        'driver_name',
        'driver_location',
        'vehicle_model',
        'vehicle_category',
    ];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
