<?php

if(is_allowed('crud/index?table=payroll_periods_users', auth()->id) && isset($_GET['filter']) && $_GET['filter']['period_id'])
{
    return '<a href="'.routeTo('payroll/cetak-slip',['filter'=>['period_id' => $_GET['filter']['period_id']]]).'" target="_blank" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-print"></i> Print
            </a>' . ' '.
            '<a href="'.routeTo('payroll/create-payroll-periods-users',['filter'=>['period_id' => $_GET['filter']['period_id']]]).'" class="btn btn-info btn-sm">
                <i class="fa-solid fa-dollar"></i> Bayar Gaji Karyawan
            </a>'
            ;
}

return '';



