<?php

namespace common\components\Steam\Markets\CsGoTm\Commands;

interface CommandInterface
{

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getRequestMethod();

    /**
     * @return array
     */
    public function getParams();

    /**
     * @return string|null
     */
    public function getUrlFormat();

    /**
     * @return boolean
     */
    public function isApiMethod();

}