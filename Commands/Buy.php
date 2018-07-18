<?php
/**
 * Created by PhpStorm.
 * User: SPavlov
 * Date: 09.03.2018
 * Time: 20:09
 */

namespace common\components\Steam\Markets\CsGoTm\Commands;

class Buy implements CommandInterface {

    public $classid_instanceid;
    public $price;
    public $partner;
    public $token;
    public $description;

    /**
     * Buy constructor.
     * @param $classid_instanceid
     * @param $price
     * @param string|null $partner
     * @param string|null $token
     * @param int|null $description
     */
    public function __construct($classid_instanceid, $price, $partner=null, $token=null, $description=null) {
        $this->classid_instanceid = $classid_instanceid;
        $this->price = $price;
        $this->description = $description;
        $this->partner = $partner;
        $this->token = $token;
    }

    public function getParams()
    {
        return $this->partner&&$this->token?['partner'=>$this->partner,'token'=>$this->token]:null;
    }

    public function getUrlFormat()
    {
        return "%s/%s/{$this->classid_instanceid}/{$this->price}/{$this->description}/";
    }

    public function getMethod()
    {
        return 'Buy';
    }


    public function getRequestMethod()
    {
        return 'GET';
    }

    public function isApiMethod() {
        return true;
    }

}