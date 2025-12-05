<?php

return [

    'roles' => [
        'admin' => 'Administrator',
        'user' => 'Basic User',
    ],

    'permissions' => [
        'admin' => ["*"],
        'user' => ['mobil','booking'],
    ],

    'tipe_mobil' => [
        'Mini Bus',
        'Hatchback',
        'Sedan',
        'Sport Utility Vehicle (SUV)',
        'Bus',
        'Multi Purpose Vehicle (MPV)',
        'Station Wagon',
        'City Car',
        'Crossover'
    ],

    'status_booking' => [
        'unpaid' => '<span class="badge bg-label-warning">Unpaid</span>',
        'paid' => '<span class="badge bg-label-success">Paid</span>',
        'ongoing' => '<span class="badge bg-label-primary">On Going</span>',
        'finish' => '<span class="badge bg-label-secondary">Finished</span>',
        'cancel' => '<span class="badge bg-label-danger">Canceled</span>'
    ]


];
