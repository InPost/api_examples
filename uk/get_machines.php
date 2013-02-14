<?php

require_once '../vendor/restApi.php';
require_once 'config.php';

$restApi = new RestApi(array(
    'url' => URL.'machines',
    'token' => TOKEN,
    'methodType' => 'GET',
    'params' => array(
        //'town' => 'London'
    )
));

//print_r($restApi->getInfo());
print_r(json_decode($restApi->getResponse()));

?>