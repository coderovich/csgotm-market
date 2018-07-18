<?php

namespace common\components\Steam\Markets\CsGoTm\Runner;

use common\components\Steam\Markets\CsGoTm\Commands\CommandInterface;
use common\components\Steam\Markets\CsGoTm\Utility\UrlBuilderInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;

class GuzzleAsyncRunner extends AbstractRunner implements RunnerInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var UrlBuilderInterface
     */
    protected $urlBuilder;

    /**
     * @param ClientInterface $client
     * @param UrlBuilderInterface $urlBuilder
     */
    public function __construct(ClientInterface $client, UrlBuilderInterface $urlBuilder)
    {
        $this->client = $client;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * {@inheritdoc}
     *
     * @return PromiseInterface
     */
    public function run(CommandInterface $command, $result = null)
    {
        $key = $command->getRequestMethod() === 'GET' ? 'query' : 'form_params';
        $options = [$key => []];

        if(!empty($params = $command->getParams())) {
            $options[$key] = array_merge($options[$key], $params);
        }

        if($config = $this->getConfig()) {
            if(!empty($config->getApiKey())) {
                $options['query']['key'] = $config->getApiKey();
            }
            $this->urlBuilder->setBaseUrl($command->isApiMethod()?$config->getBaseApiUrl():$config->getBaseUrl());
        }

        $request = new Request(
            $command->getRequestMethod(),
            $this->urlBuilder->build($command)
        );

        /*echo "<pre>",print_r($command),"</pre>";
        echo "<pre>",print_r($options),"</pre>";
        die();*/

        return $this->client->sendAsync($request, $options);
    }
}