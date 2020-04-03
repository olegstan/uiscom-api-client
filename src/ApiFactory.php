<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

use CBH\UiscomClient\Configuration\Configuration;
use CBH\UiscomClient\Configuration\ConfigurationInterface;
use \GuzzleHttp\Client;
use \Psr\Log\LoggerInterface;

class ApiFactory
{
    public static function init(string $apiKey,
                                ConfigurationInterface $configuration = null,
                                LoggerInterface $logger = null): ApiClient
    {
        $config = new Configuration($apiKey);
        if (null === $configuration) {
            $config = new Configuration($apiKey);
        }
        $httpClient = new Client();

        return new ApiClient($config, $httpClient, $logger);
    }
}
