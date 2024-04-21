<?php

use Core\Database;

$db = new Database;

$payroll_periods_users = $_GET['filter']['payroll_periods_users'] ?? null;

$db->query  = "SELECT 
    users.id AS user_id,
    users.name AS user_name,
    payroll_periods.name AS period_name,
    payroll_periods.id AS period_id,
    payroll_periods_users.note,
    payroll_periods_users.salary,
    payroll_periods_users.status
FROM payroll_periods_users
    JOIN payroll_periods ON payroll_periods_users.period_id = payroll_periods.id
    JOIN users ON payroll_periods_users.user_id = users.id
WHERE payroll_periods_users.id = $payroll_periods_users";

$data =  $db->exec('single');
// echo '<pre>';
// print_r($data);
// die();

return view('payroll/views/lihat-slip', compact('data'));
