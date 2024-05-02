<?php

use Core\Database;

$db = new Database;

$period_id = $_GET['filter']['period_id'] ?? null;

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
WHERE payroll_periods_users.period_id = $period_id";

$data =  $db->exec('all');
// echo '<pre>';
// print_r($data);
// die();

return view('payroll/views/cetak-slip', compact('data'));
