<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\AbstractResource;

abstract class AbstractDataApiResource extends AbstractResource
{
    public function getServiceName(): string
    {
        return Constants::DATA_API_SERVICE;
    }

    public function getApiVersion(): string
    {
        return Constants::DATA_API_VERSION_2;
    }

    public function getApiHost(): string
    {
        return Constants::API_HOSTS[$this->config->getApiProvider()][Constants::DATA_API_SERVICE];
    }
}
