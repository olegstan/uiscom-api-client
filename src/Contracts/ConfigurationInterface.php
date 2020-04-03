<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Contracts;

interface ConfigurationInterface
{
    /**
     * @return \Psr\Log\LoggerInterface
     */
    public function getLogger(): \Psr\Log\LoggerInterface;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     *
     * @return ConfigurationInterface
     */
    public function setLogger(\Psr\Log\LoggerInterface $logger): ConfigurationInterface;

    /**
     * @return string
     */
    public function getApiVersion(): string;

    /**
     * @param string $apiVersion
     *
     * @return ConfigurationInterface
     */
    public function setApiVersion(string $apiVersion): ConfigurationInterface;
}
