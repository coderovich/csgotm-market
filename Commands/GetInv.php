<?php


namespace coderovich\CsGoTm\Commands;

class GetInv implements CommandInterface {


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
        return 'GetInv';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}