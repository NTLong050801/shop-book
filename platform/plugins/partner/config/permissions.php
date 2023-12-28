<?php

return [
    [
        'name' => 'Partners',
        'flag' => 'partner.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'partner.create',
        'parent_flag' => 'partner.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'partner.edit',
        'parent_flag' => 'partner.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'partner.destroy',
        'parent_flag' => 'partner.index',
    ],
    [
        'name' => 'Partner categories',
        'flag' => 'partner-category.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'partner-category.create',
        'parent_flag' => 'partner-category.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'partner-category.edit',
        'parent_flag' => 'partner-category.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'partner-category.destroy',
        'parent_flag' => 'partner-category.index',
    ],
];
