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
 * @method Resources\CallCreation\StartEmployeeCall getEmployeeCall(array $params = [])
 * @method Resources\CallCreation\StartMultiCall  getMultiCall(array $params = [])
 * @method Resources\CallActions\TagCall          setCallTag(Entities\CallSession $callSession, int $tagId)
 */
class ApiWrapper extends AbstractApiWrapper
{
    protected $resources = [
        Constants::CALL_API_START_SIMPLE_CALL_METHOD => Resources\CallCreation\StartSimpleCall::class,
        Constants::CALL_API_START_EMPLOYEE_CALL_METHOD => Resources\CallCreation\StartEmployeeCall::class,
        Constants::CALL_API_START_MULTI_CALL_METHOD => Resources\CallCreation\StartMultiCall::class,
        Constants::CALL_API_TAG_CALL_METHOD => Resources\CallActions\TagCall::class,
    ];

    public function getServiceName(): string
    {
        return Constants::UIS_CALL_API_HOST;
    }
}
