<?php


namespace coderovich\CsGoTm\Commands;

class GetMoney implements CommandInterface {


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
        return 'GetMoney';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}