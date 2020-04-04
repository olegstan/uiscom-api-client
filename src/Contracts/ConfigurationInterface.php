<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Contracts;

interface ConfigurationInterface
{
    /**
     * @return string
     */
    public function getLogin(): string;

    /**
     * @param string $login
     *
     * @return ConfigurationInterface
     */
    public function setLogin(string $login): ConfigurationInterface;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @param string $password
     *
     * @return ConfigurationInterface
     */
    public function setPassword(string $password): ConfigurationInterface;

    /**
     * @return string
     */
    public function getApiKey(): string;

    /**
     * @param string $apiKey
     *
     * @return ConfigurationInterface
     */
    public function setApiKey(string $apiKey): ConfigurationInterface;

    /**
     * @return int
     */
    public function getAuthType(): int;

    /**
     * @param int $authType
     *
     * @return ConfigurationInterface
     */
    public function setAuthType(int $authType): ConfigurationInterface;

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
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttpClient(): \GuzzleHttp\ClientInterface;

    /**
     * @param \GuzzleHttp\ClientInterface $httpClient
     * @return ConfigurationInterface
     */
    public function setHttpClient(\GuzzleHttp\ClientInterface $httpClient): ConfigurationInterface;

    /**
     * @return string
     */
    public function getDataApiHost(): string;

    /**
     * @param string $dataApiHost
     *
     * @return ConfigurationInterface
     */
    public function setDataApiHost(string $dataApiHost): ConfigurationInterface;

    /**
     * @return string
     */
    public function getDataApiVersion(): string;

    /**
     * @param string $dataApiVersion
     *
     * @return ConfigurationInterface
     */
    public function setDataApiVersion(string $dataApiVersion): ConfigurationInterface;

    /**
     * @return string
     */
    public function getCallApiHost(): string;

    /**
     * @param string $callApiHost
     *
     * @return ConfigurationInterface
     */
    public function setCallApiHost(string $callApiHost): ConfigurationInterface;

    /**
     * @return string
     */
    public function getCallApiVersion(): string;

    /**
     * @param string $callApiVersion
     *
     * @return ConfigurationInterface
     */
    public function setCallApiVersion(string $callApiVersion): ConfigurationInterface;
}
