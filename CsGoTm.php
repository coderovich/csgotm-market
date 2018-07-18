<?php
/**
 * Created by PhpStorm.
 * User: SPavlov
 * Date: 09.03.2018
 * Time: 10:05
 */

namespace common\components\Steam\Markets\CsGoTm;


use common\components\Steam\Markets\CsGoTm\Commands\CommandInterface;
use common\components\Steam\Markets\CsGoTm\Runner\DecodeJsonStringRunner;
use common\components\Steam\Markets\CsGoTm\Runner\GuzzleRunner;
use common\components\Steam\Markets\CsGoTm\Runner\RunnerInterface;
use common\components\Steam\Markets\CsGoTm\Utility\GuzzleUrlBuilder;
use GuzzleHttp\Client;

class CsGoTm {

    /**
     * @var array
     */
    protected $runners = [];

    /**
     * @var Configuration
     */
    protected $config;



    /**
     * @param Configuration $config
     */
    public function __construct(Configuration $config = null) {
        if ($config) {
            $this->config = $config;
        }
    }

    public function run(CommandInterface $command) {

        $this->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));
        $this->addRunner(new DecodeJsonStringRunner());

        $result = null;

        /** @var RunnerInterface $runner */
        foreach ($this->runners as $runner) {
            $result = $runner->run($command, $result);
        }

        return $result;
    }

    /**
     * @param RunnerInterface $runner
     *
     * @return self
     */
    public function addRunner(RunnerInterface $runner) {
        $this->runners[] = $runner->setConfig($this->config);
        return $this;
    }

    public function getItemDbUrl($csvFile) {
        return $this->config->getBaseUrl()."/itemdb/{$csvFile}";
    }

}