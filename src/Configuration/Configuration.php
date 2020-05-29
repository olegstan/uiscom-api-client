<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Configuration;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Contracts\ConfigurationInterface;
use CBH\UiscomClient\Traits\LoggerAwareTrait;

/**
 * Class Configuration.
 * Хранит кофигурацию Api клиента.
 */
class Configuration implements ConfigurationInterface
{
    use LoggerAwareTrait;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
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

    /**
     * @var int
     */
    private $authType;

    /**
     * @var string
     */
    private $apiProvider = Constants::UIS;

    /**
     * Configuration constructor.
     *
     * @param \GuzzleHttp\ClientInterface $httpClient
     *
     */
    public function __construct(\GuzzleHttp\ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     *
     * @return ConfigurationInterface
     */
    public function setLogin(string $login): ConfigurationInterface
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return ConfigurationInterface
     */
    public function setPassword(string $password): ConfigurationInterface
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     *
     * @return ConfigurationInterface
     */
    public function setApiKey(string $apiKey): ConfigurationInterface
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return int
     */
    public function getAuthType(): int
    {
        return $this->authType;
    }

    /**
     * @param int $authType
     *
     * @return ConfigurationInterface
     */
    public function setAuthType(int $authType): ConfigurationInterface
    {
        $this->authType = $authType;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiProvider(): string
    {
        return $this->apiProvider;
    }

    /**
     * @param string $apiProvider
     *
     * @return Configuration
     */
    public function setApiProvider(string $apiProvider): Configuration
    {
        $this->apiProvider = $apiProvider;

        return $this;
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttpClient(): \GuzzleHttp\ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param \GuzzleHttp\ClientInterface $httpClient
     *
     * @return ConfigurationInterface
     */
    public function setHttpClient(\GuzzleHttp\ClientInterface $httpClient): ConfigurationInterface
    {
        $this->httpClient = $httpClient;

        return $this;
    }
}
