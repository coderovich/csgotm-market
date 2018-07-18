<?php
/**
 * Created by PhpStorm.
 * User: SPavlov
 * Date: 09.03.2018
 * Time: 20:09
 */

namespace common\components\Steam\Markets\CsGoTm\Commands;

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