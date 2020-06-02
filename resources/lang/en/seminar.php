<?php

return [
    'model' => [
        'name' => 'Seminar Topic',
        'when' => 'Date',
        'description' => 'Summary',
        'protocol' => 'Protocol of Seminar',
        'branch_id' => 'Where it Happens'
    ],

    'seminarvisit' => [
        'traineeName' => 'Who Visited',
        'create' => 'Create a Visit',
        'model' => [
            'trainee_id' => 'Trainee',
        ],
    ],

    'show' => [
        'seminarVisits' => 'List of Seminar Visitors',
        'cardHead' => ':name at :time',
    ],

    'seminar' => 'Seminar',
    'seminars' => 'Seminars',
];
