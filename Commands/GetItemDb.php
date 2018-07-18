<?php
/**
 * Created by PhpStorm.
 * User: SPavlov
 * Date: 09.03.2018
 * Time: 20:09
 */

namespace common\components\Steam\Markets\CsGoTm\Commands;

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