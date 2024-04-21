<?php

if(isset($_GET['filter']) && isset($_GET['filter']['period_id']))
{
    unset($fields['period_id']);
}

return $fields;