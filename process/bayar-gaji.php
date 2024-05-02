<?php 

use Core\Database;

$db = new Database;

$period_id      = $_GET['filter']['period_id'];
$user_id        = $_GET['filter']['user_id'];

$db->query = ("UPDATE payroll_periods_users
                    SET status= 'Sudah Di Bayar'
                    WHERE period_id = $period_id
                    AND user_id = $user_id
                    ");
$db->exec();

set_flash_msg(['success'=> 'Gaji berhasil di bayar']);
header('Location:'.routeTo('payroll/index-payroll-periods-users',['filter'=>['period_id' => $period_id]]));



?>