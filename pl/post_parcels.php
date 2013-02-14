<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'parcels',
    'token' => TOKEN,
    'methodType' => 'POST',
    'params' => array(
        'cod_amount' => '5.11',
        'description' => 'desc',
        'insurance_amount' => '3.13',
        'receiver' => array(
            'phone' => '500663128',
            'email' => 'anagorski@inpost.pl'
        ),
        'size' => 'A',
        'source_machine' => 'BBI234',
        'tmp_id' => 523445,
        'target_machine' => 'KRA067',
    )
));

//print_r($restApi->getResponse());
print_r(json_decode($restApi->getResponse()));

?>