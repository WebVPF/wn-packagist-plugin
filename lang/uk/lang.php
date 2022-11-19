<?php

return [
    'plugin' => [
        'name' => 'Packagist',
        'desc' => 'Виводить список та інформацію про пакети packagist.',
    ],
    'prop' => [
        'vendor' => 'Автор',
        'sort_by' => 'Сортувати за',
        'choose_option' => '-- Виберіть варіант --',
        'option_name' => 'назвою',
        'downloads' => 'кількістю скачувань',
        'stars' => 'кількістю зірок на GitHub',
        'order' => 'Порядок',
        'ascending' => 'за зростанням',
        'descending' => 'за зменьшенням',
    ],
    'permissions' => [
        'vendor_permission' => 'Перегляд віджету Packagist Vendor',
    ],
];
