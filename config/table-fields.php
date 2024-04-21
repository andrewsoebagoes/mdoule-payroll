<?php 

return [

    'payroll_periods'  => [
        'name' => [
            'label' => __('payroll.label.name'),
            'type'  => 'text'
        ]
    ],

    'payroll_periods_users'  => [
        'period_id' => [
            'label' => __('payroll.label.period'),
            'type'  => 'options-obj:payroll_periods,id,name'
        ],
        'user_id' => [
            'label' => __('payroll.label.user'),
            'type'  => 'options-obj:users,id,name'
        ],
        'salary' => [
            'label' => __('payroll.label.salary'),
            'type'  => 'number'
        ],
        'note' => [
            'label' => __('payroll.label.note'),
            'type'  => 'text'
        ],
        'status' => [
            'label' => __('payroll.label.status'),
            'type'  => 'text'
        ],
    ],

];