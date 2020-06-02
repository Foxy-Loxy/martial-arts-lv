<?php

return [
    'exam' => 'Exam',
    'exams' => 'Exams',
    'edit' => 'Change Exam Scheduled on :time',
    'model' => [
        'when' => 'Date When It Happens',
        'branch_id' => 'Where It Happens',
    ],

    'show' => [
        'cardHead' => 'Info Of Exam Scheduled On :time',
        'examResults' => 'Exam Summary',
    ],

    'exampass' => [
        'create' => 'Create Result of Exam',
        'traineeName' => 'Name of Trainee',
        'model' => [
            'status' => 'Result',
            'when' => 'When it happens',
            'branch_id' => 'Where it happens',
            'commentary' => 'Commentary on Performance',
            'result' => 'Result',
        ],
        'status' => [
            'pass' => 'Passed',
            'fail' => 'Failed',
            'miss' => 'Missed',
            'upcoming' => 'Scheduled',
        ],
        'show' => [
            'cardHead' => 'Exam Scheduled on :date for :name',
            'commentary' => 'Commentary on Performance',
            'result' => 'Conclusion'
        ],
        'edit' => [
            'cardHead' => 'Editing Exam Scheduled on :date for :name',
        ],
    ],
];
