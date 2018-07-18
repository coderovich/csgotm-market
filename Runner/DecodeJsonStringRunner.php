<?php

namespace coderovich\CsGoTm\Runner;

use coderovich\CsGoTm\Commands\CommandInterface;
use Psr\Http\Message\ResponseInterface;

class DecodeJsonStringRunner extends AbstractRunner implements RunnerInterface
{
    /**
     * {@inheritdoc}
     *
     * @param \Psr\Http\Message\ResponseInterface $result
     */
    public function run(CommandInterface $command, $result = null)
    {
        if(!$result instanceof ResponseInterface) {
            throw new \InvalidArgumentException(
                'The result needs to be an instance of GuzzleHttp\Message\ResponseInterface');
        }
        return json_decode($result->getBody()->getContents(), true);
    }
}