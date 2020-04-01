<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Configuration;

interface ConfigurationInterface
{
    /**
     * @return float
     */
    public function getConnectionTimeout(): float;

    /**
     * @param float $timeout
     *
     * @return ConfigurationInterface
     */
    public function setConnectionTimeout(float $timeout): ConfigurationInterface;
}
