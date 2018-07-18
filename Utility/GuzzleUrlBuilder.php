<?php

namespace common\components\Steam\Markets\CsGoTm\Utility;

use common\components\Steam\Markets\CsGoTm\Commands\CommandInterface;
use GuzzleHttp\Psr7\Uri;

class GuzzleUrlBuilder implements UrlBuilderInterface
{
    /**
     * @var string
     */
    protected $baseUrl = '';

    /**
     * {@inheritdoc}
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function build(CommandInterface $command)
    {
        if ($command->getUrlFormat()===null) {
            $uri = sprintf('%s/%s',
                rtrim($this->getBaseUrl()),
                $command->getMethod()
            );
        } else {
            $uri = sprintf($command->getUrlFormat(),
                rtrim($this->getBaseUrl()),
                $command->getMethod()
            );
        }
        return new Uri($uri);
    }
}