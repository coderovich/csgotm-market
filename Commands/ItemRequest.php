<?php


namespace coderovich\CsGoTm\Commands;

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