<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Configuration;

/**
 * Class Configuration.
 */
class Configuration
{
    /**
     * @var string
     */
    private $apiKey;

    private $timeout = 10;

    /**
     * Configuration constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
