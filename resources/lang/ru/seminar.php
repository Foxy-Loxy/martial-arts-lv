<?php

return [
    'model' => [
        'name' => 'Тема семинара',
        'when' => 'Время события',
        'description' => 'Описание',
        'protocol' => 'Протокол семинара',
        'branch_id' => 'Место события'
    ],

    'seminarvisit' => [
        'traineeName' => 'Кто посетил',
        'create' => 'Создать посещение',
        'model' => [
            'trainee_id' => 'Ученик',
        ],
    ],

    'show' => [
        'seminarVisits' => 'Список посещений семинара',
        'cardHead' => ':name в :time',
    ],

    'seminar' => 'Семинар',
    'seminars' => 'Семинары',

    'editFile' => 'Изменить файл протокола',
    'edit.currentDoc' => 'Текущий файл',
    'edit' => 'Изменить семинар :name',
];
