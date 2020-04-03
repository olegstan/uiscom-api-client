<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Configuration;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    public const DEFAULT_CONNECTION_TIMEOUT = 10;

    public const DEFAULT_API_VERSION = 'v4.0';

    public const AUTH_BY_CREDENTIALS = 1;

    public const AUTH_BY_API_KEY = 2;

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
     * @var float
     */
    private $connectionTimeout = self::DEFAULT_CONNECTION_TIMEOUT;

    /**
     * Configuration constructor.
     *
     * @param int $authVariant
     * @param array $authData
     * @param array $params
     */
    public function __construct(int $authVariant, array $authData, array $params = [])
    {
        switch ($authVariant) {
            case self::AUTH_BY_CREDENTIALS:
                if (!isset($params['login'], $params['password'])) {

                }

                break;
        }

        if (isset($params['timeout'])) {
            $this->setConnectionTimeout($params['timeout']);
        }
    }

    /**
     * @return float
     */
    public function getConnectionTimeout(): float
    {
        return $this->connectionTimeout;
    }

    /**
     * @param float $timeout
     *
     * @return Configuration
     */
    public function setConnectionTimeout(float $timeout): ConfigurationInterface
    {
        $this->connectionTimeout = $timeout;

        return $this;
    }
}
