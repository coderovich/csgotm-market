<?php


namespace common\components\Steam\Markets\CsGoTm;


use coderovich\CsGoTm\Commands\CommandInterface;
use coderovich\CsGoTm\Runner\DecodeJsonStringRunner;
use coderovich\CsGoTm\Runner\GuzzleRunner;
use coderovich\CsGoTm\Runner\RunnerInterface;
use coderovich\CsGoTm\Utility\GuzzleUrlBuilder;
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