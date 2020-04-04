<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\AbstractApiWrapper;
use CBH\UiscomClient\Services\DataApi\Resources;

/**
 * Class ApiWrapper
 *
 * @method Resources\Account\GetAccount getAccount(...$args)
 */
class ApiWrapper extends AbstractApiWrapper
{
    protected $resources = [
        Constants::DATA_API_GET_ACCOUNT_METHOD => Resources\Account\GetAccount::class,
    ];

    public function getServiceName(): string
    {
        return Constants::DATA_API_URL;
    }
}
