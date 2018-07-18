<?php


namespace coderovich\CsGoTm\Commands;

class Trades implements CommandInterface {


    public function getParams()
    {
        return [];
    }

    public function getUrlFormat()
    {
        return null;
    }

    public function getMethod()
    {
        return 'Trades';
    }


    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}