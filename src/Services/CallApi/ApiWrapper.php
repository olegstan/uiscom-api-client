<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi;

use CBH\UiscomClient\Services\CallApi\Resources;
use CBH\UiscomClient\Services\CallApi\Entities;
use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\AbstractApiWrapper;

/**
 * Class ApiWrapper
 *
 * @method Resources\CallCreation\StartSimpleCall getSimpleCall(array $params = [])
 * @method Resources\CallActions\TagCall          setCallTag(Entities\CallSession $callSession, int $tagId)
 */
class ApiWrapper extends AbstractApiWrapper
{
    protected $resources = [
        Constants::CALL_API_START_SIMPLE_CALL_METHOD => Resources\CallCreation\StartSimpleCall::class,
    ];

    public function getServiceName(): string
    {
        return Constants::CALL_API_URL;
    }
}
