<?php

return [

    'required' => 'حقل :attribute مطلوب.',
    'numeric' => 'يجب أن يكون :attribute رقمًا.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'min' => [
        'numeric' => 'يجب ألا يقل :attribute عن :min.',
        'string'  => 'يجب ألا يقل :attribute عن :min أحرف.',
    ],
    'max' => [
        'numeric' => 'يجب ألا يزيد :attribute عن :max.',
        'string'  => 'يجب ألا يزيد :attribute عن :max أحرف.',
    ],
    'after' => 'يجب أن يكون :attribute بعد :date.',
    'regex' => 'تنسيق :attribute غير صالح.',
    'unique' => ':attribute مستخدم بالفعل.',

    'attributes' => [
        // Drivers
        'license_plate' => 'رقم اللوحة',
        'driver_name' => 'اسم السائق',
        'driver_location' => 'موقع السائق',
        'vehicle_model' => 'موديل السيارة',
        'vehicle_category' => 'فئة السيارة',

        // Requests
        'tourist_name' => 'اسم السائح',
        'tourist_nationality' => 'الجنسية',
        'tourist_phone' => 'رقم الهاتف',
        'arrival_time' => 'وقت الوصول',
        'departure_time' => 'وقت المغادرة',
        'airport_name' => 'اسم المطار',
        'driver_id' => 'السائق',
        'date' => 'التاريخ',
        'type' => 'النوع',
        'trip' => 'الرحلة',
        'cost' => 'التكلفة',
        'notes' => 'ملاحظات',
    ],
];
