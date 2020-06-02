<?php

return [
    'exam' => 'Экзамен',
    'exams' => 'Экзамены',
    'edit' => 'Изменение экзамена на :time',
    'model' => [
        'when' => 'Дата события',
        'branch_id' => 'Место события',
    ],

    'show' => [
        'cardHead' => 'Информация о экзамене на :time',
        'examResults' => 'Результаты экзамена',
    ],

    'exampass' => [
        'create' => 'Создать результат',
        'traineeName' => 'Имя ученика',
        'model' => [
            'status' => 'Результат',
            'when' => 'Время экзамена',
            'branch_id' => 'Место экзамена',
            'commentary' => 'Заметки о прохождении',
            'result' => 'Результат',
        ],
        'status' => [
            'pass' => 'Пройден',
            'fail' => 'Не пройден',
            'miss' => 'Пропущен',
            'upcoming' => 'Запланирован',
        ],
        'show' => [
            'cardHead' => 'Экзамен на :date в :name',
            'commentary' => 'Заметки о прохождении',
            'result' => 'Результат'
        ],
        'edit' => [
            'cardHead' => 'Изменение экзамена на :date для :name',
        ],
    ],
];
