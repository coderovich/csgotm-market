<?php
namespace coderovich\CsGoTm\Utility;

use coderovich\CsGoTm\Commands\CommandInterface;

interface UrlBuilderInterface
{
    /**
     * @param string $baseUrl
     *
     * @return self
     */
    public function setBaseUrl($baseUrl);

    /**
     * @return string
     */
    public function getBaseUrl();

    /**
     * @param CommandInterface $command
     *
     * @return string
     */
    public function build(CommandInterface $command);
} 