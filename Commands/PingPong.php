<?php


namespace coderovich\CsGoTm\Commands;

class PingPong implements CommandInterface {


    public function getParams()
    {
        return null;
    }

    public function getUrlFormat()
    {
        return null;
    }

    public function getMethod()
    {
        return 'PingPong';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}