<?php


namespace coderovich\CsGoTm\Commands;

class GetBaseName implements CommandInterface {

    public $market_hash_name;

    public function __construct($market_hash_name) {
        $this->market_hash_name = $market_hash_name;
    }

    public function getParams()
    {
        return [];
    }

    public function getUrlFormat()
    {
        return "%s/%s/{$this->market_hash_name}";
    }

    public function getMethod()
    {
        return 'GetBaseName';
    }


    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}