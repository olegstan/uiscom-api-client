<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Configuration;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    public const DEFAULT_CONNECTION_TIMEOUT = 10;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var float
     */
    private $connectionTimeout = self::DEFAULT_CONNECTION_TIMEOUT;

    /**
     * Configuration constructor.
     *
     * @param string $apiKey
     * @param array $params
     */
    public function __construct(string $apiKey, array $params = [])
    {
        $this->apiKey = $apiKey;

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
