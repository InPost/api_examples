<?php

class RestApi
{

    protected $response;
    protected $info;
    protected $errno;
    protected $error;

    public function __construct($params)
    {
        $this->response = $this->curlInit(array(
            'token' => $params['token'],
            'url' => $params['url'],
            'methodType' => $params['methodType'],
            'params' => $params['params']
        ));
    }

    private function curlInit($params = array())
    {
        $ch = curl_init();

        switch($params['methodType']){
            case 'GET':
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: GET') );
                $getParams = null;
                if(!empty($params['params'])){
                    foreach($params['params'] as $field_name => $field_value){
                        $getParams .= $field_name.'='.urlencode($field_value).'&';
                    }
                    curl_setopt($ch, CURLOPT_URL, $params['url'].'?token='.$params['token'].'&'.$getParams);
                }else{
                    curl_setopt($ch, CURLOPT_URL, $params['url'].'?token='.$params['token']);
                }
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                break;

            case 'POST':
                $string = json_encode($params['params']);
                #$string = $params['params'];
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: POST') );
                curl_setopt($ch, CURLOPT_URL, $params['url'].'?token='.$params['token']);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($string))
                );
                break;

            case 'PUT':
                $string = json_encode($params['params']);
                #$string = $params['params'];
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PUT') );
                curl_setopt($ch, CURLOPT_URL, $params['url'].'?token='.$params['token']);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($string))
                );
                break;

        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $this->info = curl_getinfo($ch);
        $this->errno = curl_errno($ch);
        $this->error = curl_error($ch);

        if ($this->info['http_code'] != 200) {
            /*
            $response = json_encode(array(
                'message' => 'Request failed',
                'type' => 'RequestErrors',
                'code_errors' => $this->config['errorCodes'][$info['http_code']]
            ));
            */
        }

        return $result;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getErrno()
    {
        return $this->errno;
    }

    public function getError()
    {
        return $this->error;
    }

}

?>