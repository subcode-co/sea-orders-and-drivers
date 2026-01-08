<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'tourist_name',
        'tourist_nationality',
        'tourist_phone',
        'airport_name',
        'arrival_time',
        'departure_time',
        'image',
        'driver_id',
        'trip_plan_details',
        'arrival_notified'
    ];

    //append the total price to the model attributes
    protected $appends = ['total_price'];

    //cast the trip plan details to an array[{date,type,trip,cost,notes},{date,type,trip,cost,notes},...]
    protected $casts=[
        'trip_plan_details' => 'array',
        'arrival_time' => 'datetime',
        'departure_time' => 'datetime',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    //calculate the total price of the trip plan details
    public function getTotalPriceAttribute()
    {
        if ($this->trip_plan_details) {
            return collect($this->trip_plan_details)->sum('cost');
        }

        return 0;
    }

}
