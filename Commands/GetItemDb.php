<?php


namespace coderovich\CsGoTm\Commands;

class GetItemDb implements CommandInterface {

    public $dbFile;

    public function __construct() {
        $this->dbFile = "current_730.json";
    }

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
        return "itemdb/{$this->dbFile}";
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return false;
    }

}