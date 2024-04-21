<?php

use Core\Page;
use Core\Database;
use Modules\Crud\Libraries\Repositories\CrudRepository;

// init table fields
$tableName  ='payroll_periods_users';
$table      = tableFields($tableName);
$fields     = $table->getFields();
$module     = $table->getModule();
$success_msg = get_flash_msg('success');
$error_msg   = get_flash_msg('error');
$period_id = $_GET['filter']['period_id'];

$db = new Database;
$db->query  = "SELECT * FROM payroll_periods
WHERE payroll_periods.id = $period_id";

$period_name       = $db->exec('single');

// get data
$crudRepository = new CrudRepository($tableName);
$crudRepository->setModule($module);

if(isset($_GET['draw']))
{
    return $crudRepository->dataTable($fields);
}

// page section
$title = _ucwords(__("$module.label.$tableName"));
Page::setActive("$module.$tableName");
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
        'title' => 'Index'
    ]
]);

Page::pushFoot("<script src='".asset('assets/crud/js/crud.js')."'></script>");

Page::pushHook();

return view('payroll/views/index-payroll-periods-users', compact('fields', 'tableName', 'success_msg', 'error_msg', 'crudRepository','period_name'));