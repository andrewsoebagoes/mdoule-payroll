<?php

if(isset($_GET['filter']) && isset($_GET['filter']['period_id']))
{
    $data['period_id'] = $_GET['filter']['period_id'];
}