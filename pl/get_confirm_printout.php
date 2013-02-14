<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'confirms/4043/printout',
    'token' => TOKEN,
    'methodType' => 'GET',
    'params' => array(
        'format' => 'Pdf'
    )
));

print_r($restApi->getInfo());
print_r(json_decode($restApi->getResponse()));

?>