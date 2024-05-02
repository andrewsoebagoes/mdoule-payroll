<?php

if($data->status == 'Belum Di Bayar'){
    return '<a href="'.routeTo('payroll/bayar-gaji',['filter' =>['period_id' => $data->period_id, 'user_id' => $data->user_id]]).'" class="btn btn-sm btn-info"><i class="fas fa-dollar"></i> '.__('payroll.label.pay').'</a> ';
}else{
    return null;
}