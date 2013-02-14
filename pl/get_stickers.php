<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'stickers/630624347230552019900043;630624347230552019900041',
    'token' => TOKEN,
    'methodType' => 'GET',
    'params' => array(
        'format' => 'Pdf',
        'type' => 'normal'
    )
));

//print_r($restApi->getInfo());
print_r(json_decode($restApi->getResponse()));

?>