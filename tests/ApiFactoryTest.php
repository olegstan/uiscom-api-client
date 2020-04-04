<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Tests;

use CBH\UiscomClient\ApiClient;
use CBH\UiscomClient\ApiFactory;
use CBH\UiscomClient\Configuration\Configuration;
use GuzzleHttp\Client;

class ApiFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $appConfig;

    public function setUp()
    {
        parent::setUp();

        $httpClient = new Client();
        $this->appConfig = new Configuration($httpClient);
    }

    public function testMakeApiClientWithCredentials()
    {
        $this->assertInstanceOf(
            ApiClient::class,
            ApiFactory::makeApiClientWithCredentials('login', 'pass', $this->appConfig)
        );
    }

    public function testMakeApiClientWithApiKey()
    {
        $this->assertInstanceOf(
            ApiClient::class,
            ApiFactory::makeApiClientWithApiKey('api_key', $this->appConfig)
        );
    }
}
