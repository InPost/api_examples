<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'parcels/630624022330552019900014;630624022330552319900013',
    'token' => TOKEN,
    'methodType' => 'GET',
    'params' => array()
));

//print_r($restApi->getInfo());
print_r(json_decode($restApi->getResponse()));

?>