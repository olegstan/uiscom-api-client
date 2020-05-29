<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Resources;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\AbstractResource;

abstract class AbstractCallApiResource extends AbstractResource
{
    public function getServiceName(): string
    {
        return Constants::CALL_API_SERVICE;
    }

    public function getApiVersion(): string
    {
        return Constants::CALL_API_VERSION_4;
    }

    public function getApiHost(): string
    {
        return Constants::API_HOSTS[$this->config->getApiProvider()][Constants::CALL_API_SERVICE];
    }
}
