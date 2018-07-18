<?php


namespace coderovich\CsGoTm\Objects;


class Trade {

    /**
     * Read more: https://csgo.tm/docs/
     */
    CONST STATUS_SALE       = 1;
    CONST STATUS_NEED_GIVE  = 2;
    CONST STATUS_TRANSFER   = 3;
    CONST STATUS_CAN_PICKUP = 4;

    /**
     * @var array
     */
    private $trade;
    public $ui_id;
    public $sellerBotId;
    public $ui_status;
    public $statusText;
    public $i_market_hash_name;
    public $price;
    public $placed;

    /**
     * Trade constructor.
     * @param array $trade
     * @throws \InvalidArgumentException
     */
    public function __construct(array $trade) {
        if (!array_key_exists("ui_id", $trade)) {
            throw new \InvalidArgumentException("CsGoTm trade does't have @ui_id key");
        }
        if (!array_key_exists("ui_status", $trade)) {
            throw new \InvalidArgumentException("CsGoTm trade does't have @ui_status key");
        }

        $this->setTrade($trade);
    }

    public static function getStatusTexts($id=false) {
        $list =  [
            self::STATUS_SALE       => "Вещь выставлена на продажу",
            self::STATUS_NEED_GIVE  => "Вещь нужно передать боту",
            self::STATUS_TRANSFER   => "Ожидание передачи боту купленной вещи от продавца",
            self::STATUS_CAN_PICKUP => "Можно забрать купленную вещь",
        ];

        if ($id!==false) {
            return array_key_exists($id, $list) ? $list[$id] : false;
        }

        return $list;
    }

    public function getStatusText() {
        $textList = self::getStatusTexts();
        return array_key_exists($this->ui_status, $textList) ? $textList[$this->ui_status] : false;
    }

    /**
     * @return bool
     */
    public function canPickUp() {
        return in_array($this->ui_status, [self::STATUS_CAN_PICKUP]);
    }

    /**
     * @return integer
     */
    public function getStatus() {
        return $this->ui_status;
    }

    /**
     * @return integer
     */
    public function getSellerBotId() {
        return $this->trade['ui_bid'];
    }


    public function setTrade($trade) {
        $this->trade = $trade;
        $this->ui_id = $trade['ui_id'];
        $this->sellerBotId = $trade['ui_bid'];
        $this->ui_status = $trade['ui_status'];
        $this->statusText = $this->getStatusText();
        $this->i_market_hash_name = $trade['i_market_hash_name'];
        $this->price = $trade['ui_price'];
        $this->placed = $trade['placed'];
    }

    /**
     * @return array
     */
    public function getTrade() {
        return $this->trade;
    }
}