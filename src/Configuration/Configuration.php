<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Configuration;

use CBH\UiscomClient\Exceptions\ConfigurationException;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    public const API_VERSION_4 = 'v4.0';

    public const DEFAULT_API_VERSION = self::API_VERSION_4;

    public const AUTH_BY_CREDENTIALS = 1;

    public const AUTH_BY_API_KEY = 2;

    private $apiVersionsList = [
        self::API_VERSION_4,
    ];

    private $logger;

    private $httpClient;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    private $apiVersion = self::DEFAULT_API_VERSION;

    /**
     * Configuration constructor.
     *
     * @param int $authVariant
     * @param array $authData
     * @param \GuzzleHttp\ClientInterface $httpClient
     *
     * @throws ConfigurationException
     */
    public function __construct(int $authVariant, array $authData, \GuzzleHttp\ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        switch ($authVariant) {
            case self::AUTH_BY_CREDENTIALS:
                if (!isset($authData['login'], $authData['password'])) {
                    throw new ConfigurationException("'login' or 'password' are not specified");
                }

                break;
            case self::AUTH_BY_API_KEY:
                if (!isset($authData['api_key'])) {
                    throw new ConfigurationException("'api_key' is not specified");
                }

                break;
            default:
                throw new ConfigurationException('Unknown authorization type');
        }
    }

    /**
     * @return \Psr\Log\LoggerInterface
     */
    public function getLogger(): \Psr\Log\LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param \Psr\Log\LoggerInterface $logger
     *
     * @return ConfigurationInterface
     */
    public function setLogger(\Psr\Log\LoggerInterface $logger): ConfigurationInterface
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * @param string $apiVersion
     *
     * @throws ConfigurationException
     *
     * @return ConfigurationInterface
     */
    public function setApiVersion(string $apiVersion): ConfigurationInterface
    {
        if (!in_array($apiVersion, $this->apiVersionsList, true))
            throw new ConfigurationException("Unknown api version: {$apiVersion}, please, check your configuration");

        $this->apiVersion = $apiVersion;

        return $this;
    }
}
