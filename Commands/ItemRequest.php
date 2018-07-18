<?php
/**
 * Created by PhpStorm.
 * User: SPavlov
 * Date: 09.03.2018
 * Time: 20:09
 */

namespace common\components\Steam\Markets\CsGoTm\Commands;

class ItemRequest implements CommandInterface {

    public $botId;

    public function __construct($botId) {
        $this->botId = $botId;
    }

    public function getParams()
    {
        return [];
    }

    public function getUrlFormat()
    {
        return "%s/%s/out/{$this->botId}/";
    }

    public function getMethod()
    {
        return 'ItemRequest';
    }


    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}