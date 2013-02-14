<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'parcels/630624355230552019900008;630624355230552019900009/pay',
    'token' => TOKEN,
    'methodType' => 'POST',
    'params' => array()
));

//print_r($restApi->getResponse());
print_r(json_decode($restApi->getResponse()));

?>