<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Http;

use CBH\UiscomClient\Contracts\ConfigurationInterface;
use CBH\UiscomClient\Contracts\ResourceInterface;

class ApiRequest
{
    private $config;

    public function __construct(ConfigurationInterface $configuration)
    {
        $this->config = $configuration;
    }

    public function request(ResourceInterface $resource)
    {

    }
}
