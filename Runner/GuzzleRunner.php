<?php

namespace common\components\Steam\Markets\CsGoTm\Runner;

use common\components\Steam\Markets\CsGoTm\Commands\CommandInterface;
use Psr\Http\Message\ResponseInterface;

class GuzzleRunner extends GuzzleAsyncRunner
{
    /**
     * {@inheritdoc}
     *
     * @return ResponseInterface
     */
    public function run(CommandInterface $command, $result = null)
    {
        //return parent::run($command, $result)->wait();
        //echo "<pre>",var_dump($result->getBody()->getContents()),"</pre>";
        //echo "<pre>",var_dump(parent::run($command, $result)->wait()),"</pre>";
        return parent::run($command, $result)->wait();
    }
}
