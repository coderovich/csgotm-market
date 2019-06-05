<?php


namespace coderovich\CsGoTm\Objects;


class Operation {

    /**
     * Read more: https://csgo.tm/docs/
     */
    CONST EVENT_BUY_CSGO = "buy_go";

    const STATUS_PROCESSING = 1;
    const STATUS_ACCEPTED   = 2;
    const STATUS_FAIL       = 5;

    /**
     * @var array
     */
    private $operation;
    public $id;
    public $time;
    public $event;
    public $app;
    public $eventId;
    public $stage;
    public $item;
    public $marketHashName;


    public static function getStageText($stage) {
        $textList = self::getStageTexts();
        return array_key_exists($stage, $textList) ? $textList[$stage] : NULL;
    }

    public static function getStageTexts() {
        $list = [
            self::STATUS_PROCESSING => "PROCESSING",
            self::STATUS_ACCEPTED   => "ACCEPTED",
            self::STATUS_FAIL       => "FAIL",
        ];
        return $list;
    }

    public function getStageAsText() {
        $list = self::getStageTexts();
        return array_key_exists($this->stage, $list) ? $list[$this->stage] : false;
    }


    /**
     * Operation constructor.
     * @param array $operation
     * @throws \InvalidArgumentException
     */
    public function __construct(array $operation) {
        if (!array_key_exists("h_id", $operation)) {
            throw new \InvalidArgumentException("CsGoTm operation does't have @h_id key");
        }
        if (!array_key_exists("h_event", $operation)) {
            throw new \InvalidArgumentException("CsGoTm operation does't have @h_event key");
        }

        $this->setOperation($operation);
    }

    public function setOperation($operation) {
        $this->operation = $operation;
        $this->id = $operation['h_id'];
        $this->event = $operation['h_event'];
        $this->time = $operation['h_time'];
        $this->eventId = $operation['h_event_id'];
        $this->marketHashName = isset($operation['market_hash_name'])?$operation['market_hash_name']:null;
        $this->stage = isset($operation['stage'])?$operation['stage']:null;
        $this->dateTimeText = date("d.m.Y H:i", $this->time);
        $this->item = isset($operation['item'])?$operation['item']:null;
        $this->stageText = $this->getStageAsText();
    }

    /**
     * @return array
     */
    public function getOperation() {
        return $this->operation;
    }
}