<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

use CBH\UiscomClient\Contracts\ConfigurationInterface;
use CBH\UiscomClient\Http\ApiRequest;
use CBH\UiscomClient\Services\DataApi;
use CBH\UiscomClient\Services\CallApi;

/**
 * Class ApiClient.
 */
class ApiClient
{
    /**
     * @var DataApi\ApiWrapper
     */
    private $dataApiWrapper;

    /**
     * @var CallApi\ApiWrapper
     */
    private $callApiWrapper;

    /**
     * @var ConfigurationInterface
     */
    private $config;

    /**
     * ApiClient constructor.
     *
     * @param ConfigurationInterface $config
     */
    public function __construct(ConfigurationInterface $config)
    {
        $requester = new ApiRequest($config);

        $this->config = $config;
        $this->dataApiWrapper = new DataApi\ApiWrapper($requester);
        $this->callApiWrapper = new CallApi\ApiWrapper($requester);
    }

    /**
     * @return DataApi\ApiWrapper
     */
    public function dataApi(): DataApi\ApiWrapper
    {
        return $this->dataApiWrapper;
    }

    /**
     * @return CallApi\ApiWrapper
     */
    public function callApi(): CallApi\ApiWrapper
    {
        return $this->callApiWrapper;
    }
}
