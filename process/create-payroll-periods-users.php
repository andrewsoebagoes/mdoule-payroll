<?php

use Core\Page;
use Core\Request;
use Core\Database;
use Modules\Crud\Libraries\Repositories\CrudRepository;



// init table fields
$tableName  = 'payroll_periods_users';
$table      = 'payroll_periods_users';

$title      = 'Payroll Periods Users';
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');
$period_id = $_GET['filter']['period_id'];

$db = new Database;

$db->query  = "SELECT
    users.id AS user_id,
    users.name AS user_name,
 
    organizations.name AS organizations_name,
    organizations.record_type
FROM
    organization_users
    
    JOIN users ON organization_users.user_id = users.id
    JOIN organizations ON organization_users.organization_id = organizations.id";

$users       = $db->exec('all');

$db->query  = "SELECT * FROM payroll_periods
WHERE payroll_periods.id = $period_id";

$period_name       = $db->exec('single');


// echo '<pre>';
// print_r($period_name);
// die();

if (Request::isMethod('POST')) {
    $period_id = $_POST['period_id'];

    // Ambil data dari input form
    $salary = $_POST['salary'];
    $note = $_POST['note'];
    $status = $_POST['status'];

    // Iterasi melalui setiap `user_id`
    foreach ($_POST['user_id'] as $user_id) {
        $current_salary = $salary[$user_id] ?? null; // Ambil salary untuk user_id saat ini
        $current_note = $note[$user_id] ?? null; // Ambil note untuk user_id saat ini
        $current_status = isset($status[$user_id]) ? $status[$user_id] : 'Tidak Di Bayar'; // Ambil status untuk user_id saat ini

        $db->insert($table, [
            'user_id'   => $user_id,
            'period_id' => $period_id,
            'salary'    => $current_salary,
            'note'      => $current_note,
            'status'    => $current_status,
        ]);
    }

    // Set flash message
    set_flash_msg(['success' => "$title berhasil ditambahkan"]);

    // Redirect ke halaman tertentu
    // header('location:payroll.index-payroll-periods-users',['filter' => ['period_id'=>$period_id]]);
    // return Redirect::route('payroll.index-payroll-periods-users', ['filter' => ['period_id' => $period_id]]);
    header('Location: /payroll/index-payroll-periods-users?filter[period_id]=' . urlencode($period_id));

    die();
}


// page section
// Page::setActive("$module.$tableName");
Page::setTitle($title);
Page::setModuleName($title);
Page::setBreadcrumbs([
    [
        'url' => routeTo('/'),
        'title' => __('crud.label.home')
    ],
    [
        'url' => routeTo('crud/index', ['table' => $tableName]),
        'title' => $title
    ],
    [
        'title' => __('crud.label.create')
    ]
]);

Page::pushHead('<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />');
Page::pushHead('<style>.select2,.select2-selection{height:38px!important;} .select2-container--default .select2-selection--single .select2-selection__rendered{line-height:38px!important;}.select2-selection__arrow{height:34px!important;}</style>');
Page::pushFoot('<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>');
Page::pushFoot("<script src='" . asset('assets/crud/js/crud.js') . "'></script>");

return view('payroll/views/create-payroll-periods-users', compact('error_msg', 'old', 'users','period_name'));
