<?php

return [
    'plugin' => [
        'name' => 'Packagist',
        'desc' => 'Выводит список и информацию о пакетах packagist.',
    ],
    'prop' => [
        'vendor' => 'Автор',
        'sort_by' => 'Сортировать по',
        'choose_option' => '-- Выберите вариант --',
        'option_name' => 'названию',
        'downloads' => 'количеству скачиваний',
        'stars' => 'количеству звёзд на GitHub',
        'order' => 'Порядок',
        'ascending' => 'по увеличению',
        'descending' => 'по убыванию',
    ],
    'permissions' => [
        'vendor_permission' => 'Просмотр виджета Packagist Vendor',
    ],
];
