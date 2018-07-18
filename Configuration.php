<?php

namespace coderovich\CsGoTm;



class Configuration
{
    const API_KEY = 'api_key';

    private $baseApiUrl = "https://market.csgo.com/api";
    private $baseUrl = "https://market.csgo.com";

    /**
     * @var array
     */
    protected $_options = array(
        self::API_KEY => '',
    );

    /**
     * @param array $options
     * @throws \InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        $this->setOptions($options);
    }

    /**
     * @param array $options
     * @throws \InvalidArgumentException
     */
    public function setOptions(array $options)
    {
        foreach($options as $key => $value)
        {
            if(!array_key_exists($key, $this->_options))
            {
                throw new \InvalidArgumentException(sprintf('"%s" is an invalid configuration option', $key));
            }

            $this->_options[$key] = $value;
        }
    }

    /**
     * @param string $apiKey
     *
     * @return Configuration
     */
    public function setApiKey($apiKey)
    {
        $this->_options[self::API_KEY] = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->_options[self::API_KEY];
    }

    /**
     * @return string
     */
    public function getBaseApiUrl()
    {
        return $this->baseApiUrl;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }


}