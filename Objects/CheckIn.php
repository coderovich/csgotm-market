<?php

namespace coderovich\CsGoTm\Objects;

class CheckIn extends Operation {

	public $amount;
	public $currency;

	public function setOperation($operation) {
		$this->operation = $operation;
		$this->id = $operation['h_id'];
		$this->event = $operation['h_event'];
		$this->time = $operation['h_time'];
		$this->eventId = $operation['h_event_id'];
		$this->dateTimeText = date("d.m.Y H:i", $this->time);
		$this->amount = $operation['i_amount'] / 100;
		$this->currency = $operation['i_currency'];
	}

	public function getAmount() {
		return $this->amount;
	}

	public function getCurrency() {
		return $this->currency;
	}

}