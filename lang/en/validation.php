<?php

return [

    'required' => 'The :attribute field is required.',
    'numeric' => 'The :attribute must be a number.',
    'integer' => 'The :attribute must be an integer.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'string'  => 'The :attribute must be at least :min characters.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'string'  => 'The :attribute may not be greater than :max characters.',
    ],
    'after' => 'The :attribute must be a date after :date.',
    'regex' => 'The :attribute format is invalid.',
    'unique' => 'The :attribute has already been taken.',

    'attributes' => [
        // Drivers
        'license_plate' => 'license plate',
        'driver_name' => 'driver name',
        'driver_location' => 'driver location',
        'vehicle_model' => 'vehicle model',
        'vehicle_category' => 'vehicle category',

        // Requests
        'tourist_name' => 'tourist name',
        'tourist_nationality' => 'nationality',
        'tourist_phone' => 'phone number',
        'arrival_time' => 'arrival time',
        'departure_time' => 'departure time',
        'airport_name' => 'airport name',
        'driver_id' => 'driver',
        'date' => 'date',
        'type' => 'type',
        'trip' => 'trip',
        'cost' => 'cost',
        'notes' => 'notes',
    ],
];
