<?php
/**
 * Created by PhpStorm.
 * User: SPavlov
 * Date: 09.03.2018
 * Time: 20:09
 */

namespace common\components\Steam\Markets\CsGoTm\Commands;

class OperationHistory implements CommandInterface {

    public $start_time;
    public $end_time;

    public function __construct($start_time,$end_time) {
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

    public function getParams()
    {
        return [];
    }

    public function getUrlFormat()
    {
        return "%s/%s/{$this->start_time}/{$this->end_time}/";
    }

    public function getMethod()
    {
        return 'OperationHistory';
    }


    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}