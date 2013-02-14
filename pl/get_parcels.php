<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'parcels',
    'token' => TOKEN,
    'methodType' => 'GET',
    'params' => array(
        'status' => 'Created',
        //'limit' => 5,
        //'offset' => 1,
        //'sort_by' => 'status',
        //'sort_order' => 'asc',
        //'start_date' => date( 'Y-m-d', strtotime( date('Y-m-d')." - 1 months" )),
        //'end_date' => date('Y-m-d'),
        //'is_customer_delivering' => false,
        //'role' => 'sender'
    )
));

//print_r($restApi->getInfo());
print_r(json_decode($restApi->getResponse()));
?>