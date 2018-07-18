<?php


namespace coderovich\CsGoTm\Commands;

class MassSearchItemByName implements CommandInterface {

    public $list = [];

    public function __construct($names = []) {
        foreach ($names as $name) {
            $this->list[] = $name;
        }
    }

    public function getParams()
    {
        return ['list'=>$this->list];
    }

    public function getUrlFormat()
    {
        return null;
    }

    public function getMethod()
    {
        return 'MassSearchItemByName';
    }


    public function getRequestMethod()
    {
        return 'POST';
    }

    public function isApiMethod() {
        return true;
    }

}