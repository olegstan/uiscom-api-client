<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

use CBH\UiscomClient\CallApi;
use CBH\UiscomClient\DataApi;
use CBH\UiscomClient\Configuration\Configuration;
use CBH\UiscomClient\Configuration\ConfigurationInterface;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

class ApiFactory
{
    public static function makeCallApiClient(string $apiKey,
                                         ConfigurationInterface $configuration = null,
                                         LoggerInterface $logger = null): CallApi\ApiClient
    {
        $config = new Configuration($apiKey);
        if (null === $configuration) {
            $config = new Configuration($apiKey);
        }
        $httpClient = new Client();

        return new CallApi\ApiClient($config, $httpClient, $logger);
    }

    public static function makeDataApiClient(): DataApi\ApiClient
    {
        return new DataApi\ApiClient();
    }
}
