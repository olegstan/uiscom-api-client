<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

use CBH\UiscomClient\Contracts\ConfigurationInterface;

class ApiFactory
{
    public static function makeApiClient(ConfigurationInterface $configuration): ApiClient
    {
        return new ApiClient($configuration);
    }
}
