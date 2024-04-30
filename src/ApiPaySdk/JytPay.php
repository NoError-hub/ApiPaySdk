<?php

namespace ApiPaySdk;

use ReflectionClass;
use DuoLaBao\DuoLaBao;
use GuzzleHttp\Client;


class JytPay {
    private $client;
    private $pass;
    public function __construct($pass = null) 
    {
        $config = require dirname(__FILE__).'/config/jytpay.php';
        $pass? $this->selectPass($pass) : $this->selectPass($config['pass']);

        $this->client = new Client([
            'base_url' => '',
            'timeout' => $config['timeout']
        ]);
    }
    public function create($data) 
    {

    }
    private function selectPass(String $pass)
    {
        switch($pass)
        {
            case 'duolabao':
                $this->pass = new DuoLaBao();
                break;
            default : 
                $this->pass = new ReflectionClass($pass);
        }
    }
}