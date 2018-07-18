<?php

namespace common\components\Steam\Markets\CsGoTm\Runner;

use common\components\Steam\Markets\CsGoTm\Configuration;
use common\components\Steam\Markets\CsGoTm\Commands\CommandInterface;

interface RunnerInterface
{
    /**
     * @param Configuration $config
     *
     * @return self
     */
    public function setConfig(Configuration $config);

    /**
     * @return Configuration
     */
    public function getConfig();

    /**
     * Run the command with the result of the previous runner.
     *
     * Obviously if this is the first runner then the result would be null. Maybe the result
     * should be some sort of interface as well?
     *
     * @param CommandInterface $command
     * @param null $result
     *
     * @return mixed
     */
    public function run(CommandInterface $command, $result = null);
} 