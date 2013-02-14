<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'parcels',
    'token' => TOKEN,
    'methodType' => 'PUT',
    'params' => array(
        'id' => 'PC6663',
        //'status' => 'sent',
        'size' => 'A',
        'description' => 'desc a'
    )
));

//print_r($restApi->getResponse());
print_r(json_decode($restApi->getResponse()));

?>