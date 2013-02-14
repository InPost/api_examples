<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'parcels',
    'token' => TOKEN,
    'methodType' => 'POST',
    'params' => array(
        'description' => 'desc',
        'receiver' => array(
            'phone' => '500663128',
            'email' => 'anagorski@inpost.pl'
        ),
        'size' => 'A',
        'tmp_id' => 523445,
        'target_machine' => 'KRA067',
    )
));

print_r($restApi->getResponse());
print_r(json_decode($restApi->getResponse()));

?>