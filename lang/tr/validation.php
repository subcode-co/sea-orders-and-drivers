<?php

return [

    'required' => ':attribute alanı zorunludur.',
    'numeric' => ':attribute bir sayı olmalıdır.',
    'integer' => ':attribute tam sayı olmalıdır.',
    'min' => [
        'numeric' => ':attribute en az :min olmalıdır.',
        'string'  => ':attribute en az :min karakter olmalıdır.',
    ],
    'max' => [
        'numeric' => ':attribute en fazla :max olabilir.',
        'string'  => ':attribute en fazla :max karakter olabilir.',
    ],
    'after' => ':attribute :date tarihinden sonra olmalıdır.',
    'regex' => ':attribute formatı geçersiz.',
    'unique' => ':attribute zaten kullanılıyor.',

    'attributes' => [
        // Drivers
        'license_plate' => 'plaka',
        'driver_name' => 'sürücü adı',
        'driver_location' => 'sürücü konumu',
        'vehicle_model' => 'araç modeli',
        'vehicle_category' => 'araç kategorisi',

        // Requests
        'tourist_name' => 'turist adı',
        'tourist_nationality' => 'uyruk',
        'tourist_phone' => 'telefon numarası',
        'arrival_time' => 'varış zamanı',
        'departure_time' => 'kalkış zamanı',
        'airport_name' => 'havaalanı adı',
        'driver_id' => 'sürücü',
        'date' => 'tarih',
        'type' => 'tip',
        'trip' => 'gezi',
        'cost' => 'ücret',
        'notes' => 'notlar',
    ],
];
